<form action="<?php echo HOME_PAGE; ?>">
    <h2>Add user:</h2>

    <div class="form-group required">
        <input type="text" name="user[name]" class="form-control" id="name" placeholder="Name:*" required>
    </div>

    <div class="form-group required">
        <input type="text" name="user[surname]" class="form-control" id="surname" placeholder="Surname:*"
               required>
    </div>

    <div class="form-group required">
        <input type="number" name="user[age]" class="form-control" id="age" placeholder="Age:*" required>
    </div>

    <div class="form-group required">
        <input type="email" name="user[email]" class="form-control" placeholder="Email:*" required>
    </div>

    <div class="form-group">
        <input type="phone" name="user[phone]" class="form-control" placeholder="Phone: (Optional)">
    </div>

    <input type="hidden" name="task" value="insert">
    <br>
    <button type="submit" class="btn btn-primary">Add User</button>
</form>
