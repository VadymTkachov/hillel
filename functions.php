<?php

//session_start();

// Display Errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

global $db;

// Constants
const SQL_DIR      = __DIR__ . '/sql/';
const TEMPLATE_DIR = __DIR__ . '/template/';
const SQL_PREFIX   = 'hl_';

define('HOME_PAGE', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST']);

include_once(__DIR__ . '/Classes/MyDb.php');

$name = 'Vadym';

$query = $db->prepare("SELECT * FROM hl_users WHERE name = :name ");
$query->bindParam(':name', $name);
$query->execute();
$users = $query->fetchAll();



// Make task
if (isset($_GET['task']) && ! empty($_GET['task'])) {
    switch ($_GET['task']) {
        case 'create':
            {
                table_create();
            }
            break;

        case 'insert':
            {
                user_add();
            }
            break;

        case 'delete':
            {
                users_delete();
            }
            break;
    }
}

// Create table
function table_create()
{
    global $db;

    if (empty($_GET['table'])) {
        redirect_to();
    }

    try {
        $table = $_GET['table'];

        if ( ! is_table_exists($table) && file_exists(SQL_DIR . "create-{$table}.sql")) {
            $prepare = $db->prepare(file_get_contents(SQL_DIR . "create-{$table}.sql"));
            $prepare->execute();

            redirect_to('?status=success&message=Table "' . $table . '" exist.');
        }
    } catch (PDOException $e) {
        redirect_to('?status=error&message=Table was not created.');
    }
}


// Add user
function user_add()
{
    global $db;

    if (empty($_GET['user']) || ! is_array($_GET['user'])) {
        redirect_to();
    }

    $query   = 'INSERT INTO ' . SQL_PREFIX . 'users ';
    $columns = [];
    $values  = [];

    foreach ($_GET['user'] as $key => $field) {
        array_push($columns, $key);
        array_push($values, $field);
    }

    try {
        $query   = $query . ' (' . implode(',', $columns) . ') VALUES ("' . implode('","', $values) . '");';
        $prepare = $db->prepare($query);
        $results = $prepare->execute();

        redirect_to('?status=success&message=User was added.');
    } catch (PDOException $e) {
        redirect_to('?status=error&message=Error adding user');
    }
}


// Delete user
function users_delete()
{
    global $db;

    if (empty($_GET['user_ids'])) {
        return false;
    }

    try {
        $user_ids = implode(', ', $_GET['user_ids']);
        $query    = "DELETE FROM " . SQL_PREFIX . "users WHERE id IN ({$user_ids})";
        $query    = $db->prepare($query);
        $query->execute();

        redirect_to('?status=success&message=Users Has been deleted');
    } catch (PDOException $e) {
        redirect_to('?status=error&message=Users was not deleted!');
    }
}


// Redirect to @path = string
function redirect_to($path = '/')
{
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: " . HOME_PAGE . $path);
    exit();
}


// Check table exists
function is_table_exists($table = 'users')
{
    global $db;

    $table = SQL_PREFIX . $table;

    try {
        $result = $db->query("SELECT 1 FROM $table LIMIT 1");

        return true;
    } catch (Exception $e) {
        return false;
    }
}

// Get Users
function get_users()
{
    global $db;

    if ( ! is_table_exists()) {
        return false;
    }

    $query = $db->prepare("SELECT * FROM " . SQL_PREFIX . "users");
    $query->execute();

    return $query->fetchAll();
}

// Get User by ID
function get_user_by_id($id)
{
    global $db;

    if (empty($id)) {
        return false;
    }

    $query = $db->prepare("SELECT * FROM " . SQL_PREFIX . "users WHERE id={$id}");
    $query->execute();

    return $query->fetchObject();
}

// Cleaner system message
if ( ! empty($_GET['message']) && empty($_SESSION['message'])) {
    $_SESSION['message'] = 1;
} elseif ( ! empty($_GET['message'])) {
    $_SESSION['message'] = 0;
    redirect_to();
}
