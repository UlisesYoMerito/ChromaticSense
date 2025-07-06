import './bootstrap';

$('.datable').DataTable();

$('.editor').summernote({
    height: 500,
    placeholder: 'Escribe aquí...',     
});


$('form[role="search"]').on('submit', function(e) {
    const input = $(this).find('input[name="busqueda"]');
    if (!input.val().trim()) {
        e.preventDefault();
        input.focus();
        alert('Por favor, escribe algo para buscar.');
    }
});
