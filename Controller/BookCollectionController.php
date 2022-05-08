<?php

namespace Controller;

use App\BaseController;
use Models\BookCollection;

class BookCollectionController extends BaseController
{
    public function getAllBooks()
    {
        $collection = new BookCollection();
        $collection->getAll();
        $this->initTwig();
        $params = $collection->bookCollection;
        return $this->twig->render('book_collection/index.html.twig', ['books' => $params]);
    }

    public function horrorBooks()
    {
        $collection = new BookCollection();
        $collection->getCollectionByGenre('horror');
        $books = $collection->bookCollection;
        $this->initTwig();
        return $this->twig->render('book_collection/index.html.twig', ['books' => $books]);
    }
}