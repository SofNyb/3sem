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

<img class="hero" src="images/indexHero.jpg" alt="Ko">

<div class="container menuer">
    <div class="row">
        <div class="col-6">
            <img class="indexProdImgAlt" src="images/indexKo.jpg" alt="Ko">
            <a type="button" class="w-100 btn btn-customSecondary text-light p-3" href="#"><h3>Mejeriprodukter</h3></a>
        </div>
        <div class="col-6">
            <img class="indexProdImgAlt" src="images/indexGroentsager.jpg" alt="Grøntsager">
            <a type="button" class="w-100 btn btn-customSecondary text-light p-3" href="#"><h3>Grøntsager</h3></a>
        </div>
    </div>
</div>

<div class="container goal my-4">
    <div class="card-body">
        <div class="card-header text-center pb-1">
            <h1>Vores Mål</h1>
        </div>
        <div class="card-text">
            <p>
                Vores mål er at komme så tæt på 100% bæredygtighed og brug af grønne løsninger til alt, hvad vi foretager os.
                Frøene, som vi sår til vores grøntsager, kommer fra tidligere høste.
                Grøntsagerne bliver både brugt som foder til vores dyr, og solgt i vores gårdbutik.
                Køerne bliver malket, når det er tid til det, og så producerer de også naturlig gødning til vores marker og grøntsager.
                Hele vejen rundt forsøger vi at løse tingene selv.
            </p>
        </div>
    </div>
</div>

<?php include "includes/footer.php"; ?>

<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>