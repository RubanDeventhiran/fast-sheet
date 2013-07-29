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
    <link href="css/unoSlider.css" rel="stylesheet" type="text/css" />
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
    <script type='text/javascript' src='js/plugins/uniform/jquery.uniform.min.js'></script>
    <script type='text/javascript' src='js/plugins.js'></script>
    <script type='text/javascript' src='js/charts.js'></script>
    <script type='text/javascript' src='js/actions.js'></script>
    <!--
    -->
    <script type='text/javascript' src='js/unoSlider.js'></script>
    <script type='text/javascript' src='js/the_query.js'></script>
    <script type='text/javascript' src='js/report.js'></script>
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
                    <h1>Create Query<small>Submit an SQL Query.</small></h1>
                </div>
                <?php require_once "include/initialize.php" ?>
                <div class="row-fluid">
                    <div id="controls">
                        <div id="slider_left">
                            <div id="left_slider_arrow"> </div>
                            <div class="slider_link home_link"><a id="left_slider_link" href="#"></a></div>
                        </div>
                        <div id="slider_right">
                            <div class="slider_link home_link"><a id="right_slider_link" href="#"></a></div>
                            <div id="right_slider_arrow"> </div>
                        </div>
                    </div>
                    <div id="query_container">
                        <textarea readonly id="the_query"></textarea>
                        <div id="edit_button_container">
                            <button type="button" id="edit_button" onclick="edit_query(true)">Edit Query</button>
                        </div>
                    </div>
                    <div id="slider">
                        <ul>
                            <li><div id="choose_tables"><?php require_once "include/choose_tables.php" ?></div></li>
                            <li><div id="choose_columns"><?php require_once "include/choose_columns.php" ?></div></li>
                            <li><div id="choose_wheres"><?php require_once "include/choose_wheres.php" ?></div></li>
                            <li><div id="choose_specials"><?php require_once "include/choose_specials.php" ?></div></li>
                            <li><div id="confirm_query"><?php require_once "include/confirm_query.php" ?></div></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
