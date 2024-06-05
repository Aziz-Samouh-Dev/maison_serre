// webpack.mix.js
const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
   .postCss('resources/css/tailwind.css', 'public/css', [
       require('tailwindcss'),
   ]);

if (mix.inProduction()) {
    mix.version();
}
