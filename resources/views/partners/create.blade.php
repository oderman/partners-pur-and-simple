<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Socios') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                <form action="{{ route('partners.store') }}" method="POST" enctype="multipart/form-data">
                        
                @csrf
                        <label class="uppercase text-gray-700 text-xs">Nombre</label>
                        <span class="text-xs text-red-600">@error('name') {{ $message }} @enderror</span>
                        <input type="text" name="name" class="rounded border-gray-200 w-full mb-4"  
                        value="{{ old('name') }}">

                        <label class="uppercase text-gray-700 text-xs">Sitio web</label>
                        <span class="text-xs text-red-600">@error('website') {{ $message }} @enderror</span>
                        <input type="text" name="website" class="rounded border-gray-200 w-full mb-4"  
                        value="{{ old('website') }}">

                        <label class="uppercase text-gray-700 text-xs">Posición</label>
                        <span class="text-xs text-red-600">@error('position') {{ $message }} @enderror</span>   
                        <input type="text" name="position" class="rounded border-gray-200 w-full mb-4"  
                        value="{{ old('position') }}">

                        <label class="uppercase text-gray-700 text-xs">Estado</label>
                        <span class="text-xs text-red-600">@error('state') {{ $message }} @enderror</span>
                        <select name="state" class="rounded border-gray-200 w-full mb-4">
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select> 

                        <label class="uppercase text-gray-700 text-xs">Logo</label>
                        <span class="text-xs text-red-600">@error('logo') {{ $message }} @enderror</span>
                        <input type="file" name="logo" class="rounded border-gray-200 w-full mb-4"  
                        value="{{ old('logo') }}">

                        <div class="flex justify-between items-center">
                            <a href="{{ route('partners.index') }}" class="text-indigo-600">Volver</a>

                            <input type="submit" value="Enviar" class="bg-gray-800 text-white rounded px-4 py-2">
                        </div>
                        
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>