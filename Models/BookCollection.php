<?php
namespace Models;
use PDO;
use App\Database;

class BookCollection extends Database
{
    public array $bookCollection;

    public function __construct()
    {
        parent::_construct();

    }

    public function getAll()
    {
        $stmt = $this->pdo->query('SELECT * FROM book');
        $this->bookCollection = $stmt->fetchAll(PDO::FETCH_UNIQUE);
    }

    public function getCollectionByGenre(string $genre)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM book WHERE genre = :genre');
        $stmt->bindValue('genre', $genre);
        $stmt->execute();
        $this->bookCollection = $stmt->fetchAll(PDO::FETCH_UNIQUE);
    }

}