<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Páginas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    

                    <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center justify-between">
                        {{ __('Paginas') }}

                        <a href="{{ route('pages.create') }}" class="text-xs bg-gray-800 text-white rounded px-2 py-1">Crear</a>
                    </h2>
                        <hr>
                        
                    <table class="table w-full">
                        <thead>
                            <tr>
                            <th>ID</th>
                            <th>Página</th>
                            <th>Estado</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pages as $page)

                                <tr class="border-b border-gray-200 text-sm">
                                    <td class="px-6 py-4">{{ $page->id }}</td>
                                    <td class="px-6 py-4">{{ $page->pag_name }}</td>
                                    <td class="px-6 py-4">{{ $page->pag_state }}</td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('pages.edit', $page) }}" class="text-indigo-600">Editar</a>
                                    </td>
                                    <td class="px-6 py-4">

                                        <form action="{{ route('pages.destroy', $page) }}" method="POST">
                                            @csrf 
                                            @method('DELETE')

                                            <input 
                                                type="submit" 
                                                value="Eliminar" 
                                                class=" bg-gray-800 text-white rounded px-4 py-2" 
                                                onclick="return confirm('¿Desea Eliminar?')"
                                            >
                                        </form>

                                    </td>
                                </tr>

                            @endforeach

                        </tbody>
                    </table>
                    
                    {{ $pages->links() }}

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
