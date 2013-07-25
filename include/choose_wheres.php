<?php
/*
 * Choose where clauses.
 *
 * Next to each column is an optional selection to create a where clause
 * restricting that column. An additional selection allows a restriction
 * between any two columns/values.
 */
?>

<h2>Select where clauses:</h2>

<script type="text/javascript">
var createWhereClauseId = 0; // to generate unique ids
function createWhereClause(table, column) {
  var elem = '';
  elem += '<li id="whereclause_' + createWhereClauseId + '">';
  elem += '<input id="whereclauselhs_' + createWhereClauseId + '" type="text" onkeyup="edit_whereclause(' + createWhereClauseId + ')">';
  elem += '<select id="whereclauseop_' + createWhereClauseId + '" onchange="edit_whereclause(' + createWhereClauseId + ')">';
  elem += '  <option>=</option>';
  elem += '  <option>&lt;</option>';
  elem += '  <option>&gt;</option>';
  elem += '</select>';
  elem += '<input id="whereclauserhs_' + createWhereClauseId + '" type="text" onkeyup="edit_whereclause(' + createWhereClauseId + ')">';
  elem += '<button type="button" onclick="remove_whereclause(' + createWhereClauseId + ')">Remove</button>';
  $('#where_clauses').append(elem);
  edit_whereclause(createWhereClauseId);
  createWhereClauseId++;
};

function remove_whereclause(id) {
  $('#whereclause_' + id).hide();
  removeWhereClause(id);
};

function edit_whereclause(id) {
  // TODO validation
  var lhs = document.getElementById('whereclauselhs_' + id);
  var op = document.getElementById('whereclauseop_' + id);
  var rhs = document.getElementById('whereclauserhs_' + id);
  editWhereClause(id, lhs.value, op.options[op.selectedIndex].text, rhs.value);
};
</script>

<?php
foreach ($tables as $table)
{
?>
  <div class="table_class_<?= $table ?>">
  <h4>Table <?= $table ?></h4>
<?php
  foreach ($columns[$table] as $column)
  {
?>
      <?= $column ?><button type="button" onclick="createWhereClause('<?= $table ?>', '<?= $column ?>')">+</button>
      <br/>
<?php
  }
?>
  </div>
<?php
}
?>

<!-- List of where clauses -->
<div id="where_clauses"><ul></ul></div>
