
<form class="form-signin" action="" method="POST">

  <!-- mensagem mostrada após um cadastrado bem sucedido -->
  <?php if(isset($_SESSION['success'])){ ?>
    <div class="alert alert-success">
      <?php echo $_SESSION['success']; ?>
    </div>
  <?php } ?>

  <!-- mensagem mostrada após um cadastradobem sucedido -->
  <?php if(isset($_SESSION['danger'])){ ?>
    <div class="alert alert-danger">
      <?php echo $_SESSION['danger']; ?>
    </div>
  <?php } ?>

  <!-- mensagens das validações -->
   <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
  <img class="mb-4" src="<?php echo base_url(); ?>/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
  <h1 class="h3 mb-3 font-weight-normal">Porfavor faça login</h1>

  <label for="email" class="sr-only">Endereço de E-mail</label>
  <!-- <?php echo form_error('email'); ?> -->
  <input type="email" id="email" name="email" class="form-control" placeholder="Endereço de E-mail" value="<?php echo set_value('email'); ?>" autofocus>
  <label for="senha" class="sr-only">Senha</label>
  <!-- <?php echo form_error( 'senha' ); ?> -->
  <input type="password" id="senha" name="senha" class="form-control" placeholder="Senha" value="<?php echo set_value('senha'); ?>" >
  <div class="checkbox mb-3">
    <label>
      <input type="checkbox" value="remember-me"> Lembrar-me
    </label>
  </div>
  <button name="login" class="btn btn-primary btn-block" type="submit">Entrar</button>
</form>
