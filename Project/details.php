[5:09 AM] Nanda Rizky Nandara Utomo
<?php
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
        <div class="col-3">
            <h3>Schoen overzicht</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <table class="table">
                <tr>
                    <th scope="row">Soort</th>
                    <td><?=$shoe['soort']?></td>
                </tr>
                <tr>
                    <th scope="row">Merk</th>
                    <td><?=$shoe['merk']?></td>
                </tr>
                <tr>
                    <th scope="row">Type</th>
                    <td><?=$shoe['type']?></td>
                </tr>
                <tr>
                    <th scope="row">maat</th>
                    <td><?=$shoe['maat']?></td>
                </tr>
                <tr>
                    <th scope="row">Prijs</th>
                    <td>&euro;<?=$shoe['prijs']?></td>
                </tr>
                <tr>
                    <th scope="row">Voorraad</th>
                    <td><?=$shoe['voorraad']?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>
</html>
 