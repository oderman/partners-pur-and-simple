@csrf

<label class="uppercase text-gray-700 text-xs">Nombre</label>
<span class="text-xs text-red-600">@error('name') {{ $message }} @enderror</span>
<input type="text" name="name" class="rounded border-gray-200 w-full mb-4"  value="{{ old('name', $page->pag_name) }}">

<label class="uppercase text-gray-700 text-xs">Contenido</label>
<span class="text-xs text-red-600">@error('body') {{ $message }} @enderror</span>
<textarea name="body" class="rounded border-gray-200 w-full mb-4" rows="5">{{ old('body', $page->pag_body) }}</textarea> 

<div class="flex justify-between items-center">
    <a href="{{ route('pages.index') }}" class="text-indigo-600">Volver</a>

    <input type="submit" value="Enviar" class="bg-gray-800 text-white rounded px-4 py-2">
</div>