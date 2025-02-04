<?php
class Database{
	private $con = false;
	private $result = array(); 
    private $conn;

    function __construct($DB_HOST=null,$DB_USER=null,$DB_PASSWORD=null,$DB_NAME=null) {
        if ($DB_HOST){
            $conn = $this->connect($DB_HOST,$DB_USER,$DB_PASSWORD,$DB_NAME);
        }
        else{
            $conn = $this->connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
        }
        if (!$conn) exit();
    }

    public function connect($db_host,$db_user,$db_pass,$db_name){
        if(!$this->con){
            try {
                $myconn = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8;port=3306", $db_user, $db_pass);         
                $myconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $this->con = true;
                $this->conn = $myconn;
                return $myconn;

            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }else{
            return true;
        }   
    }
    
    public function queryAll($tables, $fields = '*', $conds = null) {
        if(! $tb_str = $this->array_to_str($tables)) return FALSE;
        if(! $fld_str =  $this->array_to_str($fields)) $fld_str = '*';
        if($conds) $conds_str = $this->process_conds($conds); else $conds_str ="";
        
        $statement = $this->conn->query(
            "SELECT {$fld_str} FROM {$tb_str} {$conds_str}"
        );
        
        return $statement->fetchAll( PDO::FETCH_ASSOC );
    }

    public function select_query($fields = '*') {        
        $statement = $this->conn->query(
            "SELECT {$fields}"
        );        
        return $statement->fetchAll( PDO::FETCH_ASSOC );
    }
	
    public function pdoquery($select = '*', $bind = null) {
        try {
            $statement = $this->conn->prepare("{$select}");
            $statement->execute($bind);
        }
        catch(Exception $e) {
            echo $e->getMessage();  
            return false;
        }
        return $statement->fetchAll( PDO::FETCH_ASSOC );
    }
    
    public function queryPage($tables = null, $fields = '*', $conds = null, $page = 1, $porlinha = 10) {
        if(! $tb_str = $this->array_to_str($tables)) return FALSE;
        if(! $fld_str =  $this->array_to_str($fields)) $fld_str = '*';        
        if($conds) $conds_str = $this->process_conds($conds); else $conds_str ="";
        $limit_str = "LIMIT ".(($page-1)*$porlinha).", ".$porlinha;

        $statement = $this->conn->query(
            "SELECT {$fld_str} FROM {$tb_str} {$conds_str}"
        );


        $total = $statement->rowCount( PDO::FETCH_ASSOC );

        $statement = $this->conn->query(
            "SELECT {$fld_str} FROM {$tb_str} {$conds_str} {$limit_str}"
        );

        $paginacao = array();
        $total_paginas = ceil($total / $porlinha);
        if ($total_paginas > 1){
            for ($i=1; $i <= $total_paginas; $i++){
                if ($page == $i) $active = 'active'; else $active = $i;
                $paginacao[$i] = $active;
            }
        }

        $retorno = array(
            "paginacao" => $paginacao,
            "retorno" => $statement->fetchAll( PDO::FETCH_ASSOC )
        );
        
        return $retorno;
    }

    public function select_to_array_page($tables = null, $fields = '*', $page = 1, $porlinha = 10, $conds = null, $bind = null) {
        if(! $tb_str = $this->array_to_str($tables)) return FALSE;
        if(! $fld_str =  $this->array_to_str($fields)) $fld_str = '*';
        if($conds) $conds_str = $this->process_conds($conds); else $conds_str ="";
        $limit_str = "LIMIT ".(($page-1)*$porlinha).", ".$porlinha;
        
        $this->conn->beginTransaction();
        try {
            $st_query = $this->conn->prepare("SELECT SQL_CALC_FOUND_ROWS {$fld_str} FROM {$tb_str} {$conds_str} {$limit_str}");

            $st_query->execute($bind);

            $st_total = $this->conn->prepare("SELECT FOUND_ROWS() as total");
            $st_total->execute();
            $total = $st_total->fetch(PDO::FETCH_ASSOC);

            $this->conn->commit();
        }
        catch(Exception $e) {
            $this->conn->rollback();
            echo $e->getMessage();  
            return false;
        }

        $paginacao = array();
        $total_paginas = ceil($total['total'] / $porlinha);
        if ($total_paginas > 1){
            for ($i=1; $i <= $total_paginas; $i++){
                if ($page == $i) $active = 'active'; else $active = $i;
                $paginacao[$i] = $active;
            }
        }

        $retorno = array(
            "paginacao" => $paginacao,
            "retorno" => $st_query->fetchAll( PDO::FETCH_ASSOC )
        );
        return $retorno;
    }

    public function select_to_array($tables, $fields = '*', $conds = null, $bind = null) {
        if(! $tb_str = $this->array_to_str($tables)) return FALSE;
        if(! $fld_str =  $this->array_to_str($fields)) $fld_str = '*';
        if($conds) $conds_str = $this->process_conds($conds); else $conds_str ="";
        
        $this->conn->beginTransaction();
        try {
            $statement = $this->conn->prepare("SELECT {$fld_str} FROM {$tb_str} {$conds_str}");
            $statement->execute($bind);
            $this->conn->commit();
        }
        catch(Exception $e) {
            $this->conn->rollback();
            echo $e->getMessage();  
            return false;
        }
        return $statement->fetchAll( PDO::FETCH_ASSOC );
    }
	
    public function select_single_to_array($tables, $fields = '*', $conds = null, $bind = null) {
        if(! $res = $this->select_to_array($tables,$fields,$conds,$bind)) return FALSE;
        return $res[0];
    }
    
    public function insert($table, $bind, $return_id=TRUE) {
        if(!is_array($bind)) return FALSE;
        foreach( $bind as $k=>$v){
            $fld[]= str_replace(':', '', $k);       
            $val[]= "".$k."";
        }

        $this->conn->beginTransaction();
        try {
            $stmt = $this->conn->prepare(
                "INSERT INTO {$table} (".$this->array_to_str($fld).") VALUES (".$this->array_to_str($val).")"
            );
            $stmt->execute($bind);
            $last_id = $this->conn->lastInsertId();
            $this->conn->commit();
            return $last_id;
        }
        catch(Exception $e) {
            $this->conn->rollback();
            echo $e->getMessage();  
            return false;
        }
    }

    public function update($table, $conds, $bind, $return_id=TRUE) {
        if(!is_array($bind)) return FALSE;
        foreach( $bind as $k=>$v){
            $fld[]= str_replace(':', '', $k)."=".$k;
        }
        $this->conn->beginTransaction();
        try {
            $stmt = $this->conn->prepare(
                "UPDATE {$table} SET ".$this->array_to_str($fld)." {$conds}"
            );
            $stmt->execute($bind);
            $this->conn->commit();
        }
        catch(Exception $e) {
            $this->conn->rollback();
            echo $e->getMessage();  
            return false;
        }
    }

    public function debit($table, $conds, $bind, $return_id=TRUE) {
        if(!is_array($bind)) return FALSE;
        foreach( $bind as $k=>$v){
            $fld[]= str_replace(':', '', $k)."=".str_replace(':', '', $k)."-".$k;
        }
        $this->conn->beginTransaction();
        try {
            $stmt = $this->conn->prepare(
                "UPDATE {$table} SET ".$this->array_to_str($fld)." {$conds}"
            );
            $stmt->execute($bind);
            $this->conn->commit();
        }
        catch(Exception $e) {
            $this->conn->rollback();
            echo $e->getMessage();  
            return false;
        }
    }

    public function credit($table, $conds, $bind, $return_id=TRUE) {
        if(!is_array($bind)) return FALSE;
        foreach( $bind as $k=>$v){
            $fld[]= str_replace(':', '', $k)."=".str_replace(':', '', $k)."+".$k;
        }
 
        $this->conn->beginTransaction();
        try {
            $stmt = $this->conn->prepare(
                "UPDATE {$table} SET ".$this->array_to_str($fld)." {$conds}"
            );
            $stmt->execute($bind);
            $this->conn->commit();
        }
        catch(Exception $e) {
            $this->conn->rollback();
            echo $e->getMessage();  
            return false;
        }
    }

    public function delete($table, $conds, $bind) {

        $this->conn->beginTransaction();
        try {
            $stmt = $this->conn->prepare(
                "DELETE FROM {$table} {$conds}"
            );
            $stmt->execute($bind);
            $this->conn->commit();
			return true;
        }
        catch(Exception $e) {
            $this->conn->rollback();
            echo $e->getMessage();  
            return false;
        }
    }



    public function c_beginTransaction() {
        $this->conn->query("SET TRANSACTION ISOLATION LEVEL READ COMMITTED");
        //$this->conn->query("SET TRANSACTION ISOLATION LEVEL REPEATABLE READ");
        $this->conn->beginTransaction();
    }

    public function c_commit() {
        return $this->conn->commit();
    }

    public function c_rollback() {
        $this->conn->rollback();
    }

    public function c_select_to_array($tables, $fields = '*', $conds = null, $bind = null) {
        if(! $tb_str = $this->array_to_str($tables)) return FALSE;
        if(! $fld_str =  $this->array_to_str($fields)) $fld_str = '*';
        if($conds) $conds_str = $this->process_conds($conds); else $conds_str ="";
        
        try {
            $statement = $this->conn->prepare("SELECT {$fld_str} FROM {$tb_str} {$conds_str}");
            $statement->execute($bind);
        }
        catch(Exception $e) {
            echo $e->getMessage();  
            return false;
        }
        return $statement->fetchAll( PDO::FETCH_ASSOC );
    }

    public function c_select_single_to_array($tables, $fields = '*', $conds = null, $bind = null) {
        if(! $res = $this->c_select_to_array($tables,$fields,$conds,$bind)) return FALSE;
        return $res[0];
    }

    public function c_query($query, $debug = false, $die_on_debug = true, $silent = false, $unbuffered = false,$return_resource=false) {
        $db_retries = 5;
        $db_timeout = 400; //milliseconds
        $db_transaction = array();
        try {
            $dbh = $this->conn;
            $qid = $dbh->query($query);
            if ($dbh->inTransaction() && !$return_resource)
                $db_transaction[] = $query;

        }catch (PDOException $e) {
            if ($dbh->inTransaction()) {
                for ($i = 1; $i <= $db_retries; $i++) {
                    $dbh->rollBack();
                    if ($this->db_is_syntax_error()) {
                        $this->db_log_error($e,$query);
                        return false;
                    }
                    usleep($db_timeout);
                    trigger_error('Transaction failed. Retrying...',E_USER_WARNING);
                    $dbh->beginTransaction();
                    try {
                        foreach ($db_transaction as $i_query) {
                            $dbh->query($i_query);
                        }
                        
                        $qid = $dbh->query($query);
                        break;
                    }
                    catch (PDOException $e) {
                        if ($i < $db_retries)
                            continue;
                        
                        $this->db_log_error($e,$query);
                        return false;
                    }
                }
            }else {
                if ($this->db_is_syntax_error()) {
                    $this->db_log_error($e,$query);
                    return false;
                }                
                for ($i = 1; $i <= $db_retries; $i++) {
                    usleep($db_timeout);
                    trigger_error('Single query failed. Retrying...',E_USER_WARNING);                    
                    try {
                        $qid = $dbh->query($query);
                        break;
                    }
                    catch (PDOException $e) {
                        if ($i < $db_retries)
                            continue;
                    
                        $this->db_log_error($e,$query);
                        return false;
                    }
                }
            }
        }
        
        if ($return_resource)
            return $qid;
        else {
            if ($dbh->lastInsertId() > 0)
                return $dbh->lastInsertId();
            else
                return $qid->rowCount();
        }
    }

    public function c_query_array($query, $key = '', $first_record = false, $unbuffered = false, $val_field = '') {
        $result = $this->c_query($query, false, true, false, $unbuffered, true);
        if (!$result)
            return false;
        
        $amt = $result->rowCount();
        if (!($amt > 0))
            return false;
        
        $return_arr = $result->fetchAll(PDO::FETCH_ASSOC);
        $result->closeCursor();
        
        if (!empty($return_arr))
            return $return_arr;
        else
            return false;
    }
    
    public function c_get_record($table,$id = 0,$f_id=0,$id_required=false,$f_id_field=false,$order_by=false,$order_asc=false,$for_update=false) {
        if ($id_required && !($id > 0))
            return false;
            
        if (!$table)
            return false;
        
        $f_id_field = ($f_id_field) ? $f_id_field : 'f_id';
            
        $sql = "SELECT {$table}.* FROM {$table} WHERE 1 ";
        if ($id > 0) {
            $sql .= " AND  {$table}.id = $id ";
        }
        if ($f_id) {
            $sql .= " AND  {$table}.{$f_id_field} = '$f_id' ";
        }
        if ($order_by) {
            $order_asc = ($order_asc) ? 'ASC' : 'DESC';
            $sql .= " ORDER BY $order_by $order_asc ";
        }
        $sql .= " LIMIT 0,1 ";
        
        if ($for_update)
            $sql .= ' FOR UPDATE';
        
        $result = $this->c_query_array($sql);
        return $result[0];
    }

    public function c_insert($table, $bind, $return_id=TRUE) {
        if(!is_array($bind)) return FALSE;
        foreach( $bind as $k=>$v){
            $fld[]= str_replace(':', '', $k);       
            $val[]= "".$k."";
        }

        $stmt = $this->conn->prepare(
            "INSERT INTO {$table} (".$this->array_to_str($fld).") VALUES (".$this->array_to_str($val).")"
        );
        $stmt->execute($bind);
        $last_id = $this->conn->lastInsertId();
        return $last_id;
    }

    public function c_update($table, $conds, $bind, $return_id=TRUE) {
        if(!is_array($bind)) return FALSE;
        foreach( $bind as $k=>$v){
            $fld[]= str_replace(':', '', $k)."=".$k;
        }

        $stmt = $this->conn->prepare(
            "UPDATE {$table} SET ".$this->array_to_str($fld)." {$conds}"
        );
        $stmt->execute($bind);
    }

    public function c_delete($table, $conds, $bind) {
        $stmt = $this->conn->prepare(
            "DELETE FROM {$table} {$conds}"
        );
        $stmt->execute($bind);
    }

    function db_is_syntax_error() {
        global $dbh;
        
        $errors = array('42S02','42000','42S22');
        $e = $this->conn->errorCode();
        if (!$e)
            return false;
        
        return in_array($e,$errors);
    }

    function db_log_error($e,$query) {
        
        if (DB_DEBUG == true) {
            $output = "Can't execute query";
            $output .= "<pre>".$query."</pre>";
            $output .= "MySQL Error: ".$e->getMessage();
            $output .= "Debug: ";
            $output .= print_r(debug_backtrace (),true);
            $this-trigger_error($output,E_USER_ERROR);
        } else {
            $output = "Database error: ";
            $output .= $e->getMessage();
            $output .= ' '.$query;
            $this-trigger_error($output,E_USER_WARNING);
        }
    }

    private function process_conds($conds=null){
        if(is_array($conds)){
            $WHERE = ($conds[WHERE]?'WHERE '.$this->array_to_str($conds[WHERE]):'');
            $WHERE.= ($WHERE?' ':'').$this->array_to_str($conds);
            $GROUP = ($conds[GROUP]?'GROUP BY '.$this->array_to_str($conds[GROUP]):'');
            $ORDER = ($conds[ORDER]?'ORDER BY '.$this->array_to_str($conds[GROUP]):'');
            $LIMIT = ($conds[LIMIT]?'LIMIT '.$conds[LIMIT]:'');
            $conds_str = "$WHERE $ORDER $GROUP $LIMIT";
        }elseif(is_string($conds)){
            $conds_str = $conds;
        }
        return $conds_str;
    }
    
    private function array_to_str($var, $sep=',') {
        if(is_string($var)){
            return $var;
        }elseif(is_array($var)){
            return implode($sep,$var);
        }else{
            return FALSE;
        }
    }
}

class Model extends Database { }
$db = new Database();

class ModelIbranutro extends Database_ibranutro { }
$db_ibranutro = new Database_ibranutro();