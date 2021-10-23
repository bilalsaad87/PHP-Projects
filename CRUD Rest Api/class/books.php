<?php
    class Book{

        // Connection
        private $conn;

        // Table
        private $db_table = "books";

        // Columns
        public $id;
        public $title;
        public $author;
        public $desc;
        public $year;
        public $created;

        // Db connection
        public function __construct($db){
            $this->conn = $db;
        }

        // GET ALL
        public function getBooks(){
            $sqlQuery = "SELECT 
                            id, 
                            title, 
                            author, 
                            description, 
                            year, 
                            created
                         FROM " . $this->db_table . "";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }

        // CREATE
        public function createBook(){
            $sqlQuery = "INSERT INTO
                        ". $this->db_table ."
                    SET
                        title = :title, 
                        author = :author, 
                        description = :desc, 
                        year = :year, 
                        created = :created";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            // sanitize
            $this->title=htmlspecialchars(strip_tags($this->title));
            $this->author=htmlspecialchars(strip_tags($this->author));
            $this->desc=htmlspecialchars(strip_tags($this->desc));
            $this->year=htmlspecialchars(strip_tags($this->year));
            $this->created=htmlspecialchars(strip_tags($this->created));
        
            // bind data
            $stmt->bindParam(":title", $this->title);
            $stmt->bindParam(":author", $this->author);
            $stmt->bindParam(":desc", $this->desc);
            $stmt->bindParam(":year", $this->year);
            $stmt->bindParam(":created", $this->created);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }

        // READ single
        public function getSingleBook(){
            $sqlQuery = "SELECT id, title, author, description, year, created FROM
                        ". $this->db_table ."
                    WHERE 
                       id = ?
                    LIMIT 0,1";

            $stmt = $this->conn->prepare($sqlQuery);

            $stmt->bindParam(1, $this->id);

            $stmt->execute();

            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $this->title = $dataRow['title'];
            $this->author = $dataRow['author'];
            $this->desc = $dataRow['description'];
            $this->year = $dataRow['year'];
            $this->created = $dataRow['created'];
        }        

        // UPDATE
        public function updateBook(){
            $sqlQuery = "UPDATE
                        ". $this->db_table ."
                    SET
                        title = :title, 
                        author = :author, 
                        description = :desc, 
                        year = :year, 
                        created = :created
                    WHERE 
                        id = :id";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->title=htmlspecialchars(strip_tags($this->title));
            $this->author=htmlspecialchars(strip_tags($this->author));
            $this->desc=htmlspecialchars(strip_tags($this->desc));
            $this->year=htmlspecialchars(strip_tags($this->year));
            $this->created=htmlspecialchars(strip_tags($this->created));
            $this->id=htmlspecialchars(strip_tags($this->id));
        
            // bind data
            $stmt->bindParam(":title", $this->title);
            $stmt->bindParam(":author", $this->author);
            $stmt->bindParam(":desc", $this->desc);
            $stmt->bindParam(":year", $this->year);
            $stmt->bindParam(":created", $this->created);
            $stmt->bindParam(":id", $this->id);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }

        // DELETE
        function deleteBook(){
            $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = ?";
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->id=htmlspecialchars(strip_tags($this->id));
        
            $stmt->bindParam(1, $this->id);
        
            if($stmt->execute()){
                return true;
            }
            return false;
        }

    }
?>