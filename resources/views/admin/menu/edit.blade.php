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
                                <h1 class="text-base font-semibold leading-6 text-gray-900 dark:text-gray-100">Modifier le Menu <span class="@if($menu->backoffice_color != "")px-4 py-2 rounded-lg {{ $menu->backoffice_color }} @else underline decoration-indigo-500 @endif">{{ $menu->name }}</span></h1>
                                <p class="mt-2 text-sm text-gray-700 dark:text-gray-300">{{ __('Formulaire de modification') }}</p>
                            </div>
                        </div>
                        @if (session('error'))
                            <div class="w-full px-6 py-2 text-black bg-red-300 border border-black rounded-md">
                                {{ session('error') }}
                            </div>
                        @endif
                        <div class="mt-8 -mx-4 sm:-mx-0">
                            <form action="{{ route('menu.update', $menu) }}" method="POST" class="flex flex-col gap-5">
                                @csrf
                                @method('PUT')
                                <div class="relative">
                                    <label for="name" class="absolute inline-block px-1 text-xs font-medium text-gray-900 bg-white -top-2 left-2">Name</label>
                                    <input type="text" name="name" id="name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="{{$menu->name}}" placeholder="Accueil">
                                </div>
                                <div class="relative @if ($menu->is_group) hidden @endif">
                                    <label for="link" class="absolute inline-block px-1 text-xs font-medium text-gray-900 bg-white -top-2 left-2">Lien</label>
                                    <input type="text" name="link" id="link" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="{{ $menu->link }}" placeholder="@if ($menu->is_route_link)admin.menu.index @else /#accueil @endif">
                                </div>
                                <div class="flex items-center gap-5 @if ($menu->is_group) hidden @endif" id="is_route_link_div">
                                    <p>Est-ce une route ?</p>
                                    <label class="switch">
                                        <input type="checkbox" name="is_route_link" id="is_route_link" @if ($menu->is_route_link) checked @endif>
                                        <span></span>
                                    </label>
                                </div>

                                <div class="flex items-center gap-5">
                                    <p>Est-ce un groupe ?</p>
                                    <label class="switch">
                                        <input type="checkbox" name="is_group" id="is_group" @if ($menu->is_group) checked @endif/>
                                        <span></span>
                                    </label>
                                </div>
                                <div id="backoffice_color_div" class="@if (!$menu->is_group) hidden @endif">
                                    <label for="backoffice_color" class="block text-sm font-medium leading-6 text-gray-900 dark:text-white">Couleur du Backoffice</label>
                                    <select id="backoffice_color" name="backoffice_color" class="mt-2 block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        <option value="-" selected>Choisissez une couleur</option>
                                        <option value="bg-slate-500" class="bg-slate-500" @foreach ($menus as $menu1)<?php echo $menu1->backoffice_color == 'bg-slate-500' ? 'disabled' : ''; ?>@endforeach @if ($menu->backoffice_color == "bg-slate-500") selected @endif>Ardoise</option>
                                        <option value="bg-gray-500" class="bg-gray-500" @foreach ($menus as $menu1)<?php echo $menu1->backoffice_color == 'bg-gray-500' ? 'disabled' : ''; ?>@endforeach @if ($menu->backoffice_color == "bg-gray-500") selected @endif>Gris</option>
                                        <option value="bg-zinc-500" class="bg-zinc-500" @foreach ($menus as $menu1)<?php echo $menu1->backoffice_color == 'bg-zinc-500' ? 'disabled' : ''; ?>@endforeach @if ($menu->backoffice_color == "bg-zinc-500") selected @endif>Zinc</option>
                                        <option value="bg-neutral-500" class="bg-neutral-500" @foreach ($menus as $menu1)<?php echo $menu1->backoffice_color == 'bg-neutral-500' ? 'disabled' : ''; ?>@endforeach @if ($menu->backoffice_color == "bg-neutral-500") selected @endif>Neutre</option>
                                        <option value="bg-stone-500" class="bg-stone-500" @foreach ($menus as $menu1)<?php echo $menu1->backoffice_color == 'bg-stone-500' ? 'disabled' : ''; ?>@endforeach @if ($menu->backoffice_color == "bg-stone-500") selected @endif>Roche</option>
                                        <option value="bg-zinc-500" class="bg-zinc-500" @foreach ($menus as $menu1)<?php echo $menu1->backoffice_color == 'bg-zinc-500' ? 'disabled' : ''; ?>@endforeach @if ($menu->backoffice_color == "bg-zinc-500") selected @endif>Zinc</option>
                                        <option value="bg-red-500" class="bg-red-500" @foreach ($menus as $menu1)<?php echo $menu1->backoffice_color == 'bg-red-500' ? 'disabled' : ''; ?>@endforeach @if ($menu->backoffice_color == "bg-red-500") selected @endif>Rouge</option>
                                        <option value="bg-orange-500" class="bg-orange-500" @foreach ($menus as $menu1)<?php echo $menu1->backoffice_color == 'bg-orange-500' ? 'disabled' : ''; ?>@endforeach @if ($menu->backoffice_color == "bg-orange-500") selected @endif>Orange</option>
                                        <option value="bg-amber-500" class="bg-amber-500" @foreach ($menus as $menu1)<?php echo $menu1->backoffice_color == 'bg-amber-500' ? 'disabled' : ''; ?>@endforeach @if ($menu->backoffice_color == "bg-amber-500") selected @endif>Ambre</option>
                                        <option value="bg-yellow-500" class="bg-yellow-500" @foreach ($menus as $menu1)<?php echo $menu1->backoffice_color == 'bg-yellow-500' ? 'disabled' : ''; ?>@endforeach @if ($menu->backoffice_color == "bg-yellow-500") selected @endif>Jaune</option>
                                        <option value="bg-lime-500" class="bg-lime-500" @foreach ($menus as $menu1)<?php echo $menu1->backoffice_color == 'bg-lime-500' ? 'disabled' : ''; ?>@endforeach @if ($menu->backoffice_color == "bg-lime-500") selected @endif>Vert citron</option>
                                        <option value="bg-green-500" class="bg-green-500" @foreach ($menus as $menu1)<?php echo $menu1->backoffice_color == 'bg-green-500' ? 'disabled' : ''; ?>@endforeach @if ($menu->backoffice_color == "bg-green-500") selected @endif>Vert</option>
                                        <option value="bg-emerald-500" class="bg-emerald-500" @foreach ($menus as $menu1)<?php echo $menu1->backoffice_color == 'bg-emerald-500' ? 'disabled' : ''; ?>@endforeach @if ($menu->backoffice_color == "bg-emerald-500") selected @endif>Emeraude</option>
                                        <option value="bg-teal-500" class="bg-teal-500" @foreach ($menus as $menu1)<?php echo $menu1->backoffice_color == 'bg-teal-500' ? 'disabled' : ''; ?>@endforeach @if ($menu->backoffice_color == "bg-teal-500") selected @endif>Sarcelle</option>
                                        <option value="bg-cyan-500" class="bg-cyan-500" @foreach ($menus as $menu1)<?php echo $menu1->backoffice_color == 'bg-cyan-500' ? 'disabled' : ''; ?>@endforeach @if ($menu->backoffice_color == "bg-cyan-500") selected @endif>Cyan</option>
                                        <option value="bg-sky-500" class="bg-sky-500" @foreach ($menus as $menu1)<?php echo $menu1->backoffice_color == 'bg-sky-500' ? 'disabled' : ''; ?>@endforeach @if ($menu->backoffice_color == "bg-sky-500") selected @endif>Ciel</option>
                                        <option value="bg-blue-500" class="bg-blue-500" @foreach ($menus as $menu1)<?php echo $menu1->backoffice_color == 'bg-blue-500' ? 'disabled' : ''; ?>@endforeach @if ($menu->backoffice_color == "bg-blue-500") selected @endif>Bleu</option>
                                        <option value="bg-indigo-500" class="bg-indigo-500" @foreach ($menus as $menu1)<?php echo $menu1->backoffice_color == 'bg-indigo-500' ? 'disabled' : ''; ?>@endforeach @if ($menu->backoffice_color == "bg-indigo-500") selected @endif>Indigo</option>
                                        <option value="bg-violet-500" class="bg-violet-500" @foreach ($menus as $menu1)<?php echo $menu1->backoffice_color == 'bg-violet-500' ? 'disabled' : ''; ?>@endforeach @if ($menu->backoffice_color == "bg-violet-500") selected @endif>Violet</option>
                                        <option value="bg-purple-500" class="bg-purple-500" @foreach ($menus as $menu1)<?php echo $menu1->backoffice_color == 'bg-purple-500' ? 'disabled' : ''; ?>@endforeach @if ($menu->backoffice_color == "bg-purple-500") selected @endif>Pourpre</option>
                                        <option value="bg-fuchsia-500" class="bg-fuchsia-500" @foreach ($menus as $menu1)<?php echo $menu1->backoffice_color == 'bg-fuchsia-500' ? 'disabled' : ''; ?>@endforeach @if ($menu->backoffice_color == "bg-fuchsia-500") selected @endif>Fuchsia</option>
                                        <option value="bg-pink-500" class="bg-pink-500" @foreach ($menus as $menu1)<?php echo $menu1->backoffice_color == 'bg-pink-500' ? 'disabled' : ''; ?>@endforeach @if ($menu->backoffice_color == "bg-pink-500") selected @endif>Rose vif</option>
                                        <option value="bg-rose-500" class="bg-rose-500" @foreach ($menus as $menu1)<?php echo $menu1->backoffice_color == 'bg-rose-500' ? 'disabled' : ''; ?>@endforeach @if ($menu->backoffice_color == "bg-rose-500") selected @endif>Rose doux</option>
                                    </select>
                                </div>

                                <div class="flex items-center gap-5">
                                    <p>Appartient à un groupe ?</p>
                                    <label class="switch">
                                        <input type="checkbox" name="belongstogroup" id="belongstogroup" @if ($menu->group != "") checked @endif>
                                        <span></span>
                                    </label>
                                </div>

                                <fieldset id="group_id_div" class="@if ($menu->group == "") hidden @endif w-fit">
                                    <legend class="sr-only">Pricing plans</legend>
                                    <div class="relative -space-y-px bg-white rounded-md">
                                        @foreach ($menus as $menu1)
                                            @if ($loop->first)
                                                <label class="relative flex flex-col p-4 border cursor-pointer rounded-tl-md rounded-tr-md focus:outline-none md:grid md:grid-cols-3 md:pl-4 md:pr-6 @if ($menu->group != "") @if ($menu->group->id == $menu1->id) z-10 border-indigo-200 bg-indigo-50 @else border-gray-200 @endif @else border-gray-200 @endif" id="group_{{ $menu1->id }}_div">
                                                    <span class="flex items-center text-sm">
                                                        <input type="radio" name="group_id" value="{{ $menu1->id }}" @if ($menu->group != "") @if ($menu->group->id == $menu1->id) checked @endif @endif class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-600 active:ring-2 active:ring-offset-2 active:ring-indigo-600">
                                                        <span id="group_{{ $menu1->id }}_name" class="ml-3 font-medium @if ($menu->group != "") @if ($menu->group->id == $menu1->id) text-indigo-900 @else text-gray-900 @endif @else text-gray-900 @endif">{{ $menu1->name }}</span>
                                                    </span>
                                                </label>
                                            @elseif ($loop->last)
                                                <label class="relative flex flex-col p-4 border cursor-pointer rounded-bl-md rounded-br-md focus:outline-none md:grid md:grid-cols-3 md:pl-4 md:pr-6 @if ($menu->group != "") @if ($menu->group->id == $menu1->id) z-10 border-indigo-200 bg-indigo-50 @else border-gray-200 @endif @else border-gray-200 @endif" id="group_{{ $menu1->id }}_div">
                                                    <span class="flex items-center text-sm">
                                                        <input type="radio" name="group_id" value="{{ $menu1->id }}" @if ($menu->group != "") @if ($menu->group->id == $menu1->id) checked @endif @endif class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-600 active:ring-2 active:ring-offset-2 active:ring-indigo-600">
                                                        <span id="group_{{ $menu1->id }}_name" class="ml-3 font-medium @if ($menu->group != "") @if ($menu->group->id == $menu1->id) text-indigo-900 @else text-gray-900 @endif @else text-gray-900 @endif">{{ $menu1->name }}</span>
                                                    </span>
                                                </label>
                                            @else
                                                <label class="relative flex flex-col p-4 border cursor-pointer focus:outline-none md:grid md:grid-cols-3 md:pl-4 md:pr-6 @if ($menu->group != "") @if ($menu->group->id == $menu1->id) z-10 border-indigo-200 bg-indigo-50 @else border-gray-200 @endif @else border-gray-200 @endif" id="group_{{ $menu1->id }}_div">
                                                    <span class="flex items-center text-sm">
                                                        <input type="radio" name="group_id" value="{{ $menu1->id }}" @if ($menu->group != "") @if ($menu->group->id == $menu1->id) checked @endif @endif class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-600 active:ring-2 active:ring-offset-2 active:ring-indigo-600">
                                                        <span id="group_{{ $menu1->id }}_name" class="ml-3 font-medium @if ($menu->group != "") @if ($menu->group->id == $menu1->id) text-indigo-900 @else text-gray-900 @endif @else text-gray-900 @endif">{{ $menu1->name }}</span>
                                                    </span>
                                                </label>
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="hidden text-indigo-900"></div>
                                </fieldset>
                                <button type="submit" class="px-3 py-2 text-sm font-semibold text-white bg-indigo-500 rounded-md shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Valider</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
