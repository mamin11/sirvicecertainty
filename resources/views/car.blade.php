<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.0-canary.14/tailwind.min.css" integrity="sha512-zXhmHxwXn8kUvZApt3iuxFG7cAHa2wongnyRnq2uAxppI5t/J5pz7I0mrm409qZaAu4KLhRtFTaNhO86OWQv5A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex flex-col items-top justify-center min-h-screen bg-gray-100  sm:items-center py-4 sm:pt-0">
            <img src="{{asset($image)}}" class="img-fluid" alt="">
            <h1 class="text-center text-lg">{{$car->name}}</h1>
        </div>
    </body>
</html>
