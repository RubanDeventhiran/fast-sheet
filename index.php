<?php ?>

<html dir="ltr" lang="en-us">
  <head>
    <title>Vertica AMI Demo</title>
    <link rel="stylesheet" type="text/css" href="css/layout.css" />
    <script type="text/javascript" src="js/jquery-1.6.4.min.js"></script>
  </head>
  <body>
    <div id="everything">
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
          <form id="signin" action="menu.php" method="post" accept-charset="UTF-8">
            <fieldset>
              <legend>Sign in</legend>
              <input type="hidden" name="submitted" id="submitted" value="1" \>
  
              <label for="username" >Username:</label>
              <input type="text" name="username" id="username" maxlength="50" />
              <br/>
  
              <label for="password" >Password:</label>
              <input type="password" name="password" id="password" maxlength="50" \>
                <br/>

              <input type="submit" name="submit" value="Create New Report" \>
            </fieldset>
          </form>
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
