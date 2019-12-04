<?php include 'admin/koneksi.php'; ?>
<!DOCTYPE html>
<html lang="en">
 <head>
 <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="images/favicon.ico">
    <title>Aplikasi Berkala</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="admin/css/custom/style.css">
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </head>

    <script>
        function noData(){
            var x = document.getElementById('error');
            x.style.display = 'block';
            x.innerHTML = 'No KPJ Atau Password Salah';
        }
    </script>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm"></div>
        <div class="col-sm">
        <!-- KONTEN -->
            <br><br><br><br>
            <div class="card">
                <div class="card-header bg-dark text-white text-center">Masukkan No KPJ dasssn Password</div>
                <div class="card-body">
                <!-- ALERT -->
                <div class="alert alert-danger" id="error" style="display:none;" onclick="this.style.display='none'">
                </div>
                <!-- FORM -->
                <form method="post" action="">
                <!-- NO KPJ -->
                <div class="input-group mb-3">
                    <input type="text" class="form-control text-center" name="nokpj" placeholder="No KPJ">
                </div>
                <!-- PASSWORD -->
                <div class="input-group mb-3">
                    <input type="password" class="form-control text-center" name="password" placeholder="Password">
                </div>
                <input type="submit" class="btn btn-info btn-block" value="Masuk">
                </form>
                </div>
                <div class="card-footer bg-dark text-white text-center">BPJS Kesehatan @2019</div>
            </div>
        </div>
        <div class="col-sm"></div>
    </div>  
  </div>
</div>
</body>
</html>
<?php 
    if (isset($_POST['nokpj'])) {
        $nokpj = $_POST['nokpj'];
        $password = $_POST['password'];
        $query = $db->query("SELECT * FROM tkerja WHERE id_kpj = '$nokpj' AND password = BINARY '$password'");
        if ($query->num_rows > 0) {
            $row = $query->fetch_assoc();
            $_SESSION['login'] = true;
            $_SESSION['nokpj'] = $row['id_kpj'];
            $_SESSION['id_tkerja'] = $row['id_tkerja'];
            header('location:index.php');
        }else{
            echo "
                <script>noData()</script>
            ";
        }
    }
?>