<?php
/*
 * Choose columns.
 *
 * A dropdown list next to each column contains all optional functions.
 */
?>

<div class="report_section_title">Select columns</div>
<div class="report_section_description">Click on the columns from which you wish to view data.</div>

<div class="tables_list_section">
<?php
foreach ($tables as $table)
{
?>
  <div class="columns_list_section table_class_<?= $table ?>">
  <h4>Table <?= $table ?></h4>
<?php
foreach ($columns[$table] as $column)
{
?>
    <input type="checkbox" class="choose_column_option" id="column_<?= $table ?>__<?= $column ?>" onclick="toggle_column('<?= $table ?>', '<?= $column ?>')"> <?= $column ?>

    <span id="columnfunctiondiv_<?= $table ?>__<?= $column ?>">
      <select id="columnfunction_<?= $table ?>__<?= $column ?>" onchange="toggle_columnfunction('<?= $table ?>', '<?= $column ?>')">
        <option>Optional function...</option>
        <option>sum</option>
        <option>avg</option>
      </select>
    </span>

    <br/>
<?php
}
?>
  </div>
<?php
}
?>
</div>
