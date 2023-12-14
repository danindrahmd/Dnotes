// webpack.mix.js

const mix = require('laravel-mix');
require('laravel-mix-tailwind');

mix.js('resources/js/app.js', 'public/js')
   .postCss('resources/css/app.css', 'public/css', [
       require('tailwindcss'),
       // other postcss plugins if any
   ])
   .styles([
       'resources/css/styles.css',
       'public/css/app.css',
   ], 'public/css/all.css')
   .vue()
   .tailwind();
