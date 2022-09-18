<?php 
    require_once("add.php") ;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidater</title>
    <link rel="stylesheet" href="./styles/signup.css">
    <link rel="stylesheet" href="./styles/bar.css">
    <link rel="stylesheet" href="./styles/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"/>
    <link rel="shortcut icon" href="./images/fav.png" type="image/x-icon">

</head>
<body>
    <?php include 'bar.php' ?>
    <div class="container">
    <div class="left-column">
        <img src="./images/signup.svg" alt="Login">
    </div>
    <div class="right-column">
        <form action="<?php echo $_SERVER["PHP_SELF"]?>"  method="POST" class="signUpForm" autocomplete="off" >
            <h1>Candidature</h1>
            <span>
                <input type="text" id="prenom" name="prenom" class="prenom" placeholder="Prenom" value="<?php echo $_POST['prenom'] ?? '' ?>">
                <label for="prenom" class="border"><i class="fas fa-user"></i></label>
                <small><?php echo $errors['prenom'] ?? ''  ?></small>
            </span>
             <span>
                <input type="text" id="nom" name="nom" class="nom" placeholder="Nom" value="<?php echo $_POST['nom'] ?? ''?>" >
               
                <label for="nom"><i class="fas fa-user"></i></label>
                <small><?php echo $errors['nom'] ?? '' ?></small>
            </span>
            <span>
                <input type="text" id="R" name="cne" class="cne" placeholder="Numéro d'étudiant" value="<?php 
                 echo $_POST['cne'] ?? '' ?>">
                    
                <label for="R" ><i class="fas fa-id-card"></i></label>
                <small><?php echo $errors['cne'] ?? '' ?></small>
           </span>
            <span>
                <input type="text" id="email"  name="email" placeholder="Email" value="<?php 
                 echo $_POST['email'] ?? '' ?>" >
                <label for="email"><i class="fas fa-envelope"></i></label>
                <small><?php echo $errors['email'] ?? '' ?></small>
            </span>
            <span>
                <input type="text" id="birth" placeholder="Date de Naissance MM/DD/YYYY"  name="dateNaissance" value="<?php echo $_POST['dateNaissance'] ?? '' ?>" >
                <label for="birth"><i class="fas fa-calendar-alt"></i></label>
                <small><?php echo $errors['dateNaissance'] ?? '' ?></small>
            </span>
            <span class="gender">
                <input type="radio" name="sexe" value="homme" checked id="h" <?php 
                if(isset($_POST['sexe']) && $_POST['sexe'] == 'homme'){
                    echo "checked" ;
                } ?>>
                <input type="radio" name="sexe" value="femme" id="f" <?php 
                if(isset($_POST['sexe']) && $_POST['sexe'] == 'femme'){
                    echo "checked";
                } ?>>
        
                Sexe :
                <label for="h">  Homme : <samp class="S1"></samp> |</label>
                <label for="f">Femme : <samp class="S2"></samp></label>
                <small><?php echo $errors['sexe'] ?? '' ?></small>
            </span>
            <span>
                <input type="password" id="password-1" name="pass" placeholder='Mot de passe' value="<?php echo $_POST['pass'] ?? '' ?>">
                <label for="password-1"><i class="fas fa-lock"></i></label>
                <small><?php echo $errors['pass'] ?? '' ?></small>
            </span>
           <span>
                <input type="password" id="password-2" name="pass2" placeholder="Confirmer le mot de passe" value="<?php echo $_POST['pass2'] ?? '' ?>">
                <label for="password-2"><i class="fas fa-lock"></i></label>
                <small><?php echo $errors['pass2'] ?? '' ?></small>
            </span>
           
            <button class="btn" type="submit" name="submit">S'inscrire</button>
            <p>Vous avez déjà un compte? <a href="login.php">connexion</a></p>
        </form>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" ></script>
<script src="./javascript/signup.js"></script>
</body>
<?php include 'footer.php' ?>
</html>