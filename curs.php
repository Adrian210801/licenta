<?php
session_start();
include_once "bazadedate/php/config.php"; // Includem fișierul de configurare pentru baza de date
if (!isset($_SESSION['unique_id'])) {
    // Redirect to the login page if no user is logged in
    header("Location: index.php");
    exit();
}

// Verifică dacă utilizatorul este conectat și recuperează numele acestuia
$username = 'Vizitator';
$admin = 0;
if (isset($_SESSION['unique_id'])) {
    $unique_id = $_SESSION['unique_id'];
    $sql = mysqli_query($conn, "SELECT fname, lname, admin FROM users WHERE unique_id = '{$unique_id}'");
    if (mysqli_num_rows($sql) > 0) {
        $row = mysqli_fetch_assoc($sql);
        $username = $row['fname'] . ' ' . $row['lname'];
        $admin = $row['admin'];
    }
}
?>
<?php include_once "header.php"; ?>
<body>
<div class="wrapper">
    <!--AICI ESTE NAVBARUL-->
    <nav class="navbar">
        <div class="navbar__container">
            <a href="" id="navbar__logo"><img src="poze/logo.png" class="navbar-img"></a>
            <div class="navbar__toggle" id="mobile-menu">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
            <ul class="navbar__menu">
                <li class="navbar__item">
                    <a href="/" class="navbar__links">ACASA</a>
                </li>
                <li class="navbar__item">
                    <a href="/" class="navbar__links navbar__tablou">Tablou de Control</a>
                </li>
                <li class="navbar__item">
                    <a href="cursuri.php" class="navbar__links">Cursuri</a>
                </li>
                 
                <li class="navbar__btn">
                    <a href="bazadedate/users.php" class="button"><span class="material-symbols-outlined">chat</span></a>
                </li>
                <li class="navbar__btn">
                    <a href="bazadedate/users.php" class="button"><?php echo $username; ?></a>
                </li>
            </ul>
        </div>
    </nav>

    <!--AICI ESTE HEADERUL DE SUB NAVBAR-->
    <!--
    <header class="header-style">
        <div class="header-div-poza">
            <div class="header-anunt">
                PORTAL E-LEARNING AUTOMATICA
            </div>
            <div class="header-anunt2">
                TABLOU DE BORD / PAGINA PRINCIPALA
            </div>
        </div>
    </header>
        -->
    <!--AICI ESTE CONTINUTUL PAGINII-->
    
    <div class="div-content-principala">
        <div class="div-lista-principala">
       <aside class="sidebar">     
        <ul class="js-lista">
        <li>
            <span class="material-symbols-outlined">menu_book</span>
            <a href="#">AUTOMATICA SI INFORMATICA APLICATA</a>
        </li>
        <hr>
        <li>
            <span class="material-symbols-outlined">menu_book</span>
            <a href="#">Cursuri</a>
        </li>
        <hr>      
        <li>
            <span class="material-symbols-outlined">menu_book</span>
            <a href="#">ANUL 1 - AIA</a>
        </li>
        <li>
            <span class="material-symbols-outlined">menu_book</span>
            <a href="#">ANUL 2 - AIA</a>
        </li>
        <li>
            <span class="material-symbols-outlined">menu_book</span>
            <a href="#">ANUL 3 - AIA</a>
        </li>
        <li>
            <span class="material-symbols-outlined">menu_book</span>
            <a href="#">ANUL 4 - AIA</a>
        </li>
        <li>
            <span class="material-symbols-outlined">menu_book</span>
            <a href="#">MASTER - ANUL 1</a>
        </li>
        <li>
            <span class="material-symbols-outlined">menu_book</span>
            <a href="#">MASTER - ANUL 2</a>
        </li>
        </ul>
     </aside>
        </div>
        <div class="div-content-1">
            <div class="div-introduce-curs">
            <h2>INTRODUCETI UN NOU CURS</h2>
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <input class="input-introduce-curs">
                <input type="file" name="pdf" accept=".pdf" required>
                <button class="button-1">Adaugati</button>
            </form>
            </div>
            <h1 class="div-h1">TEHNICI DE DIAGNOZA SI DIAGNOSTICARE</h1>
            <embed src="cursuri/TDD Final.pdf" type="application/pdf" width="1600px" height="770px" />
        </div>
    </div>
      

    <!--AICI ESTE FOOTERUL-->
    
    <div class="footer__container">
        <div class="footer__items"> 
        Sunteti conectat in calitate dea <a href="bazadedate/users.php"><?php echo $username; ?></a><BR>
        Portal E-learning AUTOMATICA
        </div>
    </div>



</div>
    <script src="scripts/scripts.js"></script>
</body>
</html>