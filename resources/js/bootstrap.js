import axios from 'axios';
import'summernote/dist/summernote-lite.min.js';
import'summernote/dist/summernote-lite.min.css';
import 'remixicon/fonts/remixicon.css';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';




import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;


import $ from 'jquery';
window.$ = window.jQuery = $;
import 'datatables.net'
import 'datatables.net-bs5';
