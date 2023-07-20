<?php

namespace App\Repositories;

use App\Models\Book;

class BookRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = new Book();
    }

    public function all()
    {
        return $this->model->all();
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function delete(int $id): void
    {
        $book = $this->model->find($id);
        $book->delete();
    }

}
