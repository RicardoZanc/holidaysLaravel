<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HolidayController extends Controller{

    public function searchholidays(Request $request){


        $year = $request->year;

        $url = "https://brasilapi.com.br/api/feriados/v1/" . $year;

        $response = Http::acceptJson()->get($url);

        $holidays = $response->json() ?? [];

        return view('searchholiday', ['holidays' => $holidays]);

    }
}