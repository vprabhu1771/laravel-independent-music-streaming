<?php

namespace App\Http\Controllers\api\v2;

use App\Http\Controllers\Controller;
use App\Models\SongNotification;
use Illuminate\Http\Request;

class SongNotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $songNotification = SongNotification::all();
    
        
        return response()->json(['data' => $songNotification], 200);
    }

    
}
