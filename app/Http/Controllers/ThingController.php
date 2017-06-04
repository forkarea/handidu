<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thing;
use Illuminate\Support\Facades\Auth;

class ThingController extends Controller
{
    public function store(Request $request) {
        
        $thing = new Thing;
        $thing->name = $request->name;
        $thing->description = $request->description;
        $thing->author_id = Auth::id();
        
        $slug = str_slug($thing->name);
        
        //MUSI BYĆ UNIKALNY - do zrobienia dodawanie liczby na końcu
        $thing->slug = $slug;
        $thing->save();
         
        $thing->categories()->attach($request->categories);
        
        $thing->save();
        
        $filePath = $request->photo->store('photos');
        $photo = new \App\Photo;
        $photo->filename = $filePath;
        $photo->photoholdable_type = 'App\Thing';
        $photo->photoholdable_id = $thing->id;
        $photo->save();
        
        session()->flash('messages', ['success' => ['Zapisano']]);
        return redirect($thing->link);
        
    }
}
