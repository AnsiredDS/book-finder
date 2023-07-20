<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Services\BookService;
use Illuminate\Support\Facades\Http;


class BookController extends Controller
{
    protected $bookService;

    public function __construct()
    {
        $this->bookService = new BookService();
    }

    public function home()
    {
        return view('books.home');
    }

    public function index()
    {
        $livros = $this->bookService->all();
        return view('books.index', compact('livros'));
    }

    public function finder()
    {
        $livros = $this->bookService->finder();
        return view('books.finder', compact('livros'));
    }

    public function store(BookRequest $request)
    {
        //dd($request->all());
        $this->bookService->store($request->all());
        return redirect()
            ->back()
            ->with('status', 'Livro salvo com sucesso.');
    }

    public function destroy(int $id)
    {
        $this->bookService->delete($id);
        return redirect()
            ->back()
            ->with('status', 'Livro deletado com sucesso.');
    }
}
