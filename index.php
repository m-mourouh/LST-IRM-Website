<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LST IRM</title>
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="stylesheet" href="./styles/bar.css">
    <link rel="stylesheet" href="./styles/footer.css">
    <link rel="shortcut icon" href="./images/fav.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    
</head>
<body>
    <?php include 'bar.php' ?>
    <div class="loader-container">
        <div class="loader"><div></div><div></div></div>
    </div>
    <div class="container">
        <div class="grid-container">
            <header>
                <div class="slider">
                    
                    <div class="mySlides fade">
                        <img src="./images/img1.png" class="image">
                    </div>
        <div class="mySlides fade">
            <img src="./images/img2.png" class="image">
        </div>
        <div class="mySlides fade">
            <img src="./images/img3.png" class="image">
        </div>
        <div class="mySlides fade">
            <img src="./images/img4.png" class="image">
        </div>
        <span class="prevImg">&#10094;</span>
        <span class="nextImg">&#10095;</span>
    </div>
    <div class="dots">
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
    </div>
    </header>
    <aside>
    <?php if(isset($_SESSION['userID'])): ?>
                        <a href="logout.php" class='btn'>Déconnexion</a>
                        <?php else: ?>
                            <a href="signup.php" class="btn"><i class='fas fa-edit'></i> Candidature</a>
                    <?php endif;  ?>
            <iframe class='map' src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3319.102503379492!2d-7.356744685157169!3d33.70629644332928!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xda7b6d47e846147%3A0x15abe71eea02b18a!2sfstm!5e0!3m2!1sfr!2sma!4v1614275764852!5m2!1sfr!2sma" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </aside>
            <main>
                <div class="description">
                    <div class="title">
                        <p>Description</p>
                    </div>
                    <p class="text">
                        La  Licence Sciences et Techniques Informatique,Réseau et Multimédia (IRM) à FST Mohammedia consiste à donner aux étudiants une dimension leur permettant la maîtrise des grands projets informatiques, que ce soit en milieu industriel ou dans le domaine de la recherche. Il est composé d’un tronc commun, de deux options et d’un stage. Le tronc commun comporte deux semestres dans lesquels les étudiants acquièrent les notions de base ainsi que les compétences de pointe en matière des techniques de traitement de l’information et de la communication.
                    </p>
                </div>
                <div class="menu">
                    <nav>
                        <ul>
                            <li>
                                <a href="objectifs.php">
                                    <img src="./images/menu/obj.png" alt="">
                                    <p>Objectifs</p>
                            </a>
                        </li>
                        <li>
                            <a href="programme.php">
                                <img src="./images/menu/programme.png" alt="">
                                <p>Programme</p>
                                 </a>
                                </li>
                                <li>
                                    <a href="apres.php">
                                        <img src="./images/menu/apres.png" alt="">
                                        <p>Aprés</p>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <!-- Actualités -->
                    <div class="news">
                        <h2 class="actus"><i class="fas fa-newspaper"></i>Actualités</h2>
                        <div class="news-slider">
                            <div class="slide">
                                <a href="https://www.leconomiste.com/">
                                    <div class='read-more'><i class="fas fa-external-link-alt"></i></div>
                                    <img src="./images/news/new1.png" class="img">
                                </a>
                            </div>
                            <div class="slide">
                                <a href="https://ar.le360.ma/">
                                    <div class='read-more'><i class="fas fa-external-link-alt"></i></div>
                                <img src="./images/news/news2.png" class="img">
                            </a>
                        </div>
                        <div class="slide">
                            <a href="https://assabah.ma/">
                                <div class='read-more'><i class="fas fa-external-link-alt"></i></div>
                                <img src="./images/news/news3.png" class="img">
                            </a>
                        </div>
                        <div class="slide">
                            <a href="http://www.medi1tv.com/ar/tv">
                                <div class='read-more'><i class="fas fa-external-link-alt"></i></div>
                                <img src="./images/news/news4.png" class="img">
                            </a>
                        </div> 
                    </div>    
                </div>
            </main>
        </div>
    </div>
    <?php include 'footer.php' ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" ></script>
    <script src="./javascript/app.js" ></script>
</body>
</html>



