/*
 * Schema:
 * the_query
 *   tables (set of tables)
 *     table 1
 *       present (whether this table is selected)
 *       columns (set of columns)
 *         column 1
 *           present (whether this column is selected)
 *           func (optional function)
 *         column 2
 *         column 3
 *         ...
 *     table 2
 *     table 3
 *     ...
 *   wheres (array of where conditions)
 *     where 1
 *     where 2
 *     where 3
 *     ...
 *   order by (array of order bys)
 *     column 1
 *     column 2
 *     column 3
 *     ...
 *   limit (integer)
 *
 * Note: we use the "present" property so that if we remove a table or
 * column but then add it back, the descendant information is all still
 * available.
 */

/*
 * Updates the query, based on the status of the UI elements.
 */
function updateQuery() {
    /* Selected tables and columns */
    var chosen_tables = new Array();
    var chosen_columns = new Array();
    if (the_query.tables != undefined) {
        for (var table in the_query.tables) {
            if (the_query.tables[table].present) {
                chosen_tables.push(table);
                for (var column in the_query.tables[table].columns) {
                    if (the_query.tables[table].columns[column].present) {
                        if (the_query.tables[table].columns[column].func) {
                            chosen_columns.push(the_query.tables[table].columns[column].func + '(' + table + '.' + column + ')');
                        } else {
                            chosen_columns.push(table + '.' + column);
                        }
                    }
                }
            }
        }
    }

    /* Query is empty if no tables are selected. */
    if (chosen_tables.length == 0) {
        $('#the_query').html('');
        return;
    }

    var elem = '';

    /* Select columns */
    elem += 'SELECT';
    if (chosen_columns.length == 0) {
        elem += ' *';
    } else {
        elem += ' ' + chosen_columns.join();
    }

    /* Select tables */
    elem += ' FROM';
    elem += ' ' + chosen_tables.join();

    /* Add where clauses */
    var where_clauses = new Array();
    for (var where in the_query.wheres) {
        if (the_query.wheres[where]) {
            where_clauses.push(the_query.wheres[where]);
        }
    }
    if (where_clauses.length) {
        elem += ' WHERE';
        elem += ' ' + where_clauses.join(' AND ');
    }

    /* Edit the Query panel */
    elem += ';';
    $('#the_query').html(elem);
}

var the_query = new Array();

/*
 * Functions to update the query.
 */
function addTable(table) {
    if (the_query.tables == undefined) {
        the_query.tables = new Array();
    }

    if (the_query.tables[table] == undefined) {
        the_query.tables[table] = new Array();
    }

    the_query.tables[table].present = true;

    updateQuery();
};

function removeTable(table) {
    if (the_query.tables != undefined) {
        if (the_query.tables[table] != undefined) {
            the_query.tables[table].present = false;
        }
    }

    updateQuery();
};

function addColumn(table, column) {
    addTable(table);

    if (the_query.tables[table].columns == undefined) {
        the_query.tables[table].columns = new Array();
    }

    if (the_query.tables[table].columns[column] == undefined) {
        the_query.tables[table].columns[column] = new Array();
    }

    the_query.tables[table].columns[column].present = true;

    updateQuery();
};

function removeColumn(table, column) {
    if (the_query.tables != undefined) {
        if (the_query.tables[table] != undefined) {
            if (the_query.tables[table].columns != undefined) {
                if (the_query.tables[table].columns[column] != undefined) {
                    the_query.tables[table].columns[column].present = false;
                }
            }
        }
    }

    updateQuery();
};

function addColumnFunction(table, column, columnFunction) {
    addColumn(table, column);
    the_query.tables[table].columns[column].func = columnFunction;

    updateQuery();
};

function removeColumnFunction(table, column) {
    if (the_query.tables != undefined) {
        if (the_query.tables[table] != undefined) {
            if (the_query.tables[table].columns != undefined) {
                if (the_query.tables[table].columns[column] != undefined) {
                    delete the_query.tables[table].columns[column].func;
                }
            }
        }
    }

    updateQuery();
};

function editWhereClause(id, lhs, op, rhs)
{
    if (the_query.wheres == undefined) {
       the_query.wheres = new Array();
    }

    the_query.wheres[id] = (lhs + ' ' + op + ' ' + rhs);

    updateQuery();
};

function removeWhereClause(id) {
    if (the_query.wheres != undefined) {
        delete the_query.wheres[id];
    }

    updateQuery();
};
