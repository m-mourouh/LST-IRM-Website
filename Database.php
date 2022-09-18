<?php
class Database{
    private $host = "localhost";
    private $username = "root" ;
    private $db_name = "irm" ;
    private $password = "" ;
    private $socket_type = "mysql" ;
    private $instance = Null ;
    private $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    public function __construct(){
        if($this->instance == Null){
            try {
            $db = new PDO(''.$this->socket_type .':host='. $this->host .';dbname='. $this->db_name .'',$this->username,$this->password,$this->options) ;
            $this->instance = $db ;
            }
            catch(PDOException $e){
                die($e->getMessage()) ;
            }
        }
    }
        //Queries
        public function query($sql,$array_data = []){
            $stmt = $this->instance->prepare($sql);
            $stmt->execute($array_data) ;
            $pdo = null ;
            return $stmt ;      
          }
          
    
}

?>