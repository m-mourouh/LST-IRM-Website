<?php 
if(isset($_GET['vkey'])){
    $vkey = $_GET['vkey'] ;
    require_once("Database.php");
    $database = new Database ;
    $sql = "SELECT verified , v_key FROM user WHERE verified = ? AND v_key = ? LIMIT ?";
    $stmt = $database->query($sql,array(0,$vkey,1));
    $status = false ;
    if($stmt->rowCount() == 1){
        //Verify the email
        $myqsl = "UPDATE user SET verified = ? WHERE v_key = ? LIMIT ?" ;
        $update = $database->query($myqsl,array(1,$vkey,1));
        if($update){
            $status = true ;
        }
    }
    // else{
    //     echo "This acount invalid or already verified !" ;
    // }

}else {
    die("Somthing went wrong !") ;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>
    <link rel="stylesheet" href="./styles/verify.css">
    <link rel="stylesheet" href="./styles/bar.css">
    <link rel="stylesheet" href="./styles/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"/>
    <link rel="shortcut icon" href="./images/fav.png" type="image/x-icon">
</head>
<body>
    <?php include 'bar.php' ?>
    <?php   if($status): ?>
    <div class="container">
        <h1 class="title">Votre email a été vérifié avec succès</h1>
        <div class="content">
            <p><img class="email" src="./images/email-verification.svg" alt="email was verified"></p>
            <span class="btns">
                <a href="index.php" class="homeBtn">Retourner à l'accueil</a> ou
                <a href="login.php" class="loginBtn">Se connecter</a>
            </span>
        </div>
    </div>
    <?php else:?>
        <div class="container">
        <h2 class="error_msg">Ce compte n'est pas valide ou déjà vérifié !</h2>
        <div class="content">
             <p><img class="email" src="./images/no-data.svg" alt="invalid email"></p>
        </div>
    </div>
    <?php endif; ?>
    <?php include 'footer.php' ?>
</body>
</html>