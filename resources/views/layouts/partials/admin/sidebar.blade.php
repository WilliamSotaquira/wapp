<aside id="sidebar-multi-level-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">

        <div class="flex w-100 justify-center h-16 bg-weirdo-red-900 shadow-md">
            <a class="flex items-center pl-4 font-normal" href="/">
                <img class="mr-3 h-6 sm:h-7" src="/images/longLogo.png" alt="Flowbite Logo" />
            </a>
        </div>


    <div class="h-full px-3 py-4 overflow-y-auto bg-weirdo-gray-700 dark:bg-gray-800">
        <ul class="space-y-2">
            <li>
                <a href="{{route('admin.dashboard')}}" class="flex items-center p-2 text-base font-normal text-gray-50 rounded-lg dark:text-white hover:bg-weirdo-gray-900 dark:hover:bg-weirdo-gray-700">
                    <i class="fa-solid fa-gauge"></i>
                    <span class="ml-3">Dashboard</span>
                </a>
            </li>

            <li>
                <button type="button" class="flex items-center w-full p-2 text-base font-normal text-gray-50 transition duration-75 rounded-lg group hover:bg-weirdo-gray-900 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-finanzas" data-collapse-toggle="dropdown-finanzas">
                    <i class="fa-solid fa-coins"></i>
                    <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Finanzas</span>
                    <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
                <ul id="dropdown-finanzas" class="hidden py-2 space-y-2">
                    <li>
                        <a href="{{ route('admin.transactions.index')}}" class="flex items-center w-full p-2 text-base font-normal text-gray-50 transition duration-75 rounded-lg pl-11 group hover:bg-weirdo-gray-900 dark:text-white dark:hover:bg-gray-700">Transacciones</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.wallets.index')}}" class="flex items-center w-full p-2 text-base font-normal text-gray-50 transition duration-75 rounded-lg pl-11 group hover:bg-weirdo-gray-900 dark:text-white dark:hover:bg-gray-700">Proyectos</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.budgets.index')}}" class="flex items-center w-full p-2 text-base font-normal text-gray-50 transition duration-75 rounded-lg pl-11 group hover:bg-weirdo-gray-900 dark:text-white dark:hover:bg-gray-700">Presupuestos</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.wallets.index')}}" class="flex items-center w-full p-2 text-base font-normal text-gray-50 transition duration-75 rounded-lg pl-11 group hover:bg-weirdo-gray-900 dark:text-white dark:hover:bg-gray-700">Bolsillos</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.items.index')}}" class="flex items-center w-full p-2 text-base font-normal text-gray-50 transition duration-75 rounded-lg pl-11 group hover:bg-weirdo-gray-900 dark:text-white dark:hover:bg-gray-700">Articulos</a>
                    </li>
                </ul>
            </li>
            <li>
                <button type="button" class="flex items-center w-full p-2 text-base font-normal text-gray-50 transition duration-75 rounded-lg group hover:bg-weirdo-gray-900 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                    <i class="fa-solid fa-list-check"></i>
                    <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Tareas</span>
                    <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
                <ul id="dropdown-example" class="hidden py-2 space-y-2">
                    <li>
                        <a href="{{ route('admin.sprints.index')}}" class="flex items-center w-full p-2 text-base font-normal text-gray-50 transition duration-75 rounded-lg pl-11 group hover:bg-weirdo-gray-900 dark:text-white dark:hover:bg-gray-700">
                            <i class="fa-solid fa-rotate-right"></i>
                            <span class="flex-1 ml-3 whitespace-nowrap">Sprints</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.tasks.index')}}" class="flex items-center w-full p-2 text-base font-normal text-gray-50 transition duration-75 rounded-lg pl-11 group hover:bg-weirdo-gray-900 dark:text-white dark:hover:bg-gray-700">
                            Tareas
                            <span class="inline-flex items-end justify-center px-2 ml-3 text-sm font-medium text-gray-50 bg-weirdo-red-900 rounded-full dark:bg-gray-700 dark:text-gray-300">5</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-base font-normal text-gray-50 transition duration-75 rounded-lg pl-11 group hover:bg-weirdo-gray-900 dark:text-white dark:hover:bg-gray-700">Sub-tareas</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-base font-normal text-gray-50 transition duration-75 rounded-lg pl-11 group hover:bg-weirdo-gray-900 dark:text-white dark:hover:bg-gray-700">Invoice</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ route('admin.wallets.index')}}" class="flex items-center p-2 text-base font-normal text-gray-50 rounded-lg dark:text-white hover:bg-weirdo-gray-900 dark:hover:bg-gray-700">
                    <i class="fa-solid fa-wallet"></i>
                    <span class="flex-1 ml-3 whitespace-nowrap">Bolsillos</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.budgets.index')}}" class="flex items-center p-2 text-base font-normal text-gray-50 rounded-lg dark:text-white hover:bg-weirdo-gray-900 dark:hover:bg-gray-700">
                    <i class="fa-solid fa-rotate-right"></i>
                    <span class="flex-1 ml-3 whitespace-nowrap">Presupuestos</span>
                </a>
            </li>

            <li>
                <a href="#" class="flex items-center p-2 text-base font-normal text-gray-50 rounded-lg dark:text-white hover:bg-weirdo-gray-900 dark:hover:bg-gray-700">
                    <i class="fa-solid fa-briefcase"></i>
                    <span class="flex-1 ml-3 whitespace-nowrap">Proyectos</span>
                    <span class="inline-flex items-center justify-center w-3 h-3 p-3 ml-3 text-sm font-medium text-weirdo-red-900 bg-weirdo-gray-400 rounded-full dark:bg-weirdo-gray-400 dark:text-blue-300">3</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center p-2 text-base font-normal text-gray-50 rounded-lg dark:text-white hover:bg-weirdo-gray-900 dark:hover:bg-gray-700">
                    <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-50 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Usuarios</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center p-2 text-base font-normal text-gray-50 rounded-lg dark:text-white hover:bg-weirdo-gray-900 dark:hover:bg-gray-700">
                    <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-50 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Productos</span>
                </a>
            </li>

        </ul>
    </div>
</aside>
