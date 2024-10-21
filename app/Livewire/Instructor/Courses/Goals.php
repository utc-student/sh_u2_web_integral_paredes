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

    public function mount($course)
    {
        $this->goals = Goal::where('course_id', $this->course->id)->orderBy('position', 'asc')
            ->get()->toArray();
    }

    public function store()
    {
        $this->validate();

        $this->course->goals()->create([
            'name' => $this->name
        ]);

        $this->goals = Goal::where('course_id', $this->course->id)->orderBy('position', 'asc')->get()->toArray();

        $this->reset('name');
    }

    public function update()
    {
        $this->validate([
            'goals.*.name' => 'required|string|max:255'
        ], [
            'goals.*.name.required' => 'El nombre de la meta es obligatorio.',
            'goals.*.name.string' => 'El nombre de la meta debe ser una cadena de texto.',
            'goals.*.name.max' => 'El nombre de la meta no debe superar los 255 caracteres.'
        ]);

        foreach ($this->goals as $goal) {
            Goal::find($goal['id'])->update(['name' => $goal['name']]);
        }

        $this->dispatch('swal', [
            'title' => '¡Guardado!',
            'icon' => 'success',
            'text' => 'Las metas se han actualizado correctamente'
        ]);
    }

    public function destroy($goal_id)
    {
        Goal::find($goal_id)->delete();

        $this->goals = Goal::where('course_id', $this->course->id)->orderBy('position', 'asc')->get()->toArray();
    }

    public function sortGoals($data)
    {
        $this->validate(
            ['goals.*.name' => 'required|string|max:255'],
            [
                'goals.*.name.required' => 'El nombre de la meta es obligatorio.',
                'goals.*.name.string' => 'El nombre de la meta debe ser una cadena de texto.',
                'goals.*.name.max' => 'El nombre de la meta no debe superar los 255 caracteres.'
            ]
        );

        foreach ($data as $index => $goalId) {
            Goal::find($goalId)->update(['position' => $index + 1]);
        }

        $this->goals = Goal::where('course_id', $this->course->id)->orderBy('position', 'asc')->get()->toArray();
    }

    public function syncGoalsBeforeSort()
    {
        $this->validate(
            ['goals.*.name' => 'required|string|max:255'],
            [
                'goals.*.name.required' => 'El nombre de la meta es obligatorio.',
                'goals.*.name.string' => 'El nombre de la meta debe ser una cadena de texto.',
                'goals.*.name.max' => 'El nombre de la meta no debe superar los 255 caracteres.'
            ]
        );

        foreach ($this->goals as $goal) {
            Goal::find($goal['id'])->update(['name' => $goal['name']]);
        }
    }

    public function render()
    {
        return view('livewire.instructor.courses.goals');
    }
}
