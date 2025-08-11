@php
/* Este será nuestro sidebar dinámico. */
$links =[
[
'header' => 'Administrar Página'
],
[
'name' => 'Dashboard',
'icon' => 'fa-solid fa-gauge',
'href' => route('admin.dashboard'),
'active' => request()->routeIs('admin.dashboard'),
/* 'submenu' => [
[
'name' => 'Dashboard',
'href' => route('admin.dashboard'),
'active' => request()->routeIs('admin.dashboard'),
]
] */
],
]
@endphp
<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
        <ul class="space-y-2 font-medium">
            {{-- Iniciamos links dinámicos --}}
            @foreach ($links as $link )
            <li>
                @if(isset($link['header']))
                <div class="px-2 py-2 text-xs font-semibold text-gray-500 uppercase">
                    {{ $link['header'] }}
                </div>

                {{-- SUBMENU --}}
                @elseif(isset($link['submenu']))
            <li>
                <button type="button"
                    class="w-full p-2 text-gray-600 rounded-lg text-left dark:text-gray-700 hover:bg-gray-300 dark:hover:bg-gray-700 group flex justify-between items-center {{ $link['active'] ? 'bg-gray-400' : '' }}"
                    aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">

                    <!-- Contenedor para ícono y texto (al inicio) -->
                    <div class="flex items-center">
                        <span class="w-6 h-6 inline-flex justify-center items-center">
                            <i class="{{ $link['icon'] }}"></i>
                        </span>
                        <span class="ms-3">{{ $link['name'] }}</span>
                    </div>

                    <!-- Flecha al final -->
                    <i class="fa-solid fa-caret-down"></i>
                </button>
                <ul id="dropdown-example" class="hidden py-2 space-y-2">
                    @foreach ( $link['submenu'] as $item )
                    <li>
                        <a href="{{ $item['href'] }}"
                            class="flex items-center w-full p-2 text-gray-600 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">{{
                            $item['name']}}</a>
                    </li>
                    @endforeach
                </ul>
            </li>
            @else
            <a href="{{ $link['href'] }}"
                class="flex items-center p-2 text-gray-600 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ $link['active'] ? 'bg-gray-100' : '' }}">
                <span class="w-6 h-6 inline-flex justify-center items-center">
                    <i class="{{ $link['icon'] }}"></i>
                </span>
                <span class=" ms-3">{{ $link['name'] }}
                </span>
            </a>
            @endif
            </li>
            @endforeach
        </ul>
    </div>
</aside>
