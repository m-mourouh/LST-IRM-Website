<?php 

class User {
    public static $error = "";
    protected $prenom ;
    protected $nom ;
    protected $email ;
    protected $dateNaissance ;
    protected $sexe ;
    protected $pass;
    protected $logedIn = false ;
    protected $v_key;
    public function __construct($data){
        $this->prenom = $data['prenom'] ;
        $this->nom = $data['nom'] ;
        $this->email = $data['email'] ;
        $this->dateNaissance = $data['dateNaissance'] ;
        $this->sexe = $data['sexe'] ;
        $this->pass = password_hash($data['pass'],PASSWORD_DEFAULT,['cost'=> 12]);
        $this->v_key = md5(rand());
    }

        public static function login($email,$password){

            if(empty($email)){
                self::$error = "Veuillez entrer votre email !" ; 
            }
            else if(empty($password)){
                self::$error = "Veuillez entrer votre mot de passe !" ; 
            }
            else{
                $db = new Database ;
                $sql = "SELECT * FROM user WHERE email = ? ;";
                $stmt = $db->query($sql,array($email));

                if($stmt->rowCount() == 1){
                    $user = $stmt->fetch(PDO::FETCH_ASSOC);
                        if($user['verified'] == 1){
                        if(password_verify($password,$user['pass'])){
                           
                            $_SESSION["userID"] = $user['id'] ;
                            header('Location: profile.php') ;
                            
                        }else{
                            self::$error = "mot de passe incorrect" ;
                        }
                        }
                        else{
                            self::$error = "Votre compte n'est pas vérifié !" ;
                        }
                }
                else {
                        
                        self::$error = "email n'existe pas" ;
                }
            }
          
        }
        public  function clean($data){
            if(!empty($data)){
                $data = trim($data) ;
                $data = htmlspecialchars($data) ;
                $data = stripcslashes($data) ;
                return $data ;
            }
        }
       
    public function logout(){
        $this->logedIn = false ;
    }
    public function getFullName(){
        return "$this->prenom $this->nom";
    }
 
}

?>