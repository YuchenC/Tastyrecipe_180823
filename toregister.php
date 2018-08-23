<?php
$mysqli = mysqli_connect('localhost', 'tastyrecipe', 'tr1221', 'tastyrecipe'); // host, user, password, database
mysqli_autocommit($mysqli, true);
mysqli_query($mysqli, "SET NAMES 'utf8mb4'");

if (isset ($_POST['email']))
{
    if ($_POST['password'] == $_POST['password2'])
    {
        $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);   
        $sql = "INSERT INTO `registration`(`email`, `nickname`, `password`) ";
        $sql .= "VALUES (\"{$_POST['email']}\", \"{$_POST['nickname']}\", \"$hash\") ";
        // \"空格{$_POST['email']}空格\" 两个空格都绝对绝对不可以存在，两个\"之间就是存在数据库的内容，在这里空格就说明数据库里也要存入空格
        $result = mysqli_query($mysqli, $sql);
        
        if ($result)
        {
            header("Location: tologin.php");
            exit;
        }
    }
    else
    {
        echo 'password & password2 do not match';
        // exit; 如果加上这行，表格就会消失，整个页面只剩下上面那句显示两次输入密码不匹配的提醒
    }    
}
mysqli_close($mysqli);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registration</title>
    </head>
    <body>
        <form action='toregister.php' method="post">
            Email: <input type="email" name="email"><br>
            Nickname: <input type="text" name="nickname"><br>
            Password: <input type="password" name="password"><br>
            Confirm password: <input type="password" name="password2"><br>
            <input type="submit" value="register">
        </form>
    </body>
</html>
