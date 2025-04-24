<?php

class ToDo {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function create($name, $desription, $date, $completion, $images) {
        
        // Dvojtečka označuje pojmenovaný parametr => Místo přímých hodnot se používají placeholdery.
        // PDO je pak nahradí skutečnými hodnotami při volání metody execute().
        // Chrání proti SQL injekci (bezpečnější než přímé vložení hodnot).
        $sql = "INSERT INTO books (name, desription, date, completion, images) 
                VALUES (:name, :description, :date, :completion, :images)";
        
        $stmt = $this->db->prepare($sql);
        
        return $stmt->execute([
            ':name' => $name,
            ':description' => $description,
            ':date' => $date,
            ':completion' => $completion,
            ':images' => json_encode($images) // Ukládání obrázků jako JSON
        ]);
    }
}

    public function getAll() {
        $sql = "SELECT * FROM todo ORDER BY created_at DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }