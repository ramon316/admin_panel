<x-admin-layout
{{-- Si enviamos title props --}}
title="Quotes Admin Dashboard"
{{-- Si enviamos breadcrumbs props --}}
{{-- this is breadcrumbs --}}
:breadcrumbs="[
    ['name' => 'Dashboard', 'href' => route('admin.dashboard')],
    ['name' => 'Prueba']
]">

<x-slot name="action">
    <a href="#" class="text-blue-600 hover:text-blue-900">Action Button</a>
</x-slot>
    <x-wire-button label="Default"/>
</x-admin-layout>
