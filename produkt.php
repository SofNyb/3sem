<?php
require "settings/init.php";

if(!empty ($_GET ["type"])) {
    if ($_GET["type"] == "slet") {
        $id = $_GET["id"];
        $db->sql("DELETE FROM bogreolen WHERE prodID = :prodId", [":prodId"=>$id], false);

        header("Location: produkt.php");
    }
}

$produkter = $db->sql("SELECT  FROM produkter WHERE prodId='1'");
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
</head>