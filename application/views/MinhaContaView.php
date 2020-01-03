<div class="text-center">
  <h3>Minha Conta</h3>

  <!-- mensagem mostrada após um cadastradobem sucedido -->
  <?php if(isset($_SESSION['success'])){ ?>
    <div class="alert alert-success">
      <?php echo $_SESSION['success']; ?>
    </div>
  <?php } ?>

  Olá, <?php echo $_SESSION['username']; ?>

  <br><br>
  <a href="logout">Logout</a>

</div>
