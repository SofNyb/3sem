<?php
require "settings/init.php";

$produkter = $db->sql("SELECT prodId, prodNavn, prodBillede, prodPris FROM produkter WHERE prodType='Mejeri og køl'");
?>

<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">

    <title>Kragebjerggård - mejeri</title>

    <meta name="robots" content="All">
    <meta name="author" content="Udgiver">
    <meta name="copyright" content="Information om copyright">

    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/styles.css" rel="stylesheet" type="text/css">
    <link href="images/favicon-16x16.png" rel="icon" type="image/x-icon">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/bc87d7ac19.js" crossorigin="anonymous"></script>
    <script src="https://cdn.tiny.cloud/1/xssvlu2s8qf9xc5tsggguxuegtb0t783k713q8tpsbc1x6sh/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
</head>

<body>

<?php include "includes/header.php"; ?>



<div class="container my-5">
    <div class="row mt-5 g-3">
        <?php foreach ($produkter as $produkt){ ?>
            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 mt-5">
                <div class="card h-100">
                    <img class="card-img-top" src="uploads/<?php echo $produkt->prodBillede; ?>" alt="<?php echo $produkt->prodNavn;?>">
                    <div class="card-body">
                        <h4 class="card-title border-bottom"><?php echo $produkt->prodNavn; ?></h4>
                        <div class="row">
                            <p class="card-text"><?php echo $produkt->prodMaengde; ?></p>
                            <div class="col-8">
                                <h5 class="card-text"><?php echo "Pris: " . number_format($produkt->prodPris, 2, ",", ".") . " kr."; ?></h5>
                            </div>
                            <div class="col-4 text-end">
                                <a class="btn btn-customSecondary rounded-circle" href="#"><i class="fa-sharp text-light fa-solid fa-basket-shopping"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>




<?php include "includes/footer.php"; ?>

<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>