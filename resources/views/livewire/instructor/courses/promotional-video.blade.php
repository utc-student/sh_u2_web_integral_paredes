{{-- Stop trying to control. --}}
<div>
    <h1 class="text-xl font-semibold">Video promocional</h1>

    <hr class="mb-6 mt-2">

    <div class="grid grid-cols-2 gap-6">
        <div class="col-span-1">
            @if ($course->video_path)
                <video controls class="aspect-video">
                    <source src="{{Storage::url($course->video_path)}}" type="video/mp4">
                </video>
            @else
                <figure>
                    <img src="{{ $course->image }}" alt="Imagén del curso: {{ $course->title }}"
                        class="w-full aspect-video object-cover">
                </figure>
            @endif
        </div>

        <div class="col-span-1">
            <form wire:submit="save">
                <x-validation-errors />

                <p class="mb-4">Especificaciones del video: Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                    Modi consectetur veniam labore ratione deleniti. Aut iusto laborum quae libero dolores, odio
                    corporis pariatur hic illo, dignissimos cum eos distinctio aperiam.</p>

                <x-progress-indicator wire:model="video" />

                <div class="flex justify-end mt-4">
                    <x-button>
                        Subir video
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</div>
