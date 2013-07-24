<?php
/*
 * Choose columns.
 */
?>

<h2>Select columns:</h2>

<?php
foreach ($tables as $table)
{
?>
  <div class="table_class_<?php echo $table ?>">
    <h4>Table <?php echo $table ?></h4>
    <?php
    foreach ($columns[$table] as $column)
    {
    ?>
      <input type="checkbox" id="col_<?php echo $column ?>"> <?php echo $column ?>
      <br/>
    <?php
    }
    ?>
  </div>
<?php
}
?>
