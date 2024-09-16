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
        <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
            <h1 class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">HolidaySearch</h1>
    </a>   
    </div>
    </nav>

    <div class="h-full w-full flex-col">
        @if(!empty($holidays))
            @foreach($holidays as $holiday)
                <p>{{ $holiday['name'] }}</p>
            @endforeach
        @else
            <p>Nenhum feriado encontrado.</p>
        @endif

        <div class="w-full mt-5 p-5 flex place-content-center">
    </div>
    </div>
</body>
</html>
