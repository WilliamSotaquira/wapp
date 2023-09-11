<x-admin-layout>

    <form action="{{route('admin.sprints.update', $sprint)}}" class="p-5 text-lg font-semibold text-left text-gray-700 bg-white dark:text-gray-800 dark:bg-gray-800 shadow-md sm:rounded-lg" method="POST">


    @csrf
        @method('PUT')

        <h1 class="text-2xl pb-4 dark:text-white">Editar Sprint</h1>
        <div class="mb-4">
            <x-jet-label for="name">Nombre*</x-jet-label>
            <x-jet-input type="text" name="name" id="name" value="{{old('name', $sprint->name)}}" placeholder="Ingrese un nombre para el Sprint" autofocus autocomplete="name" required></x-jet-input>
            <x-input-error for="name" />
        </div>
        <div class="mb-4">
            <x-jet-label for="workhours">Horas de trabajo*</x-jet-label>
            <x-jet-input type="number" name="workhours" id="workhours" value="{{old('workhours', $sprint->workhours)}}" placeholder="Ingrese un nombre para el Sprint" autofocus autocomplete="workhours" required></x-jet-input>
            <x-input-error for="workhours" />

        </div>
        <div class="grid md:gap-6 md:grid-cols-2">

            <div class="mb-4">
                <x-jet-label for="start_date">Fecha de inicio*</x-jet-label>
                <x-jet-input type="date" name="start_date" id="start_date" value="{{old('start_date', $sprint->start_date)}}" placeholder="Ingrese la fecha de inicio" autofocus autocomplete="start_date" required></x-jet-input>
                <x-input-error for="start_date" />
            </div>

            <div class="mb-4">
                <x-jet-label for="end_date">Fecha de fin*</x-jet-label>
                <x-jet-input type="date" name="end_date" id="end_date" value="{{old('end_date', $sprint->end_date)}}" placeholder="Ingrese la fecha del fin del ciclo" autofocus autocomplete="end_date" required></x-jet-input>
                <x-input-error for="end_date" />

            </div>
        </div>



        <div class="flex justify-end mt-4">
            <x-jet-button>Actualizar Strint</x-jet-button>
        </div>
    </form>
</x-admin-layout>
