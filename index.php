<?php include 'header.php'; ?>
<br>

<div class="container-fluid" id="media">
    <?php 
        if (isset($_GET['act'])) {
            switch ($_GET['act']) {
                case 'feedback':
                    include 'page/feedback.php';
                    break;
                case 'berifeedback':
                    include 'page/beri_feedback.php';
                    break;
                default:
                    echo "Act Required";
                    break;
            }
        }else{
            include 'page/main.php'; 
        }
    ?>
</div>


<?php include 'footer.php'; ?>
