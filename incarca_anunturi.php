<?php
session_start();
include_once "bazadedate/php/config.php";

$admin = 0;
if (isset($_SESSION['unique_id'])) {
    $unique_id = $_SESSION['unique_id'];
    $sql = mysqli_query($conn, "SELECT admin FROM users WHERE unique_id = '{$unique_id}'");
    if (mysqli_num_rows($sql) > 0) {
        $row = mysqli_fetch_assoc($sql);
        $admin = $row['admin'];
    }
}

$sql = mysqli_query($conn, "SELECT * FROM anunturi");
$anunturi = [];
while ($row = mysqli_fetch_assoc($sql)) {
    $anunturi[] = $row;
}

header('Content-Type: application/json');
echo json_encode(['admin' => $admin, 'anunturi' => $anunturi]);
?>
<?php echo "Hello, World!"; ?>