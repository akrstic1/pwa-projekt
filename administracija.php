<?php
include 'connect.php';
# DELETE
if(isset($_POST['delete'])){
    $id=$_POST['id'];
    $prequery = "DELETE FROM vijesti WHERE id=?";
    $query = mysqli_stmt_init($dbc);

    if(mysqli_stmt_prepare($query, $prequery)){
        mysqli_stmt_bind_param($query, 'i', $id);
        mysqli_stmt_execute($query);
    }

    //Zatvaranje konekcije i refresh
    mysqli_close($dbc);
    header("Refresh:0");

}

# UPDATE
if(isset($_POST['update'])){
    $slika = $_FILES['slika']['name'];
    $naslov=$_POST['naslov'];
    $sazetak=$_POST['sazetak'];
    $tekst =$_POST['tekst'];
    $kategorija=$_POST['kategorija'];

    if(isset($_POST['arhiva'])){
        $arhiva=1;
    }else{
        $arhiva=0;
    }

    $id=$_POST['id'];

    # GLEDA JELI IZMJENJENA SLIKA
    if(!is_uploaded_file($_FILES['slika']['tmp_name'])){
        $prequery = "UPDATE vijesti SET naslov=?, sazetak=?, tekst=?, kategorija=?, arhiva=? WHERE id=? ";
        $query = mysqli_stmt_init($dbc);

        if(mysqli_stmt_prepare($query, $prequery)){
            mysqli_stmt_bind_param($query, 'ssssii', $naslov, $sazetak, $tekst, $kategorija, $arhiva, $id);
            mysqli_stmt_execute($query);
        }

        mysqli_close($dbc);
        header("Refresh:0");

    }else{
        $target_dir = "upload_img/";
        $target_file = $target_dir . basename($_FILES["slika"]["name"]);

        move_uploaded_file($_FILES["slika"]["tmp_name"], $target_file);

        $query = "UPDATE vijesti SET naslov='$naslov', sazetak='$sazetak', tekst='$tekst',
        slika='$target_file', kategorija='$kategorija', arhiva='$arhiva' WHERE id=$id ";
        $result = mysqli_query($dbc, $query);

        mysqli_close($dbc);

        header("Refresh:0");
    }
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
                            <a class="nav-link" href="./index.php">Naslovnica</a>
                            <a class="nav-link" href="./kategorija.php?kategorija=svijet">Svijet</a>
                            <a class="nav-link" href="./kategorija.php?kategorija=ekonomija">Ekonomija</a>
                            <a class="nav-link active" href="./administracija.php">Administracija </a>
                            <a class="nav-link" href="./unos.php">Unos</a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main>
        <div class="inner-wrapper">
        <?php
        include 'connect.php';
        $query = "SELECT * FROM vijesti";
        $result = mysqli_query($dbc, $query);
        while($row = mysqli_fetch_array($result)) {

        echo '
        <div class="form-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <form enctype="multipart/form-data" action="" method="POST">
                            <div class="form-row">
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label for="naslov">Naslov vjesti:</label>
                                    <input type="text" name="naslov" class="form-control" value="'.$row['naslov'].'">
                                </div>
                        
                                <div class="form-group">
                                    <label for="sazetak">Kratki sadržaj vijesti (do 50 znakova):</label>
                                    <textarea name="sazetak" id="" cols="30" rows="10" class="form-control">'.$row['sazetak'].'</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="tekst">Sadržaj vijesti:</label>
                                    
                                    <textarea name="tekst" id="" cols="30" rows="10" class="form-control">'.$row['tekst'].'</textarea>
                                </div>
                            </div>

                            
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="slika">Slika:</label>
                                    
                                    <input type="file" class="form-control" id="slika" value="'.$row['slika'].'" name="slika"/> <br><img src="'.$row['slika'].'" width=100px>
                                
                                </div>
                                <div class="form-group">
                                    <label for="kategorija">Kategorija vijesti:</label>
                                    <div class="form-field">
                                        <select name="kategorija" id="" class="form-control"
                                            value="'.$row['kategorija'].'">';
                                            if($row['kategorija'] == 'svijet'){
                                                echo '<option selected = "selected" value="svijet">Svijet</option>';
                                                echo '<option value="ekonomija">Ekonomija</option>';
                                            }else{
                                                echo '<option value="svijet">Svijet</option>';
                                                echo '<option selected = "selected" value="ekonomija">Ekonomija</option>';
                                            }
                                            echo '
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>
                                        Spremiti u arhivu:
                                        <div class="form-field">';
                                            if($row['arhiva'] == 0) {
                                                echo '<input type="checkbox" name="arhiva" id="arhiva"/>Arhiviraj?';
                                            } else {
                                                echo '<input type="checkbox" name="arhiva" id="arhiva"checked/> Arhiviraj?';
                                            }
                                            echo '
                                        </div>
                                    </label>
                                </div>
                            </div>
                        
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <input type="hidden" name="id" value="'.$row['id'].'">
                                    <button type="reset" class="btn btn-primary" value="Poništi">Poništi</button>
                                    <button type="submit" class="btn btn-primary" name="update" value="Prihvati">Izmjeni</button>
                                    <button type="submit" class="btn btn-primary" name="delete" value="Izbriši">Izbriši</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>';
        }
        ?>
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


