<?php 
 session_start() ;
 
$id = $_SESSION['userID'] ;
 require_once("Database.php");
 require_once('profile_validator.php') ;

$validator = new Validator ;
$errors = [];
# form validation
if(isset($_POST['edit-email'])){
    // if errors is empty --> save data to db
    $validator->validateEmail($_POST['email']);
    $errors = $validator->getError();
    if(empty($errors['email'])){
        $email  = $validator->clean_data($_POST['email']);
        $sql = "UPDATE user SET email = ? WHERE id = ?";
        $database = new Database ;
        $stmt = $database->query($sql,array($email,$id));
    }
}
if(isset($_POST['edit-nom'])){
    // if errors is empty --> save data to db
    $validator->validateNom($_POST['nom']);
    $errors = $validator->getError();
    if(empty($errors['nom'])){
        $nom  = $validator->clean_data($_POST['nom']);
        $sql = "UPDATE user SET nom = ? WHERE id = ?";
        $database = new Database ;
        $stmt = $database->query($sql,array($nom,$id));
    }
}
if(isset($_POST['edit-prenom'])){
    // if errors is empty --> save data to db
    $validator->validatePrenom($_POST['prenom']);
    $errors = $validator->getError();
    if(empty($errors['prenom'])){
        $prenom  = $validator->clean_data($_POST['prenom']);
        $sql = "UPDATE user SET prenom = ? WHERE id = ?";
        $database = new Database ;
        $stmt = $database->query($sql,array($prenom,$id));
    }
}
if(isset($_POST['edit-birth'])){
    // if errors is empty --> save data to db
    $validator->validateDateNaissance($_POST['dateNaissance']);
    $errors = $validator->getError();
    if(empty($errors['dateNaissance'])){
        $dateNaissance  = $validator->clean_data($_POST['dateNaissance']);
        $sql = "UPDATE user SET dateNaissance = ? WHERE id = ?";
        $database = new Database ;
        $stmt = $database->query($sql,array($dateNaissance,$id));
    }
}
if(isset($_POST['edit-pass'])){
    // if errors is empty --> save data to db
    $validator->validatePassword($_POST['pass'],$_POST['pass2']);
    $errors = $validator->getError();
    if(empty($errors['pass']) && empty($errors['pass2'])){
        $newPass  = password_hash($validator->clean_data($_POST['pass2']),PASSWORD_DEFAULT,['cost'=>12]);
        $sql = "UPDATE user SET pass = ? WHERE id = $id";
        $database = new Database ;
        $stmt = $database->query($sql,array($newPass,$id));
    }
}
if(isset($_POST['delete-account'])){
        $database = new Database ;  
        $query = "SELECT cne FROM student WHERE userID = ?" ;
        $stmt = $database->query($query,array($id)) ;
        if($stmt){
            $student = $stmt->fetch();
            $cne = $student['cne'] ;

            $sql1 = "DELETE FROM student WHERE cne = ?";
            $stmt1 = $database->query($sql1,array($cne));
   
            $sql2 = "DELETE FROM user WHERE id = ?";
            $stmt2 = $database->query($sql2,array($id));

            if($stmt1 && $stmt2){
                header('Location: index.php');
            }
        }

}
$userInfos = array('prenom'=>'','nom'=>'','email'=>'','cne'=>'','dateNaissance'=>'','sexe'=>'') ;
 
$db = new Database ;
$sql = 'SELECT * FROM user WHERE id = ? ' ;
$stmt = $db->query($sql,array($id)) ;
if($stmt->rowCount() == 1){
   while($row = $stmt->fetch()){
       $userInfos['prenom'] = $row['prenom'] ;
       $userInfos['nom'] = $row['nom'] ;
       $userInfos['email'] = $row['email'] ;
       $userInfos['dateNaissance'] = $row['dateNaissance'] ;
       $userInfos['sexe'] = $row['sexe'] ;
   }
}

$query = "SELECT cne FROM student WHERE userID = ?" ;
$stmt = $db->query($query,array($id)) ;
if($stmt){
    $student = $stmt->fetch();
    $cne = $student['cne'] ;
    $userInfos['cne'] = $cne ;
}
else{
   echo 'statement failed' ;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link rel="stylesheet" href="./styles/profile.css">
    <link rel="stylesheet" href="./styles/bar.css">
    <link rel="stylesheet" href="./styles/footer.css">
</head>
<body>
    <?php include 'bar.php' ?>
    <header>
        <span class="image">
        <?php 
        $image_src = '' ;
        $mysql = 'SELECT * FROM user WHERE id = ?' ;
        $img_stmt = $db->query($mysql,array($id));
        if(!$img_stmt){
            die('statement failed') ;
        }else{
            $row = $img_stmt->fetch() ;  
            if($row['uploaded'] == 1){
                $image_src = './images/upload/'.$row['image'] ;
            }else{
                $image_src = './images/upload/default.jpg' ;
            }
        }
        ?>
            <img src=<?php echo $image_src ?> alt="Profile_image" class="profile-img" id="profileImg">
            <label for="changeImg" class="over-img"><i class="fas fa-camera"></i></label>
        </span>
        </header>
        <p class="validate">
        <label for="submitImg" class="modify hidden validateImg">Validate your image</label>
        </p>
<!-- infos -->
<div class="user-data">
    <p class='t-1'>Vos informations</p>
   <p class='data'>Nom : <?php echo $userInfos['nom'] ?></p> 
   <p class='data'>Prenom : <?php echo $userInfos['prenom'] ?></p> 
   <p class='data'>Numéro d'etudiant : <?php echo $userInfos['cne'] ?></p> 
   <p class='data'>Email : <?php echo $userInfos['email'] ?></p> 
   <p class='data'>Date de Naissance : <?php echo $userInfos['dateNaissance'] ?></p> 
   <p class='data'>Sexe : <?php echo $userInfos['sexe'] ?></p>  
</div>
<!-- update profile image -->
<form action="upload.php" method="POST" enctype='multipart/form-data'>
<input type="file" name="image" id="changeImg" class="hidden" accept='image/*'>
<input type="submit" id="submitImg" class="hidden" name='submit'>
</form>
<!-- update data -->
<div class="update-container">
<p class="t-2">Modifier vos données</p>
<div class="row">
<form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST" autocomplete="off">
    <input type="text" name="email" placeholder="Modifier votre email" value="<?php echo $_POST['email'] ?? '' ?>">
    <button class='btn' type='submit' name='edit-email'>modifier</button>
</form>
<p class='form'><small class="err"><?php echo $errors['email'] ?? '' ?></small></p>

</div>
<div class="row">
<form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST" autocomplete="off">
    <input type="text" name="prenom" placeholder="Modifier votre prenom" value="<?php echo $_POST['prenom'] ?? '' ?>">
    <button class='btn' type='submit' name="edit-prenom">modifier</button>
</form>
<p class='form'><small class="err"><?php echo $errors['prenom'] ?? '' ?></small></p>
</div>
<div class="row">
<form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST" autocomplete="off">
    <input type="text" name="nom" placeholder="Modifier votre nom" value="<?php echo $_POST['nom'] ?? '' ?>">
    <button class='btn' type='submit' name="edit-nom">modifier</button>
</form>
<p class='form'><small class="err"><?php echo $errors['nom'] ?? '' ?></small></p>
</div>
<div class="row">
<form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST" autocomplete="off">
    <input type="text" name="dateNaissance" placeholder="Modifier votre date de naissance" value="<?php echo $_POST['dateNaissance'] ?? '' ?>" id="birth">
    <button class='btn' type='submit'name="edit-birth">modifier</button>
</form>
<p class='form'><small class="err"><?php echo $errors['dateNaissance'] ?? '' ?></small></p>
</div>
<p class="t-2">Changer votre mot de passe</p>
<div class="row">
    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST" autocomplete="off" class="changePass">
        <input type="password" name="pass" placeholder="mot de passe anctuel" value="<?php echo $_POST['pass'] ?? '' ?>">
        <p class='passMsg'><small class="err"><?php echo $errors['pass'] ?? '' ?></small></p>
        <input type="password" name="pass2" placeholder="noveau mot de passe" value="<?php echo $_POST['pass2'] ?? '' ?>">
        <p class='passMsg'><small class="err"><?php echo $errors['pass2'] ?? '' ?></small></p>
    <button class='btn2' type='submit' name='edit-pass'>modifier</button>
</form>

</div>

<div class="row">
<p class="t-3">Zone de danger</p>
<form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST" autocomplete="off">
    <button class="dangerBtn" type="submit" name='delete-account'>Supprimer mon compte</button>
</form>
</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="./javascript/profile.js"></script>
</body>
<?php include 'footer.php' ?>
</html>