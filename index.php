<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task 1</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <?php include_once( 'functions.php' ); ?>
</head>
<body>
<div class="container">
    <h1>Task #1</h1>
    <?php if ( ! is_table_exists( 'users' ) ): ?>
        <form action="<?php echo HOME_PAGE; ?>">
            <input type="hidden" name="task" value="create">
            <input type="hidden" name="table" value="users">
            <button type="submit" class="btn btn-success">Create user table</button>
        </form>
    <?php else: ?>
        <div class="text-success">Table 'users' exist</div>
    <?php endif; ?>
</div>
</body>
</html>