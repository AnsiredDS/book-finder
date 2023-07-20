@extends('books.layout')
@section('title', 'Home')
@section('content')

@include('layouts.header')

<div class="container main-container py-4">
    <div class="row">
        <div class="col sm-12">
            <h2 class="p alert alert-info"> Bem vindo!</h2>
            <h4> Sobre esse projeto </h4>

            <p class="py-3">
                Book Finder &#40;Ou Buscador de Livros&#41; é um projeto criado por mim para buscar qualquer livro que você deseja, utilizando uma <strong> API do Google Livros</strong>. A API permite você procurar os livros por título, autor, publicador, categorias, isbn &#40;International Standard Book Number&#41; lccn (Número de Controle da Biblioteca do Congresso.) e oclc (Central de bibliotecas de computadores on-line). Nesse aplicativo é possível fazer buscas pelo título, autor, publicador, categorias e isbn. Também é possível salvar os livros e acessa-los depois. <strong>Não tem como ler o livro pelo site</strong>, mas tem como acessar um site externo para ler o livro. Para começar a utilizar, por favor, entre na sua conta, e caso não tenha, <strong>registra-se</strong>!
            </p>

            <p>
                @guest
                    <a href="{{route('login')}}" class="btn btn-outline-info"> Login </a>
                    <a href="{{route('register')}}" class="btn btn-outline-primary"> Cadastre-se </a>
                @endguest

                @auth
                <div class='d-flex justify-content-center'>
                    <a href="{{route('books.finder')}}" class="mx-5 btn btn-outline-secondary"> Ir para o <strong> Buscador de Livros </strong> </a>
                    <a href="{{route('books.finder')}}" class="mx-5 btn btn-outline-primary"> Ir para os <strong> Meus Livros </strong> </a>
                </div>
                @endauth

            </p>
        </div>
    </div>
</div>

@endsection
