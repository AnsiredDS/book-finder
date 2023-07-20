<div class="modal fade" id="save-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><strong>Salvar <span class='book-title'></span>?</strong></h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="modal-form" method="post" action="{{route('books.store')}}">
                @csrf
                <div class="modal-body justify-content-center">
                    Deseja salvar <strong class='book-title'> </strong>? Ele ficará salvo na página "Meus Livros" e poderá ser removido posteriormente.
                </div>
                <input hidden class='input-title' type='text' name='title' value=>
                <input hidden class='input-authors' type='text' name='authors' value=>
                <input hidden class='input-book-cover' type='text' name='book_cover' value=>
                <input hidden class='input-book-id' type='text' name='book_id' value=>
                <div class="modal-footer">
                    <button class="btn btn-success">
                        Sim
                    </button>
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">
                        Não
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
