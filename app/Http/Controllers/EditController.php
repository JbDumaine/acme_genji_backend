<?php

namespace App\Http\Controllers;

use App\Models\Command;
use App\Models\StockReception;
use Illuminate\Http\JsonResponse;

class EditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function editAllFlux()
    {
        $commands = Command::with(['state', 'store'])->orderBy('delivery_date', 'desc')->get();
        $stockReception = StockReception::with(['supplier'])->orderBy('reception_date','desc')->get();
        return response()->json(['Receptions' => $stockReception, 'Commands' => $commands]);
    }
}
