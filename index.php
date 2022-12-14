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

    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.typekit.net/rar7flk.css">

    <script src="https://cdn.tiny.cloud/1/xssvlu2s8qf9xc5tsggguxuegtb0t783k713q8tpsbc1x6sh/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://kit.fontawesome.com/bc87d7ac19.js" crossorigin="anonymous"></script>
</head>

<body>

<?php include "includes/header.php"; ?>

<section class="mt-5 pt-5 mt-lg-0 pt-lg-0">
    <div class="d-none d-lg-flex h-100 w-100 position-absolute align-items-center justify-content-center">
        <div class="container bg-dark p-5 bg-opacity-75">
            <div class="row">
                <div class="col-6">
                    <img class="indexProdImg--desktop" src="images/indexKo.jpg">
                    <div class="mt-2">
                        <a type="button" class="w-100 btn btn-customSecondary text-light" href="mejeriprodukter.php">Mejeriprodukter</a>
                    </div>
                </div>
                <div class="col-6">
                    <img class="indexProdImg--desktop" src="images/indexGroentsager.jpg">
                    <div class="mt-2">
                        <a type="button" class="w-100 btn btn-customSecondary text-light" href="grontsagsprodukter.php">Grøntsager</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-inline-block w-100">
        <img class="img-fluid indexHero" src="images/indexHero.jpg">
    </div>
</section>

<section class="d-block d-lg-none mt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <img class="indexProdImg--mobile" src="images/indexKo.jpg">
                <div class="mt-2">
                    <a type="button" class="w-100 btn btn-customSecondary text-light" href="#">Mejeriprodukter</a>
                </div>
            </div>
            <div class="col-6">
                <img class="indexProdImg--mobile" src="images/indexGroentsager.jpg">
                <div class="mt-2">
                    <a type="button" class="w-100 btn btn-customSecondary text-light" href="#">Grøntsager</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="d-block d-lg-none mt-4 container-fluid mb-5">
    <div>
        <h1 class="text-center">Vores mål</h1>
        <p>
            Vores mål er at komme så tæt på 100% bæredygtighed og brug af grønne løsninger til alt, hvad vi foretager os.
            Frøene, som vi sår til vores grøntsager, kommer fra tidligere høste.
            Grøntsagerne bliver både brugt som foder til vores dyr, og solgt i vores gårdbutik.
            Køerne bliver malket, når det er tid til det, og så producerer de også naturlig gødning til vores marker og grøntsager.
            Hele vejen rundt forsøger vi at løse tingene selv.
        </p>
    </div>
</section>

<?php include "includes/footer.php"; ?>

<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>