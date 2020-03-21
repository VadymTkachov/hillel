<?php

/**
 * Main file
 */

include_once( 'functions.php' );
include_once( TEMPLATE_DIR . 'header.php' );

$users     = get_users();
$user_info = isset( $_GET['user_id'] ) ? get_user_by_id( $_GET['user_id'] ) : '';

?>
<div class="container">
    <div class="system-messages">
        <?php if ( ! empty( $_GET['message'] ) && 'success' === $_GET['status'] ): ?>
            <p class="bg-success text-white"><?php echo $_GET['message']; ?></p>
        <?php elseif ( ! empty( $_GET['message'] ) ): ?>
            <p class="bg-danger text-white"><?php echo $_GET['message']; ?></p>
        <?php endif; ?>
    </div>
    <h1>Task #1</h1>
    <?php if ( ! is_table_exists( 'users' ) ): ?>
        <?php include_once( TEMPLATE_DIR . 'blocks/create-table.php' ); ?>
    <?php else: ?>
        <div class="text-success">Table 'users' exist</div>
        <hr>
        <?php include_once( TEMPLATE_DIR . 'blocks/new-user.php' ); ?>
        <br>
        <hr>
        <br>
        <?php include_once( TEMPLATE_DIR . 'blocks/users-info.php' ); ?>
        <hr>
        <br>
        <?php include_once( TEMPLATE_DIR . 'blocks/delete-users.php' ); ?>
    <?php endif; ?>
</div>
<?php include_once( TEMPLATE_DIR . 'footer.php' ); ?>
