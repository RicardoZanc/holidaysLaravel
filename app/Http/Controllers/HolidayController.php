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

        foreach($holidays as &$holiday){
            $holiday['date'] = $this->formatDate($holiday['date']);
        }

        return view('searchholiday', ['holidays' => $holidays]);

    }

    public function formatDate(string $date){
        $year = substr($date, 0, 4);
        $month = substr($date, 5, 2);
        $day = substr($date, 8, 2);

        $date = "$day/$month/$year";
        return $date;
    }
}