   <div>
        <nav>
            <ul class="nav-bar1">
                <li class="logo1" title="Accueil"><a href="index.php"><img src="./images/fav.png" alt="logo"></a></li>
                <input type="checkbox"  id="check1">
                <span class="menu1">
                    <li><a href="index.php">Accueil</a></li>
                    <li><a href="programme.php">Programme</a></li>
                    <li><a href="objectifs.php">Objectifs</a></li>
                    <!-- <li><a href="#">Débouche de formation</a></li> -->
                    <?php if(isset($_SESSION['userID'])): ?>
                        <li><a href="profile.php">Profile</a></li>
                        <li><a href="logout.php">Se déconnecter</a></li>
                        <?php else: ?>
                            <li><a href="signup.php">Se candidater</a></li>
                            <li><a href="login.php">Se connecter</a></li>
                    <?php endif;  ?>
                </span>
                <label for="check1" class="open-menu1"><i class="fas fa-bars"></i></label>
            </ul>
        </nav>
    </div>
