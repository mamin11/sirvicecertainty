<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.0-canary.14/tailwind.min.css" integrity="sha512-zXhmHxwXn8kUvZApt3iuxFG7cAHa2wongnyRnq2uAxppI5t/J5pz7I0mrm409qZaAu4KLhRtFTaNhO86OWQv5A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
        {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    </head>
    <body class="antialiased">
            <div class="relative flex items-top justify-center min-h-screen bg-gray-100  sm:items-center py-4 sm:pt-0">
                <form action="{{route('homeSubmit')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="flex flex-col justify-center align-middle">
                        <input type="text" name="name" placeholder="enter name" class="py-4 px-4 m-4">
                        @error('name')
                            <div class="text-center text-red-500 pb-4">{{ $message }}</div>
                        @enderror
                        <input type="file" name="image"  class="py-4 px-4 m-4">
                        @error('image')
                            <div class="text-center text-red-500 pb-4">{{ $message }}</div>
                        @enderror
                        <button class="mx-auto bg-green-300 px-5 py-3 text-sm shadow-sm font-medium w-1/2 border text-white rounded-full hover:shadow-lg hover:bg-green-400">Submit</button>
                    </div>
                <form>
                    @if (session('link'))
                        <a href="{{session('link')}}" target="_blank" class="text-black font-bold">
                            {{ session('link') }}
                        </a>
                    @endif
            </div>
    </body>
</html>
