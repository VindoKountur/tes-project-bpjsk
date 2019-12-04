<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="en">
 <head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/favicon.ico">
    <title>Aplikasi Berkala</title>
    <link rel="stylesheet" href="css/css/bootstrap.min.css">
    <script src="css/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/custom.css">

    <script>
        function noData(){
            var x = document.getElementById('error');
            x.style.display = 'block';
            x.innerHTML = 'Username Atau Password Salah';
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
                <div class="card-header bg-dark text-white text-center">Masukkan Username dan Password</div>
                <div class="card-body">
                <!-- ALERT -->
                <div class="alert alert-danger" id="error" style="display:none;" onclick="this.style.display='none'">
                </div>
                <!-- FORM -->
                <form method="post" action="">
                <!-- USERNAME -->
                <div class="input-group mb-3">
                    <input type="text" class="form-control text-center" name="username" placeholder="Username">
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
    if (isset($_POST['username'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = $db->query("SELECT * FROM admin WHERE username = '$username' AND password = BINARY '$password'");
        if ($query->num_rows > 0) {
            $row = $query->fetch_assoc();
            $_SESSION['login'] = true;
            $_SESSION['level'] = $row['level'];
            $_SESSION['nama'] = $row['nama'];
            header('location:index.php');
        }else{
            echo "
                <script>noData()</script>
            ";
        }
    }
?>