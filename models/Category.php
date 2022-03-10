<?php 

class Category {
    private $conn;
    private $table = 'categories';

    // Properties
    public $id;
    public $name;
    public $created_at;

    function __construct($db)
    {
        $this->conn = $db;
    }
  public function read()
    {
     $query = 'SELECT
        id,
        name,
        created_at
      FROM
        ' . $this->table . '
      ORDER BY
        created_at DESC';
    
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    // die(print_r($stmt->execute()));
    $row =$stmt->fetch(PDO::FETCH_ASSOC );
    // die(print_r($row));
    return $stmt;
  }
  public function read_single(){
    $query = 'SELECT
    id,
    name
  FROM
          ' . $this->table . '
      WHERE id = '.$this->id.'
      LIMIT 0,1';
      $stmt=$this->conn->prepare($query);
      $stmt->execute();
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      return $row;
  }
  public function create(){
     $query = 'INSERT INTO ' .
      $this->table . '
    SET
      name = :name';
      $stmt = $this->conn->prepare($query);

      $this->name = $this->name;

       // Bind data
     $stmt-> bindParam(':name', $this->name);

  // Execute query
      if($stmt->execute()) {
        return true;
      }
  }

  public function update($data) {
    $query = 'UPDATE ' .
    $this->table . '
  SET
    name = :name
    WHERE
    id = :id';
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':name', $data->name);
    $stmt->bindParam(':id', $data->id);

    if($stmt->execute()) {
      return true;
    }
  }
  public function delete($id) {
    // Create query
    $query =" DELETE FROM   $this->table   WHERE id = $id";

    $stmt = $this->conn->prepare($query);
    if($stmt->execute()) {
      return true;
    }



  
  }
}