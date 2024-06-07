
<?php include_once "header.php"; ?>
<body>
<div class="wrapper">
    <section class="form signup">
      <header>Inregistrare Student</header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text">
        <?php
            if (isset($_SESSION['error'])) {
                echo $_SESSION['error'];
                unset($_SESSION['error']);
            }
            ?>
        </div>
        <div class="name-details">
          <div class="field input">
            <label>Prenume</label>
            <input type="text" name="fname" placeholder="Prenume" required>
          </div>
          <div class="field input">
            <label>Nume</label>
            <input type="text" name="lname" placeholder="Nume de familie" required>
          </div>
        </div>
        <div class="field input">
          <label>Adresa de email</label>
          <input type="text" name="email" placeholder="Introduceti email" required>
        </div>
        <div class="field input">
          <label>Parola</label>
          <input type="password" name="password" placeholder="Introduceti parola" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field image">
          <label>Selecteaza imaginea</label>
          <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Inregistreaza elev">
        </div>
      </form>
      <div class="link"> <a href=""></a></div>
    </section>
  </div>
    <script src="javascript/parola-ascunsa.js"></script>
    <script src="javascript/signup.js"></script>

</body>
</html>