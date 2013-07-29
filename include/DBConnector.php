<?php
# Turn on error reporting
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

# A simple function to execute prepared statement and trap errors 
function errortrap_odbc($conn, $statement, $values) {
    if(!$rs = odbc_execute($statement, $values)) {
        echo "<br/>" . odbc_errormsg($conn);
    }
    return $rs;
}

$columns = array(array());
//this returns a one-dimensional array of table names and reads all related columns (name, type) into memory
function getTables($schema = 'public', $dsn = "VerticaDSNunixodbc", $username = "dbadmin", $password = "r-d1b97dbc"){
	global $columns;
	$conn = odbc_connect($dsn,$username,$password) or die ("<br/>CONNECTION ERROR");	
	echo "<p>Connected with DSN: $dsn</p>";
	
	$params = array($schema);
	$sql = odbc_prepare($conn,'SELECT table_name FROM tables where table_schema = ?');
	
	$tableList = array();
	if(errortrap_odbc($conn,$sql, $params)){
		while($row = odbc_fetch_array($sql) ) {
    		array_push($tableList, $row['table_name']);
    	}
    }
	
    $sql = odbc_prepare($conn,"SELECT table_name, column_name, data_type FROM columns where table_schema = ?");
	if(errortrap_odbc($conn,$sql, $params)){
		while($row = odbc_fetch_array($sql) ) {
    		array_push($columns, $row);
    	}
    }
	
    # Close the ODBC connection
	odbc_close($conn);
    return $tableList;
}

//this function returns an array of column names for a specific table among those that have recently been retrieved from DB
function getColumns($table_name){
	global $columns;
	$column_names = array();
	foreach($columns as $column){
		if($column['table_name'] == $table_name){
			array_push($column_names, $column['column_name']);
		}
	}
	return $column_names;	
}

function getColumnType($table_name,$column_name){
	global $columns;
	foreach($columns as $column){
		if($column['table_name'] == $table_name and $column['column_name'] == $column_name){
			return $column["data_type"]; 
		}
	}
}

function runQuery($query,$filename, $dsn = "VerticaDSNunixodbc", $username = "dbadmin", $password = "r-d1b97dbc"){

	$conn = odbc_connect($dsn,$username,$password) or die ("<br/>CONNECTION ERROR");
	if(!$rs = odbc_exec($conn,$query)) {
        echo "<br/>Failed to execute SQL: $sql<br/>" . odbc_errormsg($conn);
   	return false;
    }
    else{
    	$file = fopen($filename, "w");
    	if(!$file){
    		print_r(error_get_last());
    		return false;
    	}
    	//write the field names
    	$hearders = array();
    	for($i=1;$i<=odbc_num_fields($rs);$i++){
    		array_push($hearders,odbc_field_name($rs,$i));
    	}
    	fputcsv($file,$hearders);
    	while($row = odbc_fetch_array($rs)){
    		fputcsv($file, $row);
    	}
    	fclose($file);
        //send the file to client
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename='.basename($filename));  
        header('Content-Length: ' . filesize($filename));
        ob_clean();
        flush();  
        readfile($filename);
    }
    # Close the ODBC connection
    odbc_close($conn);	    
    return true;
}

$tables = getTables();
/*
//test the functions
echo "<br/>";
for($i=0;$i < count($tables);$i++){
	echo $tables[$i];
	$column_names = getColumns($tables[$i]);
	echo "( ";
	for($j=0;$j < count($column_names);$j++){
		echo $column_names[$j]. "[". getColumnType($tables[$i], $column_names[$j]). "], " ;
	}
	echo ") <br/>";
}
runQuery("select * from Test", "data/test.csv");
*/

?>
