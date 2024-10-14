<x-instructor-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Curso: {{ $course->title }}
        </h2>
    </x-slot>

    <x-container class="py-8">
        <div class="grid grid-cols-1 lg:grid-cols-5 gap-6">
            <aside class="col-span-1">
                <h1 class="font-semibold text-xl mb-4">Edición de curso</h1>

                <nav>
                    <ul>
                        <li class="border-l-4 border-indigo-400 pl-3">
                            <a href="{{ route('instructor.courses.edit', $course) }}">Información del curso</a>
                        </li>
                    </ul>
                </nav>
            </aside>

            <div class="col-span-1 lg:col-span-4">
                <div class="card">

                    <form action="{{ route('instructor.courses.update', $course) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <p class="text-xl font-semibold">Información del curso</p>

                        <hr class="mt-2 mb-6">

                        <x-validation-errors />

                        <div class="mb-4">
                            <x-label value="Título del curso" class="mb-1" />
                            <x-input type="text" class="w-full" name="title"
                                value="{{ old('title', $course->title) }}" />
                        </div>

                        @empty($course->published_at)
                            <div class="mb-4">
                                <x-label value="Slug del curso" class="mb-1" />
                                <x-input type="text" class="w-full" name="slug"
                                    value="{{ old('slug', $course->slug) }}" />
                            </div>
                        @endempty

                        <div class="mb-4">
                            <x-label value="Descripción del curso" class="mb-1" />
                            <x-textarea name="summary" class="form-textarea w-full" rows="3">{{ old('summary', $course->summary) }}</x-textarea>
                        </div>

                        
                    </form>

                </div>
            </div>
        </div>
    </x-container>
</x-instructor-layout>
