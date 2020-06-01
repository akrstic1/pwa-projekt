<?php
if( isset($_POST["submit"]) ){
    //Konkecija
    include 'connect.php';

    //Provjera postoji li već korisnik
    $korisnicko_ime = $_POST["korisnicko_ime"];
    $prequery = "SELECT * FROM korisnik WHERE korisnicko_ime=?";
    $query = mysqli_stmt_init($dbc);

    if( mysqli_stmt_prepare($query, $prequery) ){
        mysqli_stmt_bind_param($query, 's', $korisnicko_ime);
        mysqli_stmt_execute($query);
        mysqli_stmt_store_result($query);
    }else{
        die("Error querying database");
    }

    if(mysqli_stmt_num_rows($query) != 0){
        exit("Korisničko ime već je u uporabi!");
    }
    //Provjera 

    //Priprema za unos
    $hashed_loznika = password_hash($_POST["lozinka1"], CRYPT_BLOWFISH);
    $ime = $_POST["ime"];
    $prezime = $_POST["prezime"];

    //Priprema i pokretanje upita
    $prequery = "INSERT INTO korisnik (ime, prezime, korisnicko_ime, lozinka, razina) VALUES (?, ?, ?, ?, 1)";
    $query = mysqli_stmt_init($dbc);

    if( mysqli_stmt_prepare($query, $prequery) ){
        mysqli_stmt_bind_param($query, 'ssss', $ime, $prezime , $korisnicko_ime, $hashed_loznika);

        mysqli_stmt_execute($query);

        exit("Registracija uspješna. Kliknite <a href='login.php'>ovdje</a> za login");
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Prijava korisnika</title>
    <!-- JS implementation -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <script src="js/registration-validation.js"></script>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="css/login.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form name="registracija" class="form-login" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" >
      
    <h1 class="h3 mb-3 font-weight-normal">Registracija korisinka</h1>
    <label for="username" class="sr-only">Ime</label>
    <input type="text" id="ime" name="ime" class="form-control" placeholder="Unesite svoje ime" required autofocus>

    <label for="username" class="sr-only">Prezime</label>
    <input type="text" id="prezime" name="prezime" class="form-control" placeholder="Unesite svoje prezime" required autofocus>

    <label for="username" class="sr-only">Korisničko ime</label>
    <input type="text" id="korisnicko_ime" name="korisnicko_ime" class="form-control" placeholder="Unesite svoje korisničko ime" required autofocus>
   
    <label for="lozinka1" class="sr-only">Lozinka</label>
    <input type="password" id="lozinka1" name="lozinka1" class="form-control" placeholder="Lozinka" required>

    <label for="lozinka2" class="sr-only">Ponovite lozinku</label>
    <input type="password" id="lozinka2" name="lozinka2" class="form-control" placeholder="Ponovite lozinku" required>

    <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Registracija</button>

    <p class="mt-5 mb-3 text-muted">&copy; PWA 2020 </p>
    </form>
  </body>
</html>