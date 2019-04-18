// Import libs
import Blazy from 'blazy';
import 'owl.carousel/dist/assets/owl.carousel.css';
import 'owl.carousel';

import * as JQuery from "jquery";
window.$ = JQuery.default;

// Import main scripts
import App from './App';

// Init main scripts
$(document).ready(function() {
    new Blazy()
    new App()
});

