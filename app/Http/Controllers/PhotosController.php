<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;
use App\Jobs\SaveImage;
use App\Models\Photos;


class PhotosController extends Controller
{
    /**
     * Display a listing of photos.
     * Resources are save in cache by Redis.
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
            Cache::put($search, $response,  now()->addHour(24));
        }
        
        return view('photos.index', ['photos' => $response['hits']]);
    }

    /**
     * Store a photo request
     *
     */
    public function store()
    {        
        SaveImage::dispatch(request('photo'));
        return redirect()
                ->back() 
                ->with('alert', 'Save will happen!');
    }

    /**
     * Display the specified resource.
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('photos.show', ['photos' => Photos::all()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  Photos model
     * @return \Illuminate\Http\Response
     */

    public function download(Photos $photos){
        return Storage::download($photos->photo);
    }

}
