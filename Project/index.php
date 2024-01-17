[5:10 AM] Nanda Rizky Nandara Utomo
<?php
session_start();
include 'db.php';
global $db;
$query = $db->prepare('SELECT * FROM schoenen');
$query->execute();
$shoes = $query->fetchAll(PDO::FETCH_ASSOC);
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
    <?php if (isset($_SESSION['message'])): ?>
        <div class="row">
            <div class="col">
                <div class="alert alert-secondary" role="alert">
                    <?= $_SESSION['message'] ?>
                </div>
            </div>
        </div>
        <?php unset($_SESSION['message']); ?>
        <?php endif; ?>
    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">nummer</th>
                    <th scope="col">merk</th>
                    <th scope="col">type</th>
                    <th scope="col">prijs(euro)</th>
                    <th scope="col">details</th>
                    <th scope="col">update</th>
                    <th scope="col">delete</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($shoes as $shoe) : ?>
                    <tr>
                        <td><?= $shoe['id'] ?></td>
                        <td><?= $shoe['merk'] ?></td>
                        <td><?= $shoe['type'] ?></td>
                        <td><?= $shoe['prijs'] ?></td>
                        <td><a href="details.php?id=<?= $shoe['id'] ?>" class="btn btn-primary">details</a></td>
                        <td><a href="update.php?id=<?= $shoe['id'] ?>" class="btn btn-warning">update</a></td>
                        <td><a href="delete.php?id=<?= $shoe['id'] ?>" class="btn btn-danger">delete</a></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <a href="insert.php" class="btn btn-primary">insert</a>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>
</html>
 