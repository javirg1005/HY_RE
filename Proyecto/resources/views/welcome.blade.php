<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        
        <link rel="stylesheet" href="{{ URL::asset('css/mainpage.css') }}">
         
        
        
    </head>
    <body class="antialiased" style="background-color: #e8641c" >
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

             <!-- Contenedor con los campos de búsqueda -->
        <div class="contenedor">
            <h3> Encuentra tu inmueble ideal para irte a vivir a la España rural con este sencillo buscador: </h3>
            
            <div class="subcontenedor_precio"> 
                <img class="icono_precio" src="assets/Euro.png">
                <h4> ¿Cuánto es lo máximo que <br> quieres pagar? </h4>
                <div class="slidecontainer">
                    <span class="numero_inicio"> 0</span> 
                    <input type="range" min="1" max="100" value="50" class="slider" id="myRange">
                    <span class="numero_fin"> ∞ </span>
                </div>
            </div>

            <div class="subcontenedor_vecinos"> 
                <img class="icono_casa" src="assets/Casa.png">
                <h4> ¿Cuántos vecinos le gustaría tener? </h4>
                <br>
                <div class="slidecontainer">
                    <span class="numero_inicio"> 0</span> 
                    <input type="range" min="1" max="100" value="50" class="slider" id="myRange">
                    <span class="numero_fin"> ∞ </span>
                </div>
            </div>
            <div class="subcontenedor_internet"> 
                <img class="icono_internet" src="assets/Internet.png">
                <h4> ¿Qué calidad de Internet necesitas? </h4>
                <br>
                <div class="slidecontainer">
                    <span class="baja"> Baja </span> 
                    <input type="range" min="1" max="100" value="50" class="slider" id="myRange">
                    <span class="alta"> Alta </span>
                </div>
            </div>
            <button> Buscar </button>
        </div> 
        </div>
    </body>
</html>
