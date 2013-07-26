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
    <link rel="stylesheet" type="text/css" href="css/hp.css" />
    <link rel="stylesheet" type="text/css" href="css/unoSlider.css" />
    <script type="text/javascript" src="js/jquery-1.6.4.min.js"></script>
    <script type="text/javascript" src="js/unoSlider.js"></script>
    <script type="text/javascript" src="js/the_query.js"></script>
  </head>
  <body>
    <!--BEGIN EVERYTHING -->
    <div class="everything" id="everything">
      <!-- BEGIN TOP BUY -->
      <div class="top_buyhp" id="top_buyhp"> </div>
      <!-- END TOP BUY -->
      <!-- BEGIN CONTENT  WITH HEADER, BODY AND FOOTER, EXTENDS 1000 PX WIDE AND CENTERED -->
      <div id="content">
        <!-- BEGIN HEADER -->
        <div class="header" id="header">
          <!--  BEGIN TWO COLUMN STRUCTURE-->
          <div class="hf_row2_10_90">
            <!-- BEGIN HP LOGO -->
            <div class="fst10 hplogo">
              <a class="logo png link_metrics" href="#" shape="rect" tabindex="1"></a>
            </div>
            <!-- END HP LOGO--><!-- BEGIN TWO ROW STRUCTURE -->
            <div class="lst90">
              <!-- BEGIN WIDGET MENU -->
              <div class="hf_clf">
                <div class="hf_float_max" id="widget_menu">
                  <input class="cornerIcon" />
                </div>
              </div>
              <!-- END WIDGET MENU --><!-- BEGIN MAIN NAV MENU -->
              <div class="hf_clf">
                <ul class="main_nav hf_wht hf_f120" id="js_main_nav">
                  <li class="header_titles hf_float_min">
                    <a class="hf_cnt0_35_0_10 hf_dsb hf_wht " href="index.php" shape="rect" tabindex="2">Home<br clear="none" /></a>
                  </li>
                  <li class="header_titles hf_float_min">
                    <a class="hf_cnt0_35_0_10 hf_dsb hf_wht " href="#" shape="rect" tabindex="2">About<br clear="none" /></a>
                  </li>
                </ul>
              </div>
              <!-- END MAIN NAV  MENU -->
            </div>
            <!-- END TWO ROW STRUCTURE -->
          </div>
          <!-- END TWO COLUMN STRUCTURE -->
        </div>
        <!-- END HEADER -->
        <!-- BEGIN BODY -->
        <div class="body" id="body">
          <div class="mboxDefault">
            <div class="holder">
              <div class="body_left png"> </div>
              <div class="max" id="page">
                <!--BEGIN BANNER AREA PLACEHOLDER -->
                <div id="promo_area">
        <textarea readonly rows="5" cols="80" id="the_query"></textarea>
        <?php require_once "include/initialize.php" ?>
        <div id="slider">
          <ul>
            <li><div id="choose_tables"><?php require_once "include/choose_tables.php" ?></div></li>
            <li><div id="choose_columns"><?php require_once "include/choose_columns.php" ?></div></li>
            <li><div id="choose_wheres"><?php require_once "include/choose_wheres.php" ?></div></li>
            <li><div id="choose_specials"><?php require_once "include/choose_specials.php" ?></div></li>
          </ul>
        </div>
                </div>
                <!-- END BANNER AREA PLACEHOLDER --><!--BEGING CONTROLS-->
                <div id="controls">
                  <!--BEGIN CAROUSEL CONTROLS -->
                  <div id="slider_left" style="float: left;">
                    <img src="images/left-arrow.png">Previous
                  </div>
                  <div id="slider_right" style="float: right;">
                    Next<img src="images/right-arrow.png">
                  </div>
                  <!-- END CAROUSEL CONTROLS -->
                </div>
                <!--END CONTROLS -->
              </div>
            </div>
          </div>
          <!-- END ALL SEGMENT BANNERS -->
        </div>
        <!-- END BODY --><!-- BEGIN SUBFOOTER -->
        <div class="subfooter" id="subfooter">
          <!-- -->
        </div>
        <!-- END SUBFOOTER --><!-- FOOTER BEGIN -->
        <div class="footer" id="footer">
          <div class="hf_row2_30_70">
            <div class="fst30">
              <div class="js_cselector selector hf_wht hf_clf">
                <div class="col cselector_trigger">HP Vertica</div>
              </div>
            </div>
            <div class="lst70">
              <div class="footer_menu">
                <!-- START FIRST LINK ROW -->
                <div class="ftr_menu_row">
                  <ul class="ftr_menu_list">
                    <li class="footer_menu_item"><a class="ftr_link link_metrics" href="#" shape="rect" tabindex="904">Amazon Web Services</a><span class="pipe">|</span></li>
                    <li class="footer_menu_item"><a class="ftr_link link_metrics" href="#" shape="rect" tabindex="904">About Vertica AMI Demo</a><span class="pipe">|</span></li>
                    <li class="footer_menu_item"><a class="ftr_link link_metrics" href="#" shape="rect" tabindex="904">Vertica Intern Program</a>
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
      <!--END CONTENT WRAPPER--><!-- BEGIN SEO BIRDSEED -->
      <div class="seo_birdseed">
      </div>
      <!-- END SEO BIRDSEED -->
    </div>
    <!-- END EVERYTHING -->
  </body>
</html>
