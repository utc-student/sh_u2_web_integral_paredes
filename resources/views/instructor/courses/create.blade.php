<x-instructor-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Crear nuevo curso
        </h2>
    </x-slot>

    <x-container width="4xl">
        <div class="bg-white rounded-lg shadow-lg p-6">
            <form action="{{ route('instructor.courses.store') }}" method="POST">
                @csrf

                <h2 class="text-2xl text-center mb-4">
                    Complete la siguiente información para crear un curso
                </h2>

                <x-validation-errors :errors="$errors" />

                <div class="mb-4"> {{-- Titutlo --}}
                    <x-label for="title" class="mb-1">Nombre del curso</x-label>

                    <x-input id="title" class="w-full" placeholder="Nombre del curso" name="title"
                        value="{{ old('title') }}" />
                </div>

                <div class="mb-4"> {{-- Slug --}}
                    <x-label for="slug" class="mb-1">Slug del curso</x-label>

                    <x-input id="slug" class="w-full" placeholder="Slug del curso" name="slug"
                        value="{{ old('slug') }}" />
                </div>

                <div class="grid grid-cols-3 gap-4 mb-4">

                    <div> {{-- Categorias --}}
                        <x-label for="category_id" class="mb-1">Categoría</x-label>

                        <x-select name="category_id" id="category_id" class="w-full">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </x-select>
                    </div>

                    <div> {{-- Niveles --}}
                        <x-label for="level_id" class="mb-1">Nivel</x-label>

                        <x-select name="level_id" id="level_id" class="w-full">
                            @foreach ($levels as $level)
                                <option value="{{ $level->id }}" @selected(old('level_id') == $level->id)>
                                    {{ $level->name }}
                                </option>
                            @endforeach
                        </x-select>
                    </div>

                    <div> {{-- Precios --}}
                        <x-label for="price_id" class="mb-1">Precio</x-label>

                        <x-select name="price_id" id="price_id" class="w-full">
                            @foreach ($prices as $price)
                                <option value="{{ $price->id }}" @selected(old('price_id') == $price->id)>

                                    @if ($price->value == 0)
                                        Gratis
                                    @else
                                        ${{ $price->value }} USD (Nivel {{ $loop->index }})
                                    @endif
                                </option>
                            @endforeach
                        </x-select>
                    </div>

                </div>

                <div class="flex justify-end">
                    <x-button>Crear curso</x-button>
                </div>
            </form>
        </div>
    </x-container>
</x-instructor-layout>
