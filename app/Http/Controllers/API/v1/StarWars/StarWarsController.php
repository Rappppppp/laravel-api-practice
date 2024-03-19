<?php

namespace App\Http\Controllers\API\v1\StarWars;

use App\Http\Controllers\Controller;

use Http;

class StarWarsController extends Controller
{
    /**
     * ? EXTERNAL HTTP REQUEST
     * 
     * Display a listing of STAR WARS CHARACTERS!!
     */
    public $uri = 'https://swapi.dev/api/people/';
    public function index()
    {
        $response = Http::get($this->uri);
        $results = $response->json()['results'];

        // Get only the names of Star Wars Characters
        return json_encode(['names' => collect($results)->pluck('name')->toArray()]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $response = Http::get($this->uri . $id);
        return $response->ok() ? $response->json() : response()->json(['status' => 'Failed', 'message' => 'Could not get Star Wars Users'], 400);
    }
}
