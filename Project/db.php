[5:09 AM] Nanda Rizky Nandara Utomo
<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=schoenenvoorraad', 'root', '');
} catch (PDOException $e) {
    die('Error: ' . $e->getMessage());
}
 