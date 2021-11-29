<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <!-- Scripts -->
        @routes
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
          <label class="block font-bold p-4 mt-2 text-3xl text-red-500">
            Todas as Doações
          </label>

          <div class="flex flex-row gap-4 p-5 w-full justify-center flex-wrap content-evenly">
            @foreach($doacoes as $doacao)
                    <div class="max-w-xs w-full bg-gray-100 shadow-lg rounded-xl p-6">
                      <div class="flex flex-col ">
                        <div class="">
                          <div class="relative h-62 w-full mb-3">
                            <img src="{{$doacao->foto}}" alt="Doação" class="w-full h-44 object-contain rounded-2xl">
                          </div>
                          <div class="flex-auto justify-evenly">
                            <div class="flex flex-wrap ">
                              <div class="w-full flex-none text-sm flex items-center text-gray-600">
                                <span class="mr-2 text-gray-500">{{$doacao->categoria}}</span>
                              </div>
                              <div class="flex items-center w-full justify-between min-w-0 ">
                                <h2 class="text-lg mr-auto cursor-pointer hover:text-red-500 truncate ">{{$doacao->nome}}</h2>
                            </div>
                            <p class="text-sm mt-1 max-w-xs truncate">{{$doacao->descricao}}</p>
                            <div class="lg:flex  py-4  text-sm text-gray-600">
                            </div>
                            <div class="flex space-x-2 text-sm mt-4 font-medium justify-start">
                              <button class="transition ease-in duration-300 inline-flex items-center text-sm font-medium mb-2 md:mb-0 bg-red-500 px-5 py-2 hover:shadow-lg tracking-wider text-white rounded-full hover:bg-red-600 ">
                                <span>QUERO!</span>
                              </button>

                              <div class="flex items-center bg-green-400 text-white text-sm px-2 py-1 ml-3 rounded-lg">
                                Quant: {{$doacao->quantidade}}</div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
            @endforeach
          </div>
          </div>
            
        @env ('local')
            <script src="http://localhost:3000/browser-sync/browser-sync-client.js"></script>
        @endenv
    </body>
</html>
