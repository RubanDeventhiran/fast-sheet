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
 *       lhs
 *       op
 *       rhs
 *     where 2
 *     where 3
 *     ...
 *   order by (array of order bys)
 *     column 1
 *     column 2
 *     column 3
 *     ...
 *   order by order by types (array of asc/descs)
 *     type 1
 *     type 2
 *     type 3
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
    if (the_query.wheres) {
        var where_clauses = new Array();
        for (var where in the_query.wheres) {
            if (the_query.wheres[where]) {
                var lhs = the_query.wheres[where].lhs;
                var op = the_query.wheres[where].op;
                var rhs = the_query.wheres[where].rhs;
                if (getTableName(lhs) && !tablePresent(getTableName(lhs))) {
                    continue;
                }
                if (getTableName(rhs) && !tablePresent(getTableName(rhs))) {
                    continue;
                }
                where_clauses.push(lhs + ' ' + op + ' ' + rhs);
            }
        }
        if (where_clauses.length) {
            elem += ' WHERE';
            elem += ' ' + where_clauses.join(' AND ');
        }
    }

    /* Add order by and limit clauses */
    if (the_query.order_bys) {
        var order_by_clauses = new Array();
        for (var i = 0; i < the_query.order_bys.length; i++) {
            // Do not use unpresent tables
            if (!tablePresent(getTableName(the_query.order_bys[i]))) {
                continue;
            }
            var order_by = the_query.order_bys[i];
            if (the_query.order_by_types[i]) {
                order_by += ' ' + the_query.order_by_types[i];
            }
            order_by_clauses.push(order_by);
        }
        if (order_by_clauses.length) {
            elem += ' ORDER BY';
            elem += ' ' + order_by_clauses.join();
        }
    }
    if (the_query.limit) {
        elem += ' LIMIT ' + the_query.limit;
    }

    /* Edit the Query panel */
    elem += ';';
    $('#the_query').html(elem);
}

var the_query = new Array();

/* Convenience function to get table from table.column */
function getTableName(fullColumn) {
    var index = fullColumn.indexOf('.');
    if (index == -1) {
        return undefined;
    } else {
        return fullColumn.substring(0, fullColumn.indexOf('.'));
    }
}

function tablePresent(table) {
    return the_query.tables
        && the_query.tables[table]
        && the_query.tables[table].present;
}

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

    if (the_query.wheres[id] == undefined) {
        the_query.wheres[id] = new Array();
    }

    the_query.wheres[id].lhs = lhs;
    the_query.wheres[id].op = op;
    the_query.wheres[id].rhs = rhs;

    updateQuery();
};

function removeWhereClause(id) {
    if (the_query.wheres != undefined) {
        delete the_query.wheres[id];
    }

    updateQuery();
};

function editColumnSort(table, column, type) {
    if (the_query.order_bys == undefined) {
        the_query.order_bys = new Array();
        the_query.order_by_types = new Array();
    }

    /* Case for whether the column is already listed. */
    var index = the_query.order_bys.indexOf(table + '.' + column);
    if (index != -1) {
        the_query.order_by_types[index] = type;
    } else {
        the_query.order_bys.push(table + '.' + column);
        the_query.order_by_types.push(type);
    }

    updateQuery();
};

function removeColumnSort(table, column) {
    if (the_query.order_bys) {
        var index = the_query.order_bys.indexOf(table + '.' + column);
        if (index != -1) {
            the_query.order_bys.splice(index, 1);
            the_query.order_by_types.splice(index, 1);
        }
    }

    updateQuery();
};

function editLimit(limit) {
    the_query.limit = limit;

    updateQuery();
}
