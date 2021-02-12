<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::all();

        return view("movie.index",["movies" => $movies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!auth()->user()->isAdmin) {
            return redirect('/');
        }

        return view('movie.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'director' => 'required',
            'age' => 'required',
            'year' => 'required',
            'price' => 'required'
        ]);

        $movie = Movie::create($request->all());

        if($request->has('image')){
            $filename = time().'.'.$request->image->extension();

            $request->image->move(public_path('uploads'), $filename);

            $movie->update(['image' => $filename ]);
        }

        return redirect('/movies');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
      return view('movie.show',["movie" => $movie]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        if(!auth()->user()->isAdmin) {
            return redirect('/');
        }

        return view("movie.edit", ["movie" => $movie]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        $request->validate([
            'title' => 'required',
            'director' => 'required',
            'age' => 'required',
            'year' => 'required',
            'price' => 'required'
        ]);

        $movie->update([
            'title' => $request->title,
            'director' => $request->director,
            'age' => $request->age,
            'year' => $request->year,
            'release_date' => $request->release_date,
            'description' => $request->description,
            'price' => $request->price
        ]);

        if($request->has('image')){
            $filename = time().'.'.$request->image->extension();

            $request->image->move(public_path('uploads'), $filename);

            $movie->update(['image' => $filename ]);
        }

        return redirect('/movies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();

        return back();
    }
}
