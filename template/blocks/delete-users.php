<form action="<?php echo HOME_PAGE; ?>">
    <h2>Select users for delete:</h2>
    <?php if ( ! empty( $users ) ) { ?>
        <div class="form-group">
            <select name="user_ids[]" class="selectpicker form-control" multiple data-live-search="true">
                <?php foreach ( $users as $user ) { ?>
                    <option value="<?php echo $user->id; ?>"><?php echo $user->id; ?></option>
                <?php } ?>
            </select>
        </div>
        <br>
        <input type="hidden" name="task" value="delete">
        <button type="submit" class="btn btn-danger">Delete</button>
    <?php } else { ?>
        <p>Users empty.</p>
    <?php } ?>
</form>
