<?php

session_start();

global $pdo;

$pdo = pdo_init();

// Display Errors
ini_set( 'display_errors', 1 );
ini_set( 'display_startup_errors', 1 );
error_reporting( E_ALL );

// Defines
define( 'SQL_DIR', __DIR__ . '/sql/' );
define( 'TEMPLATE_DIR', __DIR__ . '/template/' );
define( 'SQL_PREFIX', 'hl_' );
define( 'HOME_PAGE', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );

// PDO Init @pdo = obj
function pdo_init() {

    global $pdo;

    if ( ! empty( $pdo ) ) {
        return $pdo;
    }

    // PDO Settings
    $host    = "localhost";
    $dp_name = "shop_db";
    $user    = "root";
    $pass    = "root";
    $dsn     = "mysql:host=$host;dbname=$dp_name";
    $opt     = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    ];

    try {
        $pdo = new PDO( $dsn, $user, $pass, $opt );
    } catch ( PDOException $e ) {
        echo '<pre>Code: ' . print_r( $e->getCode() . '; Message: ' . $e->getMessage(), true ) . '</pre>';
        echo '<pre>File: ' . print_r( $e->getFile() . '; In line: ' . $e->getLine(), true ) . '</pre>';
    }

    return $pdo;
}


// Make task
if ( isset( $_GET['task'] ) && ! empty( $_GET['task'] ) ) {


    switch ( $_GET['task'] ) {
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
function table_create() {
    global $pdo;

    if ( empty( $_GET['table'] ) ) {
        redirect_to();
    }

    try {
        $table = $_GET['table'];

        if ( ! is_table_exists( $table ) && file_exists( SQL_DIR . "create-{$table}.sql" ) ) {
            $prepare = $pdo->prepare( file_get_contents( SQL_DIR . "create-{$table}.sql" ) );
            $prepare->execute();

            redirect_to( '?status=success&message=Table "' . $table . '" exist.' );
        }
    } catch ( PDOException $e ) {
        redirect_to( '?status=error&message=Table was not created.' );
    }
}


// Add user
function user_add() {
    global $pdo;

    if ( empty( $_GET['user'] ) || ! is_array( $_GET['user'] ) ) {
        redirect_to();
    }

    $query   = 'INSERT INTO ' . SQL_PREFIX . 'users ';
    $columns = [];
    $values  = [];

    foreach ( $_GET['user'] as $key => $field ) {
        array_push( $columns, $key );
        array_push( $values, $field );
    }

    try {
        $query   = $query . ' (' . implode( ',', $columns ) . ') VALUES ("' . implode( '","', $values ) . '");';
        $prepare = $pdo->prepare( $query );
        $results = $prepare->execute();

        redirect_to( '?status=success&message=User was added.' );
    } catch ( PDOException $e ) {
        redirect_to( '?status=error&message=Error adding user' );
    }
}


// Delete user
function users_delete() {
    global $pdo;

    if ( empty( $_GET['user_ids'] ) ) {
        return false;
    }

    try {
        $user_ids = implode( ', ', $_GET['user_ids'] );
        $query    = "DELETE FROM " . SQL_PREFIX . "users WHERE id IN ({$user_ids})";
        $query    = $pdo->prepare( $query );
        $query->execute();

        redirect_to( '?status=success&message=Users Has been deleted' );
    } catch ( PDOException $e ) {
        redirect_to( '?status=error&message=Users was not deleted!' );
    }
}


// Redirect to @path = string
function redirect_to( $path = '/' ) {
    header( "HTTP/1.1 301 Moved Permanently" );
    header( "Location: " . HOME_PAGE . $path );
    exit();
}


// Check table exists
function is_table_exists( $table = 'users' ) {

    global $pdo;

    $table = SQL_PREFIX . $table;

    try {
        $result = $pdo->query( "SELECT 1 FROM $table LIMIT 1" );

        return true;

    } catch ( Exception $e ) {

        return false;
    }
}

// Get Users
function get_users() {

    global $pdo;

    if ( ! is_table_exists() ) {
        return false;
    }

    $query = $pdo->prepare( "SELECT * FROM " . SQL_PREFIX . "users" );
    $query->execute();

    return $query->fetchAll();
}

// Get User by ID
function get_user_by_id( $id ) {
    global $pdo;

    if ( empty( $id ) ) {
        return false;
    }

    $query = $pdo->prepare( "SELECT * FROM " . SQL_PREFIX . "users WHERE id={$id}" );
    $query->execute();

    return $query->fetchObject();
}

// Cleaner system message
if ( ! empty( $_GET['message'] ) && empty( $_SESSION['message'] ) ) {
    $_SESSION['message'] = 1;
} elseif ( ! empty( $_GET['message'] ) ) {
    $_SESSION['message'] = 0;
    redirect_to();
}
