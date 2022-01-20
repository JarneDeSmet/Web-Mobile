<?php
session_start();

$user = isset($_POST['user']) ? $_POST['user'] : '';
$pass = isset($_POST['pass']) ? $_POST['pass'] : '';

$error = '';
if (isset($_POST['moduleAction']) && $_POST['moduleAction'] == 'login') {
    if ($user === '' || $pass === '') {
        $error = 'Gelieve alle velden in te vullen';
    }
    else {
        // Azerty123
        $valid = password_verify($pass, $2y$10$HOVkU0lRfiqeAtXMyD9VdOtu1dDMPTDuPxCLe7wUfhP0JWRUNgrPS);
            if ($valid) {
                header('location: index.php');
                exit();
            }
        }
}

?>

<html lang="en">
<head>
    <title>Login Page</title>
</head>
<body>
<h3>Login Here</h3>
<p><?php echo $error; ?></p>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <table>
        <tr>
            <td>Username:</td>
            <td><input type="text" id="username" name="user" placeholder="Enter name Here"></td>
        </tr>
        <tr>
            <td>Password:</td>
            <td><input type="password" id="password" name="pass" placeholder="Enter Password Here"></td>
        </tr>

        <tr>
            <td>
                <input type="hidden" name="moduleAction" value="login" />
                <button type="sumbit" name="submit">login</button>
            </td>
            <td><p>Not yet a Member? <a href="./Register.html">Register</a></p></td>
        </tr>
    </table>
</form>
<script src="js/login.js"></script>
</body>
</html>