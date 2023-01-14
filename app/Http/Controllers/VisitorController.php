<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class VisitorController extends Controller
{
    //
    public function showTable()
    {
        $response = Http::get('http://127.0.0.1:8080/auth/users');
        $data = [
            'visitor' => json_decode($response)->data->users
        ];
        return view('pages.table', $data);
    }

    public function showChart()
    {
        $response = Http::get('http://127.0.0.1:8080/auth/users');
        $data = [
            'visitor' => json_decode($response)->data->users
        ];
        return view('pages.chart', $data);
        // return $data['visitor'][0];
    }
}
