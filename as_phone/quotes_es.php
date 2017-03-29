<?php
	header('Content-Type: text/html; charset=utf-8');
	
	$response = array();
	require_once 'as_config.php';
	require_once 'as_dbconn.php';
		
	$database = new As_Dbconn();
	
	$lastread = isset( $_GET['lastid'] ) ? $_GET['lastid'] : "0";
	$lastdate = isset( $_GET['lastdate'] ) ? $_GET['lastdate'] : "2016-03-06";
		
	$as_db_query = "SELECT * FROM as_quote WHERE quote_lang='es' AND quote_date > '$lastdate' ORDER BY quoteid ASC";
	$result = $database->get_results( $as_db_query );
	if ($database->as_num_rows( $as_db_query ) > 0) { 
	    $response["quotes"] = array();
	    foreach( $result as $row ) {
	        $quote = array();
	        $quote["quoteid"] = $row["quoteid"];
	        $quote["audio"] = $row["quote_audio"];
	        $quote["date"] = $row["quote_date"];
	        $quote["title"] = $row["quote_title"];
	        $quote["code"] = $row["quote_code"];
	        $quote["message"] = as_str_text($row["quote_text"]);
	        $quote["bible"] = as_str_text($row["quote_bible"]);
	        $quote["bread"] = as_str_text($row["quote_bread"]);
	
	        array_push($response["quotes"], $quote);
	    }
	    // success
	    $response["success"] = 1;
	    echo json_encode($response);
	} else {
	    $response["success"] = 0;
	    $response["message"] = "No quotes found";
	    echo json_encode($response);
	}

?>
	