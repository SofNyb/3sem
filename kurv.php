<?php
require "settings/init.php";


if(!empty ($_GET["type"])) {
    if ($_GET["type"] == "slet") {
        $id = $_GET["id"];
        $db->sql("DELETE FROM kurv WHERE prodID = :prodId", [":prodId"=>$id], false);

        header("Location: kurv.php");
        exit;
    }
}

$produkter = $db->sql("SELECT * FROM kurv");
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

    <?php include "includes/meta_og.php" ?>

</head>


<body>

<?php include "includes/header.php"; ?>


<div class="container kurv">
    <div class="row pt-4 g-3">
        <?php
        $pris = 0;
        foreach ($produkter as $produkt){ ?>
        <div class="col-md-6 col-lg-6 col-xxl-6">
            <div class="card h-100">
                <img class="card-img-top" style="height: 250px; width: 100%;" src="images/<?php echo $produkt->prodBillede; ?>" alt="<?php echo $produkt->prodNavn;?>">
                <div class="card-body">
                    <h4 class="card-title border-bottom pb-3"><?php echo $produkt->prodNavn; ?></h4>
                    <div class="row">
                        <h5 class="card-text"><?php echo "Pris: " . number_format($produkt->prodPris, 2, ",", ".") . " kr."; ?></h5>
                        <p class="card-text mb-4"><?php echo $produkt->prodAntal; ?>stk.</p>
                    </div>
                    <div class="card-footer col-12 text-center p-3">
                        <a class="text-dark ms-1" href="kurv.php?type=slet&id=<?php echo $produkt->prodId;?>">Slet</a>
                    </div>
                </div>
            </div>
        </div>
        <?php
        $pris += $produkt->prodPris * $produkt->prodAntal;
        } ?>
    </div>
</div>

<hr class="mt-5">

<section class="container my-5">

    <div class="row justify-content-evenly">

        <div class="col-auto">

            <div class="total">
                <p class="fw-bold p-2">
                    <h4>I alt: <span class="text-decoration-underline fw-normal"><?php echo $pris; ?>DKK</span></h4>
                </p>
            </div>

        </div>

        <div class="col-auto">

            <div class="total">
                <a class="btn btn-customSecondary rounded-5 text-decoration-underline text-light p-3" href="#">
                    <h5>Gå til betaling</h5>
                </a>
            </div>

        </div>
    </div>

</section>

<?php include "includes/footer.php"; ?>

<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script type="module">

</script>
</body>
</html>