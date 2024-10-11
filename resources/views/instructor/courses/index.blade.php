<x-instructor-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Lista de cursos
        </h2>
    </x-slot>

    <x-container>
        <div class="md:flex md:justify-end">
            <a href="{{route('instructor.courses.create')}}" class="btn btn-green block w-full text-center md:w-auto">Crear curso</a>
        </div>
    </x-container>
</x-instructor-layout>
