<x-instructor-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Curso: {{ $course->title }}
        </h2>
    </x-slot>

    <x-instructor.course-sidebar :course="$course">
        <form action="{{ route('instructor.courses.update', $course) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <p class="text-xl font-semibold">Información del curso</p>

            <hr class="mt-2 mb-6">

            <x-validation-errors class="mb-4" />

            <div class="mb-4">
                <x-label value="Título del curso" class="mb-1" />
                <x-input type="text" class="w-full" name="title" value="{{ old('title', $course->title) }}" />
            </div>

            @empty($course->published_at)
                <div class="mb-4">
                    <x-label value="Slug del curso" class="mb-1" />
                    <x-input type="text" class="w-full" name="slug" value="{{ old('slug', $course->slug) }}" />
                </div>
            @endempty

            <div class="mb-4">
                <x-label value="Resumen del curso" class="mb-1" />
                <x-textarea name="summary" class="form-textarea w-full"
                    rows="3">{{ old('summary', $course->summary) }}</x-textarea>
            </div>

            <div class="mb-4 ckeditor">
                <x-label value="Descripción del curso" class="mb-1" />
                <x-textarea id="description" name="description" class="form-textarea w-full"
                    rows="3">{{ old('description', $course->description) }}</x-textarea>
            </div>

            <div class="grid md:grid-cols-3 gap-4 mb-8">

                <div> {{-- Categorias --}}
                    <x-label for="category_id" class="mb-1">Categoría</x-label>

                    <x-select name="category_id" id="category_id" class="w-full">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @selected(old('category_id', $course->category_id) == $category->id)>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </x-select>
                </div>

                <div> {{-- Niveles --}}
                    <x-label for="level_id" class="mb-1">Nivel</x-label>

                    <x-select name="level_id" id="level_id" class="w-full">
                        @foreach ($levels as $level)
                            <option value="{{ $level->id }}" @selected(old('level_id', $course->level_id) == $level->id)>
                                {{ $level->name }}
                            </option>
                        @endforeach
                    </x-select>
                </div>

                <div> {{-- Precios --}}
                    <x-label for="price_id" class="mb-1">Precio</x-label>

                    <x-select name="price_id" id="price_id" class="w-full">
                        @foreach ($prices as $price)
                            <option value="{{ $price->id }}" @selected(old('price_id', $course->price_id) == $price->id)>

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

            <div>
                <p class="text-2xl font-semibold mb-2">Imagén del curso</p>

                <div class="grid md:grid-cols-2 gap-4">
                    <figure>
                        <img src="{{ $course->image }}" alt="Imagén del curso" id="imgPreview"
                            class="w-full aspect-video object-cover object-center">
                    </figure>

                    <div>
                        <p class="mb-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum
                            obcaecati tempore enim vero accusantium quisquam aperiam corrupti dolore. Nemo
                            sit consequatur ipsum reiciendis libero rem beatae vero, tenetur possimus ea.
                        </p>

                        <label>
                            <span class="btn btn-blue md:hidden">Selecciona una imagén</span>

                            <input class="hidden md:block" type="file" accept="image/*" name="image"
                                onchange="preview_image(event, '#imgPreview')">
                        </label>

                        <div class="flex md:justify-end mt-4">
                            <x-button>Guardar cambios</x-button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </x-instructor.course-sidebar>

    @push('js')
        <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
        <script>
            ClassicEditor
                .create(document.querySelector('#description'))
                .catch(error => {
                    console.error(error);
                });
        </script>
    @endpush

</x-instructor-layout>