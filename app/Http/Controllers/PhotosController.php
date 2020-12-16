<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;

class PhotosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = str_replace(' ', "+", $request->input('search'));
        $pixa = Http::get('https://pixabay.com/api/',[
            'key' => '19526874-64b4c52794e0c049098c28714',
            'q' => $search,
        ]);
        $response = json_decode($pixa->getBody()->getContents(), true);
        return view('photos.index', ['photos' => $response['hits']]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        echo "teste";
    }

}
