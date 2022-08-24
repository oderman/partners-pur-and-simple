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
                    

                    <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center justify-between" style="padding-bottom:10px;">
                        {{ __('Socios') }}

                        <a href="{{ route('partners.create') }}" class="bg-gray-800 text-white rounded px-4 py-2">Crear</a>
                    </h2>
                        <hr>
                        
                    <table class="table w-full">
                        <thead>
                            <tr>
                            <th>ID</th>
                            <th>Logo</th>
                            <th>Nombre</th>
                            <th>Sitio web</th>
                            <th>Orden</th>
                            <th>Estado</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($partners as $partner)

                                <tr class="border-b border-gray-200 text-sm">
                                    <td class="px-6 py-4" align="center">{{ $partner->id }}</td>
                                    <td class="px-6 py-4" align="center">
                                    <img 
                                        src="{{ asset('images/partners/'.$partner->par_logo) }}" 
                                        alt="{{ $partner->par_name }}"
                                        style="height: 4rem;"
                                        >
                                    </td>
                                    <td class="px-6 py-4">{{ $partner->par_name }}</td>
                                    <td class="px-6 py-4">{{ substr($partner->par_website,8,10)."..." }}</td>
                                    <td class="px-6 py-4">{{ $partner->par_position }}</td>
                                    <td class="px-6 py-4">{{ $partner->par_state }}</td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('partners.edit', $partner) }}" class="bg-gray-800 text-white rounded px-4 py-2">Editar</a>
                                    </td>
                                    <td class="px-6 py-4">

                                        <form action="{{ route('partners.destroy', $partner) }}" method="POST">
                                            @csrf 
                                            @method('DELETE')

                                            <input 
                                                type="submit" 
                                                value="Eliminar" 
                                                class="bg-gray-800 text-white rounded px-4 py-2" 
                                                onclick="return confirm('¿Desea Eliminar?')"
                                            >
                                        </form>

                                    </td>
                                </tr>

                            @endforeach

                        </tbody>
                    </table>
                    
                    {{ $partners->links() }}

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
