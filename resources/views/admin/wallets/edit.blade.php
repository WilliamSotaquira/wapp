<x-admin-layout>
    <form action="{{route('admin.wallets.update', $wallet)}}" class="p-5 text-lg font-semibold text-left text-gray-700 bg-white dark:text-gray-800 dark:bg-gray-800 shadow-md sm:rounded-lg" method="POST">
        @csrf
        @method('PUT')
        <h1 class="text-2xl pb-4 dark:text-white">Editar Billetera</h1>
        <div class="mb-4">
            <x-jet-label for="name">Nombre*</x-jet-label>
            <x-jet-input type="text" name="name" id="name" value="{{old('name', $wallet->name)}}" placeholder="Ingrese un nombre para su billetera" autofocus autocomplete="name"></x-jet-input>
            <x-input-error for="name" />
        </div>
        <div class="mb-4">
            <x-jet-label for="description">Descripción</x-jet-label>
            <x-text-area name="description" id="description" placeholder="Agregue su descripción aquí" autofocus autocomplete="description" required="required">{{old('description', $wallet->description)}}</x-text-area>
            <x-input-error for="description" />

        </div>
        <div class="mb-4">
            <x-jet-label for="value">Valor*</x-jet-label>
            <x-jet-input type="number" name="value" id="value" value="{{old('value', $wallet->value)}}" placeholder="Ingrese el valor inicial de su billetera" autofocus autocomplete="value" required></x-jet-input>
            <x-input-error for="value" />
        </div>
        <div class="flex justify-end">
            <x-jet-button>
                Actualizar Billetera
            </x-jet-button>
        </div>
    </form>
</x-admin-layout>
