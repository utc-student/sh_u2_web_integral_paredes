{{-- Do your work, then step back. --}}
<div>
    <ul class="mb-4 space-y-2">
        @foreach ($goals as $index => $goal)
            <li wire:key="goal-{{$goal['id']}}">
                <x-input wire:model="goals.{{$index}}.name" class="w-full" />
            </li>
        @endforeach
    </ul>

    <div class="flex justify-end mb-8">
        <x-button wire:click="update">
            Actualizar metas
        </x-button>
    </div>

    <form wire:submit="store">
        <div class="card bg bg-gray-100">
            <x-label>Nueva meta</x-label>

            <x-input wire:model="name" class="w-full" placeholder="Ingrese el nombre de la meta" />
            <x-input-error for="name" />

            <div class="flex justify-end mt-4">
                <x-button>Agregar meta</x-button>
            </div>
        </div>
    </form>
</div>
