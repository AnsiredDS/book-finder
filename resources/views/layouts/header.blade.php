<nav class="navbar navbar-expand-lg " style="background-color:#bbe3ff">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('books.finder')}}">Book Finder</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('books.home')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('books.finder')}}">Buscador de Livros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('books.index')}}">Meus Livros</a>
                </li>
            </ul>
            <ul class="navbar-nav mb mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('users')}}"> {{Auth::user()->name}} </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
