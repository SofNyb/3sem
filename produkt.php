<?php
require "settings/init.php";

$prodId = $_GET["prodId"];
$produkter = $db->sql("SELECT * FROM produkter WHERE prodId=$prodId");
?>

<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">

    <title>Kragebjerggård</title>

    <meta name="robots" content="All">
    <meta name="author" content="Udgiver">
    <meta name="copyright" content="Information om copyright">

    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/styles.css" rel="stylesheet" type="text/css">
    <link href="images/favicon-16x16.png" rel="icon" type="image/x-icon">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://cdn.tiny.cloud/1/xssvlu2s8qf9xc5tsggguxuegtb0t783k713q8tpsbc1x6sh/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://kit.fontawesome.com/bc87d7ac19.js" crossorigin="anonymous"></script>
</head>

<body>

<?php include "includes/header.php"; ?>

<div class="container produkt mt-5">
    <div class="row py-4 g-3 mt-5">
        <?php foreach ($produkter as $produkt){ ?>
            <div class="col-lg-6 col-xxl-6">
                <div class="card">
                    <img src="images/<?php echo $produkt->prodBillede; ?>" alt="<?php echo $produkt->prodNavn;?>">
                </div>
            </div>
            <div class="col-lg-6 col-xxl-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title border-bottom pb-3"><?php echo $produkt->prodNavn; ?></h4>
                        <div class="row">
                            <h5 class="card-text"><?php echo "Pris: " . number_format($produkt->prodPris, 2, ",", ".") . " kr."; ?> <?php echo $produkt->prodMaengde; ?></h5>
                            <p class="card-text mb-4"><?php echo $produkt->prodMaengde; ?></p>
                            <h3>Varebeskrivelse</h3>
                            <p class="card-title border-bottom pb-5"><?php echo $produkt->prodBeskrivelse; ?></p>
                            <div class="col-6 pt-2">
                                <p>Tilføjet i butik:</p>
                                <p class="card-text"><?php echo $produkt->prodDato; ?></p>
                            </div>
                            <div class="col-6 text-end py-3 pe-4">
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