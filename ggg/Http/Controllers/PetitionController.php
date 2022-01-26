<?php

namespace Ggg\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class PetitionController extends Controller
{
    public function getPetition(Request $request): JsonResponse
    {
        $sosi = 'sosipososi';

        return response()->json(['success' => true,
            'data' => $sosi
        ]);
    }
}
