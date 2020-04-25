<?php

session_start();

// Display Errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

global $db;

include_once(__DIR__ . '/Classes/MyDb.php');

// Constants
const SQL_DIR      = __DIR__ . '/sql/';
const TEMPLATE_DIR = __DIR__ . '/template/';
const SQL_PREFIX   = 'hl_';
define('HOME_PAGE', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST']);

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


// Create Table & Procedures
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

            // Procedure users
            $query = $db->prepare(file_get_contents(SQL_DIR . 'procedures/users.sql'));
            $query->execute();

            // Procedure user
            $query = $db->prepare(file_get_contents(SQL_DIR . 'procedures/user.sql'));
            $query->execute();

            // Procedure user_add
            $query = $db->prepare(file_get_contents(SQL_DIR . 'procedures/user-add.sql'));
            $query->execute();

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

    $values = [];

    foreach ($_GET['user'] as $field) {
        array_push($values, $field);
    }

    if (5 > count($values)) {
        array_push($values, '');
    }

    try {
        $query = $db->prepare('CALL user_add("' . implode('","', $values) . '")');
        $query->execute();

        redirect_to('?status=success&message=User was added.');
    } catch (PDOException $e) {
        redirect_to('?status=error&message=' . $e->getMessage());
    }
}


/**
 * @return bool
 */
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


/**
 * @param string $path
 */
function redirect_to($path = '/')
{
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: " . HOME_PAGE . $path);
    exit();
}


/**
 * @param string $table
 *
 * @return bool
 */
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


/**
 * @return array|bool
 */
function get_users()
{
    global $db;

    if ( ! is_table_exists()) {
        return false;
    }

    $query = $db->prepare("CALL users()");
    $query->execute();

    return $query->fetchAll();
}


/**
 * @param $id
 *
 * @return bool|mixed
 */
function get_user_by_id($id)
{
    global $db;

    if (empty($id)) {
        return false;
    }

    $query = $db->prepare('CALL user(:id)');
    $query->bindParam('id', $id);
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

if ( ! empty($_GET['user_id'])) {
    $user_info = get_user_by_id($_GET['user_id']);
}

$users = get_users();
