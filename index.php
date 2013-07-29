<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <!--[if gt IE 8]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <![endif]-->
    <title>HP - Vertica tool</title>
    <link rel="icon" type="image/ico" href="favicon.ico"/>

    <link href="css/layout.css" rel="stylesheet" type="text/css" />
    <link href="css/stylesheets.css" rel="stylesheet" type="text/css" />
    <!--[if lte IE 7]>
        <link href="css/ie.css" rel="stylesheet" type="text/css" />
        <script type='text/javascript' src='js/plugins/other/lte-ie7.js'></script>
    <![endif]-->
    <script type='text/javascript' src='js/plugins/jquery/jquery-1.9.1.min.js'></script>
    <script type='text/javascript' src='js/plugins/jquery/jquery-ui-1.10.1.custom.min.js'></script>
    <script type='text/javascript' src='js/plugins/jquery/jquery-migrate-1.1.1.min.js'></script>
    <script type='text/javascript' src='js/plugins/other/excanvas.js'></script>
    <script type='text/javascript' src='js/plugins/other/jquery.mousewheel.min.js'></script>
    <script type='text/javascript' src='js/plugins.js'></script>
    <script type='text/javascript' src='js/charts.js'></script>
    <script type='text/javascript' src='js/actions.js'></script>
</head>
<body>
    <div id="loader"><img src="img/loader.gif"/></div>
    <div class="wrapper">
        <div class="sidebar">
            <div class="top">
                <a href="index.php" class="logo"></a>
            </div>
            <div class="nContainer">
                <ul class="navigation">
                    <li><a href="index.php" class="blblue">Home</a></li>
                </ul>
                <a class="close">
                    <span class="ico-remove"></span>
                </a>
            </div>
            <div class="widget">
                <div class="datepicker"></div>
            </div>
        </div>
        <div class="body">
            <ul class="navigation">
                <li>
                    <a href="index.php" class="button">
                        <div class="icon">
                            <span class="ico-monitor"></span>
                        </div>
                        <div class="name">Home</div>
                    </a>
                </li>
            </ul>
            <div class="content">
                <div class="page-header">
                    <div class="icon">
                        <span class="ico-layout-7"></span>
                    </div>
                    <h1>Sign In<small>Enter your username and password.</small></h1>
                </div>
                <div class="row-fluid" id="signin_form">
                    <div class="span10">
                        <form id="signin" action="menu.php" method="post" accept-charset="UTF-8">
                            <fieldset>
                                <input type="hidden" name="submitted" id="submitted" value="1" \>

                                <label for="username" >Username:</label>
                                <input type="text" name="username" id="username" maxlength="50" class="text-field"/>
                                <br/>

                                <label for="password" >Password:</label>
                                <input type="password" name="password" id="password" maxlength="50" class="text-field"\>
                                <br/>

                                <div class="submit-button">
                                    <input type="submit" name="submit" value="Create New Report"\>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
