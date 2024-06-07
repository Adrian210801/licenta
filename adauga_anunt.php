<?php
session_start();
include_once "bazadedate/php/config.php";

if (isset($_SESSION['unique_id']) && isset($_POST['text'])) {
    $unique_id = $_SESSION['unique_id'];
    $text = mysqli_real_escape_string($conn, $_POST['text']);

    $sql = "INSERT INTO anunturi (unique_id, text) VALUES ('$unique_id', '$text')";
    if (mysqli_query($conn, $sql)) {
        echo "Anunt adaugat cu succes!";
    } else {
        echo "Eroare: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
