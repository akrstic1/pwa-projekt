<?php

include 'connect.php';

# DOHVAĆANJE VARIJABLI GET METODOM IZ LINKA
$get_id = $_GET['id'];

# TRAZENJE CLANKA PO ID-u
$prequery = "SELECT naslov, datum, sazetak, tekst, slika, kategorija FROM vijesti WHERE id=?";
$query = mysqli_stmt_init($dbc);

if(mysqli_stmt_prepare($query, $prequery)){
    mysqli_stmt_bind_param($query, 'i', $get_id);
    mysqli_stmt_execute($query);
}else{
    die('Error querying databese.');
}

//Stavljanje rezultate u varijable
mysqli_stmt_bind_result($query, $naslov, $datum, $sazetak, $tekst, $slika, $kategorija);

mysqli_stmt_fetch($query);


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
                            <a class="nav-link" href="./index.php">Home</a>
                            <a class="nav-link" href="./kategorija.php?kategorija=svijet">Svijet</a>
                            <a class="nav-link" href="./kategorija.php?kategorija=ekonomija">Ekonomija</a>
                            <a class="nav-link" href="./administracija.php">Administracija </a>
                            <a class="nav-link" href="./unos.php">Unos</a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main>
        
        <div class="inner-wrapper">
            <article class="m-bottom" id="clanak">
                <div class="container-fluid kat-wrapper">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2 class="clanak-kategorija"><a href="" class="tag-link"><?php echo $kategorija;?></a></h2 >       
                            <h1 class="clanak-title"><?php echo $naslov;?></h1>
                            <span class="clanak-datum"><?php echo $datum;?></span>
                            
                            <figure class="clanak-slika">
                                <img src="<?php echo $slika;?>" class="img-fluid " alt="<?php echo $naslov;?>" title="<?php echo $naslov;?>">
                            </figure>
                            <h2 class="clanak-sazetak">
                                <?php echo $sazetak;?> 
                            </h2>
                        
                            <div class="clanak-body">      
                                <p>
                                    <?php echo $tekst;?>
                                </p>
                            </div>
                    </div>
                </div>  
            </article>          
        </div>
        
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