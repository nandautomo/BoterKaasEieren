[5:11 AM] Nanda Rizky Nandara Utomo
<?php
session_start();
include 'db.php';
global $db;
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if ($id) {
    $query = $db->prepare('SELECT * FROM schoenen WHERE id = :id');
    $query->bindParam('id', $id);
    $query->execute();
    $shoe = $query->fetch(PDO::FETCH_ASSOC);
} else {
    die("Error: Page not found");
}
if (isset($_POST['submit'])) {
    if (!empty($_POST['sort']) && !empty($_POST['brand']) && !empty($_POST['type']) && !empty($_POST['size'])
        && !empty($_POST['price']) && !empty($_POST['stock'])) {
        $size = filter_input(INPUT_POST, 'size', FILTER_VALIDATE_INT);
        $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
        $stock = filter_input(INPUT_POST, 'stock', FILTER_VALIDATE_INT);
        if (!$size || !$price || !$stock) {
            $alert = "Vul geldig getallen in";
        } else {
            if ($stock > 0) {
                $query = $db->prepare('UPDATE schoenen SET soort = :sort, merk = :brand, type = :type, maat = :size, prijs = :price, voorraad= :stock WHERE id = :id');
                $query->bindParam('sort', $_POST['sort']);
                $query->bindParam('brand', $_POST['brand']);
                $query->bindParam('type', $_POST['type']);
                $query->bindParam('size', $size);
                $query->bindParam('price', $price);
                $query->bindParam('stock', $stock);
                $query->bindParam('id', $id);
                if ($query->execute()) {
                    $_SESSION['message'] = "De schoen is bijgewerkt";
                    header('Location: index.php');
                } else {
                    $alert = "Er is wat mis gegaan";
                }
            } else {
                $alert = "De voorraad moet groter dan 0 zijn";
            }
        }
    } else {
        $alert = "Voer alle velden in";
    }
} else {
    $alert = "";
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>schoenenvoorraad</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col">
            <h3>Schoen aanpassen</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <form method="post">
                <div class="mb-3">
                    <label for="sort" class="form-label">Soort</label>
                    <input type="text" name="sort" id="sort" class="form-control" value="<?= $shoe['soort'] ?>">
                </div>
                <div class="mb-3">
                    <label for="brand" class="form-label">Merk</label>
                    <input type="text" name="brand" id="brand" class="form-control" value="<?= $shoe['merk'] ?>">
                </div>
                <div class="mb-3">
                    <label for="type" class="form-label">Type</label>
                    <input type="text" name="type" id="type" class="form-control" value="<?= $shoe['type'] ?>">
                </div>
                <div class="mb-3">
                    <label for="size" class="form-label">Maat</label>
                    <input type="number" name="size" id="size" class="form-control" value="<?= $shoe['maat'] ?>">
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Prijs</label>
                    <input type="number" name="price" id="price" class="form-control" step="0.01"
                           value="<?= $shoe['prijs'] ?>">
                </div>
                <div class="mb-3">
                    <label for="stock" class="form-label">Voorraad</label>
                    <input type="number" name="stock" id="stock" class="form-control" value="<?= $shoe['voorraad'] ?>">
                </div>
                <button class="btn btn-primary" name="submit">Verzenden</button>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <p><?= $alert ?></p>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>
</html>
 