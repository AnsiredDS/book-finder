<div class="modal fade" id="book-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><strong>Livro <span class='title'></span></strong></h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p> Título do Livro: <strong class='title'></strong> </p>
                <p> Autor(es) do Livro: <strong class='authors'></strong> </p>
            </div>
            <div class="modal-footer">
                <form class="modal-form" action="" method="POST">
                    @csrf
                    @method('delete')
                        <button class="btn btn-danger">
                            Deletar
                        </button>
                </form>
                <button typee="button" class= "btn btn-dark" data-bs-dismiss="modal">
                    Fechar
                </button>
            </div>
        </div>
    </div>
</div>
