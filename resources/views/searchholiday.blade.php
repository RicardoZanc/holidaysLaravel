<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Holiday Search</title>
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

    <div id="holidays-container" class="h-full w-full flex flex-col items-center mt-3">
        @if(!empty($holidays))
            @foreach($holidays as $holiday)
                 <div id="{{ $holiday['date'] }}" class="self-center border-2 border-black w-7/12 my-3 p-3 flex justify-between">
                    <div>
                        <h1 class="text-2xl">{{ $holiday['name'] }}</h2>
                    </div>
                    <div>
                        <h1 class="text-2xl">{{ $holiday['date'] }}</h2>
                    </div>
                 </div>
            @endforeach
        @else
            <p>Nenhum feriado encontrado.</p>
        @endif

        <div class="w-full mt-5 p-5 flex place-content-center">
    </div>
    </div>
</body>
</html>
