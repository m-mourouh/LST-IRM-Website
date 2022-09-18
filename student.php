<?php 
require_once("user.php") ;
class Student extends User {
    private $cne ;
    public function __construct($data){
        $this->cne = $data['cne']  ;
        parent::__construct($data) ;
    }
   
    public function signUp(){
        $database = new Database ;
        $user_query = "INSERT INTO user(prenom,nom,email,dateNaissance,sexe,pass,v_key) VALUES(?,?,?,?,?,?,?);";
        $data = array($this->prenom,$this->nom,$this->email,$this->dateNaissance,$this->sexe,$this->pass,$this->v_key);
        $stmt1 = $database->query($user_query,$data);
        
        if($stmt1){
            //get the userID
            $id_query = "SELECT id FROM user WHERE email = ? LIMIT 1" ;
            $stmt2 = $database->query($id_query,array($this->email));
            if($stmt2){
                $row = $stmt2->fetch() ;
                $id = $row['id'] ;
                
                //insrt into student table
                 $student_query = "INSERT INTO student(cne,userID) VALUES(?,?);";
                 $stmt3 = $database->query($student_query,array($this->cne,$id));

                 if($stmt3){
                    //  echo "Hello";
                    require_once("send.php") ;
                    $subject ="Email Verification" ;
                    $body = " <p>
                    <p style='font-size:1.2rem ;'>Bonjour <span>".$this->getFullName()."</span> !</p>
                    <p>Veuillez cliquer sur le button ci-dessous pour confirmer votre e-mail et terminer le processus d'inscription</p>
                    <p><a style = '
                    font-size: 1.2rem;
                    color: #FFF;
                    background: #6C63FF;
                    text-decoration: none;
                    text-align:center;
                    padding: 8px 15px ;'
                    href='http://localhost:82//LST_IIRM/verify.php?vkey=$this->v_key'>Vérifier mon compte</a></p>
                 </p>" ; 
                    $mail = new Mailer($subject,$body,$this->email);
                    $mail->sendMail();
                    header("Location: success.php");
                 }
            }

           
        }
    } 
}



?>