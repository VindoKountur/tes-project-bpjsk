<?php include 'header.php'; ?>
<br>

<div class="container-fluid" id="media">
    <?php 
        if (isset($_GET['act'])) {
            switch ($_GET['act']) {
                case 'keladmin':
                    include 'media/kel_admin.php';
                    break;
                case 'pembayaran':
                    include 'media/pembayaran.php';
                    break;
                case 'kartukontrol':
                    include 'media/kartukontrol.php';
                    break;
                case 'feedback':
                    include 'media/feedback.php';
                    break;
                default:
                    echo "Act Required";
                    break;
            }
        }else{
            include 'media/tenaga_kerja.php'; 
        }
    ?>
</div>

<script src="ajax.js"></script>

<?php include 'footer.php'; ?>
