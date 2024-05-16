<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Menus') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="px-4 sm:px-6 lg:px-8">
                        <div class="sm:flex sm:items-center">
                            <div class="sm:flex-auto">
                                <h1 class="text-base font-semibold leading-6 text-gray-900 dark:text-gray-100">{{ __('Menus') }}</h1>
                                <p class="mt-2 text-sm text-gray-700 dark:text-gray-300">{{ __('Tous les liens') }}</p>
                            </div>
                            <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                                <a href="{{route('menu.create')}}" class="block px-3 py-2 text-sm font-semibold text-center text-white bg-indigo-600 rounded-md shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Créer un nouvel element de Menu</a>
                            </div>
                        </div>
                        @if (session('success'))
                            <div class="w-full px-6 py-2 text-black bg-green-300 border border-black rounded-md">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="mt-8 -mx-4 sm:-mx-0">
                            <table class="min-w-full divide-y divide-gray-300">
                                <thead>
                                    <tr>
                                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 dark:text-gray-100 sm:pl-0">Ordre</th>
                                        <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-gray-100 lg:table-cell">Name</th>
                                        <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-gray-100 sm:table-cell">Groupe associé</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-gray-100">Lien</th>
                                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                                            <span class="sr-only">Modifier</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800">
                                    @foreach ($menus as $menu)
                                        <tr>
                                            <td class="w-full py-4 pl-4 pr-3 text-sm font-medium text-gray-900 dark:text-gray-100 max-w-0 sm:w-auto sm:max-w-none sm:pl-0">
                                                {{$menu->ordre}}
                                                <dl class="font-normal lg:hidden">
                                                    <dt class="sr-only">Name</dt>
                                                    @if($menu->is_group)
                                                        <dd class="mt-1 text-gray-200 dark:text-gray-800 truncate {{$menu->backoffice_color}}">{{$menu->name}}</dd>
                                                    @else
                                                        <dd class="mt-1 text-gray-700 truncate dark:text-gray-300">{{$menu->name}}</dd>
                                                    @endif
                                                    <dt class="sr-only sm:hidden">Groupe associé</dt>
                                                    <dd class="mt-1 text-gray-500 truncate sm:hidden">{{$menu->is_group}}</dd>
                                                    <dt class="sr-only sm:hidden">Lien</dt>
                                                    <dd class="mt-1 text-gray-500 truncate sm:hidden">{{$menu->link}}</dd>
                                                </dl>
                                            </td>
                                            @if($menu->is_group)
                                                <td class="hidden px-3 py-4 text-sm text-gray-900 dark:text-gray-100 lg:table-cell {{$menu->backoffice_color}}">{{$menu->name}}</td>
                                            @else
                                                <td class="hidden px-3 py-4 text-sm text-gray-700 dark:text-gray-300 lg:table-cell">{{$menu->name}}</td>
                                            @endif
                                            <td class="hidden px-3 py-4 text-sm text-gray-700 dark:text-gray-300 sm:table-cell @if($menu->group_id != ""){{$menu->group->backoffice_color}}@endif">@if($menu->group_id != ""){{$menu->group->name}}@else{{__("Pas de Groupe")}}@endif</td>
                                            <td class="px-3 py-4 text-sm text-gray-500">{{$menu->link}}</td>
                                            <td class="py-4 pl-3 pr-4 text-sm font-medium text-right sm:pr-0">
                                                <a href="{{route("menu.edit", $menu)}}" class="text-indigo-600 hover:text-indigo-900">Modifier<span class="sr-only">, {{$menu->name}}</span></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="px-4 sm:px-6 lg:px-8">
                        <div class="sm:flex sm:items-center">
                            <div class="sm:flex-auto">
                                <h1 class="text-base font-semibold leading-6 text-gray-900 dark:text-gray-100">{{ __('Preview') }}</h1>
                            </div>
                        </div>
                        <nav id="navbar" class="navbarback mb-80">
                            <ul>
                                @foreach($menusExemple as $menu)
                                    @if($menu->is_group)
                                        <li class="dropdown"><a href="#"><span class="dark:text-white">{{ $menu->name }}</span> <i class="bi bi-chevron-down dropdown-indicator dark:text-white"></i></a>
                                            <ul>
                                                @foreach($menu->subMenus as $subMenu)
                                                    @if ($subMenu->is_group)
                                                    <li class="dropdown"><a href="#"><span>{{ $subMenu->name }}</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                                                        <ul>
                                                            @foreach ($subMenu->subMenus as $sub)
                                                            <li><a href="{{ $sub->link }}">{{ $sub->name }}</a></li>
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                    @else
                                                        <li><a href="{{ $subMenu->link }}">{{ $subMenu->name }}</a></li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </li>
                                    @else
                                        <li><a href="{{ $menu->link }}"><span class="dark:text-white">{{ $menu->name }}</span></a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
