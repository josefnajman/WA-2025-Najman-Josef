<?php
require_once '../models/Database.php';
require_once '../models/User.php';

class UserController {
    private $db;
    private $userModel;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->userModel = new User($this->db);
    }

    public function createUser() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = htmlspecialchars($_POST['username']);
            $email = htmlspecialchars($_POST['email']);
            $NAME = htmlspecialchars($_POST['NAME']);
            $surname = htmlspecialchars($_POST['surname']);
            $password = htmlspecialchars($_POST['password']);
            $passwordagain = htmlspecialchars($_POST['passwordagain']);


            // Uložení uživatele do DB - dočasné řešení, než budeme mít výpis knih
            if ($this->userModel->create($username, $email, $name, $surname, $password, $passwordagain)) {
                header("Location: ../controllers/register.php");
                exit();
            } else {
                echo "Chyba údaje.";
            }
        }
    }

    public function listUsers () {
        $users = $this->userModel->getAll();
        include '../views/auth/register.php';
    }
}

// Volání metody při odeslání formuláře
$controller = new UserController();
$controller->createUser();