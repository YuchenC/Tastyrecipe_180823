<!DOCTYPE html>
<html>
    <head>
        <title>TastyRecipe18</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="tr18.css"/>
    </head>
    <body>
        <ul>
            <li><a class="active" href="/TastyRecipe/index.php">Home</a></li>
            <li><a href="/TastyRecipe/calendar.html">Calendar</a></li>
            <li class="dropdown">
                <a href="javascript:void(0)" class="dropbtn">Recipes</a>
                <div class="dropcontent">
                    <a href="/TastyRecipe/recipe1.html">1</a>
                    <a href="/TastyRecipe/recipe2.html">2</a>
                </div>            
            </li>
            <li id="login"><a href="/TastyRecipe/tologin.php">Log In</a></li>
            <li id="register"><a href="/TastyRecipe/toregister.php">Register</a></li>
        </ul>
        <h1>Tasty Recipe</h1>
        <?php
        if ($_COOKIE["login"] && $_COOKIE["login"] == "1")
        {
            echo $_COOKIE['nickname'] . ' has logged in.';
        }
        ?>
    </body>
</html>

