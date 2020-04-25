<?php

/**
 * Main file
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once('functions.php');
include_once(TEMPLATE_DIR . 'header.php');

?>
<div class="container">
    <div class="system-messages">
        <?php if ( ! empty($_GET['message']) && 'success' === $_GET['status']): ?>
            <p class="bg-success text-white"><?php echo $_GET['message']; ?></p>
        <?php elseif ( ! empty($_GET['message'])): ?>
            <p class="bg-danger text-white"><?php echo $_GET['message']; ?></p>
        <?php endif; ?>
    </div>
    <h1>Task #1</h1>
    <?php if ( ! is_table_exists('users')): ?>
        <?php include_once(TEMPLATE_DIR . 'blocks/create-table.php'); ?>
    <?php else: ?>
        <hr>
        <?php include_once(TEMPLATE_DIR . 'blocks/new-user.php'); ?>
        <br>
        <hr>
        <br>
        <?php include_once(TEMPLATE_DIR . 'blocks/users-info.php'); ?>
        <hr>
        <br>
        <?php include_once(TEMPLATE_DIR . 'blocks/delete-users.php'); ?>
        <br>
        <br>
    <?php endif; ?>
</div>
<?php include_once(TEMPLATE_DIR . 'footer.php'); ?>
<?php unset($_GET['message']); ?>
