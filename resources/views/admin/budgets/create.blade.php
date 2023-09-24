<x-admin-layout>

    <form action="{{route('admin.budgets.store')}}" class="p-5 text-lg font-semibold text-left text-gray-700 bg-white dark:text-gray-800 dark:bg-gray-800 shadow-md sm:rounded-lg" method="POST">
        @csrf

        <h1 class="text-2xl pb-4 dark:text-white">Nuevo presupuesto</h1>
        <div class="grid md:gap-6 md:grid-cols-3">

            <div class="mb-4">
                <x-jet-label for="name">Nombre*</x-jet-label>
                <x-jet-input type="text" name="name" id="name" value="{{old('name')}}" placeholder="Ingrese un nombre para su presupuesto" autofocus autocomplete="name"></x-jet-input>
                <x-input-error for="name" />
            </div>
            <div class="mb-4">
                <x-jet-label for="value">Valor para reserva*</x-jet-label>
                <x-jet-input type="number" name="value" id="value" value="{{old('value')}}" placeholder="Ingrese el valor de su presupuesto para ser reservado" autofocus autocomplete="value" required></x-jet-input>
                <x-input-error for="value" />
            </div>

            <div class="md-4 ">
                <x-jet-label for="wallet_id">Bolsillo*</x-jet-label>
                <select class="w-full block rounded-md shadow-sm text-sm" name="wallet_id" id="wallet_id">
                    <option class="disabled">Seleccione una opción </option>
                    @foreach ($wallets as $wallet)
                    <option value="{{$wallet->id}}">{{$wallet->name}} - <i>{{$wallet->description}}</i></option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4 md:col-span-3">
                <x-jet-label for="purpose">Propósito</x-jet-label>
                <x-text-area name="purpose" id="purpose" placeholder="Agregue su descripción aquí" autofocus autocomplete="purpose">{{old('purpose')}}</x-text-area>
                <x-input-error for="purpose" />

            </div>

        </div>


        <div class="flex justify-end">
            <x-jet-button>Crear Presupuesto
            </x-jet-button>
        </div>
    </form>
</x-admin-layout>
