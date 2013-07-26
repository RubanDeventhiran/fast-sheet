<?php ?>

<?php
/* 
 * Thao:
 * Using the variables $_POST["username"] and $_POST["password"],
 * store the tables (array) into $tables and table columns (map from tables to
 * arrays) into $columns.
 */
$tables = array($_POST["username"] . "1", $_POST["username"] . "2");
$columns = array($tables[0] => array("col1", "col2"), $tables[1] => array("vertica", "hp"));
?>

<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="css/layout.css" />
    <link rel="stylesheet" type="text/css" href="css/unoSlider.css" />
    <style type="text/css"></style>

    <script type="text/javascript" src="js/jquery-1.6.4.min.js"></script>
    <script type="text/javascript" src="js/unoSlider.js"></script>
    <script type="text/javascript" src="js/the_query.js"></script>
  </head>

  <body>
    <div id="container">
      <div id="navigation"><?php require_once "include/navigation.php" ?></div>
      <div id="content">
        <textarea rows="5" cols="80" id="the_query"></textarea>
        <?php require_once "include/initialize.php" ?>
        <div id="buttons">
          <button id="slider_left">left</button>
          <button id="slider_right">right</button>
        </div>
        <div id="slider">
          <ul>
            <li><div id="choose_tables"><?php require_once "include/choose_tables.php" ?></div></li>
            <li><div id="choose_columns"><?php require_once "include/choose_columns.php" ?></div></li>
            <li><div id="choose_wheres"><?php require_once "include/choose_wheres.php" ?></div></li>
            <li><div id="choose_specials"><?php require_once "include/choose_specials.php" ?></div></li>
          </ul>
        </div>
      </div>
    </div>
  </body>
</html>
