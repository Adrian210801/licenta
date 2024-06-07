<?php
session_start();
include_once "bazadedate/php/config.php";


if (isset($_SESSION['unique_id']) && isset($_POST['id'])) {
    $unique_id = $_SESSION['unique_id'];
    $id = intval($_POST['id']);

    $sql = "DELETE FROM anunturi WHERE id='$id' AND unique_id='$unique_id'";
    if (mysqli_query($conn, $sql)) {
        echo "Anunt sters cu succes!";
    } else {
        echo "Eroare: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
