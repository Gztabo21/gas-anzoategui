<?php

class Conexion{
    private $host ="localhost";
    private $username = "GUS";
    private $password = "124578";
    private $db ="gas_anzoategui";
    private $conect;


    function __construct() {
        $connectionString = "mysql:host=".$this->host.";dbname=".$this->db;
        try{
            $this->conect = new PDO($connectionString,$this->username,$this->password);
            $this->conect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e) {
            $this->conect ="ERROR DE CONEXION";
            echo "Connection failed: " . $e->getMessage();
          }
      }

    function connect(){
        return $this->conect;
    }
    // respaldar la base de datos
    function respaldo(){
        //Script Variables
        $compression = false;
        $BACKUP_PATH = "../ddbb/";
        $nowtimename = time();
        $nameFile = "";
    
        //create/open files
        if ($compression) {
            $zp = gzopen($BACKUP_PATH . 'gas_anzoategui'.date('M-d-Y').'.sql.gz', "a9");
            $nameFile = 'gas_anzoategui'.date('M-d-Y').  '.sql.gz';
        } else {
            $handle = fopen($BACKUP_PATH .'gas_anzoategui'.date('M-d-Y'). '.sql', 'a+');
            $nameFile = 'gas_anzoategui'.date('M-d-Y').'.sql';
        }
    
        //array of all database field types which just take numbers
        $numtypes = array('tinyint', 'smallint', 'mediumint', 'int', 'bigint', 'float', 'double', 'decimal', 'real');
    
        //get all of the tables
        if (empty($tables)) {
            $pstm1 = $this->conect->query('SHOW TABLES');
            while ($row = $pstm1->fetch(PDO::FETCH_NUM)) {
                $tables[] = $row[0];
            }
        } else {
            $tables = is_array($tables) ? $tables : explode(',', $tables);
        }
    
        //cycle through the table(s)
    
        foreach ($tables as $table) {
            $result = $this->conect->query("SELECT * FROM $table");
            $num_fields = $result->columnCount();
            $num_rows = $result->rowCount();
    
            $return = "";
            //uncomment below if you want 'DROP TABLE IF EXISTS' displayed
            //$return.= 'DROP TABLE IF EXISTS `'.$table.'`;';
    
            //table structure
            $pstm2 = $this->conect->query("SHOW CREATE TABLE $table");
            $row2 = $pstm2->fetch(PDO::FETCH_NUM);
            $ifnotexists = str_replace('CREATE TABLE', 'CREATE TABLE IF NOT EXISTS', $row2[1]);
            $return .= "\n\n" . $ifnotexists . ";\n\n";
    
            if ($compression) {
                gzwrite($zp, $return);
            } else {
                fwrite($handle, $return);
            }
            $return = "";
    
            //insert values
            if ($num_rows) {
                $return = 'INSERT INTO `' . $table . '` (';
                $pstm3 = $this->conect->query("SHOW COLUMNS FROM $table");
                $count = 0;
                $type = array();
    
                while ($rows = $pstm3->fetch(PDO::FETCH_NUM)) {
                    if (stripos($rows[1], '(')) {
                        $type[$table][] = stristr($rows[1], '(', true);
                    } else {
                        $type[$table][] = $rows[1];
                    }
    
                    $return .= "`" . $rows[0] . "`";
                    $count++;
                    if ($count < ($pstm3->rowCount())) {
                        $return .= ", ";
                    }
                }
    
                $return .= ")" . ' VALUES';
    
                if ($compression) {
                    gzwrite($zp, $return);
                } else {
                    fwrite($handle, $return);
                }
                $return = "";
            }
            $count = 0;
            while ($row = $result->fetch(PDO::FETCH_NUM)) {
                $return = "\n\t(";
    
                for ($j = 0; $j < $num_fields; $j++) {
    
                    //$row[$j] = preg_replace("\n","\\n",$row[$j]);
    
                    if (isset($row[$j])) {
    
                        //if number, take away "". else leave as string
                        if ((in_array($type[$table][$j], $numtypes)) && (!empty($row[$j]))) {
                            $return .= $row[$j];
                        } else {
                            $return .= $this->conect->quote($row[$j]);
                        }
                    } else {
                        $return .= 'NULL';
                    }
                    if ($j < ($num_fields - 1)) {
                        $return .= ',';
                    }
                }
                $count++;
                if ($count < ($result->rowCount())) {
                    $return .= "),";
                } else {
                    $return .= ");";
                }
                if ($compression) {
                    gzwrite($zp, $return);
                } else {
                    fwrite($handle, $return);
                }
                $return = "";
            }
            $return = "\n\n-- ------------------------------------------------ \n\n";
            if ($compression) {
                gzwrite($zp, $return);
            } else {
                fwrite($handle, $return);
            }
            $return = "";
        }
    
        $error1 = $pstm2->errorInfo();
        $error2 = $pstm3->errorInfo();
        $error3 = $result->errorInfo();
        echo $error1[2];
        echo $error2[2];
        echo $error3[2];
    
        if ($compression) {
            gzclose($zp);
        } else {
            fclose($handle);
        }
        return $nameFile;
    }
}
?> 