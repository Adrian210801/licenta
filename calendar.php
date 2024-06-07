<?php
session_start();
include_once "bazadedate/php/config.php"; // Includem fișierul de configurare pentru baza de date

// Verifică dacă utilizatorul este conectat și recuperează numele acestuia
$username = 'Vizitator';
if (isset($_SESSION['unique_id'])) {
    $unique_id = $_SESSION['unique_id'];
    $sql = mysqli_query($conn, "SELECT fname, lname FROM users WHERE unique_id = '{$unique_id}'");
    if (mysqli_num_rows($sql) > 0) {
        $row = mysqli_fetch_assoc($sql);
        $username = $row['fname'] . ' ' . $row['lname'];
    }
}
?>
<?php include_once "header.php"; ?>
<body>
<div class="wrapper">
    <!--AICI ESTE NAVBARUL-->
    <nav class="navbar">
        <div class="navbar__container">
            <a href="index.php" id="navbar__logo"><img src="poze/logo.png" class="navbar-img"></a>
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
        <div class="event-form">
        <label for="event-date">Data:</label>
        <input type="date" id="event-date" required>
        <label for="event-text">Eveniment:</label>
        <input type="text" id="event-text" placeholder="Descriere eveniment" required>
        <button id="add-event">Adaugă Eveniment</button>
        </div>
        <div class="calendar-container">
        <div class="navigation">
        <button id="prev-month">Previous</button>
        <div id="current-month-year"></div>
        <button id="next-month">Next</button>
        </div>
         <div class="calendar" id="calendar"></div>
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