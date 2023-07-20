@extends('books.layout')
@section('title', 'Meus Livros')
@section('content')

@include('layouts.header')

<div class="container main-container py-4">
    <div class="row">
        <div class="col sm-12">
            <h4> Meus Livros </h4>

            <p class="py-3">
                Todos os seus livros salvos estão nessa página.
            </p>
            @if (session('status'))
                    <div class="alert alert-success"> {{session('status')}} </div>
            @endif
            <div class="books">
            @forelse ($livros as $livro)
                <button class="btn-book-info invisible"
                data-title='{{$livro['title']}}'
                data-authors='{{$livro['authors']}}'
                {{-- data-published-date={{$livro['published_date']}} --}}
                data-book-cover='{{$livro["book_cover"]}}'
                data-delete='{{route('books.destroy', ['id' => $livro['id']]) }}'
                >
                @if ($livro['book_cover'] != '')
                <div class="book-container">
                    <img class="visible book mb-2" width="256" height="396" src="{{$livro['book_cover']}}" alt="{{$livro['title']}}">
                    <div class="bottom visible alert alert-primary"> {{$livro['title']}} </div>
                </div>
                @else
                <div class="book-container">
                    <img class="visible book mb-2" width="256" height="396" src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/70/Solid_white.svg/2048px-Solid_white.svg.png" alt="{{$livro['title']}}">
                    <div class="centered visible img-warning alert alert-danger"> SEM IMAGEM </div>
                    <div class="bottom visible alert alert-primary"> {{$livro['title']}} </div>
                </div>
                @endif

                </button>

            @empty
                <td colspan="15">
                    Nenhum livro salvo. Salve livros no <a href="{{route('books.finder')}}"> Buscador de livros </a>
                </td>
            @endforelse
            </div>
        </div>
    </div>
    @include('components.book-modal')
</div>

@endsection
