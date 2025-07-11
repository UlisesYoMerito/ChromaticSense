// Para AJAX
import axios from 'axios';
window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// Bootstrap core
import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;

// JQuery y plugins globales
import $ from 'jquery';
window.$ = window.jQuery = $;

import 'datatables.net';
import 'datatables.net-bs5';

// Summernote y Remixicon
import 'summernote/dist/summernote-lite.min.js';
import 'summernote/dist/summernote-lite.min.css';
import 'remixicon/fonts/remixicon.css';

// También puedes poner Masonry e ImagesLoaded si son *globales*
import Masonry from 'masonry-layout';
import imagesLoaded from 'imagesloaded';
window.Masonry = Masonry;
window.imagesLoaded = imagesLoaded;
