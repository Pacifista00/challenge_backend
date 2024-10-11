<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Genre;
use App\Models\Film;

class FilmController extends Controller
{
    public function index(){
        $film = Film::with('genre')->get();
        $genre = Genre::all();
        return view('film', [
            'genre' => $genre,
            'film' => $film,
            'active' => 'film'
        ]);
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'genre_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/film')
            ->withErrors($validator);
        }

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'genre_id' => $request->genre_id,
        ];

        $film = Film::create($data);

        return redirect('/film')
        ->with(['success' => 'Data successfully added.']);
    }
    public function update(Request $request, $id){
        $film = Film::find($id);
        if(!$film){
            return redirect('/film')
            ->with(['error' => 'Film not found.']);
        }

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'genre_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/film')
            ->withErrors($validator);
        }

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'genre_id' => $request->genre_id,
        ];

        $film->update($data);

        return redirect('/film')
        ->with(['success' => 'Data successfully added.']);
    }
    public function destroy(Request $request, $id){
        $film = Film::find($id);
        if(!$film){
            return redirect('/film')
            ->with(['error' => 'Film not found.']);
        }

        $film->delete();
        return redirect('/film')
        ->with(['success' => 'Data successfully deleted.']);
    }
}
