<?php
/*
 * Choose tables.
 */
?>

<h2>Select tables:</h2>

<?php
foreach ($tables as $table)
{
?>
  <script type="text/javascript">
    function toggle_table_<?php echo $table ?>() {
      alert("done!");
    }
  </script>
  <input type="checkbox" id="table_<?php echo $table ?>" onclick="toggle_table_<?php echo $table ?>()"> <?php echo $table ?>
  <br/>
<?php
}
?>
