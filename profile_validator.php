<?php

class Validator {

    private $errors = [];
  
    public function clean_data($data){
    $data = trim($data) ;
    $data = htmlspecialchars($data) ;
    $data = stripcslashes($data) ;
    return $data ;
}
    public function validateNom($nom){
      $val = $this->clean_data($nom);
      if(empty($val)){
        $this->addError('nom', 'Nom est obligatoire');
      } else {
        if(!preg_match('/^[a-zA-Z]{1,}$/', $val)){
          $this->addError('nom','Nom ne doit  contenir que des lettres');
        }
        if(strlen($val) < 3){
          $this->addError('nom','Nom doit  contenir au moins 3 lettres');
        } 
        if(strlen($val) > 20){
          $this->addError('nom','Pom doit contenir au maximum 20 lettres');
        } 
      }
  
    }
    public function validatePrenom($prenom){
      $val = $this->clean_data($prenom);
      if(empty($val)){
        $this->addError('prenom', 'Prenom est obligatoire');
      } 
      else {
        if(!preg_match('/^[a-zA-Z]{1,}$/', $val)){
          $this->addError('prenom','Prenom ne doit  contenir que des lettres');
        }
        if(strlen($val) < 3){
          $this->addError('prenom','Prenom doit  contenir au moins 3 lettres');
        } 
        if(strlen($val) > 20){
          $this->addError('prenom','Prenom doit contenir au maximum 20 lettres');
        } 
      }
  
    }

    public function validateEmail($email){
      $val = $this->clean_data($email);
  
      if(empty($val)){
        $this->addError('email', 'Email est obligatoire');
      } else {
        if(!filter_var($val, FILTER_VALIDATE_EMAIL)){
          $this->addError('email', 'Email entré est invalide');
        }
      }
       //check the user has already signed up

       $sql = "SELECT email FROM student WHERE email = ?";
       $database = new Database ;
       $stmt = $database->query($sql,array($val));
       if($stmt->rowCount() == 1){
         $this->addError('email','Cet email a déjà été enregistrée');
       }
  
    }
    public function validateDateNaissance($dateNaissance) {
        $val = $this->clean_data($dateNaissance);
      if(empty($val)){
        $this->addError('dateNaissance', 'Date de Naissance est obligatoire');
      } 
    }
    public function validatePassword($pass,$pass2){
        $val1 = $this->clean_data($pass);
        $val2 = $this->clean_data($pass2);
          if(strlen($val1) == 0){
            $this->addError('pass', 'Veuillez enter votre mot de passe actuel');
          } 
          if(strlen($val1) > 0){
            $sql = "SELECT pass FROM user WHERE id = ?";
            $database = new Database ;
            $stmt = $database->query($sql,array($_SESSION['userID']));
            $row = $stmt->fetch() ;
            $actuel_pass = $row['pass'] ;
            if(!password_verify($val1,$actuel_pass)){
              $this->addError('pass','mot de passe erroné!');
            }
            else{
                
                if(strlen($val2) == 0){
                  $this->addError('pass2', 'Enter votre mot de passe');
                } 
                else{
                if(!preg_match("#[a-z]+#", $val2 )) {
                $this->addError("pass2","Mot de passe doit contenir au moins 1 lettre miniscule!");
                }
                if( !preg_match("#[A-Z]+#", $val2 )) {
                  $this->addError("pass2","Mot de passe doit contenir au moins 1 lettre majuscule!");
                  }
                  if(!preg_match("#[0-9]+#", $val2 ) ) {
                  $this->addError('pass2',"Mot de passe doit contenir au mois 1 chifre!");
                  }
                  if(!preg_match("#\W+#", $val2 )) {
                    $this->addError("pass2","Mot de passe doit contenir au moins 1 charactére spécial!");
                    }
                  if(strlen($val2 ) < 8 && strlen($val2 ) > 0) {
                    $this->addError("pass2","Mot de passe doit contenir au mois 8 charactérs!");
                    }
                  }
            }
          } 
    }
    public function getError(){
        return $this->errors ;
    }
    private function addError($key, $val){
      $this->errors[$key] = $val;
    }
  
}