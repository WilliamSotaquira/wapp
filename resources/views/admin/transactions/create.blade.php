<x-admin-layout>

    <form action="{{route('admin.transactions.store')}}" class="p-5 text-lg font-semibold text-left text-gray-700 bg-white dark:text-gray-800 dark:bg-gray-800 shadow-md sm:rounded-lg" method="POST">
        @csrf
        <h1 class="text-2xl pb-4 dark:text-white">Nueva Transacción</h1>

        <div class="grid mt-4 md:gap-6 md:grid-cols-8">

            <div class="mb-4 pt-6 flex justify-center">

                <x-a-button class="bg-weirdo-gray-700 px-1-importan" id="defaultModalButton" data-modal-toggle="defaultModal">
                    Nuevo
                </x-a-button>
            </div>

            <div class="md-4 md:col-span-4">
                <x-jet-label for="project_item" class="mb-1">Items*</x-jet-label>
                <select class="select2 project_item w-full block mb-2 text-sm font-medium text-gray-900 dark:text-white" name="project_item" id="project_item" style="width: 100%; border: 1px; padding: 8px !important; height: 20px !important; font-size: smaller !important;">
                    <!-- <option></option> -->
                    <!-- @foreach ($items as $item)
                    <option value="{{$item->id}}_{{$item->name}}_{{$item->tax}}_{{$item->price}}_{{$item->measure}}">{{$item->name}} ({{$item->measure}})</option>
                    @endforeach -->
                </select>
            </div>

            <div class="mb-4 md:col-span-2">
                <x-jet-label for="fila_qty">Cantidad*</x-jet-label>
                <x-jet-input type="number" name="fila_qty" id="fila_qty" value="{{old('fila_qty')}}" placeholder="Ingrese un nombre" autofocus autocomplete="fila_qty" required></x-jet-input>
                <x-input-error for="fila_qty" />
            </div>

            <div class="mb-4 pt-6">
                <x-a-button class="bg-emerald-600 px-4" id="agregarItem">
                    Agregar
                </x-a-button>
            </div>




        </div>
        <hr>

        <!-- tabla con los datos -->
        <div class="p-4">

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Item
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Unidad
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Precio Unitario
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Cantidad
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Impuesto
                            </th>
                            <th scope="col" class="px-6 py-3">
                                valor impuesto
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Total Item
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Opciones
                                <span class="sr-only">Editar</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>

        </div>
        <div id="detailOP" class="p-4 rounded-md">
            <hr>

            <h2 class="text-lg pb-4 mt-8 dark:text-white">Detalles Transacción</h2>

            <div class="grid mt-4 md:gap-6 md:grid-cols-4">

                <div class="mb-4">
                    <x-jet-label for="grand">Total*</x-jet-label>
                    <x-jet-input type="number" name="grand" id="grand" value="{{old('grand')}}" placeholder="" autofocus autocomplete="grand" required></x-jet-input>
                    <x-input-error for="grand" />
                </div>

                <div class="mb-4">
                    <x-jet-label for="transaction_date">Fecha Transacción*</x-jet-label>
                    <x-jet-input type="date" name="transaction_date" id="transaction_date" value="{{old('transaction_date')}}" placeholder="" autofocus autocomplete="transaction_date" required></x-jet-input>
                    <x-input-error for="transaction_date" />
                </div>

                <div class="mb-4">
                    <x-jet-label for="payment" class="mb-1">Tipo Pago*</x-jet-label>
                    <select class="payment w-full block mb-2 text-sm font-medium text-gray-900 dark:text-white" style="width: 100%;" name="payment" id="payment" onchange="paymentMethod()">
                        <option value=""></option>
                        <option value="1" selected>Efectivo</option>
                        <option value="2">Débito</option>
                        <option value="3">Crédito</option>
                        <option value="4">Bono</option>
                        <option value="5">Otro</option>
                    </select>
                </div>

                <div class="mb-4">
                    <x-jet-label for="status" class="mb-1">Estado del Pago*</x-jet-label>
                    <select class="status w-full block mb-2 text-sm font-medium text-gray-900 dark:text-white" style="width: 100%;" name="status" id="status">
                        <option value=""></option>
                        <option value="1" selected>Completado</option>
                        <option value="2">En progreso</option>
                        <option value="3">En espera</option>
                        <option value="4">Inconcluso</option>
                    </select>
                </div>


                <div class="md:col-span-2">
                    <div class="mb-4">
                        <x-jet-label for="categories_id" class="mb-1">Categoria*</x-jet-label>
                        <select class="categories_id w-full block mb-2 text-sm font-medium text-gray-900 dark:text-white" style="width: 100%;" name="categories_id" id="categories_id">
                            <option></option>
                            @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <x-jet-label for="budgets_id" class="mb-1">Presupuesto*</x-jet-label>
                        <select class="budgets_id w-full block mb-2 text-sm font-medium text-gray-900 dark:text-white" style="width: 100%;" name="budgets_id" id="budgets_id">
                            <option></option>
                            @foreach ($budgets as $budget)
                            <option value="{{$budget->id}}">{{$budget->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-4 md:col-span-2">
                    <x-jet-label for="details">Descripción</x-jet-label>
                    <x-text-area rows="4" name="details" id="details" placeholder="Agregue su descripción aquí" autofocus autocomplete="details">{{old('details')}}</x-text-area>
                    <x-input-error for="details bg" />
                </div>

            </div>
        </div>

        <div id="datosCredito" class="bg-gray-100 rounded-md p-4">
            <div class="pt-4 pb-2">
                <h3>Detalles del crédito</h3>
            </div>
            <hr>
            <div class="grid mt-4 md:gap-6 md:grid-cols-4">


                <div class="mb-4 md:col-span-2">
                    <x-jet-label for="type" class="mb-1">Tipo de credito*</x-jet-label>
                    <select class="type w-full block mb-2 text-sm font-medium text-gray-900 dark:text-white" style="width: 100%;" name="type" id="type">
                        <option value=""></option>
                        <option value="1" selected>Consumo</option>
                        <option value="2">Personal</option>
                        <option value="3">Rotativo</option>
                        <option value="4">Hipotecario</option>
                        <option value="5">Otro</option>
                    </select>
                </div>
                <div class="mb-4">
                    <x-jet-label for="payment_installments">Cuotas</x-jet-label>
                    <x-jet-input type="number" name="payment_installments" id="payment_installments" value="{{old('payment_installments')}}" placeholder="Ingrese un nombre" autofocus autocomplete="payment_installments"></x-jet-input>
                    <x-input-error for="payment_installments" />
                </div>
                <div class="mb-4">
                    <x-jet-label for="authorization_number">Numero de autorización</x-jet-label>
                    <x-jet-input type="number" name="authorization_number" id="authorization_number" value="{{old('authorization_number')}}" placeholder="Ingrese un nombre" autofocus autocomplete="authorization_number"></x-jet-input>
                    <x-input-error for="authorization_number" />
                </div>
                <div class="mb-4">
                    <x-jet-label for="agreed_rate">Tasa pactada</x-jet-label>
                    <x-jet-input type="number" name="agreed_rate" id="agreed_rate" value="{{old('agreed_rate')}}" placeholder="Ingrese un nombre" autofocus autocomplete="agreed_rate"></x-jet-input>
                    <x-input-error for="agreed_rate" />
                </div>
                <div class="mb-4">
                    <x-jet-label for="billed_EA">Tasa EA facturada</x-jet-label>
                    <x-jet-input type="number" name="billed_EA" id="billed_EA" value="{{old('billed_EA')}}" placeholder="Ingrese un nombre" autofocus autocomplete="billed_EA"></x-jet-input>
                    <x-input-error for="billed_EA" />
                </div>

            </div>


        </div>

        <div class="flex justify-end mt-4">
            <div class="px-2">
                <x-jet-button>
                    Crear tarea
                </x-jet-button>
            </div>
        </div>

    </form>

    <!-- Main modal -->
    <div id="defaultModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                <!-- Modal header -->
                <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Crear articulo
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="defaultModal" id="closeModal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->

                <form action="{{ route('api.items.create') }}" method="POST" name="createItem" id="addItem">
                    @csrf

                    <div class="grid md:gap-6 md:grid-cols-2">

                        <div class="mb-4">
                            <x-jet-label for="nameItem">Nombre del articulo*</x-jet-label>
                            <x-jet-input type="text" nameItem="nameItem" id="nameItem" value="{{old('nameItem')}}" placeholder="Ingrese un nombre" autofocus autocomplete="nameItem" required></x-jet-input>
                            <x-input-error for="nameItem" />
                        </div>

                        <div class="mb-4 ">
                            <x-jet-label for="taxItem">IVA</x-jet-label>
                            <x-jet-input type="number" name="taxItem" id="taxItem" value="{{old('taxItem', 'Impuesto del articulo')}}" placeholder="Ingrese el costo del articulo" autofocus autocomplete="taxItem" required></x-jet-input>
                            <x-input-error for="taxItem" />
                        </div>

                        <div class="mb-4 ">
                            <x-jet-label for="priceItem">Precio</x-jet-label>
                            <x-jet-input type="number" name="priceItem" id="priceItem" value="{{old('priceItem', 'Costo del articulo')}}" placeholder="Ingrese el costo del articulo" autofocus autocomplete="priceItem" required></x-jet-input>
                            <x-input-error for="priceItem" />
                        </div>

                        <div class="mb-4 ">
                            <x-jet-label for="previous_priceItem">Precio Anterior</x-jet-label>
                            <x-jet-input type="number" name="previous_priceItem" id="previous_priceItem" value="{{old('previous_priceItem', 'Precio anterior del articulo')}}" placeholder="Ingrese el costo del articulo" autofocus autocomplete="previous_priceItem" required></x-jet-input>
                            <x-input-error for="previous_priceItem" />
                        </div>

                        <div class="mb-4 ">
                            <x-jet-label for="measureItem">Unidad de medida</x-jet-label>
                            <x-jet-input type="text" name="measureItem" id="measureItem" value="{{old('measureItem', 'Precio anterior del articulo')}}" placeholder="Ingrese el costo del articulo" autofocus autocomplete="measureItem" required></x-jet-input>
                            <x-input-error for="measureItem" />
                        </div>

                        <div class="mb-4 ">
                            <x-jet-label for="by_fractionItem">Valor por medida</x-jet-label>
                            <x-jet-input type="number" name="by_fractionItem" id="by_fractionItem" value="{{old('by_fractionItem', 'Costo del articulo')}}" placeholder="Ingrese el valor por unidad de medida mínima" autofocus autocomplete="by_fractionItem" required></x-jet-input>
                            <x-input-error for="by_fractionItem" />
                        </div>

                        <div class="mb-4 ">
                            <x-jet-label for="efficiencyItem">Desempeño</x-jet-label>
                            <x-jet-input type="number" name="efficiencyItem" id="efficiencyItem" value="{{old('efficiencyItem', 'Duración del articulo')}}" placeholder="Ingrese la duración del articulo" autofocus autocomplete="efficiencyItem" required></x-jet-input>
                            <x-input-error for="efficiencyItem" />
                        </div>

                        <div class="md-4">
                            <x-jet-label for="maslow_valueItem">Prioridad*</x-jet-label>
                            <select class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 font-sans rounded-md shadow-sm text-sm" name="maslow_valueItem" id="maslow_valueItem">
                                <option class="font-sans" disabled>Seleccione una opción </option>
                                <option class="font-sans" value="1">Nivel 1: necesidades fisiológicas. Se trata de las necesidades más básicas del ser humano; comer, dormir, respirar. Son aquellas de las que depende su supervivencia</option>
                                <option class="font-sans" value="2">Nivel 2: necesidades de seguridad. Se trata de conseguir la seguridad física y económica. Estar seguros en el entorno en el que vivimos, tener salud o ingresos suficientes, y en general vivir sin riesgos en el futuro.</option>
                                <option class="font-sans" value="3">Nivel 3: necesidades sociales. El ser humano es un ser social que necesita relacionarse con los demás. El tercer nivel supone por tanto las relaciones en grupo ya sea con familia, amigos trabajo etc.</option>
                                <option class="font-sans" value="4">Nivel 4: necesidades de aprecio. Supone algo más que el anterior nivel, necesitamos no solo formar parte de un grupo sino también sentirnos apreciados y valorados por los demás.</option>
                                <option class="font-sans" value="5">Nivel 5: necesidades de autorrealización. Es el nivel más alto de la pirámide y supone la necesidad de desarrollar todo nuestro potencial y ser todo lo que podemos ser.</option>
                            </select>
                        </div>



                    </div>

                </form>
                <hr>
                <x-a-button class="bg-weirdo-red-900 px-4 mt-4" id="crearItem" onclick="crearItem()">
                    Agregar
                </x-a-button>

            </div>
        </div>


    </div>


</x-admin-layout>

<script>
    // inicializando las variables
    let qty = document.getElementById('fila_qty');
    let grand = document.getElementById('grand');
    let totalNeto = 0;
    let item_i = 0;
    let datos

    // ocultarSecciones
    document.querySelector('#detailOP').style.display = 'none';
    document.querySelector('#datosCredito').style.display = 'none';




    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('.project_item').select2({
            ajax: {
                url: "{{ route('api.items.select') }}",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        search: params.term
                    }
                },
                processResults: function(data) {
                    return {
                        results: data
                    }
                },

            }
        });
    });


    $(document).ready(function() {
        $('.payment').select2({
            placeholder: "Seleccione el tipo de pago",
        });
    });

    $(document).ready(function() {
        $('.status').select2({
            placeholder: "Seleccione el estado",
        });
    });

    $(document).ready(function() {
        $('.type').select2({
            placeholder: "Seleccione el tipo de credito",
        });
    });

    $(document).ready(function() {
        $('.categories_id').select2({
            placeholder: "Seleccione la categoria",
        });
    });

    $(document).ready(function() {
        $('.budgets_id').select2({
            placeholder: "Seleccione un presupuesto",
        });
    });


    let clickBoton = document.querySelector('#agregarItem').addEventListener('click', function() {
        validarSeleccion();
    });


    function paymentMethod() {
        let select = document.querySelector('#payment').value;

        if (select == 3) {
            alert("Agregue los datos correspondientes al crédito");
            document.querySelector('#datosCredito').style.display = 'block';
        } else {
            document.querySelector('#datosCredito').style.display = 'none';
        }

    }


    function agregarDatos() {
        let idSelectItem = document.querySelector('#project_item').value;

        let item_id, item_name, item_tax, item_price, item_measure;
        // console.log(idSelectItem);

        $.ajax({
            type: "GET",
            url: "{{ route ('api.items.get')}}",
            data: {
                id: idSelectItem
            },
            dataType: "json",
            success: function(data) {
                item_id = data.id;
                item_name = data.name;
                item_tax = data.tax;
                item_price = data.price;
                item_measure = data.measure;


                let qty = document.getElementById('fila_qty').value;
                let subtotal = qty * item_price;
                let impuesto = subtotal * item_tax / 100;
                let total = subtotal + impuesto;

                let tabla = document.querySelector('tbody');
                let fila = document.createElement('tr');
                fila.classList.add('bg-white', 'border-b', 'dark:bg-gray-800', 'dark:border-gray-700', 'hover:bg-gray-50', 'dark:hover:bg-gray-600');
                fila.setAttribute('id', 'fila_' + item_i);
                fila.innerHTML = `
        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
        <input type="hidden" name="items_id[]" id="items_id[]" class="form-control" value="${item_id}">
        ${item_name}
        </td>
        <td class="px-6 py-4">
        ${item_measure}
        </td>
        <td class="px-6 py-4  text-right">
        ${item_price}
        </td>
        <td class="px-6 py-4  text-right">
        <input type="hidden" name="qty[]" id="qty[]" class="form-control" value="${qty}">
            ${qty}
        </td>
        <td class="px-6 py-4  text-right">
        ${item_tax}%
        </td>
        <td class="px-6 py-4  text-right">
        <input type="hidden" name="tax_subtotal[]" id="tax_subtotal[]" class="form-control" value="${impuesto}">
        ${impuesto}
        </td>
        <td class="px-6 py-4  text-right">
        <input type="hidden" name="subtotal[]" id="subtotal_${item_i}" class="form-control" value="${subtotal}">
            ${subtotal}
        </td>
        <td class="px-6 py-4 text-right">
            <a onclick="eliminarFila(${item_i});" class="font-medium text-red-600 dark:text-red-500 hover:underline">Eliminar</a>
        </td>
        `;
                tabla.appendChild(fila);

                totalNeto = totalNeto + subtotal;
                grand.value = totalNeto;
                item_i++;

            }

        });




        // console.log('indice agregar ' + item_i);
    }


    function validarFila(index) {
        if (item_i === 0) {
            alert('No existen datos, por favor agregue un item o cree uno');
            document.querySelector('#detailOP').style.display = 'none';

            totalNeto = 0;
        }

    }

    function eliminarFila(index) {

        // console.log('eliminar fila ' + index);

        let sustraendo = document.querySelector('#subtotal_' + index).value;
        totalNeto = totalNeto - sustraendo;
        grand.value = totalNeto;


        document.getElementById('fila_' + index).remove();
        item_i--;

        validarFila();
        limpiarCampos();

    }

    function validarSeleccion() {

        let datos = document.querySelector('#project_item').value;
        let qty = document.getElementById('fila_qty').value;


        if (qty == 0 || qty == null || qty == '' || qty == undefined || datos == 0 || datos == '' || datos == null || datos == undefined) {

            alert('No ha seleccionado un item o no ha ingresado una cantidad');

        } else {

            agregarDatos();
            document.querySelector('#detailOP').style.display = 'block';

        }

    }

    function validarPago() {
        let datos = document.querySelector('#payment').value;

        if (datos == 3) {
            document.querySelector('#detailOP').style.display = 'block';
        } else {
            document.querySelector('#detailOP').style.display = 'none';
        }
    }

    function crearItem() {

        let nameItem = document.querySelector('#nameItem').value;
        let taxItem = document.querySelector('#taxItem').value;
        let priceItem = document.querySelector('#priceItem').value;
        let previous_priceItem = document.querySelector('#previous_priceItem').value;
        let measureItem = document.querySelector('#measureItem').value;
        let by_fractionItem = document.querySelector('#by_fractionItem').value;
        let efficiencyItem = document.querySelector('#efficiencyItem').value;
        let maslow_valueItem = document.querySelector('#maslow_valueItem').value;

        const datos = {
            name: nameItem,
            tax: taxItem,
            price: priceItem,
            previous_price: previous_priceItem,
            measure: measureItem,
            by_fraction: by_fractionItem,
            efficiency: efficiencyItem,
            maslow_value: maslow_valueItem
        }


        var datosFormulario = $('#addItem').serialize();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            url: "{{ route ('api.items.create')}}",
            data: datos,
            dataType: "json",
            success: function(data) {
                limpiarCampos();
            }
        });


        let closeModal = document.querySelector("#closeModal");
        closeModal.click();

        confirm("El registro ha sido creado ");

    }

    function limpiarCampos() {

        document.querySelector('#nameItem').value = "";
        document.querySelector('#taxItem').value = "";
        document.querySelector('#priceItem').value = "";
        document.querySelector('#previous_priceItem').value = "";
        document.querySelector('#measureItem').value = "";
        document.querySelector('#by_fractionItem').value = "";
        document.querySelector('#efficiencyItem').value = "";
        document.querySelector('#maslow_valueItem').value = "";
    }
</script>

<style>
    /* Path: resources\css\app.css */
    .select2-container--default .select2-selection--single .select2-selection__rendered,
    .select2-container--default .select2-selection--single {
        font-size: 14px;
        color: #6B7280;
        height: 38px;
        border-color: rgb(209 213 219 / var(--tw-border-opacity));
        display: flex;
        flex-direction: row;
        justify-content: start;
        align-items: normal;
        --tw-border-opacity: 1;

    }

    .select2-selection__rendered {
        padding: 3px;
        padding-left: 8px;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 38px !important;
    }
</style>


