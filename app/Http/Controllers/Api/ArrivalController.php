<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Arrival;

class ArrivalController extends Controller
{
    public function getAllArrivals() {
        $arrivals = Arrival::with('tour','images')->get()->toJson(JSON_PRETTY_PRINT);
        return response($arrivals, 200);
        // return "works!";
      }

    public function getArrival($id) {
        if (Arrival::where('id', $id)->exists()) {
          $arrival = Arrival::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
          return response($arrival, 200);
        } else {
          return response()->json([
            "message" => "Arrival not found"
          ], 404);
        }
      }   
}
