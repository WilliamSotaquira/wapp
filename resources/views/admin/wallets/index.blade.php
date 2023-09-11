<x-admin-layout>
    <div class="flex mb-4 justify-start">
        <x-a-button href="{{route('admin.wallets.create')}}">
            Crear Bolsillo
        </x-a-button>
    </div>


    <div class="overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-left text-gray-500 dark:text-gray-400">
            <caption class="p-5 bg-white dark:bg-gray-800 text-left">
                <h5 class="mb-4 text-xl font-bold leading-none text-gray-900 md:text-2xl dark:text-white">Bolsillos</h5>
                <p class="mt-1 font-normal text-gray-500 dark:text-gray-400">Seguro, multicadena y muy fácil de usar. Tu bolsillo está a solo un clic.</p>
            </caption>
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-1 sm:py-3 px-2 sm:px-6">
                        <div class="flex items-center">
                            Nombre Bolsillo
                            <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="ml-1 w-3 h-3" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512">
                                    <path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z" />
                                </svg></a>
                        </div>
                    </th>
                    <th scope="col" class="py-1 sm:py-3 px-2 sm:px-6">
                        <div class="flex items-center">
                            Descripción
                            <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="ml-1 w-3 h-3" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512">
                                    <path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z" />
                                </svg></a>
                        </div>
                    </th>
                    <th scope="col" class="py-1 sm:py-3 px-2 sm:px-6">
                        <div class="flex items-center">
                            Valor
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
            <tbody class="text-sm">
                @foreach ($wallets as $wallet)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="py-2 font-extrabold sm:py-4 px-2 sm:px-6 text-gray-900 whitespace-nowrap dark:text-white text-center sm:text-left">
                        <a href="{{route('admin.wallets.show', $wallet)}}">{{ $wallet->name }}</a>
                    </th>
                    <td class="py-2 sm:py-4 px-2 sm:px-6">
                        {{ Str::limit($wallet->description, 150)}}
                    </td>
                    <td class="py-2 sm:py-4 px-2 sm:px-6 font-extrabold">
                        ${{ number_format($wallet->value,0,',','.') }}
                    </td>
                    <td class="py-2 sm:py-4 px-2 sm:px-6 text-right">
                        <div class="columns-1 sm:columns-2">
                            <div>
                                <a href="{{route('admin.wallets.edit', $wallet)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</a>
                            </div>
                            <div>
                                <form action="{{route('admin.wallets.destroy', $wallet)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline">Eliminar</button>
                                </form>

                            </div>
                        </div>
                    </td>
                </tr>

                @endforeach



            </tbody>
        </table>
    </div>

    <script>
        function destroyWallet() {
            alert('Se eliminará la billetera');
            document.getElementById('formDestroyWallet').submit();
        }
    </script>

</x-admin-layout>
