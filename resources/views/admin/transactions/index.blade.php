<x-admin-layout>

    <div class="overflow-x-auto shadow-md sm:rounded-lg mb-4">
        <div class="p-5 bg-white dark:bg-gray-800 text-left">
            <div class="flex items-center justify-start">
                <x-a-button href="{{route('admin.transactions.create')}}" class="bg-weirdo-red-900">
                    Crear Transacción
                </x-a-button>
            </div>
        </div>
        <div  class="p-5 bg-white dark:bg-gray-800 text-left">
            <div class="grid grid-cols-5 gap-4">
                <div class="flex justify-center align-middle items-center">
                    <select class="clasificacion w-full block text-sm font-medium text-gray-900 dark:text-white h-full" style="width: 100%;" name="clasificacion" id="clasificacion">
                        <option value="0">Sin pagar</option>
                        <option value="1">Pagado</option>
                        <option value="2" selected>Todos</option>
                    </select>
                </div>
                <div class="flex col-span-3 justify-center align-middle items-center">
                    <span id="startDateLabel" class="px-4 text-center text-white">Desde</span>
                    <input type="date" name="startDate" id="startDate" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <span id="endDateLabel" class="px-4 text-center text-white">hasta</span>
                    <input type="date" name="endDate" id="endDate" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="flex items-center justify-start">
                    <x-a-button class="bg-weirdo-gray-700" id="btnFiltrar" onclick="cargarDatos()">
                        Filtrar
                    </x-a-button>
                </div>
            </div>
        </div>
    </div>

    <div class="overflow-x-auto shadow-md sm:rounded-lg ">
        <table class="w-full text-left text-gray-500 dark:text-gray-400">
            <caption class="p-5 bg-white dark:bg-gray-800 text-left">
                <h5 class= "text-xl font-bold leading-none text-gray-900 md:text-2xl dark:text-white">Transacciones</h5>
                <p class="mt-1 font-normal text-gray-500 dark:text-gray-400">Una transacción es un intercambio de bienes, servicios o dinero entre dos o más partes. Por ejemplo, cuando compras algo en una tienda, estás realizando una transacción con el vendedor. Las transacciones pueden ser simples o complejas, y pueden involucrar diferentes medios de pago, como efectivo, tarjetas, cheques o transferencias electrónicas. Las transacciones son importantes para la economía, ya que permiten el flujo de recursos y la creación de valor.</p>

            </caption>
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-1 sm:py-3 px-2 sm:px-6">
                        <div class="flex items-center">
                            Nro Transacción
                            <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="ml-1 w-3 h-3" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512">
                                    <path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z" />
                                </svg></a>
                        </div>
                    </th>
                    <th scope="col" class="py-1 sm:py-3 px-2 sm:px-6 col-start">
                        <div class="flex items-center">
                            Descripción
                            <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="ml-1 w-3 h-3" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512">
                                    <path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z" />
                                </svg></a>
                        </div>
                    </th>
                    <th scope="col" class="py-1 sm:py-3 px-2 sm:px-6">
                        <div class="flex items-center">
                            Fecha de Transacción
                            <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="ml-1 w-3 h-3" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512">
                                    <path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z" />
                                </svg></a>
                        </div>
                    </th>
                    <th scope="col" class="py-1 sm:py-3 px-2 sm:px-6">
                        <div class="flex items-center">
                            Valor Total
                            <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="ml-1 w-3 h-3" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512">
                                    <path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z" />
                                </svg></a>
                        </div>
                    </th>

                    <th scope="col" class="py-1 sm:py-3 px-2 sm:px-6">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody>



            </tbody>
        </table>
    </div>
    <script>
        $(document).ready(function() {
            $('.clasificacion').select2({
                placeholder: "Seleccione el tipo",
            });
        });
        $(document).ready(function() {
            $('.payment').select2({
                placeholder: "Seleccione el tipo",
            });
        });


        document.addEventListener('DOMContentLoaded', function() {
            cargarPagina();
        });

        function cargarPagina() {
            cargarDatos();
            document.querySelector('#startDate').value = "";
            document.querySelector('#endDate').value = "";
        }


        function cargarDatos() {

            removeChild();
            // event.preventDefault();
            let desde = document.querySelector('#startDate').value;
            let hasta = document.querySelector('#endDate').value;
            // console.log(desde, hasta);

            $.ajax({
                type: "GET",
                url: "{{ route ('api.items.enList')}}",
                data: {
                    desde: desde,
                    hasta: hasta
                },
                dataType: "json",
                success: function(data) {



                    console.log(data);
                    for (var cont = 0; cont < data.length; cont++) {

                        let tabla = document.querySelector('tbody');
                        let fila = document.createElement('tr');
                        fila.classList.add('bg-white', 'border-b', 'dark:bg-gray-800', 'dark:border-gray-700', 'hover:bg-gray-50', 'dark:hover:bg-gray-600');
                        fila.setAttribute('id', 'fila_' + data[cont].id);
                        fila.innerHTML = `
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">${data[cont].id}</td>
                        <td class="px-6 py-4">${data[cont].details}</td>
                        <td class="px-6 py-4">${data[cont].transaction_date}</td>
                        <td class="px-6 py-4">${data[cont].grand}</td>
                        <td class="px-6 py-4">${data[cont].grand}</td>
                        `
                        tabla.appendChild(fila);

                    }




                    // "id": 3,
                    // "details": "Optio perferendis quidem rerum modi dolor dolorem.",
                    // "payment": 82947,
                    // "grand": 96735,
                    // "status": 0,
                    // "type": "2",
                    // "transaction_date": "2016-02-03",
                    // "payment_installments": 0,
                    // "payment_number": 11,
                    // "autorization_number": 301068,
                    // "agreed_rate": "44.00",
                    // "billed_EA": "76.00",
                    // "category_id": 5,
                    // "budget_id": 4,
                    // "users_id": 1,
                    // "created_at": "2023-09-02T16:32:18.000000Z",
                    // "updated_at": "2023-09-02T16:32:18.000000Z"

                }
            });
        }

        function removeChild() {

            let tbody = document.querySelector('tbody');

            while (tbody.firstChild) {
                tbody.removeChild(tbody.firstChild);
            }
        }
    </script>
    @push('scripts')

    @endpush

</x-admin-layout>
