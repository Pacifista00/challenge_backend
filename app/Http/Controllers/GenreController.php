<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Genre;

class GenreController extends Controller
{
    public function index(){
        $genre = Genre::all();
        return view('genre',[
            'genre' => $genre,
            'active' => 'genre'
        ]);
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/genre')
            ->withErrors($validator);
        }

        $data = [
            'name' => $request->name,
        ];

        $genre = Genre::create($data);

        return redirect('/genre')
        ->with(['success' => 'Data successfully added.']);
    }
    public function update(Request $request, $id){
        $genre = Genre::find($id);
        if(!$genre){
            return redirect('/genre')
            ->with(['error' => 'Genre not found.']);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/genre')
            ->withErrors($validator);
        }

        $data = [
            'name' => $request->name,
        ];

        $genre->update($data);

        return redirect('/genre')
        ->with(['success' => 'Data successfully added.']);
    }
    public function destroy($id){
        $genre = Genre::find($id);
        if(!$genre){
            return redirect('/genre')
            ->with(['error' => 'Genre not found.']);
        }

        $genre->delete();
        return redirect('/genre')
        ->with(['success' => 'Data successfully deleted.']);
    }
}
