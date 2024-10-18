<?php 
require_once './app/models/userModel.php';
require_once './app/views/authView.php';

class AuthController {

    private $model;
    private $view;

    public function __construct() {
        $this->model = new UserModel();
        $this->view = new AuthView();
    }

    public function showLogin(){
        return $this->view->showLogin();
    }

    public function login(){
        if(!isset($_POST['user']) || empty($_POST['user'])) {
            return $this->view->showLogin('Falta completar el nombre de usuario');
        }
        if(!isset($_POST['password']) || empty($_POST['password'])) {
            return $this->view->showLogin('Falta completar la contraseña');
        }

        $user = $_POST['user'];
        $password = $_POST['password'];

        $userFromDB = $this->model->getUserByUsername($user);

        if($userFromDB && password_verify($password, $userFromDB->password)){
            session_start();
            $_SESSION['ID_USER'] = $userFromDB->id;
            $_SESSION['EMAIL_USER'] = $userFromDB->email;
            $_SESSION['LAST_ACTIVITY'] = time();

            header('Location: ' . BASE_URL);
        }
        else {
            return $this->view->showLogin('Credenciales Incorrectas');
        }
    }

    public function logOut(){
        session_start();
        session_destroy();
        header('Location: ' . BASE_URL);
    }
}