@props(['course'])

@php
    $links = [
        [
            'route' => route('instructor.courses.edit', $course),
            'name' => 'Información del curso',
            'active' => request()->routeIs('instructor.courses.edit'),
        ],
        [
            'route' => route('instructor.courses.video', $course),
            'name' => 'Video promocional',
            'active' => request()->routeIs('instructor.courses.video'),
        ],
    ];
@endphp

<x-container class="py-8">
    <div class="grid grid-cols-1 lg:grid-cols-5 gap-6">
        <aside class="col-span-1">
            <h1 class="font-semibold text-xl mb-4">Edición de curso</h1>

            <nav>
                <ul class="space-y-2">
                    @foreach ($links as $link)
                        <li>
                            <a href="{{ $link['route'] }}"
                                class="{{ $link['active'] ? 'border-l-4 border-indigo-400 pl-3' : 'border-l-4 border-transparent pl-3' }}">
                                {{ $link['name'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </nav>
        </aside>

        <div class="col-span-1 lg:col-span-4">
            <div class="card">

                {{ $slot }}

            </div>
        </div>
    </div>
</x-container>
