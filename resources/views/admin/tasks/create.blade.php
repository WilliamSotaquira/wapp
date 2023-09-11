<x-admin-layout>

    <form action="{{route('admin.tasks.store')}}" class="p-5 text-lg font-semibold text-left text-gray-700 bg-white dark:text-gray-800 dark:bg-gray-800 shadow-md sm:rounded-lg" method="POST">
        @csrf
        <h1 class="text-2xl pb-4 dark:text-white">Nueva Tarea</h1>

        <div class="grid md:gap-6 md:grid-cols-5">

            <div class="mb-4 md:col-span-2">
                <x-jet-label for="name">Nombre de la tarea*</x-jet-label>
                <x-jet-input type="text" name="name" id="name" value="{{old('name')}}" placeholder="Ingrese un nombre" autofocus autocomplete="name" required></x-jet-input>
                <x-input-error for="name" />
            </div>

            <div class="mb-4">
                <x-jet-label for="type">Tipo</x-jet-label>
                <x-jet-input type="text" name="type" id="type" value="{{old('type', 'Por clasificar')}}" placeholder="Ingrese el tipo de tareas" autofocus autocomplete="type" required></x-jet-input>
                <x-input-error for="type" />
            </div>

            <div class="mb-4 sm:row-span-2 sm:col-span-2">
                <x-jet-label for="notes">Notas</x-jet-label>
                <x-text-area rows="6" name="notes" id="notes" placeholder="Agregue su descripción aquí" autofocus autocomplete="notes">{{old('notes')}}</x-text-area>
                <x-input-error for="notes" />
            </div>

            <div class="mb-4">
                <x-jet-label for="Predecesora">Tarea predecesora</x-jet-label>
                <x-jet-input type="text" name="Predecesora" id="Predecesora" value="{{old('type', 3)}}" placeholder="Ingrese el tipo de tareas" autofocus autocomplete="Predecesora" required></x-jet-input>
                <x-input-error for="Predecesora" />
            </div>

            <div class="md-4">
                <x-jet-label for="sprint_id">Sprint*</x-jet-label>
                <select class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm text-sm" name="sprint_id" id="sprint_id">
                    <option class="disabled">Seleccione una opción </option>
                    @foreach ($sprints as $sprint)
                    <option value="{{$sprint->id}}">{{$sprint->name}}</i></option>
                    @endforeach
                </select>
            </div>

            <div class="md-4">
                <x-jet-label for="project_id">Proyecto*</x-jet-label>
                <select class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm text-sm" name="project_id" id="project_id">
                    <option class="disabled">Seleccione una opción </option>
                    @foreach ($projects as $project)
                    <option value="{{$project->id}}">{{$project->name}}</i></option>
                    @endforeach
                </select>
            </div>

        </div>
        <hr>
        <div class="flex justify-end mt-4" id="botones">
            <div class="px-2">
                <x-jet-button id="defaultModalButton" data-modal-toggle="defaultModal">
                    Agregar actividad
                </x-jet-button>
            </div>
            <div class="px-2">
                <x-jet-button class="bg-weirdo-gray-400 text-weirdo-gray-900">
                    Crear tarea
                </x-jet-button>
            </div>
        </div>
        <!-- Main modal -->
        <div id="defaultModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
            <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                <!-- Modal content -->
                <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                    <!-- Modal header -->
                    <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Agregar actividad
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="defaultModal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form action="#">
                        <div class="grid gap-4 mb-4 sm:grid-cols-2">

                            <div class="mb-4 sm:col-span-2">
                                <x-jet-label for="activity">Actividad*</x-jet-label>
                                <x-jet-input type="text" name="activity" id="activity" value="{{old('activity')}}" placeholder="Ingrese una actividad" autofocus autocomplete="activity" required></x-jet-input>
                                <x-input-error for="activity" />
                            </div>
                            <div class="mb-4 sm:row-span-2 sm:col-span-2">
                                <x-jet-label for="description">Descripción</x-jet-label>
                                <x-text-area rows="6" name="description" id="description" placeholder="Agregue su descripción aquí" autofocus autocomplete="description">{{old('description')}}</x-text-area>
                                <x-input-error for="description" />
                            </div>
                            <div class="mb-4 sm:col-span-2">
                                <label for="duration" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Duración (Cada 5 minutos)</label>
                                <input id="duration" type="range" value="20" step="5" min="5" max="50" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
                                <p class="text-center text-sm"><strong id="label_duration">20</strong> minutos</p>
                                <x-input-error for="duration" />

                            </div>
                            <div class="md-4">
                                <x-jet-label for="priority">Prioridad*</x-jet-label>
                                <select class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm text-sm" name="priority" id="priority">
                                    <option disabled>Seleccione una opción </option>
                                    <option value="Alta">Alta</option>
                                    <option value="Media">Media</option>
                                    <option value="Baja">Baja</option>
                                </select>
                            </div>
                            <div class="md-4">
                                <x-jet-label for="status">Estado*</x-jet-label>
                                <select class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm text-sm" name="status" id="status">
                                    <option disabled>Seleccione una opción </option>
                                    <option value="Activo">Activo</option>
                                    <option value="Finalizado">Finalizado</option>
                                    <option value="Pospuesto">Pospuesto</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <x-jet-label for="start_time">Hora de inicio*</x-jet-label>
                                <x-jet-input type="time" name="start_time" id="start_time" value="{{old('start_time')}}" placeholder="Ingrese una actividad" autofocus autocomplete="start_time" required></x-jet-input>
                                <x-input-error for="start_time" />
                            </div>
                            <div class="mb-4">
                                <x-jet-label for="start_at">Fecha de inicio*</x-jet-label>
                                <x-jet-input type="date" name="start_at" id="start_at" value="{{old('start_at')}}" placeholder="Ingrese una actividad" autofocus autocomplete="start_at" required></x-jet-input>
                                <x-input-error for="start_at" />
                            </div>
                            <div class="mb-4">
                                <x-jet-label for="end_time">Hora de fin*</x-jet-label>
                                <x-jet-input type="time" name="end_time" id="end_time" value="{{old('end_time')}}" placeholder="Ingrese una actividad" autofocus autocomplete="end_time" required></x-jet-input>
                                <x-input-error for="end_time" />
                            </div>
                            <div class="mb-4">
                                <x-jet-label for="end_at">Fecha de fin*</x-jet-label>
                                <x-jet-input type="time" name="end_at" id="end_at" value="{{old('end_at')}}" placeholder="Ingrese una actividad" autofocus autocomplete="end_at" required></x-jet-input>
                                <x-input-error for="end_at" />
                            </div>

                        </div>
                        <button type="submit" class="text-white inline-flex items-center bg-weirdo-red-900 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800" onclick="agregarDatos()">
                            <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                            </svg>
                            Agregar actividad
                        </button>
                    </form>
                </div>
            </div>


        </div>


    </form>
</x-admin-layout>

<script>

    document.addEventListener('',)

    document.addEventListener("DOMContentLoaded", function(event) {

        document.addEventListener('keydown', function(event) {
            if (event.key === "Escape") {
                document.getElementById('defaultModalButton').click();
            }
        });


    });

    document.addEventListener("DOMContentLoaded", function(event) {

        ocultarBotones();
        document.getElementById('defaultModalButton').click();
    });

    let rango = document.querySelector('#duration')
    rango.addEventListener("change", function(event) {
        let datos = document.querySelector('#duration').value;
        document.querySelector('#label_duration').textContent = datos;
    });

    let shortTime = document.querySelector('#start_time');
    shortTime.addEventListener("change", function(event) {
        agregarTiempo();
    });

    function agregarTiempo() {

        let timeFragment = document.querySelector('#duration').value;


        console.log(newDate);

        let timeInput = document.querySelector('#start_time').value;
        let timeBefore = timeInput + timeFragment;


        // document.querySelector('#label_duration').textContent = timeBefore;
    }

    function ocultarBotones() {
        document.querySelector('#botones').style.display = 'none';
    }

    function validarCampos() {

        let datos = document.querySelector('#name').value;

alert(datos);

    }
</script>
