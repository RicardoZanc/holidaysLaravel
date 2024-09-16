<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>
<body>
    <nav class="bg-black">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="{{ url('/') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
            <h1 class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">HolidaySearch</h1>
    </a>   
    </div>
    </nav>

    <div class="h-full w-full flex-col">
        <div class=" mt-3 w-full flex place-content-center">
            <h1 class="text-2xl">Digite o ano que deseja verificar os feriados:</h1>
        </div>
        <div class="w-full mt-5 p-5 flex place-content-center">
            <form action="{{ url('searchholiday') }}" method="post">
                @csrf
                <input id="year" name="year" type="text" placeholder="ano..." class="border border-gray-300 p-2 flex-grow focus:outline-none focus:ring-2 focus:ring-indigo-500">
                <input type="submit" class="bg-black text-white px-4" value="Pesquisar"></input>
            </form>
    </div>
    </div>
</body>
</html>
