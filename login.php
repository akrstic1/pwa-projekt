<?php
if( isset($_POST["submit"]) ){
    //Konekcija
    include 'connect.php';

    //Provjera postoji li korisnik
    $korisnicko_ime = $_POST["korisnicko_ime"];
    $prequery = "SELECT korisnicko_ime, lozinka, razina FROM korisnik WHERE korisnicko_ime=?";
    $query = mysqli_stmt_init($dbc);
    if (mysqli_stmt_prepare($query, $prequery)){
        mysqli_stmt_bind_param($query,'s',$korisnicko_ime);

        mysqli_stmt_execute($query);
        mysqli_stmt_store_result($query);
    }

    if (mysqli_stmt_num_rows($query)==0){
        echo "Korisnik ne postoji. Molimo registrirajte se <a href='registracija.php'>ovdje!</a>";
        exit();
    }

    mysqli_stmt_bind_result($query, $korisnicko_ime, $hashed_loznika, $razina);

    mysqli_stmt_fetch($query);

    //Potvrda lozinke
    if( password_verify($_POST["lozinka"], $hashed_loznika) ){
        session_start();
        $_SESSION["korisnicko_ime"] = $korisnicko_ime;
        $_SESSION["razina"] = $razina;
        
        //Provjera razine
        if($razina == 1){
          echo "$korisnicko_ime, nemate dovoljna prava za pristup ovoj stranici.";
          exit();
        }else{
          header("Location: administracija.php");
          exit;
        }

    }else{
      die("Unjeli ste pogrešnu lozinku");
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Prijava korisnika</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="css/login.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-login" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" >
      
      <h1 class="h3 mb-3 font-weight-normal">Prijava korisinka</h1>
      <label for="username" class="sr-only">Korisničko ime</label>
      <input type="text" id="korisnicko_ime" name="korisnicko_ime" class="form-control" placeholder="Unesite svoje korisničko ime" required autofocus>
   
      <label for="password" class="sr-only">Password</label>
      <input type="password" id="lozinka" name="lozinka" class="form-control" placeholder="Lozinka" required>

      <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Prijava</button>
      <p class="mt-5 mb-3 text-muted">&copy; PWA 2020 </p>
    </form>
  </body>
</html>
