import './bootstrap';

// Inicialización de DataTable
$('.datable').DataTable();

// Inicialización de Summernote
$('.editor').summernote({
    height: 500,
    placeholder: 'Escribe aquí...',
});

// Validación de formulario de búsqueda
$('form[role="search"]').on('submit', function(e) {
    const input = $(this).find('input[name="busqueda"]');
    if (!input.val().trim()) {
        e.preventDefault();
        input.focus();
        alert('Por favor, escribe algo para buscar.');
    }
});

// Slider personalizado
const slider = document.querySelector('.slider');
function activate(e) {
    const items = document.querySelectorAll('.item');
    e.target.matches('.next') && slider.append(items[0]);
    e.target.matches('.prev') && slider.prepend(items[items.length - 1]);
}
document.addEventListener('click', activate, false);

// Inicialización de Masonry
imagesLoaded('.grid', function () {
    $('.grid').masonry({
        itemSelector: '.grid-item',
        columnWidth: 200,
    });
});

// LightGallery
import lightGallery from 'lightgallery';
import lgZoom from 'lightgallery/plugins/zoom';
import lgThumbnail from 'lightgallery/plugins/thumbnail';

import 'lightgallery/css/lightgallery.css';
import 'lightgallery/css/lg-zoom.css';
import 'lightgallery/css/lg-thumbnail.css';


lightGallery(document.getElementById('lightgallery'), {
    plugins: [lgZoom, lgThumbnail],
    speed: 500,
    controls: true,             // muestra flechas de navegación
    download: false,            // oculta botón de descarga si quieres
    thumbnail: true,            // activa las miniaturas
    showCloseIcon: true,        // muestra icono de cerrar
    actualSize: true,           // permite ver tamaño original
});
