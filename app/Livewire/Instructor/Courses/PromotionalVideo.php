<?php

namespace App\Livewire\Instructor\Courses;

use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class PromotionalVideo extends Component
{
    use WithFileUploads;

    public $course;

    #[Validate(['video' => 'required|file|mimes:mp4'])]

    public $video;

    public function save() {
        $this->validate();

        $this->course->video_path = $this->video->store('courses/promotional-videos');

        $this->course->save();
    }

    public function render()
    {
        return view('livewire.instructor.courses.promotional-video');
    }
}
