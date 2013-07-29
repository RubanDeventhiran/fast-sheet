<?php
/*
 * Choose tables.
 *
 * For each table, a checkbox is connected to a Javascript function. Checking
 * the checkbox will show all of the corresponding tables on later pages.
 *
 * Put all tables on later pages inside a
 * <div class="table_class_<?= $table ?>">
 */
?>

<style type="text/css">
<?php
foreach ($tables as $table)
{
?>
    .table_class_<?= $table ?> { display: none; }
<?php
}
?>
</style>

<div class="report_section_title">Select tables</div>
<div class="report_section_description">Click on the tables you wish to view data from.</div>

<div class="tables_list_section">
<?php
foreach ($tables as $table)
{
?>
  <div class="table_list_item">
      <input type="checkbox" id="table_<?= $table ?>" onclick="toggle_table('<?= $table ?>')"> <?= $table ?>
  </div>
<?php
}
?>
</div>
