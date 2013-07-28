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

<html dir="ltr" lang="en-us">
  <head>
    <title>Vertica AMI Demo</title>
    <link rel="stylesheet" type="text/css" href="css/layout.css" />
    <link rel="stylesheet" type="text/css" href="css/unoSlider.css" />
    <script type="text/javascript" src="js/jquery-1.6.4.min.js"></script>
    <script type="text/javascript" src="js/unoSlider.js"></script>
    <script type="text/javascript" src="js/the_query.js"></script>
    <script type="text/javascript" src="js/report.js"></script>
  </head>
  <body>
    <!--BEGIN EVERYTHING -->
    <div class="everything" id="everything">
      <!-- BEGIN TOP MARGIN -->
      <div class="top_margin" id="top_margin"> </div>
      <!-- END TOP MARGIN -->
      <!-- BEGIN CONTENT  WITH HEADER, BODY AND FOOTER, EXTENDS 1000 PX WIDE AND CENTERED -->
      <div id="content">
        <!-- BEGIN HEADER -->
        <div id="header"><?php require_once "include/header.php" ?></div>
        <!-- END HEADER -->
        <!-- BEGIN BODY -->
        <div class="body" id="body">
        <!--BEGIN BANNER AREA PLACEHOLDER -->
          <?php require_once "include/initialize.php" ?>
          <div id="controls">
            <!--BEGIN CAROUSEL CONTROLS -->
            <div id="slider_left">
              <div id="left_slider_arrow"> </div>
              <div class="slider_link home_link"><a id="left_slider_link" href="#"></a></div>
            </div>
            <div id="slider_right">
              <div class="slider_link home_link"><a id="right_slider_link" href="#"></a></div>
              <div id="right_slider_arrow"> </div>
            </div>
            <!-- END CAROUSEL CONTROLS -->
          </div>
          <div id="query_container">
            <textarea readonly id="the_query"></textarea>
          </div>
          <div id="slider">
            <ul>
              <li><div id="choose_tables"><?php require_once "include/choose_tables.php" ?></div></li>
              <li><div id="choose_columns"><?php require_once "include/choose_columns.php" ?></div></li>
              <li><div id="choose_wheres"><?php require_once "include/choose_wheres.php" ?></div></li>
              <li><div id="choose_specials"><?php require_once "include/choose_specials.php" ?></div></li>
            </ul>
          </div>
        <!-- END BANNER AREA PLACEHOLDER -->
        </div>
        <!-- END BODY -->
        <!-- FOOTER BEGIN -->
        <div class="footer" id="footer"><?php require_once "include/footer.php" ?></div>
        <!-- END FOOTER -->
      </div>
      <!--END CONTENT WRAPPER--><!-- BEGIN BOTTOM MARGIN -->
      <div id="bottom_margin">
      </div>
      <!-- END BOTTOM MARGIN -->
    </div>
    <!-- END EVERYTHING -->
  </body>
</html>
