<?php

$id_links = [];

?>
<div class="all-users">
    <h2>Get User Info by ID:</h2>
    <?php if ( ! empty( $users ) ) { ?>
        <strong>User ids: </strong>
        <?php foreach ( $users as $user ) {
            if ( ! empty( $_GET['user_id'] ) && $user->id === $_GET['user_id'] ) {
                $id_links[] = '<span class="text-secondary">' . $user->id . '</span>';
            } else {
                $id_links[] = '<a href="' . HOME_PAGE . '?user_id=' . $user->id . '">' . $user->id . '</a>';
            }
        }
        echo implode( ', ', $id_links );
        ?>
    <?php } else { ?>
        <p>Users empty.</p>
    <?php } ?>
</div>
<br>
<?php if ( ! empty( $user_info ) && is_object( $user_info ) ): ?>
    <strong>User Info:</strong>
    <div class="user-info">
        <?php foreach ( $user_info as $key => $info ): ?>
            <div class="user-info-item"><strong><?php echo $key; ?>:</strong> <em><?php echo $info; ?></em></div>
        <?php endforeach; ?>
    </div>
    <div><a href="<?php echo HOME_PAGE; ?>">Reset</a></div>
<?php endif; ?>
