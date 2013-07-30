<?php
/*
 * Choose where clauses.
 *
 * Next to each column is an optional selection to create a where clause
 * restricting that column. An additional selection allows a restriction
 * between any two columns/values.
 */
?>

<div class="report_section_title">Select where clauses</div>
<div class="report_section_description">Click on a button to apply a restriction on the data in that column</div>

<span>
<div class="tables_list_section">
<?php
foreach ($tables as $table)
{
?>
  <div class="columns_list_section table_class_<?= $table ?>">
  <h4>Table <?= $table ?></h4>
<?php
foreach (getColumns($table) as $column)
{
?>
    <div class="column_list_item">
        <div class="float">
            <?= $column ?>
        </div>
        <div class="float">
            <button type="button" onclick="createWhereClause('<?= $table ?>', '<?= $column ?>')" class="extra_item">Restrict...</button>
        </div>
    </div>
<?php
}
?>
  </div>
<?php
}
?>
</div>
<div>
    <button type="button" onclick="createWhereClause()" class="extra_item">Arbitrary restriction...</button>
</div>
</span>

<!-- List of where clauses -->
<div id="where_clauses">
</div>
