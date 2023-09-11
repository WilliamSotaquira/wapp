<x-admin-layout>

    <form action="{{route('admin.tasks.store')}}" class="p-5 text-lg font-semibold text-left text-gray-700 bg-weirdo-gray-900 dark:text-gray-800 dark:bg-gray-800 shadow-md sm:rounded-lg" method="POST">
        @csrf
        <h1 class="text-2xl pb-4 dark:text-white">Detalle de tarea</h1>
        <hr class="h-px my-4 bg-gray-200 border-0 dark:bg-gray-700">

        <div class="grid md:gap-x-8 md:gap-y-2 md:grid-cols-6 p-8">

            <div class="flex justify-between mb-4 rounded-t sm:mb-5 md:col-span-3">
                <div class="text-lg text-gray-900 md:text-xl dark:text-white">
                    <span class="text-sm text-gray-400 font-light">Nombre de la tarea:</span>
                    <p class="text-white font">{{$task->name}}</p>
                </div>
            </div>

            <div class="flex justify-between mb-4 rounded-t sm:mb-5 md:col-span-2">
                <div class="text-lg text-gray-900 md:text-xl dark:text-white">
                    <span class="text-sm text-gray-400 font-light">Proyecto:</span>
                    <p class="text-white leading-4"><strong>{{$project->name}}:</strong><br><i class="text-sm">{{$project->description}}</i></p>
                </div>
            </div>

            <div class="flex justify-between mb-4 rounded-t sm:mb-5">
                <div class="text-lg text-gray-900 md:text-xl dark:text-white">
                    <span class="text-sm text-gray-400 font-light">Tipo:</span>
                    <p class="text-white font">{{$task->type}}</p>
                </div>
            </div>

            <div class="flex justify-between mb-4 rounded-t sm:mb-5">
                <div class="text-lg text-gray-900 md:text-xl dark:text-white">
                    <span class="text-sm text-gray-400 font-light">Sprint:</span>
                    <p class="text-white leading-4"><strong>{{$sprint->name}}</strong><br><span class="text-sm">{{$sprint->start_date}} - {{$sprint->end_date}}</span></p>
                </div>
            </div>

            <div class="flex justify-between mb-4 rounded-t sm:mb-5">
                <div class="text-lg text-gray-900 md:text-xl dark:text-white">
                    <span class="text-sm text-gray-400 font-light">Duración:</span>
                    <p class="text-white font">{{$task->duration}} horas</p>
                </div>
            </div>

            <div class="flex justify-between mb-4 rounded-t sm:mb-5">
                <div class="text-lg text-gray-900 md:text-xl dark:text-white">
                    <span class="text-sm text-gray-400 font-light">Estado:</span>
                    <p class="text-white font">{{$task->status}}</p>
                </div>
            </div>

            <div class="flex justify-between mb-4 rounded-t sm:mb-5">
                <div class="text-lg text-gray-900 md:text-xl dark:text-white">
                    <span class="text-sm text-gray-400 font-light">Progreso:</span>
                    <p class="text-white font">{{$task->progress}} %</p>
                </div>
            </div>



            <div class="flex justify-between mb-4 rounded-t sm:mb-5">
                <div class="text-lg text-gray-900 md:text-xl dark:text-white">
                    <span class="text-sm text-gray-400 font-light">Prioridad:</span>
                    <p class="text-white font">{{$task->priority}} horas</p>
                </div>
            </div>

            <div class="flex justify-between mb-4 rounded-t sm:mb-5">
                <div class="text-lg text-gray-900 md:text-xl dark:text-white">
                    <span class="text-sm text-gray-400 font-light">Predecesora:</span>
                    <p class="text-white font">{{$task->predecessor}}</p>
                </div>
            </div>
            <div class="flex justify-between mb-4 rounded-t sm:mb-5 md:col-span-3">
                <div class="text-lg text-gray-900 md:text-xl dark:text-white">
                    <span class="text-sm text-gray-400 font-light">Descripción:</span>
                    <p class="text-white font">{{$task->description}}</p>
                </div>
            </div>
            <div class="flex justify-between mb-4 rounded-t sm:mb-5 md:col-span-2">
                <div class="text-lg text-gray-900 md:text-xl dark:text-white">
                    <span class="text-sm text-gray-400 font-light">Notas:</span>
                    <p class="text-white wordwrap break-words">{{$task->notes}}</p>
                </div>
            </div>

        </div>

        <hr class="h-px my-4 bg-gray-200 border-0 dark:bg-gray-700">

        <div class="grid md:gap-x-8 md:gap-y-2 md:grid-cols-6 p-8">


            <div class="flex justify-between mb-4 rounded-t sm:mb-5">
                <div class="text-lg text-gray-900 md:text-xl dark:text-white">
                    <span class="text-sm text-gray-400 font-light">Fecha de inicio:</span>
                    <p class="text-white font">{{$task->start_at}}</p>
                </div>
            </div>
            <div class="flex justify-between mb-4 rounded-t sm:mb-5">
                <div class="text-lg text-gray-900 md:text-xl dark:text-white">
                    <span class="text-sm text-gray-400 font-light">Hora de inicio:</span>
                    <p class="text-white font">{{$task->start_time}}</p>
                </div>
            </div>
            <div class="flex justify-between mb-4 rounded-t sm:mb-5">
                <div class="text-lg text-gray-900 md:text-xl dark:text-white">
                    <span class="text-sm text-gray-400 font-light">Fecha de fin:</span>
                    <p class="text-white font">{{$task->end_at}}</p>
                </div>
            </div>
            <div class="flex justify-between mb-4 rounded-t sm:mb-5">
                <div class="text-lg text-gray-900 md:text-xl dark:text-white">
                    <span class="text-sm text-gray-400 font-light">Hora de fin:</span>
                    <p class="text-white font">{{$task->end_time}}</p>
                </div>
            </div>



        </div>



        <div class="flex justify-end mt-4">
            <x-jet-button>Editar tarea</x-jet-button>
        </div>
    </form>
</x-admin-layout>
