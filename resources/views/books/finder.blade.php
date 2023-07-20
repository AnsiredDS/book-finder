@extends('books.layout')
@section('title', 'Book Finder')
@section('content')

@include('layouts.header')

<div class="container main-container py-4">
    <div class="row">
        <div class="col sm-12">

            <h4> Buscador de Livros </h4>

            <p class="py-3"> Preencha o formulário abaixo para procurar por livros, e então clique em <strong>"Procurar"</strong>. </p>
            <hr>

            <form>
                <div class="form-group">
                    <label for="title" class="mb-3">Nome do Livro</label>
                    <input id="title" type="text" class="form-control mb-3" placeholder="Digite o nome do livro" name='title' value='{{request('title')}}'>
                    <label for="author" class="mb-3">Nome do Autor</label>
                    <input id="author" type="text" class="form-control mb-3" placeholder="Digite o nome do autor" name='author' value='{{request('author')}}'>
                    <label for="publisher" class="mb-3">Publicadora</label>
                    <input id="publisher" type="text" class="form-control mb-3" placeholder="Digite o nome da publicadora" name="publisher" value='{{request('publisher')}}'>
                    <input type="submit" id="search" class="btn btn-outline-primary mb-3" value="Procurar">
                </div>
                @if (session('status'))
                    <div class="alert alert-success"> {{session('status')}} </div>
                @endif
            </form>
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th> Nome do Livro </th>
                        <th> Nome do Autor </th>
                        <th> Data de Publicação </th>
                        <th> Publicadora </th>
                        <th> Capa do Livro </th>
                        <th> Salvar </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($livros as $livro)
                        <tr class="text-center">
                            <td>
                                {{ $livro['title'] }}
                            </td>
                            <td>
                                {{ $livro['authors'] }}
                            </td>
                            <td>
                                {{ $livro['publishedDate'] }}
                            </td>
                            <td>
                                {{ $livro['publisher'] }}
                            </td>
                            <td>
                                @if ($livro['bookCover'] == '')
                                    Não há imagens disponiveis para esse livro
                                @else
                                    <button class="btn-open-img btn btn-primary" data-image='{{$livro['bookCover']}}'> Abrir imagem </button>
                                @endif
                            </td>
                            <td>
                                @if ($livro['title'])
                                    <button class="btn-save-modal btn btn-success"
                                    data-title='{{$livro['title']}}'
                                    data-authors='{{$livro['authors']}}'
                                    data-publishedDate='{{$livro['publishedDate']}}'
                                    data-publisher='{{$livro['publisher']}}'
                                    data-bookcover='{{$livro['bookCover']}}'
                                    data-bookid='{{$livro['bookId']}}'
                                    > Salvar </button>
                                @else

                                @endif

                            </td>
                        </tr>
                    @empty
                        <td colspan="15">
                            Nenhum livro encontrado
                        </td>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>

    @include('components.image-modal')
    @include('components.save-modal')

</div>
@endsection
