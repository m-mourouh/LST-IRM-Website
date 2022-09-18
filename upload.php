<?php 
    session_start() ;
    require_once("Database.php");
    $userID = $_SESSION['userID'] ;
    //check if the form was submited
    if(isset($_POST['submit'])) {
       # check if the file was uploaded without errors
        if(isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {

            $allowed_ext = array ("jpg"=>"image/jpg",
                                  "jpeg"=>"image/jpeg",
                                  "png"=>"image/png",
                                  "gif"=>"image/gif") ;
            // $filename = time() . $_FILES["image"]["name"];    upload the same file                  
            $filename = $_FILES["image"]["name"];                      
            $filetype = $_FILES["image"]["type"] ;                      
            $filesize = $_FILES["image"]["size"] ;   
            $dir = "./images/upload/" ;
            $destination = $dir.$filename ;
            $maxsize = 2 * 1024 * 1024 ; // 2MB 
            $file_ext = strtolower(pathinfo($filename,PATHINFO_EXTENSION)) ;
            if(!array_key_exists($file_ext,$allowed_ext)) {
                // die("Error : Please select a va lid file format") ;
                header('Location: profile.php') ;
            }
        
            if($filesize > $maxsize){
                // die("Error : the file size is larger than the allowed limit "); 
                header('Location: profile.php') ;
            }
            if(in_array($filetype,$allowed_ext)) {
                if(file_exists($destination)) {
                     $filename = "(" . uniqid('',TRUE) . ")"  . $filename  ;
                     $destination = $dir . $filename ;
                    } 
                    move_uploaded_file($_FILES["image"]["tmp_name"],$destination) ;
                    $datbase = new Database ;
                    $sql = "UPDATE user SET image = ? ,uploaded = ? WHERE id = ?;" ;
                    $stmt = $datbase->query($sql,array($filename,1,$userID));
                    header("Location: profile.php") ;
                    
            } else {
                // echo "Error : Please  try again " ;
                header('Location: profile.php') ;
            }                   
        } else {
            // echo "Error : " . $_FILES["image"]["error"] ;
            header('Location: profile.php') ;
        }

    }
?>