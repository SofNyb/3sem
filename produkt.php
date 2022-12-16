<?php
require "settings/init.php";

$prodId = $_GET["prodId"];
$produkter = $db->sql("SELECT * FROM produkter WHERE prodId=$prodId");


    if (!empty($_POST["data"])) {
        $data = $_POST["data"];
        $file = $_FILES;

        $sql = "INSERT INTO kurv (prodNavn, prodBillede, prodPris, prodAntal) VALUES(:prodNavn,:prodBillede, :prodPris, :prodAntal)";
        $bind = [
            ":prodBillede" => $data["prodBillede"],
            ":prodNavn" => $data["prodNavn"],
            ":prodPris" => $data["prodPris"],
            ":prodAntal" => $data["prodAntal"]];

        $db->sql($sql, $bind, false);

        header("Location: #.php");

        exit;
    }


?>

<?php foreach ($produkter as $produkt){ ?>

<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">

    <title>
        <?php
        echo "Kragebjerggård " . "- " . $produkt->prodNavn;
        ?>
    </title>

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

<div class="container produkt">
    <div class="row py-4 g-3">
            <div class="col-lg-6 col-xxl-6">
                <div class="card produktbillede">
                    <img src="images/<?php echo $produkt->prodBillede; ?>" alt="<?php echo $produkt->prodNavn;?>">
                </div>
            </div>
            <div class="col-lg-6 col-xxl-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title border-bottom pb-3"><?php echo $produkt->prodNavn; ?></h4>
                        <div class="row">
                            <h5 class="card-text mb-3"><?php echo "Pris: " . number_format($produkt->prodPris, 2, ",", ".") . " kr."; ?> <?php echo $produkt->prodMaengde; ?></h5>
                            <h3>Varebeskrivelse</h3>
                            <p class="card-title border-bottom pb-5"><?php echo $produkt->prodBeskrivelse; ?></p>
                            <div class="col-6 pt-2">
                                <p>Tilføjet i butik:</p>
                                <p class="card-text"><?php echo $produkt->prodDato; ?></p>
                            </div>
                            <div class="col-6 text-end py-3 pe-4">
                                <form action="produkt.php?prodId=<?php echo $_GET["prodId"]; ?>" method="post">
                                    <input class="rounded-2 me-2" style="width: 80px;" type="number" name="data[prodAntal]" value="1" min="1" placeholder="Mængde" required>
                                    <input type="hidden" name="data[prodNavn]" value="<?php echo $produkt->prodNavn ?>">
                                    <input type="hidden" name="data[prodBillede]" value="<?php echo $produkt->prodBillede ?>">
                                    <input type="hidden" name="data[prodPris]" value="<?php echo $produkt->prodPris ?>">
                                    <button type="button" class="btn btn-customSecondary rounded-circle" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                        <i class="fa-sharp text-light fa-solid fa-basket-shopping"></i>
                                    </button>
                                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Produkt tilføjet til kurv</h1>
                                                    <button type="submit" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn text-light btn-customSecondary" data-bs-dismiss="modal"><h5>Fortsæt</h5></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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