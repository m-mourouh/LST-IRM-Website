<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Programme</title>
    <link rel="stylesheet" href="./styles/programme.css" />
    <link rel="stylesheet" href="./styles/bar.css">
    <link rel="stylesheet" href="./styles/footer.css">
    <link rel="shortcut icon" href="./images/fav.png" type="image/x-icon" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    />
  </head>
  <body>
    <?php include "bar.php" ?>
    <div class="container">
      <header>
        <h1>Programme de la licence IRM</h1>
      </header>
      <!------------------------S5---------------------->
      <div class="inner-wrapper">
        <div class="card-phase">
          <h1>Les modules du semestre S5</h1>
        </div>
        <div class="card-container">
          <div class="card">
            <p class="card-title">MODULE M25</p>
            <div class="card-image">
              <img src="./images/cours/twm.jpg" alt="TWM" />
            </div>
            <button class="card-btn" id="btn">Voir les details</button>
          </div>

          <div class="card">
            <p class="card-title">MODULE M26</p>
            <div class="card-image">
              <img src="./images/cours/twm.jpg" alt="TWM" />
            </div>
            <button class="card-btn">Voir les details</button>
          </div>

          <div class="card">
            <p class="card-title">MODULE M27</p>
            <div class="card-image">
              <img src="./images/cours/twm.jpg" alt="TWM" />
            </div>
            <button class="card-btn">Voir les details</button>
          </div>

          <div class="card">
            <p class="card-title">MODULE M28</p>
            <div class="card-image">
              <img src="./images/cours/twm.jpg" alt="TWM" />
            </div>
            <button class="card-btn">Voir les details</button>
          </div>

          <div class="card">
            <p class="card-title">MODULE M29</p>
            <div class="card-image">
              <img src="./images/cours/twm.jpg" alt="TWM" />
            </div>
            <button class="card-btn">Voir les details</button>
          </div>
          <div class="card">
            <p class="card-title">MODULE M30</p>
            <div class="card-image">
              <img src="./images/cours/twm.jpg" alt="TWM" />
            </div>
            <button class="card-btn">Voir les details</button>
          </div>
        </div>
      </div>
      <!----------------------- S6------------------- -->
      <div class="inner-wrapper">
        <div class="card-phase">
          <h1>Les modules du semestre S6</h1>
        </div>
        <div class="card-container">
          <div class="card">
            <p class="card-title">MODULE M31</p>
            <div class="card-image">
              <img src="./images/cours/twm.jpg" alt="TWM" />
            </div>
            <button class="card-btn">Voir les details</button>
          </div>

          <div class="card">
            <p class="card-title">MODULE M32</p>
            <div class="card-image">
              <img src="./images/cours/twm.jpg" alt="TWM" />
            </div>
            <button class="card-btn">Voir les details</button>
          </div>

          <div class="card">
            <p class="card-title">MODULE M33</p>
            <div class="card-image">
              <img src="./images/cours/twm.jpg" alt="TWM" />
            </div>
            <button class="card-btn">Voir les details</button>
          </div>

          <div class="card">
            <p class="card-title">PROJET DE FIN D’ETUDES</p>
            <div class="card-image">
              <img src="./images/cours/twm.jpg" alt="TWM" />
            </div>
            <button class="card-btn">Voir les details</button>
          </div>
        </div>
      </div>
      <div class="wrapper2">
        <div class="details">
          <span class="closeBtn"><i class="fas fa-times"></i></span>
          <div class="m-title">
            <h1></h1>
            <h2></h2>
          </div>
          <div class="m-goal">
            <h3>OBJECTIFS DU MODULE</h3>
            <p class="m-desc"></p>
          </div>
          <div class="m-requirements">
            <h3>PRE-REQUIS PEDAGOGIQUES</h3>
            <p class="desc-requirements"></p>
          </div>
        </div>
      </div>
    </div>

    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
      referrerpolicy="no-referrer"
    ></script>
    <script src="./javascript/programme.js"></script>
  </body>
  <?php include 'footer.php' ?>
</html>
