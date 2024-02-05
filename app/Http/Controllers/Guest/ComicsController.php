<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Comic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ComicsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comics = Comic::all();
        return view('home', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //$data = $request->all();
        $data = $this->validation($request->all());
        $new_comic = new Comic();
        $new_comic->title = $data['title'];
        $new_comic->description = $data['description'];
        $new_comic->thumb = $data['thumb'];
        $new_comic->price = $data['price'];
        $new_comic->series = $data['series'];
        $new_comic->sale_date = $data['sale_date'];
        $new_comic->type = $data['type'];
        $new_comic->artists = $data['artists'];
        $new_comic->writers = $data['writers'];
        $new_comic->save(); 

        return redirect()->route('comics.show', $new_comic->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Comic $comic)
    {
        return view('show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comic $comic)
    {
        return view('update', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comic $comic)
    {
        $data = $this->validation($request->all());
        $comic->update($data);
        return redirect()->route('comics.show', $comic->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();
        return redirect()->route('comics.index');
    }

    private function validation($data) {
        $validator = Validator::make($data, [
            'title' => 'required|min:3|max:90',
            'description' => 'required|min:15|max:5000',
            'thumb' => 'required|min:5|max:500',
            'price' => 'required|numeric|between:0,99.99',
            'series' => 'required|min:3|max:40',
            'sale_date' => 'required|date',
            'type' => 'required|min:1|max:20',
            'artists' => 'required|max:1000',
            'writers' => 'required|max:1000',
            
        ], [
            'title.required' => 'Il campo del titolo è obbligatorio.',
            'title.min' => 'Il campo del titolo deve essere lungo almeno :min caratteri.',
            'title.max' => 'Il campo del titolo non deve superare i :max caratteri.',

            'description.required' => 'Il campo della descrizione è obbligatorio.',
            'description.min' => 'Il campo della descrizione deve essere lungo almeno :min caratteri.',
            'description.max' => 'Il campo della descrizione non deve superare i :max caratteri.',

            'thumb.required' => 'Il campo del immagine è obbligatorio.',
            'thumb.min' => 'Il campo del immagine deve essere lungo almeno :min caratteri.',
            'thumb.max' => 'Il campo del immagine non deve superare i :max caratteri.',

            'price.required' => 'Il campo del prezzo è obbligatorio.',
            'price.numeric' => 'Il campo del prezzo deve essere numerico.',
            'price.between' => 'Il campo del prezzo deve essere compreso tra 0 e 99.99.',

            'series.required' => 'Il campo delle serie è obbligatorio.',
            'series.min' => 'Il campo delle serie deve essere lungo almeno :min caratteri.',
            'series.max' => 'Il campo delle serie non deve superare i :max caratteri.',

            'sale_date.required' => 'Il campo della data è obbligatorio.',
            'sale_date.date' => 'Il campo della data deve essere una data valida.',

            'type.required' => 'Il campo del tipo è obbligatorio.',
            'type.min' => 'Il campo del tipo deve essere lungo almeno :min caratteri.',
            'type.max' => 'Il campo del tipo non deve superare i :max caratteri.',

            'artists.required' => 'Il campo degli artisti è obbligatorio.',
            'artists.max' => 'Il campo degli artisti deve essere lungo almeno :max caratteri.',

            'writers.required' => 'Il campo degli scrittori è obbligatorio.',
            'writers.max' => 'Il campo degli scrittori deve essere lungo almeno :max caratteri.',
        ])->validate();
        return $validator;
    }
}