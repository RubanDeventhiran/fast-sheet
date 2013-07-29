<?php  


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
$query = $_POST['sql'];
runQuery($query, "data/test.csv");
?>
