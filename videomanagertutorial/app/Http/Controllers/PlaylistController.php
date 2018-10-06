<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Playlist;
use Illuminate\Support\Facades\Auth;

class PlaylistController extends Controller
{
    public function index(){
       $playlist = Playlist::with('entries')->where('user_id', Auth::user()->id)
                   ->get();

      return response()->json($playlist, 200);             
    }

    public function store(Request $request){
        $this->validate($request, [
            'name'=> 'required',
            'is_private'=> 'required'
        ]);

        $count = Playlist::where('user_id', Auth::user()->id)
            ->where('name', $request->name)->first();

            if ($count){
                return response()->json(['message'=> 'Playlist exists']);
            }else {
                 $pl = Playlist::create([
                    'name'=> $request->name,
                    'user_id'=> Auth::user()->id,
                    'is_private'=> $request->is_private
                 ]);

                 return response()->json($pl, 201);
            }
        
    }
}
