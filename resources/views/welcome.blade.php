<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Viteで管理されるCSSファイルの読み込み -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>      
        <div id="app">
            <example-component></example-component>
        </div><!-- #app -->
    </body>
</html>