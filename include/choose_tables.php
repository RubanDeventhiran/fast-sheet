<?php
/*
 * Choose tables.
 *
 * For each table, a checkbox is connected to a Javascript function. Checking
 * the checkbox will show all of the corresponding tables on later pages.
 *
 * Put all tables on later pages inside a
 * <div class="table_class_<?php echo $table ?>">
 */
?>

<h2>Select tables:</h2>

<?php
foreach ($tables as $table)
{
?>
  <style type="text/css">
    .table_class_<?php echo $table ?> {
      display: none;
    }
  </style>

  <script type="text/javascript">
    function toggle_table_<?php echo $table ?>() {
      if ($('#table_<?php echo $table ?>').attr('checked')) {
        $('.table_class_<?php echo $table ?>').show();
      } else {
        $('.table_class_<?php echo $table ?>').hide();
      }
    };
    window.onload = toggle_table_<?php echo $table ?>;
  </script>

  <input type="checkbox" id="table_<?php echo $table ?>" onclick="toggle_table_<?php echo $table ?>()"> <?php echo $table ?>
  <br/>
<?php
}
?>
