@php
   $links = [
       [
           'title' => 'Home',
           'url' => route('home'),
           'active' => request()->routeIs('home'),
       ],

   ];
@endphp

<nav class="bg-white border-b border-gray-100 dark:bg-gray-900 dark:text-white" x-data="{ open: false }">
   <!-- Primary Navigation Menu -->
   <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between h-16">
         <div class="flex">
            <!-- Logo -->
            <div class="shrink-0 flex items-center">
               <a href="{{route('home')}}" aria-label="Ir a menú principal">
                  <x-jet-application-mark class="block h-9 w-auto" />
               </a>
            </div>

            <!-- Navigation Links -->
            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
               @foreach ($links as $link)
                  <x-jet-nav-link class="dark:text-white" href="{{ $link['url'] }}" :active="$link['active']">
                     {{ $link['title'] }}
                  </x-jet-nav-link>
               @endforeach
            </div>
         </div>

         <div class="hidden sm:flex sm:items-center sm:ml-6">

            @auth
               <!-- Settings Dropdown -->
               <div class="ml-3 relative">
                  <x-jet-dropdown align="right" width="48">
                     <x-slot name="trigger">
                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                           <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                              <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                           </button>
                        @else
                           <span class="inline-flex rounded-md">
                              <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition" type="button">
                                 {{ Auth::user()->name }}

                                 <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                 </svg>
                              </button>
                           </span>
                        @endif
                     </x-slot>

                     <x-slot name="content">
                        <!-- Account Management -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                           {{ __('Manage Account') }}
                        </div>

                        <x-jet-dropdown-link href="{{ route('profile.show') }}">
                           {{ __('Profile') }}
                        </x-jet-dropdown-link>

                        @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                           <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                              {{ __('API Tokens') }}
                           </x-jet-dropdown-link>
                        @endif

                        <div class="border-t border-gray-100"></div>
                        <x-jet-dropdown-link  href="{{ route('admin.dashboard') }}">
                        {{ __('Admin') }}
                        </x-jet-dropdown-link>
                        <div class="border-t border-gray-100"></div>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}" x-data>
                           @csrf

                           <x-jet-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                              {{ __('Log Out') }}
                           </x-jet-dropdown-link>
                        </form>
                     </x-slot>
                  </x-jet-dropdown>
               </div>
            @else
               @if (Route::has('login'))
                  <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                     @auth
                        <a class="text-sm text-gray-700 dark:text-white underline" href="{{ url('/dashboard') }}">Dashboard</a>
                     @else
                        <a class="text-sm text-gray-700 dark:text-white underline" href="{{ route('login') }}">Log in</a>

                        @if (Route::has('register'))
                           <a class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline" href="{{ route('register') }}">Register</a>
                        @endif
                     @endauth
                  </div>
               @endif
            @endauth

         </div>

         <!-- Hamburger -->
         <div class="-mr-2 flex items-center sm:hidden">
            <button class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition" @click="open = ! open" title="Menú colapsable">
               <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                  <path class="inline-flex" :class="{ 'hidden': open, 'inline-flex': !open }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                  <path class="hidden" :class="{ 'hidden': !open, 'inline-flex': open }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
               </svg>
            </button>
         </div>
      </div>
   </div>

   <!-- Responsive Navigation Menu -->
   <div class="hidden sm:hidden" :class="{ 'block': open, 'hidden': !open }">
      <div class="pt-2 pb-3 space-y-1">
         @foreach ($links as $link)
            <x-jet-responsive-nav-link href="{{ $link['url'] }}" :active="$link['active']">
               {{$link['title']}}
            </x-jet-responsive-nav-link>
         @endforeach
         @guest
            <x-jet-responsive-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">
               {{ __('Log In') }}
            </x-jet-responsive-nav-link>
            <x-jet-responsive-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')">
               {{ __('Register') }}
            </x-jet-responsive-nav-link>

         @endguest
      </div>

      <!-- Responsive Settings Options -->

      @auth
         <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
               @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                  <div class="shrink-0 mr-3">
                     <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                  </div>
               @endif

               <div>
                  <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                  <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
               </div>
            </div>

            <div class="mt-3 space-y-1">
               <!-- Account Management -->
               <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                  {{ __('Profile') }}
               </x-jet-responsive-nav-link>

               @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                  <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                     {{ __('API Tokens') }}
                  </x-jet-responsive-nav-link>
               @endif

               <!-- Authentication -->
               <form method="POST" action="{{ route('logout') }}" x-data>
                  @csrf

                  <x-jet-responsive-nav-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                     {{ __('Log Out') }}
                  </x-jet-responsive-nav-link>
               </form>

               <!-- Team Management -->
               @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                  <div class="border-t border-gray-200"></div>

                  <div class="block px-4 py-2 text-xs text-gray-400">
                     {{ __('Manage Team') }}
                  </div>

                  <!-- Team Settings -->
                  <x-jet-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
                     {{ __('Team Settings') }}
                  </x-jet-responsive-nav-link>

                  @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                     <x-jet-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                        {{ __('Create New Team') }}
                     </x-jet-responsive-nav-link>
                  @endcan

                  <div class="border-t border-gray-200"></div>

                  <!-- Team Switcher -->
                  <div class="block px-4 py-2 text-xs text-gray-400">
                     {{ __('Switch Teams') }}
                  </div>

                  @foreach (Auth::user()->allTeams() as $team)
                     <x-jet-switchable-team :team="$team" component="jet-responsive-nav-link" />
                  @endforeach
               @endif
            </div>
         </div>
      @endauth

   </div>
</nav>
