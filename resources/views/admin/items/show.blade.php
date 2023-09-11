<x-admin-layout>

<div  class="p-5 text-lg font-semibold text-left text-gray-700 bg-white dark:text-gray-800 dark:bg-gray-800 shadow-md sm:rounded-lg">

        <h1 class="text-2xl pb-4 dark:text-white">Articulo {{$item->code}}</h1>
        <div class="grid md:gap-6 md:grid-cols-3">

            <div class="mb-4">
                <x-jet-label for="name">Nombre*</x-jet-label>
                <x-jet-input type="text" name="name" id="name" value="{{$item->name}}"></x-jet-input>
            </div>
            <div class="mb-4">
                <x-jet-label for="performance">Desempeño*</x-jet-label>
                <x-jet-input type="number" name="performance" id="performance" value="{{$item->performance}}"></x-jet-input>
            </div>
            <div class="mb-4">
                <x-jet-label for="score">Puntuación*</x-jet-label>
                <x-jet-input type="number" name="score" id="score" value="{{$item->score}}"></x-jet-input>
            </div>
            <div class="mb-4">
                <x-jet-label for="cost">Costo*</x-jet-label>
                <x-jet-input type="number" name="cost" id="cost" value="{{$item->cost}}"></x-jet-input>
            </div>
        </div>


        <div class="flex justify-end mt-4">
            <x-a-button href="{{route('admin.items.edit', $item)}}">
                Editar Artículo
            </x-a-button>
        </div>


</div>
</x-admin-layout>

