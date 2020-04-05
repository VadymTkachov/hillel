<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration of Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/css/bootstrap.min.css" integrity="2hfp1SzUoho7/TsGGGDaFdsuuDL0LX2hnUp6VkX3CUQ2K4K+xjboZdsXyp4oUHZj" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/js/bootstrap.min.js" integrity="VjEeINv9OSwtWFLAtmc4JCtEJXXBub00gtSnszmspDLCtC0I4z4nqz7rEFbIZLLU" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    [message]
    <h1>Form Registration</h1>
    <form action="">
        <div class="form-group">
            <input type="text" name="user[username]" class="form-control" placeholder='Username: *' value="[USERNAME]" required>
        </div>
        <div class="form-group">
            <input type="password" name="user[password]" class="form-control" placeholder="Password: *" value="[PASSWORD]" required>
        </div>
        <div class="form-group input-group">
            <span class="input-group-addon" id="sizing-addon1">@</span>
            <input type="email" name="user[email]" class="form-control" placeholder="you@example.com *" aria-describedby="sizing-addon1" value="[EMAIL]" required>
        </div>
        <div class="form-group">
            <textarea name="user[userinfo]" class="form-control" id="form-control" rows="10" placeholder="User Info:">[USERINFO]</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

</body>
</html>