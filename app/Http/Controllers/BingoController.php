<?php

namespace App\Http\Controllers;

use App\Models\Number;
use Illuminate\Http\Request;

class BingoController extends Controller
{
    public function draw()
    {
        $selectedNumbers = Number::where('selected', true)->orderBy('id')->get();
        return view('bingo', ['selectedNumbers' => $selectedNumbers]);
    }

    public function drawNumber()
{
    $number = Number::where('selected', false)->inRandomOrder()->first();

    if ($number) {
        $number->selected = true;
        $number->save();

        return response()->json(['number' => $number->number]);
    }

    return response()->json(['message' => 'すべての数字が選ばれました'], 404);
}

}
