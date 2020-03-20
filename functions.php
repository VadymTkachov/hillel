<?php

ini_set( 'display_errors', 1 );
ini_set( 'display_startup_errors', 1 );
error_reporting( E_ALL );

global $pdo;

define( 'SQL_DIR', __DIR__ . '/sql/' );
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
if ( isset( $_GET['task'] ) && 'create' === $_GET['task'] ) {

    if ( empty( $_GET['table'] ) ) {
        redirect_to();
    }

    $pdo   = pdo_init();
    $table = $_GET['table'];

    if ( ! is_table_exists( $table ) && file_exists( SQL_DIR . "create-{$table}.sql" ) ) {
        $stmt = $pdo->prepare( file_get_contents( SQL_DIR . "create-{$table}.sql" ) );
        $stmt->execute();
    }

    redirect_to();
}


// Redirect to @path = string
function redirect_to( $path = '/' ) {
    header( "HTTP/1.1 301 Moved Permanently" );
    header( "Location: " . HOME_PAGE . $path );
    exit();
}


// Check table exists
function is_table_exists( $table = '' ) {

    if ( empty( $table ) ) {
        return false;
    }

    $pdo   = pdo_init();
    $table = SQL_PREFIX . $table;

    try {
        $result = $pdo->query( "SELECT 1 FROM $table LIMIT 1" );

        return true;

    } catch ( Exception $e ) {

        return false;
    }
}
