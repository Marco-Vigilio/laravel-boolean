<?php

namespace App\Http\Controllers\Api;

use App\Models\Cocktail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CocktailController extends Controller
{
    public function index(){

        $cocktails = Cocktail::paginate(20);

        return response()->json(
            [
                'success' => true,
                'results' => $cocktails,
            ]
        );
    }

    public function show($id){
        $cocktail = Cocktail::findOrFail($id);

        return response()->json([
            'success' => true,
            'results' => $cocktail
        ]);
    }
}
