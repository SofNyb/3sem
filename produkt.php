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
                            <h5 class="card-text"><?php echo "Pris: " . number_format($produkt->prodPris, 2, ",", ".") . " kr."; ?> <?php echo $produkt->prodMaengde; ?></h5>
                            <p class="card-text mb-4"><?php echo $produkt->prodMaengde; ?></p>
                            <h3>Varebeskrivelse</h3>
                            <p class="card-title border-bottom pb-5"><?php echo $produkt->prodBeskrivelse; ?></p>
                            <div class="col-6 pt-2">
                                <p>Tilføjet i butik:</p>
                                <p class="card-text"><?php echo $produkt->prodDato; ?></p>
                            </div>
                            <div class="col-6 text-end py-3 pe-4">
                                <form action="produkt.php?prodId=<?php echo $_GET["prodId"]; ?>" method="post">
                                    <input class="rounded-2 me-2" type="number" name="data[prodAntal]" value="1" min="1" placeholder="Mængde" required>
                                    <input type="hidden" name="data[prodNavn]" value="<?php echo $produkt->prodNavn ?>">
                                    <input type="hidden" name="data[prodBillede]" value="<?php echo $produkt->prodBillede ?>">
                                    <input type="hidden" name="data[prodPris]" value="<?php echo $produkt->prodPris ?>">
                                    <button class="btn btn-customSecondary rounded-circle" type="submit">
                                        <button type="button" class="btn btn-customSecondary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <i class="fa-sharp text-light fa-solid fa-basket-shopping"></i>
                                        </button>
                                    </button>
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tilføjet til Kurv</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    ...
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fortsæt</button>
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

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<?php include "includes/footer.php"; ?>

<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>