<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thing;
use Illuminate\Support\Facades\Auth;

class ThingController extends Controller
{
    public function store(Request $request) {
        
        $this->validate($request, [
            'name' => 'required',
            'photo' => 'required|image'
        ]);
        
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
        
        $filePath = $request->photo->store('public/photos');
        $photo = new \App\Photo;
        $filePath = substr($filePath, 7); //usuwanie 'public/' z linku - nie wiem narazie jak to inaczej zrobić
        $photo->filename = $filePath;
        $photo->photoholdable_type = 'App\Thing';
        $photo->photoholdable_id = $thing->id;
        $photo->save();
        
        session()->flash('messages', ['success' => [__('interface.Saved')]]);
        return redirect($thing->link);
        
    }
    
    public function update(Request $request) {
        if(!$thing = Thing::find($request->id))
            abort(404);
        
        $thing->name = $request->name;
        $thing->description = $request->description;
        $thing->categories()->detach();
        $thing->categories()->attach($request->categories);
        
        $thing->save();
        session()->flash('messages', ['success' => [__('interface.Changes saved')]]);
        return redirect($thing->link);
    }
}
