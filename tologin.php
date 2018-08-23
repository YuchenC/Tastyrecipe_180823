<?php
$mysqli = mysqli_connect('localhost', 'tastyrecipe', 'tr1221', 'tastyrecipe');
mysqli_autocommit($mysqli, true);
mysqli_query($mysqli, "SET NAMES 'utf8mb4'");

if (isset ($_POST['email']))
{
    $sql = "SELECT * FROM `registration` WHERE email=";
    $sql .= "'" . $_POST['email'] . "'";
    $result = mysqli_query($mysqli, $sql);
    $row = mysqli_fetch_assoc($result);
    
    echo $sql;
    
    if (password_verify($_POST['password'], $row['password']))
    {
        setcookie("login", "1");
        setcookie("nickname", $row['nickname']);
        setcookie("email", $row['email']);
        header("Location: index.php");
        exit;
    }
    else
    {
        echo "wrong email or password";
        //exit;
    }    
}

mysqli_close($mysqli);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="tologin.php" method="post">
            Email: <input type="email" name="email"><br>
            Password: <input type="password" name="password"><br>
            <input type="submit" value="log in">
        </form>
    </body>
</html>
