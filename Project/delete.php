[5:09 AM] Nanda Rizky Nandara Utomo
<?php
session_start();
include 'db.php';
global $db;
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if ($id) {
    $query = $db->prepare('DELETE FROM schoenen WHERE id = :id');
    $query->bindParam('id', $id);
    if ($query->execute()) {
        $_SESSION['message'] = "De schoen is verwijderd";
    } else {
        $_SESSION['message'] = "Er is wat mis gegaan met het verwijderen";
    }
    header('Location: index.php');
} else {
    die("Error: Page not found");
}