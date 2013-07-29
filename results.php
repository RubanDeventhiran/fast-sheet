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
                    <h1>Data<small>In Tabular form</small></h1>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="block">
                            <div class="head blue">
                                <div class="icon"><i class="ico-layout-9"></i></div>
                                <h2>Records</h2>
                                <ul class="buttons">
                                    <li><a href="#" onClick="source('table_sort'); return false;"><div class="icon"><span class="ico-info"></span></div></a></li>
                                </ul>
                            </div>
                                <div class="data-fluid">
<?php
$dsn = "VerticaDSNunixodbc";
$username = "dbadmin";
$password = "r-d1b97dbc";
$query = $_POST["query_field"];
$conn = odbc_connect($dsn,$username,$password) or die ("<br/>CONNECTION ERROR");
if(!$rs = odbc_exec($conn,$query)) {
    echo "<br/>Failed to execute SQL: $sql<br/>" . odbc_errormsg($conn);
    return false;
}
?>
                                    <table  class="table query results" id="resulttable" cellpadding="0" cellspacing="0" width="100%" >
                                        <thead>
                                            <tr>
<?php for($i=1;$i<=odbc_num_fields($rs);$i++){?>
                                                <th><?= odbc_field_name($rs,$i) ?></th>
<?php }?>
                                            </tr>
                                        </thead>
                                        <tbody id="ReportTable">
<?php while($row = odbc_fetch_array($rs)){?>
                                            <tr>
<?php for($i=1;$i<=odbc_num_fields($rs);$i++){?>
                                    <td><?php print_r ($row[odbc_field_name($rs,$i)]);?></td>
<?php }?>
                                            </tr>
<?php }?></tbody>
                                    </table>
                                </div>
                                <div><a onClick="export_to_excel();" href="#">Export to Excel</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="dialog" id="source" style="display: none;" title="Source"></div>
</body>
<script>
function export_to_excel()
{
    var sql = "<?= $query?>";
    $('body').prepend("<form method='post' action='exporttoexcel.php' style='display:none' id='ReportTableData'><input type='text' name='sql' value='<?php echo $query?>'></form>");
    $('#ReportTableData').submit().remove();
    return false;
}
</script>
</html>
