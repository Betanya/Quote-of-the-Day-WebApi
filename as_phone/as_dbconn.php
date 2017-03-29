<?php

class As_Dbconn 
{
    private $link;
    public $filter;
        
    public function log_db_errors( $error, $query )
    {
        /*$headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'To: Admin <'.AS_ERROR_RECEIVER.'>' . "\r\n";
        $headers .= 'From: My Site <'.AS_ERROR_SENDER.'>' . "\r\n";
    
        $message = '<p>Error at '.date('Y-m-d H:i:s').':</p>';
        $message .= '<p>Query: '.htmlentities( $query ).'<br />';
        $message .= 'Error: ' . $error;
        $message .= '</p>';
		
		$error_line = date('Y-m-d H:i:s').' | DATABASE ERROR ';
		$error_line .= ' | Query: '.htmlentities( $query ).' ';
		$error_line .= ' | Error: '.$error;
			
		$myfile = fopen("as_error_logs.txt", "a");
		fwrite($myfile, "\n". $error_line);
		fclose($myfile);
	
        //mail( AS_ERROR_RECEIVER, 'Database Error', $message, $headers);

        if( AS_DEBUG )
        {
            echo $message;
        }*/
    }
    
	
	public function __construct()
	{
	    global $connection;
		mb_internal_encoding( 'UTF-8' );
		mb_regex_encoding( 'UTF-8' );
		$this->link = new mysqli( AS_HOST, AS_USER, AS_PASS, AS_DB );
		$this->link->set_charset( "utf8" );
		
        if( $this->link->connect_errno )
        {
            $this->log_db_errors( "Connect failed", $this->link->connect_error );
			echo 'Server error. Please try again sometime. DB';
			exit();
        }
	}
	
	public function __destruct()
	{
		$this->disconnect();
	}
	
    public function filter( $data )
    {
        if( !is_array( $data ) )
        {
            $data = trim( htmlentities( $data ) );
        	$data = $this->link->real_escape_string( $data );
        }
        else
        {
            $data = array_map( array( 'DB', 'filter' ), $data );
        }
    	return $data;
    }
    
    public function db_common( $value = '' )
    {
        if( is_array( $value ) )
        {
            foreach( $value as $v )
            {
                if( preg_match( '/AES_DECRYPT/i', $v ) || preg_match( '/AES_ENCRYPT/i', $v ) || preg_match( '/now()/i', $v ) )
                {
                    return true;
                }
                else
                {
                    return false;
                }
            }
        }
        else
        {
            if( preg_match( '/AES_DECRYPT/i', $value ) || preg_match( '/AES_ENCRYPT/i', $value ) || preg_match( '/now()/i', $value ) )
            {
                return true;
            }
        }
    }
    
    public function query( $query )
    {
        $full_query = $this->link->query( $query );
        if( $this->link->error )
        {
            $this->log_db_errors( $this->link->error, $query );
            $full_query->free();
            return false; 
        }
        else
        {
            $full_query->free();
            return true;
        }
    }
	    
    public function as_table_exists( $name )
    {
        $check = $this->link->query("SELECT * FROM '$name' LIMIT 1");
        if( $check ) 
        {
            return true;
        }
        else
        {
            return false;
        }
    }
        
    public function as_table_exists_create( $table,  $variables = array() ) {
        $check = $this->link->query("SELECT * FROM '$table' LIMIT 1");        
		if( $check ) return true;			
        else {
			if( empty( $variables ) ) {
				return false;
				exit;
			}
			
			$sql = "CREATE TABLE IF NOT EXISTS ". $table;
			$fields = array();
			$values = array();
			foreach( $variables as $field ) {
				$fields[] = $field; 	//$values[] = "'".$value."'";
			}
			$fields = ' (' . implode(', ', $fields) . ')';      
			$sql .= $fields;
			$query = $this->link->query( $sql );
			
			if( $this->link->error ) {
				$this->log_db_errors( $this->link->error, $sql );
				return false;
			}
			else return true;
		}
    }
		
    public function as_num_rows( $query )
    {
        $num_rows = $this->link->query( $query );
        if( $this->link->error )
        {
            $this->log_db_errors( $this->link->error, $query );
            return $this->link->error;
        }
        else
        {
            return $num_rows->num_rows;
        }
    }
    
    public function exists( $table = '', $check_val = '', $params = array() )
    {
        if( empty($table) || empty($check_val) || empty($params) )
        {
            return false;
            exit;
        }
        $check = array();
        foreach( $params as $field => $value )
        {
            
            if( !empty( $field ) && !empty( $value ) )
            {
                if( $this->db_common( $value ) )
                {
                    $check[] = "$field = $value";   
                }
                else
                {
                    $check[] = "$field = '$value'";   
                }
            }

        }
        $check = implode(' AND ', $check);

        $rs_check = "SELECT $check_val FROM ".$table." WHERE $check";
    	$number = $this->as_num_rows( $rs_check );
        if( $number === 0 )
        {
            return false;
        }
        else
        {
            return true;
        }
        exit;
    }
    
    public function get_row( $query )
    {
        $row = $this->link->query( $query );
        if( $this->link->error )
        {
            $this->log_db_errors( $this->link->error, $query );
            return false;
        }
        else
        {
            $r = $row->fetch_row();
            return $r;   
        }
    }
    
    public function get_results( $query )
    {
        $row = null;
        
        $results = $this->link->query( $query );
        if( $this->link->error )
        {
            $this->log_db_errors( $this->link->error, $query );
            return false;
        }
        else
        {
            $row = array();
            while( $r = $results->fetch_assoc() )
            {
                $row[] = $r;
            }
            return $row;   
        }
    }
    
    public function as_insert( $table, $variables = array() )
    {
        //Make sure the array isn't empty
        if( empty( $variables ) )
        {
            return false;
            exit;
        }
        
        $sql = "INSERT INTO ". $table;
        $fields = array();
        $values = array();
        foreach( $variables as $field => $value )
        {
            $fields[] = $field;
            $values[] = "'".$value."'";
        }
        $fields = ' (' . implode(', ', $fields) . ')';
        $values = '('. implode(', ', $values) .')';
        
        $sql .= $fields .' VALUES '. $values;

        $query = $this->link->query( $sql );
        
        if( $this->link->error )
        {
            //return false; 
            $this->log_db_errors( $this->link->error, $sql );
            return false;
        }
        else
        {
            return true;
        }
    }
    
    public function insert_safe( $table, $variables = array() )
    {
        if( empty( $variables ) )
        {
            return false;
            exit;
        }
        
        $sql = "INSERT INTO ". $table;
        $fields = array();
        $values = array();
        foreach( $variables as $field => $value )
        {
            $fields[] = $this->filter( $field );
            $values[] = $value; 
        }
        $fields = ' (' . implode(', ', $fields) . ')';
        $values = '('. implode(', ', $values) .')';
        
        $sql .= $fields .' VALUES '. $values;
        $query = $this->link->query( $sql );
        
        if( $this->link->error )
        {
            $this->log_db_errors( $this->link->error, $sql );
            return false;
        }
        else
        {
            return true;
        }
    }
    
    public function as_update( $table, $variables = array(), $where = array(), $limit = '' )
    {
       
        if( empty( $variables ) )
        {
            return false;
            exit;
        }
        $sql = "UPDATE ". $table ." SET ";
        foreach( $variables as $field => $value )
        {
            
            $updates[] = "`$field` = '$value'";
        }
        $sql .= implode(', ', $updates);
        
        //Add the $where clauses as needed
        if( !empty( $where ) )
        {
            foreach( $where as $field => $value )
            {
                $value = $value;

                $clause[] = "$field = '$value'";
            }
            $sql .= ' WHERE '. implode(' AND ', $clause);   
        }
        
        if( !empty( $limit ) )
        {
            $sql .= ' LIMIT '. $limit;
        }

        $query = $this->link->query( $sql );

        if( $this->link->error )
        {
            $this->log_db_errors( $this->link->error, $sql );
            return false;
        }
        else
        {
            return true;
        }
    }
    
    public function delete( $table, $where = array(), $limit = '' )
    {
        //Delete clauses require a where param, otherwise use "truncate"
        if( empty( $where ) )
        {
            return false;
            exit;
        }
        
        $sql = "DELETE FROM ". $table;
        foreach( $where as $field => $value )
        {
            $value = $value;
            $clause[] = "$field = '$value'";
        }
        $sql .= " WHERE ". implode(' AND ', $clause);
        
        if( !empty( $limit ) )
        {
            $sql .= " LIMIT ". $limit;
        }
            
        $query = $this->link->query( $sql );

        if( $this->link->error )
        {
            //return false; //
            $this->log_db_errors( $this->link->error, $sql );
            return false;
        }
        else
        {
            return true;
        }
    }
    
    public function as_db_lastid()
    {
        return $this->link->insert_id;
    }
    
    public function num_fields( $query )
    {
        $query = $this->link->query( $query );
        $fields = $query->field_count;
        return $fields;
    }
    
    public function list_fields( $query )
    {
        $query = $this->link->query( $query );
        $listed_fields = $query->fetch_fields();
        return $listed_fields;
    }
    
    public function truncate( $tables = array() )
    {
        if( !empty( $tables ) )
        {
            $truncated = 0;
            foreach( $tables as $table )
            {
                $truncate = "TRUNCATE TABLE `".trim($table)."`";
                $this->link->query( $truncate );
                if( !$this->link->error )
                {
                    $truncated++;
                }
            }
            return $truncated;
        }
    }
    
    public function display( $variable, $echo = true )
    {
        $out = '';
        if( !is_array( $variable ) )
        {
            $out .= $variable;
        }
        else
        {
            $out .= '<pre>';
            $out .= print_r( $variable, TRUE );
            $out .= '</pre>';
        }
        if( $echo === true )
        {
            echo $out;
        }
        else
        {
            return $out;
        }
    }
    
    public function disconnect()
    {
		$this->link->close();
	}

}