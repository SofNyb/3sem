<?php
require "settings/init.php";

$produkter = $db->sql("SELECT * FROM produkter");
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

<?php
foreach ($produkter as $produkt){
    ?>

    <div class="row border-bottom p-2">

        <div class="col-12 col-md-4">
            <?php
            echo $produkt->prodNavn;
            ?>
        </div>

        <div class="col-12 col-md-4">
            <?php
            echo $produkt->prodType;
            ?>
        </div>

        <div class="col-12 col-md-2">
            <?php
            echo "Pris: " . number_format($produkt->prodPris, 2, ",", ".") . " kr.";
            ?>
        </div>

        <div class="col-12 col-md-2">
            <?php
            echo $produkt->prodMaengde;
            ?>
        </div>

    </div>



    <?php
}
?>

<?php include "includes/footer.php"; ?>

<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>