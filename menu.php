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
        <div id="header">
          <!--  BEGIN TWO COLUMN STRUCTURE-->
          <div class="col_30_70">
            <!-- BEGIN LOGO -->
            <div class="fst30">
              <a href="index.php"><img class="logo" src="images/logo.jpg"></a>
            </div>
            <!-- END LOGO--><!-- BEGIN TWO ROW STRUCTURE -->
            <div class="lst70">
              <div class="row_30_70">
                <div class="row_fst30"> </div>
                <!-- BEGIN MAIN NAV MENU -->
                <div class="row_lst70">
                  <ul class="main_nav">
                    <li class="header_titles home_link">
                      <a class="header_link " href="index.php">Home<br clear="none" /></a>
                    </li>
                    <li class="header_titles home_link">
                      <a class="header_link " href="#">About<br/>Fast Sheets<br clear="none" /></a>
                    </li>
                  </ul>
                </div>
              </div>
              <!-- END MAIN NAV MENU -->
            </div>
            <!-- END TWO ROW STRUCTURE -->
          </div>
          <!-- END TWO COLUMN STRUCTURE -->
        </div>
        <!-- END HEADER -->
        <!-- BEGIN BODY -->
        <div class="body" id="body">
          <div class="holder">
            <!--BEGIN BANNER AREA PLACEHOLDER -->
            <div id="report">
              <?php require_once "include/initialize.php" ?>
              <div id="controls">
                <!--BEGIN CAROUSEL CONTROLS -->
                <div id="slider_left">
                  <div id="left_slider_arrow"> </div>
                  <div id="left_slider_link" class="slider_link home_link"><a href="#">Previous</a></div>
                </div>
                <div id="slider_right">
                  <div id="right_slider_link" class="slider_link home_link"><a href="#">Next</a></div>
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
            </div>
            <!-- END BANNER AREA PLACEHOLDER -->
          </div>
        </div>
        <!-- END BODY -->
        <!-- FOOTER BEGIN -->
        <div class="footer" id="footer">
          <div class="col_30_70">
            <div class="fst30">
              <div id="information_corner home_link">
                <div class="col"><a href="#">HP Vertica</a></div>
              </div>
            </div>
            <div class="lst70">
              <div class="footer_menu">
                <!-- START FIRST LINK ROW -->
                <div class="ftr_menu_row">
                  <ul class="ftr_menu_list">
                    <li class="ftr_menu_item home_link"><a class="ftr_link" href="#">Amazon Web Services</a><span class="pipe">|</span></li>
                    <li class="ftr_menu_item home_link"><a class="ftr_link" href="#">About Vertica AMI Demo</a><span class="pipe">|</span></li>
                    <li class="ftr_menu_item home_link"><a class="ftr_link" href="#">Vertica Intern Program</a>
                  </ul>
                </div>
                <!-- END FIRST LINK ROW -->
              </div>
            </div>
            <!-- END FOOTER LINK MENU -->
          </div>
        </div>
        <!-- END FOOTER --><!-- END FOOTER -->
      </div>
      <!--END CONTENT WRAPPER--><!-- BEGIN BOTTOM MARGIN -->
      <div id="bottom_margin">
      </div>
      <!-- END BOTTOM MARGIN -->
    </div>
    <!-- END EVERYTHING -->
  </body>
</html>
