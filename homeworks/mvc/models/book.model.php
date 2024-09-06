<?php

class BookModel
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function create($title, $author, $isbn, $publish_year, $copies, $quantity, $topics)
    {
        $sql = "INSERT INTO book (title, author, isbn, publish_year, copies, quantity, topics) 
                VALUES (:title, :author, :isbn, :publish_year, :copies, :quantity, :topics)";
        $stmt = $this->db->prepare($sql);

        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':author', $author);
        $stmt->bindParam(':isbn', $isbn);
        $stmt->bindParam(':publish_year', $publish_year);
        $stmt->bindParam(':copies', $copies);
        $stmt->bindParam(':quantity', $quantity);
        $stmt->bindParam(':topics', $topics);

        return $stmt->execute();
    }

    public function read($id)
    {
        $sql = "SELECT * FROM book WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $title, $author, $isbn, $publish_year, $copies, $quantity, $topics)
    {
        $sql = "UPDATE book SET title = :title, author = :author, isbn = :isbn, 
                publish_year = :publish_year, copies = :copies, quantity = :quantity, topics = :topics
                WHERE id = :id";
        $stmt = $this->db->prepare($sql);

        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':author', $author);
        $stmt->bindParam(':isbn', $isbn);
        $stmt->bindParam(':publish_year', $publish_year);
        $stmt->bindParam(':copies', $copies);
        $stmt->bindParam(':quantity', $quantity);
        $stmt->bindParam(':topics', $topics);
        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM book WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function getAllBooks()
    {
        $sql = "SELECT id as 'No.', title as Titulo, author as Autor, isbn as ISBN, publish_year as 'Año de publicacion', topics as Temas FROM book";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
