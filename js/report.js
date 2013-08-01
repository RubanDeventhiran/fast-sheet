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
    $('.column_class_' + table + '__' + column).show();
    addColumn(table, column);
  } else {
    $('#columnfunctiondiv_' + table + '__' + column).hide();
    removeColumn(table, column);
    $('.column_class_' + table + '__' + column).hide();
  }
};

function toggle_columnfunction(table, column) {
  var obj = document.getElementById('columnfunction_' + table + '__' + column);
  if (obj.selectedIndex) {
      var func = obj.options[obj.selectedIndex].text;
      addColumnFunction(table, column, func);
      $('#selected_column_' + table + '__' + column).text(func + '(' + column + ')');
  } else {
      removeColumnFunction(table, column);
      $('#selected_column_' + table + '__' + column).text(column);
  }
};

var createWhereClauseId = 0; // to generate unique ids
function createWhereClause(table, column) {
  var elem = '';
  elem += '<div id="whereclause_' + createWhereClauseId + '" class="where-clause">';
  elem += '<div class="where-lhs">';
  elem += '  <input id="whereclauselhs_' + createWhereClauseId + '" type="text" onkeyup="edit_whereclause(' + createWhereClauseId + ')" class="text-field">';
  elem += '</div>';
  elem += '<div class="where-op">';
  elem += '  <select id="whereclauseop_' + createWhereClauseId + '" onchange="edit_whereclause(' + createWhereClauseId + ')">';
  elem += '    <option>=</option>';
  elem += '    <option>&lt;</option>';
  elem += '    <option>&gt;</option>';
  elem += '  </select>';
  elem += '</div>';
  elem += '<div class="where-rhs">';
  elem += '  <input id="whereclauserhs_' + createWhereClauseId + '" type="text" onkeyup="edit_whereclause(' + createWhereClauseId + ')" class="text-field">';
  elem += '</div>';
  elem += '<div class="where-remove">';
  elem += '  <button type="button" onclick="remove_whereclause(' + createWhereClauseId + ')">Remove</button>';
  elem += '</div>';
  elem += '</div>';
  $('#where_clauses').append(elem);
  if (table !== undefined) {
      $('#whereclauselhs_' + createWhereClauseId).val(table + '.' + column);
  }
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

function edit_query(editable) {
    document.getElementById('the_query').readOnly = !editable;
    if (editable) {
        $('#edit_button').hide();
    } else {
        $('#edit_button').show();
    }
};

function put_query_in_form() {
    $('#query_field').val($('#the_query').val());
};

var slideIndex;
var slideNames = ['Tables', 'Columns', 'Where Clauses', 'Misc.', 'CONFIRM'];
// Prepare the slider
function setSliderLinkText() {
    if (slideIndex) {
        $('#slider_left').css('visibility', 'visible');
        $('#left_slider_link').text(slideNames[slideIndex - 1]);
    } else {
        $('#slider_left').css('visibility', 'hidden');
    }
    if (slideIndex != slideNames.length - 1) {
        $('#slider_right').css('visibility', 'visible');
        $('#right_slider_link').text(slideNames[slideIndex + 1]);
        $('#edit_button_container').hide();
    } else {
        $('#slider_right').css('visibility', 'hidden');
        $('#edit_button_container').show();
    }
};

$(document).ready(function() {
    unoSlider = $('#slider').unoSlider({
        auto: false,
    });
    $('#slider_left').click(function() {
        if (slideIndex) {
            slideIndex--;
            unoSlider.goTo(slideIndex + 1);
            setSliderLinkText();
            edit_query(false);
        }
    });
    $('#slider_right').click(function() {
        if (slideIndex != slideNames.length - 1) {
            slideIndex++;
            unoSlider.goTo(slideIndex + 1);
            setSliderLinkText();
        }
    });
    slideIndex = 0;
    setSliderLinkText();
});
