<?php
require_once '../models/Database.php';
require_once '../models/ToDo.php';
 
class ToDoController {
    private $db;
    private $todoModel;
 
    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->todoModel = new ToDo($this->db);
    }
 
    public function createToDo() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = htmlspecialchars($_POST['name']);
            $description = htmlspecialchars($_POST['description']);
            $date = htmlspecialchars($_POST['date']);
            $completion = isset($_POST['completion']) ? 1 : 0;
            $priority = htmlspecialchars($_POST['priority']);
             
            $imagePaths = [];
            if (!empty($_FILES['images']['name'][0])) {
                $uploadDir = '../public/images/';
                if (!file_exists($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }
                
                foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
                    $filename = uniqid() . '_' . basename($_FILES['images']['name'][$key]);
                    $targetPath = $uploadDir . $filename;
 
                    if (move_uploaded_file($tmp_name, $targetPath)) {
                        $imagePaths[] = '/public/images/' . $filename;
                    }
                }
            }
 
            if ($this->todoModel->create($name, $description, $date, $completion, $priority, $imagePaths)) {
                header("Location: todo_list.php");
                exit();
            } else {
                echo "Chyba při ukládání údajů.";
            }
        }
    }
 
    public function listToDo() {
        $todo = $this->todoModel->getAll();
        include '../views/todos/todo_list.php';
    }
}
 
// Spuštění controlleru
$controller = new ToDoController();
if (isset($_GET['action']) && $_GET['action'] == 'create') {
    $controller->createToDo();
} else {
    $controller->listToDo();
}