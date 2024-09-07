<?php

class BookController
{
    private $bookModel;

    public function __construct($db)
    {
        // Inyectar el modelo al controlador
        $this->bookModel = new BookModel($db);
    }

    // Método para crear un libro
    public function create(
        $title,
        $author,
        $isbn,
        $publish_year,
        $copies,
        $quantity,
        $topics
    ) {
        if ($this->bookModel->create(
            $title,
            $author,
            $isbn,
            $publish_year,
            $copies,
            $quantity,
            $topics
        )) {
            return "Book created successfully.";
        } else {
            return "Failed to create the book.";
        }
    }

    // Método para leer un libro
    public function read($id)
    {
        $book = $this->bookModel->read($id);
        if ($book) {
            return $book;
        } else {
            return "Book not found.";
        }
    }

    // Método para actualizar un libro
    public function update(
        $id,
        $title,
        $author,
        $isbn,
        $publish_year,
        $copies,
        $quantity,
        $topics
    ) {
        if ($this->bookModel->update(
            $id,
            $title,
            $author,
            $isbn,
            $publish_year,
            $copies,
            $quantity,
            $topics
        )) {
            return "Book updated successfully.";
        } else {
            return "Failed to update the book.";
        }
    }

    // Método para eliminar un libro
    public function delete($id)
    {
        if ($this->bookModel->delete($id)) {
            return "Book deleted successfully.";
        } else {
            return "Failed to delete the book.";
        }
    }

    // Método para obtener todos los libros
    public function getAllBooks()
    {
        $results = $this->bookModel->getAllBooks();
        $keys = array_keys($results[0]);
        return [
            'status' => true,
            'message' => $results, // datos del la consulta 
            'headers' => $keys, // valores a mostrar en el header
            'rows' => array_keys($results[0]) // valores sin modificar
        ];
    }
}
