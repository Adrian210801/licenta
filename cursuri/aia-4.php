<?php
session_start();
include_once "../bazadedate/php/config.php"; // Includem fișierul de configurare pentru baza de date

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
            <a href="../index.php" id="navbar__logo"><img src="poze/logo.png" class="navbar-img"></a>
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
                    <a href="/" class="navbar__links">Cursuri</a>
                </li>
                <li class="navbar__btn">
                    <a href="../bazadedate/users.php" class="button"><span class="material-symbols-outlined">chat</span></a>
                </li>
                <li class="navbar__btn">
                <a href="../bazadedate/users.php" class="button"><?php echo $username; ?></a>
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
        <div class="div-content">
        </div>
        <h1>AUTOMATICA ANUL 4 - Semestrul 2</H1>
        <div class="cursuri-blockuri-1">    
        <a href="curs.php"><span class="cursuri">
            <img src="poze/curs.jpg" alt="descriere imagine" class="cursuri-image">
            <div class="curs-descriere">
                <div>Tehnici de diagnoza si decizie</div>
                <div>Prof. univ. dr Oana Calin</div>
            </div>
        </span></a>
        <a href="curs.php"><span class="cursuri">
            <img src="poze/curs.jpg" alt="descriere imagine" class="cursuri-image">
            <div class="curs-descriere">
                <div>Aplicatii Multimedia</div>
                <div>Prof. Asoc. Bogdan Gamalet</div>
            </div>
        </span></a>
        <a href="curs.php"><span class="cursuri">
            <img src="poze/curs.jpg" alt="descriere imagine" class="cursuri-image">
            <div class="curs-descriere">
                <div>Inteligenta Artificiala</div>
                <div>Prof. univ. dr Ioana Armas</div>
            </div>
        </span></a>
        <a href="curs.php"><span class="cursuri">
            <img src="poze/curs.jpg" alt="descriere imagine" class="cursuri-image">
            <div class="curs-descriere">
                <div>Instrumentatie virtuala</div>
                <div>Conf.univ.dr Eugenie Posdarascu</div>
            </div>
        </span></a>
        <a href="curs.php"><span class="cursuri">
            <img src="poze/curs.jpg" alt="descriere imagine" class="cursuri-image">
            <div class="curs-descriere">
                <div>Medii software orientate pe aplicatii</div>
                <div>Lector univ.dr.ing Adrian Costescu</div>
            </div>
        </span></a>
        <a href="curs.php"><span class="cursuri">
            <img src="poze/curs.jpg" alt="descriere imagine" class="cursuri-image">
            <div class="curs-descriere">
                <div>Proiect SIC</div>
                <div>C.P.I. Ion Dumitru</div>
            </div>
        </span></a>
        </div>
        
        <h1>AUTOMATICA ANUL 4 - Semestrul 1</H1>
        <div class="cursuri-blockuri-2">
        <a href="curs.php"><span class="cursuri">
            <img src="poze/curs.jpg" alt="descriere imagine" class="cursuri-image">
            <div class="curs-descriere">
                <div>Ingineria sistemelor de programe</div>
                <div>Lector univ.dr.ing. Serbanescu Liviu</div>
            </div>
        </span></a>
        <a href="curs.php"><span class="cursuri">
            <img src="poze/curs.jpg" alt="descriere imagine" class="cursuri-image">
            <div class="curs-descriere">
                <div>Logica computationala</div>
                <div>Prof. univ. dr. ing. Armas Ioana</div>
            </div>
        </span></a>
        <a href="curs.php"><span class="cursuri">
            <img src="poze/curs.jpg" alt="descriere imagine" class="cursuri-image">
            <div class="curs-descriere">
                <div>Retele de calculatoare</div>
                <div>Conf. univ. dr. Iulian Arama</div>
            </div>
        </span></a>
        <a href="curs.php"><span class="cursuri">
            <img src="poze/curs.jpg" alt="descriere imagine" class="cursuri-image">
            <div class="curs-descriere">
                <div>Sisteme inteligente de control</div>
                <div>C.P.I. Ion Dumitru</div>
            </div>
        </span></a>
        <a href="curs.php"><span class="cursuri">
            <img src="poze/curs.jpg" alt="descriere imagine" class="cursuri-image">
            <div class="curs-descriere">
                <div>S.F.R.N.</div>
                <div>Lector univ. dr. ing. Gogoncea Dan</div>
            </div>
        </span></a>
        <a href="curs.php"><span class="cursuri">
            <img src="poze/curs.jpg" alt="descriere imagine" class="cursuri-image">
            <div class="curs-descriere">
                <div>Sisteme in timp real</div>
                <div>Lector univ.dr.ing. Cornel Eugen</div>
            </div>
        </span></a>
        </div>
        
        </div>
    </div>

    <!--AICI ESTE FOOTERUL-->
    
    <div class="footer__container">
        <div class="footer__items"> 
            Sunteti conectat in calitate de <a href="../bazadedate/login.php"><?php echo $username; ?></a><BR>
            Portal E-learning AUTOMATICA
        </div>
    </div>



</div>
    <script src="scripts/scripts.js"></script>
</body>
</html>