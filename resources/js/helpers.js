import $ from "jquery"

$('.btn-open-img').on('click', function(e)
{
    e.preventDefault;
    const imgModal = new bootstrap.Modal('#img-modal');
    const img = $(this).data('image');
    $('#img-modal .modal-img').attr('src', img);
    $('#img-modal .download').attr('href', img);
    imgModal.show();
});

$('.btn-save-modal').on('click', function(e)
{
    e.preventDefault;
    const title = $(this).data('title');
    const saveModal = new bootstrap.Modal('#save-modal');
    const authors = $(this).data('authors');
    const bookCover = $(this).data('bookcover');
    const bookId = $(this).data('bookid')
    $('#save-modal .book-title').text(title);
    $('#save-modal .modal-form .input-title').attr('value', title)
    $('#save-modal .modal-form .input-authors').attr('value', authors)
    $('#save-modal .modal-form .input-book-cover').attr('value', bookCover)
    $('#save-modal .modal-form .input-book-id').attr('value', bookId)
    console.log(bookCover)
    saveModal.show();
});

$('.btn-book-info').on('click', function(e)
{
    e.preventDefault;
    const bookModal = new bootstrap.Modal("#book-modal");
    const title = $(this).data('title');
    const authors = $(this).data('authors');
    const publishedDate = $(this).data('published-date');
    const publisher = $(this).data('publisher');
    const bookCover = $(this).data('bookCover');
    const del = $(this).data('delete');
    $('#book-modal .title').text(title);
    $('#book-modal .authors').text(authors);
    $('#book-modal .modal-form').attr('action', del)
    bookModal.show();
});


