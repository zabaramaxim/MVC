<?php
/*Запрос на создание бд
 CREATE TABLE book(id int primary key auto_increment, title varchar(50) not null, author varchar(50) not null, genre varchar(50) not null, year date not null);
 INSERT INTO book(title, author, genre, year)
 VALUES
     ('It', 'Stephen King', 'Horror', CAST('1986-09-15' as date)),
     ('Pet Sematary', 'Stephen King', 'Horror', CAST('1983-11-14' as date)),
     ('Dead Zone',  'Stephen King', 'Thriller', CAST('1979-08-01' as date)),
     ('Shining',  'Stephen King', 'Horror', CAST('1977-01-28' as date)),
     ('Doctor Sleep',  'Stephen King', 'Thriller', CAST('2013-09-24' as date)),
     ('Mr. Mersedes',  'Stephen King', 'Detective', CAST('2014-06-03' as date));
 */
namespace App;

use PDO;

class Database
{
    public PDO $pdo;

    public function _construct()
    {
        $option = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                        PDO::ATTR_EMULATE_PREPARES   => false);
        $config = require(__DIR__ . '/../config/database.php');
        $dsn = 'mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'];
        $user = $config['user'];
        $password = $config['password'];
        $this->pdo = new \PDO($dsn, $user, $password, $option);
    }

    public function query(string $sql)
    {
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_UNIQUE);

    }
}