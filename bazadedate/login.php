<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: users.php");
  }
?>
<?php include_once "header.php"; ?>
<body>
    <div class="wrapper">
        <section class="form login">
        <header>Login</header>
        <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="error-text"></div>
            <div class="field input">
            <label>Adresa de mail</label>
            <input type="text" name="email" placeholder="Adresa de e-mail" required>
            </div>
            <div class="field input">
            <label>Parola</label>
            <input type="password" name="password" placeholder="Parola" required>
            <i class="fas fa-eye"></i>
            </div>
            <div class="field button">
            <input type="submit" name="submit" value="Continua">
            </div>
        </form>
        <div class="link"> <a href=""></a></div>
        </section>
    </div>
    
    <script src="javascript/parola-ascunsa.js"></script>
    <script src="javascript/login.js"></script>
</body>
</html>