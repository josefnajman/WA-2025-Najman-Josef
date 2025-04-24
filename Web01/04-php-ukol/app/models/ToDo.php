<?php
class ToDo {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function create($name, $description, $date, $completion, $priority, $images) {
        $sql = "INSERT INTO todo (name, description, date, completion, priority, images) 
                VALUES (:name, :description, :date, :completion, :priority, :images)";
        
        $stmt = $this->db->prepare($sql);
        
        return $stmt->execute([
            ':name' => $name,
            ':description' => $description,
            ':date' => $date,
            ':completion' => $completion,
            ':priority' => $priority,
            ':images' => json_encode($images)
        ]);
    }

    public function getAll() {
        $sql = "SELECT * FROM todo ORDER BY created_at DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
