<?php

namespace App\Livewire\Instructor\Courses;

use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class PromotionalVideo extends Component
{
    use WithFileUploads;

    public $course;

    #[Validate(['video' => 'required|file|mimes:mp4'])]
    public $video;

    public function save()
    {
        $this->validate();

        if ($this->course->video_path) {
            // Eliminar el video anterior del almacenamiento
            Storage::delete($this->course->video_path);
        }

        $this->course->video_path = $this->video->store('courses/promotional-videos');

        $this->course->save();

        return $this->redirectRoute('instructor.courses.video', $this->course, true, true);
    }

    public function render()
    {
        return view('livewire.instructor.courses.promotional-video');
    }
}
