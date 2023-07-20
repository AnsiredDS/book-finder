<?php

namespace App\Services;

use App\Http\Requests\BookRequest;
use Illuminate\Support\Facades\Http;
use App\Repositories\BookRepository;
use Carbon\Carbon;
use stdClass;

class BookService
{
    protected $repository;

    public function __construct()
    {
        $this->repository = new BookRepository();
    }

    public function all()
    {
        return $this->repository->all();
    }

    public function finder()
    {
        $data = request()->all();
        $nullValues = true;
        $livros = [];
        $ids = [];
        $url = "https://www.googleapis.com/books/v1/volumes?q=";
        $livrosBanco = $this->repository->all()->toArray();
        foreach ($data as $value) {
            if ($value != null) {
                $nullValues = false;
                break;
            }
        }

        if ($nullValues == true) {
            $data = [];
        }

        if($data != []) {
            if($data['title'] != '') {
                $url = $url . "+intitle:{$data['title']}";
            }

            if($data['author'] != '') {
                $url = $url . "+inauthor:{$data['author']}";
            }

            $response = Http::get($url)->json();
        }

        $i = 0;

        //Setar os valores dos livros
        if(isset($response['items']))
        {
            foreach($response['items'] as $item) {
                $info = $item['volumeInfo'];
                $books = new stdClass();

                if(isset($item['volumeInfo']['title'])) {
                    $livros[$i]['bookId'] =  $item['id'];
                } else {
                    $livros[$i]['bookId'] = '';
                }

                if(isset($item['volumeInfo']['title'])) {
                    $livros[$i]['title'] =  $item['volumeInfo']['title'];
                } else {
                    $livros[$i]['title'] = '';
                }

                if(isset($item['volumeInfo']['authors'])) {
                    $livros[$i]['authors'] = implode(', ', $item['volumeInfo']['authors']);
                } else {
                    $livros[$i]['authors'] = '';
                }

                if(isset($item['volumeInfo']['publishedDate'])) {
                    $livros[$i]['publishedDate'] = $item['volumeInfo']['publishedDate'];
                } else {
                    $livros[$i]['publishedDate'] = '';
                }

                if(isset($item['volumeInfo']['publisher'])) {
                    $livros[$i]['publisher'] = $item['volumeInfo']['publisher'];
                } else {
                    $livros[$i]['publisher'] = '';
                }

                if(isset($item['volumeInfo']['imageLinks']['thumbnail'])) {
                    $livros[$i]['bookCover'] = $item['volumeInfo']['imageLinks']['thumbnail'];
                } else {
                    $livros[$i]['bookCover'] = '';
                }

                $i += 1;
            }
        }

        //Verificar se livro já está salvo
        foreach ($livrosBanco as $id)
        {
           array_push($ids, $id['book_id']);
        }
        // dd($ids);
        return $livros;
    }

    public function store(array $data)
    {
        return $this->repository->create($data);
    }

    public function delete(int $id): void
    {
        $this->repository->delete($id);
    }

    private function setBook($key, $value)
    {

    }

}
