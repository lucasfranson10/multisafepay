<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;
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
        if (Cache::has($search)) {
            $response = Cache::get($search);
        }else{
            $pixa = Http::get('https://pixabay.com/api/',[
                'key' => env('PIXABAY_KEY'),
                'q' => $search,
            ]);
            $response = json_decode($pixa->getBody()->getContents(), true);
            Cache::put($search, $response, 86400);
        }
        
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
        Storage::put($name, $contents);
        Photos::firstOrCreate(['photo' => $name,]);
        
        return redirect(route('photos.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('photos.show', ['photos' => Photos::all()]);
    }



}
