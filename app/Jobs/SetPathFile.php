<?php

namespace App\Jobs;

use App\Model\Song;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class SetPathFile implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $name;
    public $songId;
    public $songFileExtension;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($name, $songFileExtension, $songId)
    {
        $this->name = $name;
        $this->songFileExtension = $songFileExtension;
        $this->songId = $songId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $dir = '/';
        $recursive = false; // Có lấy file trong các thư mục con không?
        $contents = collect(Storage::cloud()->listContents($dir, $recursive));
        $songPath = $contents->where('filename', '=', str_replace('.mp3', '', $this->name))->first()['path'];
        while (!$songPath) {
            $songPath = $contents->where('filename', '=', str_replace($this->songFileExtension, '', $this->name))->first()['path'];
        }
        $song = Song::find($this->songId);
        $song->path = $songPath;
        $song->save();
    }
}
