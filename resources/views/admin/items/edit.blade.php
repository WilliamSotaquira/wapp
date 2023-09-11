<x-admin-layout>

    <form action="{{route('admin.items.update', $item)}}" class="p-5 text-lg font-semibold text-left text-gray-700 bg-white dark:text-gray-800 dark:bg-gray-800 shadow-md sm:rounded-lg " method="POST">


        @csrf
        @method('PUT')
        <h1 class="text-2xl pb-4 dark:text-white">Editar Articulo</h1>
        <div class="grid md:gap-6 md:grid-cols-3">
            <div class="mb-4">
                <x-jet-label for="name">Nombre*</x-jet-label>
                <x-jet-input type="text" name="name" id="name" value="{{old('name', $item->name)}}" placeholder="Ingrese un nombre para el articulo" autofocus autocomplete="name" required></x-jet-input>
                <x-input-error for="name" />
            </div>
            <div class="mb-4">
                <x-jet-label for="tax">IVA*</x-jet-label>
                <x-jet-input type="text" name="tax" id="tax" value="{{old('tax', $item->tax)}}" placeholder="Ingrese el valor del impuesto" autofocus autocomplete="tax" required></x-jet-input>
                <x-input-error for="tax" />
            </div>
            <div class="mb-4">
                <x-jet-label for="price">Precio*</x-jet-label>
                <x-jet-input type="number" name="price" id="price" value="{{old('price', $item->price)}}" placeholder="Ingrese un nombre para el articulo" autofocus autocomplete="price" required></x-jet-input>
                <x-input-error for="price" />
            </div>
            <div class="mb-4">
                <x-jet-label for="previous_price">Precio anterior</x-jet-label>
                <x-jet-input type="number" name="previous_price" id="previous_price" value="{{old('previous_price', $item->previous_price)}}" placeholder="Ingrese un nombre para el articulo" autofocus autocomplete="previous_price"></x-jet-input>
                <x-input-error for="previous_price" />
            </div>
            <div class="mb-4">
                <x-jet-label for="measure">Unidad de medida</x-jet-label>
                <x-jet-input type="text" name="measure" id="measure" value="{{old('measure', $item->measure)}}" placeholder="Ingrese la unidad de medida" autofocus autocomplete="measure"></x-jet-input>
                <x-input-error for="measure" />
            </div>
            <div class="mb-4">
                <x-jet-label for="by_fraction">Valor de medida mínima</x-jet-label>
                <x-jet-input type="text" name="by_fraction" id="by_fraction" value="{{old('by_fraction', $item->by_fraction)}}" placeholder="Ingrese la unidad de medida" autofocus autocomplete="by_fraction"></x-jet-input>
                <x-input-error for="by_fraction" />
            </div>
            <div class="mb-4">
                <x-jet-label for="efficiency">Desempeño*</x-jet-label>
                <x-jet-input type="number" name="efficiency" id="efficiency" value="{{old('efficiency', $item->efficiency)}}" placeholder="Ingrese valor por gramo, valor por unidad de medida minima" autofocus autocomplete="efficiency" required></x-jet-input>
                <x-input-error for="efficiency" />
            </div>

            <div class="mb-4">
                <x-jet-label for="maslow_value">Prioridad*</x-jet-label>
                <select class="w-full block rounded-md shadow-sm text-sm" name="maslow_value" id="maslow_value">
                    <option class="font-sans" value="{{old('maslow_value', $item->maslow_value)}}" selected></option>
                    <option class="font-sans" value="1">Nivel 1: necesidades fisiológicas. Se trata de las necesidades más básicas del ser humano; comer, dormir, respirar. Son aquellas de las que depende su supervivencia</option>
                    <option class="font-sans" value="2">Nivel 2: necesidades de seguridad. Se trata de conseguir la seguridad física y económica. Estar seguros en el entorno en el que vivimos, tener salud o ingresos suficientes, y en general vivir sin riesgos en el futuro.</option>
                    <option class="font-sans" value="3">Nivel 3: necesidades sociales. El ser humano es un ser social que necesita relacionarse con los demás. El tercer nivel supone por tanto las relaciones en grupo ya sea con familia, amigos trabajo etc.</option>
                    <option class="font-sans" value="4">Nivel 4: necesidades de aprecio. Supone algo más que el anterior nivel, necesitamos no solo formar parte de un grupo sino también sentirnos apreciados y valorados por los demás.</option>
                    <option class="font-sans" value="5">Nivel 5: necesidades de autorrealización. Es el nivel más alto de la pirámide y supone la necesidad de desarrollar todo nuestro potencial y ser todo lo que podemos ser.</option>
                </select>
            </div>
        </div>
        <div class="flex justify-end mt-4">
            <x-jet-button>Actualizar Articulo</x-jet-button>
        </div>
    </form>
</x-admin-layout>
