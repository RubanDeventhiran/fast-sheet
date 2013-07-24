<?php ?>

<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="css/layout.css" />
    <style type="text/css"></style>

    <script type="text/javascript" src="js/jquery-1.6.4.min.js"></script>
  </head>

  <body>
    <div id="container">
      <div id="navigation"><?php require_once "include/navigation.php" ?></div>
      <div id="content">
        <form id="signin" action="menu.php" method="post" accept-charset="UTF-8">
          <fieldset>
            <legend>Sign in</legend>
            <input type="hidden" name="submitted" id="submitted" value="1" \>

            <label for="username" >Username:</label>
            <input type="text" name="username" id="username" maxlength="50" />

            <label for="password" >Password:</label>
            <input type="password" name="password" id="password" maxlength="50" \>

            <input type="submit" name="submit" value="submit" \>
          </fieldset>
        </form>
      </div>
    </div>
  </body>
</html>
