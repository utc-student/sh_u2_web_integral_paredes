<?php

namespace App\Livewire\Instructor\Courses;

use App\Models\Goal;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Goals extends Component
{
    public $course;
    public $goals;

    #[Validate('required|string|max:255')]
    public $name;

    public function mount($course) {
        $this->goals = Goal::where('course_id', $this->course->id)->get()->toArray();
    }

    public function store() {
        $this->validate();

        $this->course->goals()->create([
            'name' => $this->name
        ]);

        $this->goals = Goal::where('course_id', $this->course->id)->get()->toArray();

        $this->reset('name'); 
    }

    public function render()
    {
        return view('livewire.instructor.courses.goals');
    }
}
