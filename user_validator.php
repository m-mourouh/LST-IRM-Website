<?php

class UserValidator {

    private $data;
    private $errors = [];
    private static $fields = ['prenom','nom','cne','email','dateNaissance','sexe','pass','pass2'];
  
    public function __construct($post_data){
      $this->data = $post_data;
    }
    public function getData(){
      return $this->data;
    }
    public function validateForm(){
      foreach(self::$fields as $field){
        if(!array_key_exists($field, $this->data)){
          trigger_error("'$field' is not present in the data");
          return;
        }
      }
  
      $this->validateCne();
      $this->validatePrenom();
      $this->validateNom() ;
      $this->validateEmail();
      $this->validateDateNaissance();
      $this->validateSexe() ;
      $this->validatePassword() ;
      return $this->errors;
  
    }
  private  function clean_data($data){
    $data = trim($data) ;
    $data = htmlspecialchars($data) ;
    $data = stripcslashes($data) ;
    return $data ;
}
    private function validateNom(){
      $val = $this->clean_data($this->data['nom']);
      if(empty($val)){
        $this->addError('nom', 'Nom est obligatoire');
      } else {
        if(!preg_match('/^[a-zA-Z]{1,}$/', $val)){
          $this->addError('nom','Nom ne doit  contenir que des lettres');
        }
        if(strlen($val) < 3){
          $this->addError('nom','Nom doit  contenir au moins 3 lettres');
        } 
        if(strlen($val) > 15){
          $this->addError('nom','Pom doit contenir au maximum 15 lettres');
        } 
      }
  
    }
    private function validatePrenom(){
      $val = $this->clean_data($this->data['prenom']);
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
        if(strlen($val) > 15){
          $this->addError('prenom','Prenom doit contenir au maximum 15 lettres');
        } 
      }
  
    }

    private function validateCne(){
        $val = $this->clean_data($this->data['cne']);
        if(empty($val)){
          $this->addError('cne', 'CNE est obligatoire');
        } else {
          if(!preg_match('/^[a-zA-Z0-9]{10,10}$/', $val)){
            $this->addError('cne','Format Cne invalide ,ex : R123456789');
          }
          if(strlen($val) < 10){
            $this->addError('cne','CNE doit contenir 10 charactéres');
          }

          //check the user has already signed up

          $sql = "SELECT cne FROM student WHERE cne = ?";
          $database = new Database ;
          $stmt = $database->query($sql,array($val));
          if($stmt->rowCount() > 0){
            $this->addError('cne','Ce cne a déjà été enregistrée');
          }
        }
    
      }
    private function validateEmail(){
      $val = $this->clean_data($this->data['email']);
  
      if(empty($val)){
        $this->addError('email', 'Email est obligatoire');
      } else {
        if(!filter_var($val, FILTER_VALIDATE_EMAIL)){
          $this->addError('email', 'Email entré est invalide');
        }
      }
       //check the user has already signed up

       $sql = "SELECT email FROM user WHERE email = ?";
       $database = new Database ;
       $stmt = $database->query($sql,array($val));
       if($stmt->rowCount() > 0){
         $this->addError('email','Cet email a déjà été enregistrée');
       }
  
    }
    private function validateDateNaissance() {
        $val = $this->clean_data($this->data['dateNaissance']);
      if(empty($val)){
        $this->addError('dateNaissance', 'Date de Naissance est obligatoire');
      } 
    }
    private function validatePassword(){
        $val1 = $this->clean_data($this->data['pass']);
        $val2 = $this->clean_data($this->data['pass2']);
          if(strlen($val1) == 0){
            $this->addError('pass', 'Enter votre mot de passe');
          } else{
            if(strlen($val1 ) < 8 && strlen($val1 ) > 0) {
              $this->addError("pass","Mot de passe doit contenir au mois 8 charactérs!");
              }
              else{
                  switch($val1){
                    case !preg_match("#[a-z]+#", $val1 ) :
                      $this->addError("pass","Mot de passe doit contenir au moins 1 lettre miniscule!");
                      break;
                      case !preg_match("#[A-Z]+#", $val1 ) :
                        $this->addError("pass","Mot de passe doit contenir au moins 1 lettre majuscule!");
                        break ;
                        case !preg_match("#[0-9]+#", $val1 ) :
                          $this->addError('pass',"Mot de passe doit contenir au mois 1 chifre!");
                          break;
                          case !preg_match("#\W+#", $val1 ) :
                            $this->addError("pass","Mot de passe doit contenir au moins 1 charactére spécial!");
                            break;
                  }
               
              }
              
          }
          if(strlen($val2) == 0){
            $this->addError('pass2', 'Veuillez comfirmer votre mot de passe');
          }
          else {
            if($val2 != $val1){
            $this->addError('pass2','Les deux mots de passes ne sont pas identiques') ;   
            }
          }
    }
    private function validateSexe(){
        $val = $this->clean_data($this->data['sexe']) ;
        if(empty($val)){
            $this->addError('sexe', 'Veuillez selectionner votre sexe');
          } 
    }
    private function addError($key, $val){
      $this->errors[$key] = $val;
    }
  
}