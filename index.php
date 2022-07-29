<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div>
    <h4>Sign Up</h4>
    <div class="index-signup">
        <form action="includes/signup.inc.php" method="post">
        <label>User ID</label>
        <input name="uid" placeholder="userid" type="text" required/><br>
        <label>Password</label>
        <input name="pwd" placeholder="password" type="password" required /><br>
        <label>Password Repeat</label>
        <input type="password" name="pwdrepeat" placeholder="Password" required/><br>
        <label for="email">Email</label>
        <input type="email" name="email" placeholder="larry@gmail.com"  /><br>
        <button type="submit" name="submit">Sign Up</button>
        </form>
    </div>
<h4>Login</h4>
    <div class="index-login">
        <form action="includes/login.inc.php" method="post">
    	<label>User ID</label>
        <input type="text" name="uid" placeholder="user id" /> <br>
        <label>Password</label>
        <input type="password" name="pwd" placeholder="password"  /><br>
        <button type="submit" name="submit">Login</button><br><br>
        </form>
    </div>

    <div>
    <ul>
        <?php
            if(isset($_SESSION["userid"]))
            {
        ?>
        <li><h2><?php echo $_SESSION["useruid"]; ?> you're logged in</h2></li>
        <li><a href="includes/logout.inc.php">Logout</a></li>
        <?php
        } 
        else 
        { 
        ?>
        <li><a href="#">Sign Up</a></li>
        <li><a href="#">Login</a></li>
        <?php 
        } 
        ?>
        </ul>
    </div>
</div>
</body>
</html>


