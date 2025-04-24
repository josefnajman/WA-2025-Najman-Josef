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
            $desription = htmlspecialchars($_POST['description']);
            $date = htmlspecialchars($_POST['date']);
            $completion = htmlspecialchars($_POST['completion']);
            $priority = htmlspecialchars($_POST['priority'])
             
            $imagePaths = [];
            if (!empty($_FILES['images']['name'][0])) {
                 $uploadDir = '../public/images/';
                 foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
                     $filename = basename($_FILES['images']['name'][$key]);
                     $targetPath = $uploadDir . $filename;
 
                     if (move_uploaded_file($tmp_name, $targetPath)) {
                         $imagePaths[] = '/public/images/' . $filename; 
                    }
                }
            }
 
 
             if ($this->ToDoModel->create($name, $desription, $date, $completion, $priority, $imagePaths)) {
                 header("Location: ../controllers/todo_list.php");
                 exit();
             } else {
                 echo "Chyba při ukládání údajů.";
             }
         }
     }
 
     public function listToDo() {
         $todo = $this->ToDoModel->getAll();
         include '../views/records/todo_list.php';
     }
 }
 
// Volání metody při odeslání formuláře
$controller = new ToDoController();
$controller->createToDo();