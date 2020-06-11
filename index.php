<?php
include 'connect.php';
$query = "SELECT * FROM vijesti WHERE kategorija = 'svijet'  AND arhiva = 0 ORDER BY datum ASC LIMIT 4";
$result_svijet = mysqli_query($dbc, $query);
$query = "SELECT * FROM vijesti WHERE kategorija = 'ekonomija' AND arhiva = 0 ORDER BY datum ASC LIMIT 4";
$result_ekonomija = mysqli_query($dbc, $query);
mysqli_close($dbc); 

$blank_svijet = 4 - mysqli_num_rows($result_svijet);
$blank_ekonomija = 4 - mysqli_num_rows($result_ekonomija);


?>



<!doctype html>
<html lang="en">
  <head>
    <title>L'express</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Condensed&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    
  </head>
  <body>
    <header class="header">
        <div class="container-fluid">
            <div class="row header-main">
                <div class="col-md-12">
                    <div class="center">
                        <img src="./img/Express.png" class="img-fluid" alt="l'express" width="180" height="59">
                    </div>
                </div>
            </div>
            <div class="row header-navigation">
                <div class="col-md-12">
                    <div class="inner-wrapper">
                        <nav class="nav">
                            <a class="nav-link active" href="./index.php">Naslovnica</a>
                            <a class="nav-link" href="./kategorija.php?kategorija=svijet">Svijet</a>
                            <a class="nav-link" href="./kategorija.php?kategorija=ekonomija">Ekonomija</a>
                            <a class="nav-link" href="./administracija.php">Administracija </a>
                            <a class="nav-link" href="./unos.php">Unos</a>
                            <a class="nav-link" href="./registracija.php">Registracija</a>
                            <a class="nav-link" href="./login.php">Login</a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main>
        <section class="monde">
            <div class="inner-wrapper">
                <h2 class="kat-naslov"><a href="./kategorija.php?kategorija=svijet" class="kat-naslov-link">Svijet</a></h2>
                <div class="container-fluid kat-wrapper">
                    <div class="row">
                        <?php
                            while($row = mysqli_fetch_array($result_svijet)) {
                               echo 
                        '<div class="col-md-3">
                            <article class="clanak"> 
                                <div class="clanak-wrapper">
                                    <div class="clanak-slika">
                                        <img src="'.$row['slika'].'" class="img-fluid" alt="'.$row['naslov'].'a" title="'.$row['naslov'].'">
                                    </div>
                                    <div class="clanak-naslov"><a href="./clanak.php?id='.$row['id'].'" class="tag-link"> '.$row['naslov'].'</a></div>
                                    <h2 class="clanak-sazetak"> <a href="./clanak.php?id='.$row['id'].'" class="clanak-link">'.$row['sazetak'].'</a> </h2>
                                    
                                </div>
                            </article>
                        </div>';
                            }

                            for($x = 0; $x < $blank_svijet; $x ++){
                                echo '
                        <div class="col-md-3">
                            <article class="clanak"> 
                                <div class="clanak-wrapper"> 
                                </div>
                            </article>
                        </div>';
                            }
                        ?>
                    </div>
                </div>
         </div>
        </section>
        <section class="economie m-bottom">
            <div class="inner-wrapper">
                <h2 class="kat-naslov"><a href="./kategorija.php?kategorija=ekonomija" class="kat-naslov-link">Ekonomija</a></h2>
                <div class="container-fluid kat-wrapper">
                    <div class="row">
                        <?php
                            while($row = mysqli_fetch_array($result_ekonomija)) {
                               echo 
                        '<div class="col-md-3">
                            <article class="clanak"> 
                                <div class="clanak-wrapper">
                                    <div class="clanak-slika">
                                        <img src="'.$row['slika'].'" class="img-fluid" alt="'.$row['naslov'].'a" title="'.$row['naslov'].'">
                                    </div>
                                    <div class="clanak-naslov"><a href="./clanak.php?id='.$row['id'].'" class="tag-link"> '.$row['naslov'].'</a></div>
                                    <h2 class="clanak-sazetak"> <a href="./clanak.php?id='.$row['id'].'" class="clanak-link">'.$row['sazetak'].'</a> </h2>
                                    
                                </div>
                            </article>
                        </div>';
                            }

                            for($x = 0; $x < $blank_ekonomija; $x ++){
                                echo '
                        <div class="col-md-3">
                            <article class="clanak"> 
                                <div class="clanak-wrapper"> 
                                </div>
                            </article>
                        </div>';
                            }

                        ?>
                    </div>
                </div>
         </div>
        </section>
    </main>
    <footer class="footer">
        <div class="inner-wrapper">
            <p>&nbsp;</p>
            <div class="container-fluid border-top">
              <div class="footer-inner">
                <p> &copy; L'Express - 2020 </p>
              </div>
            </div>
          </div>
    </footer>

    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>