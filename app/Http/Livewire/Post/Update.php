<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;
use Livewire\WithFileUploads;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Post;
use App\Models\Image;

class Update extends Component
{
    use WithFileUploads;

    public ?string $body = null;
    public Post $post;

    public $images = [];
    public $oldImages = [];
    public $deleteImages = [];

    protected $listeners = [
        'image::removed' => '$refresh',
        'post::updateRequest' => 'updatePost'
    ];

    protected $rules = [
        'body' => 'string|min:6',
        'images.*' => 'max:2048'
    ];

    public function render()
    {
        return view('livewire.post.update');
    }

    public function store() {
        $this->validate();

        if($this->images)
        {
            $this->post->body = $this->body;

            $this->post->save();

            for($i = 0; $i < count($this->oldImages); $i++)
            {
                if(!in_array($this->oldImages[$i], $this->images))
                    Image::where('path', $this->oldImages[$i])->delete();
            }

            foreach($this->images as $image)
            {
                if (is_string($image))
                    continue;

                $filePath = $image->store('photos', 'public');
    
                Image::create([
                    'user_id' => Auth::id(),
                    'post_id' => $this->post->id,
                    'name' => basename($filePath),
                    'path' => "storage/".$filePath,
                    'extension' => strtolower($image->extension()) 
                ]);
            }
        } else {
            Post::where('id', $this->post->id)
                ->update([
                    'body' => $this->body
                ]);
        }

        $this->emitUp('post::updated');
        $this->reset(['body', 'images']);
        $this->cleanupOldUploads();
        $this->dispatchBrowserEvent('update::close');
    }

    public function updatePost($data, $images) {
        $this->post = Post::find($data['id']);
        $this->body = $this->post->body;
        $this->images = $images;
        $this->oldImages = $images;
    }

    public function removeImage($index)
    {   
        if(isset($this->images[$index]))
        {
            unset($this->images[$index]);
        }

        $this->emitSelf('image::removed');
    }

    protected function cleanupOldUploads()
    {
        //if (FileUploadConfiguration::isUsingS3()) return;

        $storage = Storage::disk('local');

        foreach ($storage->allFiles('livewire-tmp') as $filePathname) {
            // On busy websites, this cleanup code can run in multiple threads causing part of the output
            // of allFiles() to have already been deleted by another thread.
            if (! $storage->exists($filePathname)) continue;

            $yesterdaysStamp = now()->subDay()->timestamp;
            if ($yesterdaysStamp > $storage->lastModified($filePathname)) {
                $storage->delete($filePathname);
            }
        }
    }
}
