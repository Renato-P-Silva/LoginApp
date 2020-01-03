<?php
class AuthController extends CI_Controller{

  public function login(){

    if (isset($_POST['login'])) {
      $validLogin = array(

        array(
                'field' => 'email',
                'label' => 'E-mail',
                'rules' => 'required',
                'errors' => array(
                              'required' => 'Você deve fornecer um %s.',
                            ),
        ),
        array(
                'field' => 'senha',
                'label' => 'Senha',
                'rules' => 'required|min_length[8]',
                'errors' => array(
                              'required' => 'Você deve fornecer uma %s.',
                              'min_length' => '{field} deve ter pelo menos {param} caracteres.',
                            ),
        )
      );

      $this->form_validation->set_rules($validLogin);

      if ($this->form_validation->run() == TRUE) {
        $email = $_POST['email'];
        $senha = md5($_POST['senha']);

        $this->db->select('*');
        $this->db->from('users');
        $this->db->where(array('email' => $email, 'senha' => $senha ));
        $query = $this->db->get();
        $user = $query->row();
        //var_dump($user->email);

        if (isset($user->email)) {
          $this->session->set_flashdata("success", "Você esta logado!");

          //atribui valores as variaveis de sessao
          $_SESSION['user_logged'] = TRUE;
          $_SESSION['username'] = $user->nome;

          //redireciona
          redirect("minhaConta", "refresh");
        }else{
          $this->session->set_flashdata("danger", "Email ou senha incorretos!");
          //redireciona
          //redirect("login", "refresh");
        }

      }
    }

    $this->template->load('template', 'LoginView');

  }

  public function logout(){
    unset($_SESSION);
    session_destroy();
    redirect("login", "refresh");
  }

  public function register(){
    if (isset($_POST['register'])) {
      $validRegister = array(
        array(
                'field' => 'nome',
                'label' => 'Nome de Usuário',
                'rules' => 'required|min_length[6]',
                'errors' => array(
                              'required' => 'Você deve fornecer um %s.',
                              'min_length' => '{field} deve ter pelo menos {param} caracteres.',
                            ),
        ),
        array(
                'field' => 'email',
                'label' => 'E-mail',
                'rules' => 'required|is_unique[users.email]',
                'errors' => array(
                              'required' => 'Você deve fornecer um %s.',
                              'is_unique' => '{field} já esta cadastrado, utilize outro {field}. ',
                            ),
        ),
        array(
                'field' => 'senha',
                'label' => 'Senha',
                'rules' => 'required|min_length[8]',
                'errors' => array(
                              'required' => 'Você deve fornecer uma %s.',
                              'min_length' => '{field} deve ter pelo menos {param} caracteres.',
                            ),
        ),

        array(
                'field' => 'confirmeSenha',
                'label' => 'Confirmar Senha',
                'rules' => 'required|min_length[8]|matches[senha]',
                'errors' => array(
                              'required' => 'Você deve fornecer uma %s.',
                              'min_length' => '{field} deve ter pelo menos {param} caracteres.',
                              'matches' => 'Senha e contrasenha estão divergindo.',
                            ),
        )
      );

      $this->form_validation->set_rules($validRegister);


      if ($this->form_validation->run() == TRUE) {
        //echo "formulario validado";
        $data = array(
          'nome' => $_POST['nome'],
          'email' => $_POST['email'],
          'senha' => md5($_POST['senha']),
        );

        $this->db->insert('users', $data);

        $this->session->set_flashdata("success", "Cadastro realizado com sucesso!");
        redirect("login", "refresh");
      }
    }

    $this->template->load('template', 'RegisterView');

  }


  public function minhaConta(){
    $this->template->load('template', 'MinhaContaView');

    if (!isset($_SESSION['user_logged'])) {
      $this->session->set_flashdata("error", "Porfavor, faça login para visualizar a página!");
      redirect("login", "refresh");
    }
  }

}
