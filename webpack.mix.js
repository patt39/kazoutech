const mix = require('laravel-mix');
const compile_vue = require('./webpack/vuejs');


const output = 'public';
compile_vue(output);



if (mix.inProduction()) {
    mix.version();
}


