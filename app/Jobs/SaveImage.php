<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use App\Models\Photos;
use Intervention\Image\Facades\Image;


class SaveImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $input;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($input)
    {
        $this->input = $input;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
            $url = json_decode($this->input);
            $contents = file_get_contents($url);
            $name = substr($url, strrpos($url, '/') + 1);
            $blob =  base64_encode($this->resizeImage($contents));
            Storage::put($name, $contents);
            Photos::firstOrCreate(['photo' => $name,
                                   'thumb' => $blob]); 
            
    }

    private function resizeImage($contents) : string {
        return (string) Image::make($contents)->resize(75, 75)->encode('data-url');     
    }
}
