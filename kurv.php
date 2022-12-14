<?php
require "settings/init.php";

$produkter = $db->sql("SELECT * FROM produkter");
?>

<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">

    <title>Kragebjerggård - Kurv</title>

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

<section class="container mt-5 pt-5">

    <div class="kurv">

        <div class="genstande">
            <!-- Her vises produkterne-->


        </div>

    </div>

</section>

<hr>

<section class="container mt-5 mb-5">

    <div class="row justify-content-evenly">

        <div class="col-auto">

            <div class="total">
                <p class="fw-bold">
                    I alt: <span class="text-decoration-underline fw-normal"><?php echo "DKK " . "[PRIS]";?></span>
                </p>
            </div>

        </div>

        <div class="col-auto">

            <div class="total">
                <a class="text-decoration-underline" href="#">
                    Gå til betaling
                </a>
            </div>

        </div>
    </div>

</section>

<?php include "includes/footer.php"; ?>

<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script type="module">

    import Songs from "./js/produkt.js";

</script>
</body>
</html>