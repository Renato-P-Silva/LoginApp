<form class="form-signin" method="POST">
  <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
  <img class="mb-4" src="<?php echo base_url(); ?>/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
  <h1 class="h3 mb-3 font-weight-normal">Cadastrar Usuário</h1>
  <label for="inputPassword" class="sr-only">Nome de Usuário</label>
  <input type="text" id="nome" name="nome" class="form-control" placeholder="Nome de Usuário" required autofocus value="<?php echo set_value('nome'); ?>" >
  <label for="inputEmail" class="sr-only">Endereço de E-mail</label>
  <input type="email" id="email" name="email" class="form-control" placeholder="Endereço de E-mail" required value="<?php echo set_value('email'); ?>">
  <label for="inputPassword" class="sr-only">Senha</label>
  <input type="password" id="senha" name="senha" class="form-control" placeholder="Senha" required value="<?php echo set_value('senha'); ?>">
  <label for="confirmeSenha" class="sr-only">Confirmar Senha</label>
  <input type="password" id="confirmeSenha" name="confirmeSenha" class="form-control" placeholder="Confirmar Senha" required value="<?php echo set_value('confirmeSenha'); ?>">
  <div class="checkbox mb-3">
    <label>
      <input type="checkbox" value="remember"> Lembrar-me
    </label>
  </div>
  <button name="register" class="btn btn-primary btn-block" type="submit">Cadastrar</button>
</form>
