<?php

include 'connect.php';

function provjera_unos($dbc){ 
    $full_upload = 1;
    $naslov;
    $sazetak;
    $tekst;
    $slika;
    $kategorija;
    $datum_vrijeme;
    $arhiva = 0;

    # PROVJERA UNOSA #

    if(!empty($_POST['title'])){
        $naslov = $_POST['title'];
    }else{
        $full_upload = 0;
    }

    if(!empty($_POST['about'])){
        $sazetak = $_POST['about'];
    }else{
        $full_upload = 0;
    }

    if(!empty($_POST['content'])){
        $tekst = $_POST['content'];
    }else{
        $full_upload = 0;
    }

    $kategorija = $_POST['category'];
    
    if(isset($_POST['archive'])){
        $arhiva = 1;
    }
    
    if(!is_uploaded_file($_FILES['pphoto']['tmp_name'])){
        $full_upload = 0;
    }

    # VRACANJE NA FORMU U SLUCAJU NEPOTPUNOG UPLOADA
    if($full_upload == 0){
        echo "<script type='text/javascript'>alert('Ispunite sva polja.');</script>";
        exit;
    }

    # UPLOAD SLIKE U FOLDER NA SERVERU #
    $target_dir = "upload_img/";
    $target_file = $target_dir . basename($_FILES["pphoto"]["name"]);
    move_uploaded_file($_FILES["pphoto"]["tmp_name"], $target_file);

    # ARHIVA I DATUM
    if(isset($_POST['archive'])){
        $archive=1;
    }else{
        $archive=0;
    }

    $datum_vrijeme = date("d/m/Y H:i");

    # ZVANJE FUNKCIJE ZA UNOS NA BAZU
    unos($naslov, $datum_vrijeme, $sazetak, $tekst, $target_file, $kategorija, $arhiva, $dbc);
}

function unos($naslov, $datum_vrijeme, $sazetak, $tekst, $target_file, $kategorija, $arhiva, $dbc){

    $query = "INSERT INTO vijesti (naslov, datum, sazetak, tekst, slika, kategorija,
    arhiva ) VALUES ('$naslov', '$datum_vrijeme', '$sazetak', '$tekst', '$target_file',
    '$kategorija', '$arhiva')";
    mysqli_query($dbc, $query) or die('Error querying databese.');
    $last_id = mysqli_insert_id($dbc);
    mysqli_close($dbc);  
    
    redirect($last_id);

}

function redirect($id){
    header("Location: clanak.php?id=$id");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    provjera_unos($dbc);

}

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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
                            <a class="nav-link" href="./index.php">Naslovna</a>
                            <a class="nav-link" href="./kategorija.php?kategorija=svijet">Svijet</a>
                            <a class="nav-link" href="./kategorija.php?kategorija=ekonomija">Ekonomija</a>
                            <a class="nav-link" href="./administracija.php">Administracija </a>
                            <a class="nav-link active" href="./unos.php">Unos</a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main>
        <div class="inner-wrapper">
            <div class="form-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                                <div class="form-row">
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <label for="naslov">Naslov vjesti:</label>
                                            <input type="text" name="title" class="form-control" value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="sazetak">Kratki sadržaj vijesti (do 50 znakova):</label>
                                            <textarea name="about" id="" cols="30" rows="10" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="tekst">Sadržaj vijesti:</label>
                                            <textarea name="content" id="tekst" cols="30" rows="10" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="slika">Slika:</label>
                                            <input type="file" class="form-control" id="slika" value="" name="pphoto"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="kategorija">Kategorija vijesti:</label>
                                            <div class="form-field">
                                                <select name="category" id="kategorija" class="form-control">';
                                                    <option value="svijet">Svijet</option>
                                                    <option value="ekonomija">Ekonomija</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>
                                                Spremiti u arhivu:
                                                <div class="form-field">
                                                    <input type="checkbox" name="archive">  
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                        
                                </div>
                                <div class="form-row">
                                    <div class="form-group">
                                       <button type="reset" class="btn btn-primary" value="Poništi">Poništi</button>
                                       <input type="submit" class="btn btn-primary" value="Pošalji"></input>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
    
</html>
