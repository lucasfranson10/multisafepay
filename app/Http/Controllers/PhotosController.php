<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use App\Models\Photos;

class PhotosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search = str_replace(' ', "+", request('search'));
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
        $url = json_decode(request('photo'));
        $contents = file_get_contents($url);
        $name = substr($url, strrpos($url, '/') + 1);
        Storage::disk('public')->put($name, $contents);
        Photos::create(['photo' => $name,]); 
        
        //return redirect(route('photos.index'));
    }

}
