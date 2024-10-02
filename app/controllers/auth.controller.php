<?php 
require_once './app/models/userModel.php';
require_once './app/views/authView.php';

class AuthController {
    public function __construct() {
        $this->model = new UserModel();
        $this->view = new AuthView();
    }

    public function showLogin(){
        // muestro el formulario de login 
        return $this->view->showLogin();
    }

    public function login(){
        if(!isset($_POST['email']) || empty($_POST['email'])) {
            return $this->view->showLogin('Falta completar el nombre de usuario');
        }
        if(!isset($_POST['password']) || empty($_POST['password'])) {
            return $this->view->showLogin('Falta completar la contraseña');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];

        // verificar que el usuario esta en la base de datos 
        $userFromDB = $this->model->getUserByUsername($email);

        if(password_verify($password, $userFromDB->password)){
            session_start();
            //guardo en la sesion el id del usuario
            $_SESSION['ID_USER'] = $userFromDB->id;
            $_SESSION['EMAIL_USER'] = $userFromDB->email;
            $_SESSION['LAST_ACTIVITY'] = time();

            //redirijo al home
            header('Location: ' . BASE_URL);
        }
        else {
            return $this->view->showLogin('Credenciales Incorrectas');
        }
    }
}