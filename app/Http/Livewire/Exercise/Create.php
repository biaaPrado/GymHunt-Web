<?php

namespace App\Http\Livewire\Exercise;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Exercise;


class Create extends Component
{
    public ?string $name = null; 
    public ?string $muscle = null; 
    public ?int $series = null;
    public ?int $repetitions = null;
    public ?int $weight = null;
    public $made_date = null;

    public function render()
    {
        return view('livewire.exercise.create');
    }

    public function store()
    {
       $exercise = Exercise::create([
        'user_id' => Auth::id(),
        'name'=> $this->name,
        'series'=> $this->series,
        'repetitions'=> $this->repetitions,
        'muscle'=> $this->muscle,
        'weight'=> $this->weight,
        'made_date'=> $this->made_date
       ]);

       $this->dispatchBrowserEvent('exercise::close');
       $this->emitTo('exercise.workoutlog','exercise::created');
    }
}