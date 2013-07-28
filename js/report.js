/*
 * Functions for interacting between UI elements and the_query.js.
 * Does not directly change the model maintained in the_query.js.
 */

function toggle_table(table) {
    if ($('#table_' + table).attr('checked')) {
        $('.table_class_' + table).show();
        addTable(table);
    } else {
        $('.table_class_' + table).hide();
        removeTable(table);
    }
};

function toggle_column(table, column) {
  if ($('#column_' + table + '__' + column).attr('checked')) {
    $('#columnfunctiondiv_' + table + '__' + column).show();
    addColumn(table, column);
  } else {
    $('#columnfunctiondiv_' + table + '__' + column).hide();
    removeColumn(table, column);
  }
};

function toggle_columnfunction(table, column) {
  var obj = document.getElementById('columnfunction_' + table + '__' + column);
  if (obj.selectedIndex) {
      addColumnFunction(table, column, obj.options[obj.selectedIndex].text);
  } else {
      removeColumnFunction(table, column);
  }
};

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
  elem += '</li>';
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

function toggle_columnsort(table, column) {
  var obj = document.getElementById('columnsorttype_' + table + '__' + column);
  var type = null;
  if (obj.selectedIndex) {
      type = obj.options[obj.selectedIndex].text;
  }
  if ($('#columnsort_' + table + '__' + column).attr('checked')) {
      $('#columnsortdiv_' + table + '__' + column).show();
      editColumnSort(table, column, type);
  } else {
      $('#columnsortdiv_' + table + '__' + column).hide();
      removeColumnSort(table, column);
  }
};

function edit_limit() {
  var obj = document.getElementById('limit');
  editLimit(obj.value);
};

// Prepare the slider
$(document).ready(function() {
    unoSlider = $('#slider').unoSlider({
        auto: false,
    });
    $('#slider_left').click(function() {
        unoSlider.goBack();
    });
    $('#slider_right').click(function() {
        unoSlider.goForward();
    });
});
