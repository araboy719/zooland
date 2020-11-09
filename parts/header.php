<!-- Панель с мини-хедер и слайдером -->

<!DOCTYPE html>
<html>
  <head>
    <title>Zooland</title>
    <meta name="keywords" content="" />
	  <meta name="description" content=""/ >

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="/assets/css/templatemo_style.css" rel="stylesheet">

    <link href="/assets/css/circle.css" rel="stylesheet">
   <!--  <link href="/assets/cs.s/jquery.bxslider.css" rel="stylesheet" > -->
    <link rel="stylesheet" href="/assets/css/nivo-slider.css">
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/assets/css/style_zoo.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script src="/assets/js/modernizr.custom.js"></script>

  </head>
  <body>
    <header>
      

      <div class="mWrapper">
        <div class="container">
          <!-- Подключаем miniheader -->
          <?php
           include $_SERVER['DOCUMENT_ROOT'] . '/parts/miniheader.php';
          ?>
          <div class="logo">
                <a href="#"><img src="/assets/img/logo.png" alt="Zooland"></a>
          </div>          
            <div class="col-sm-8 col-md-10">
              <nav class="mainMenu">
                <ul class="nav">
                  <li><a href="/"><i class="fas fa-home"></i>Главная</a></li>
                  <li><a href="/index.php/#templatemo_services"><i class='fas fa-handshake'></i>Услуги</a></li>
                  <li><a href="/modules/animals/animals.php"><i class='fas fa-paw'></i>Животные</a></li>
                  <li><a href="/modules/score.php"><i class="fas fa-store-alt"></i>Магазин</a></li>
                  <li><a href="/index.php/#templatemo_about"><i class="fas fa-baby-carriage"></i>Опекуны</a></li>
                  <li><a href="/index.php/#templatemo_contact"><i class='fas fa-address-card'></i>Контакты</a></li>

                 
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div> 
    </header>

