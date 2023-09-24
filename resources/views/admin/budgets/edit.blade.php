<x-admin-layout>
    <form action="{{route('admin.budgets.update', $budget)}}" class="p-5 text-lg font-semibold text-left text-gray-700 bg-white dark:text-gray-800 dark:bg-gray-800 shadow-md sm:rounded-lg" method="POST">

        @csrf
        @method('PUT')

        <h1 class="text-2xl pb-4 dark:text-white">Editar Presupuesto</h1>
        <div class="mb-4">
            <x-jet-label for="name">Nombre*</x-jet-label>
            <x-jet-input type="text" name="name" id="name" value="{{old('name', $budget->name)}}" placeholder="Ingrese un nombre para su presupuesto" autofocus autocomplete="name"></x-jet-input>
            <x-input-error for="name" />
        </div>
        <div class="mb-4">
            <x-jet-label for="value">Valor para reserva*</x-jet-label>
            <x-jet-input type="number" name="value" id="value" value="{{old('value', $budget->value)}}" placeholder="Ingrese el valor de reserva" autofocus autocomplete="value" required></x-jet-input>
            <x-input-error for="value" />
        </div>
        <div class="mb-4">
            <x-jet-label for="wallet_id">Billetera*</x-jet-label>
            <select class="w-full block rounded-md shadow-sm text-sm" name="wallet_id" id="wallet_id">
                @foreach ($wallets as $wallet )
                <option value="1" @selected(old('wallet_id', $budget->wallet_id) == $wallet->id)>{{$wallet->name}} - <i>{{$wallet->description}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <x-jet-label for="purpose">Propósito</x-jet-label>
            <x-text-area name="purpose" id="purpose" placeholder="Agregue su propósito aquí" autofocus autocomplete="purpose" required="required">{{old('purpose', $budget->purpose)}}</x-text-area>
            <x-input-error for="purpose" />
        </div>
        <div class="flex justify-end">
            <x-jet-button>
                Actualizar Presupuesto
            </x-jet-button>
        </div>
    </form>
</x-admin-layout>
