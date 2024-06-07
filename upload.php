<?php
// Definește directorul unde vor fi încărcate fișierele
$target_dir = "cursuri/";

// Asigură-te că directorul de upload există
if (!is_dir($target_dir)) {
    mkdir($target_dir, 0777, true);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $target_file = $target_dir . basename($_FILES["pdf"]["name"]);
    $uploadOk = 1;
    $pdfFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Verifică dacă fișierul este un PDF
    if($pdfFileType != "pdf") {
        echo "Sorry, only PDF files are allowed.";
        $uploadOk = 0;
    }

    // Verifică dacă $uploadOk este setat la 0 din cauza unei erori
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // Dacă totul este ok, încarcă fișierul
    } else {
        if (move_uploaded_file($_FILES["pdf"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars(basename($_FILES["pdf"]["name"])). " has been uploaded with title: " . htmlspecialchars($title);
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>
