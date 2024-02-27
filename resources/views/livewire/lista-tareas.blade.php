<x-slot name="header">
    <h1 class="text-gray-900"> Lista de tareas </h1>
</x-slot>

<div class="py-12">
    <div class="mx-auto max-w-7x1 sm:px6 lg:px-8">
        <div class="px-4 overflow-hidden bg-white shadow-x1 sm:rounded-lg py4">
            <h2 class="px-4 py-2 mt-4">Tareas Pendiente </h2>
            <button class="px-4 py-2 mt-4 border" wire:click="crearTarea">Crear Tarea</button>
            <table class="w-full mt-4 mb-4 table-fixed">
                <tbody>
                    @foreach($tareas as $tarea)
                        @if ($tarea->pendiente == 1)
                            <thead>
                                <tr class="text-black big-indigo-600">
                                    <th class="px-4 py-2">Id</th>
                                    <th class="px-4 py-2">Titulo</th>
                                    <th class="px-4 py-2">Descripcion</th>
                                    <th class="px-2 py-2">Completar Tarea</th>
                                </tr>
                            </thead>
                            <tr>
                                <td class="px-4 py-2 border">{{ $tarea->id }}</td>
                                <td class="px-4 py-2 border">{{ $tarea->titulo_tarea }}</td>
                                <td class="px-4 py-2 border">{{ $tarea->descripcion }}</td>
                                <td class="px-4 py-2 border">
                                    <input type="checkbox" wire:change="completarTarea({{ $tarea->id }})">
                                </td>
                                <td class="px-4 py-2 border" >
                                    <button class="px-4 py-2 border" wire:click="editarTarea({{ $tarea->id }})">Editar</button>
                                    <button class="px-4 py-2 border" wire:click="eliminarTarea({{ $tarea->id }})">Eliminar</button>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    @if ($tareas->where('pendiente', 1)->count() == 0)
                        <tr>
                            <td class="px-4 py-2 border" colspan="4">No hay tareas Pendiente, CREA UNA!!</td>
                        </tr>
                    @endif
                </tbody>
            </table>
            <h2 class="px-4 py-2 mt-4">Tareas Completadas </h2>
            <table class="w-full mt-4 mb-4 table-fixed">
                <tbody>
                    @foreach($tareas as $tarea)
                        @if ($tarea->completada == 1)
                            <thead>
                                <tr class="text-black big-indigo-600">
                                    <th class="px-4 py-2">Id</th>
                                    <th class="px-4 py-2">Titulo</th>
                                    <th class="px-4 py-2">Descripcion</th>
                                    <th class="px-2 py-2">Poner como pendiente Tarea</th>
                                </tr>
                            </thead>
                            <tr>
                                <td class="px-4 py-2 border">{{ $tarea->id }}</td>
                                <td class="px-4 py-2 border">{{ $tarea->titulo_tarea }}</td>
                                <td class="px-4 py-2 border">{{ $tarea->descripcion }}</td>
                                <td class="px-4 py-2 border">
                                    <input type="checkbox" wire:change="completarTarea({{ $tarea->id }})">
                                </td>
                                <td class="px-4 py-2 border" >
                                    <button class="px-4 py-2 border" wire:click="editarTarea({{ $tarea->id }})">Editar</button>
                                    <button class="px-4 py-2 border" wire:click="eliminarTarea({{ $tarea->id }})">Eliminar</button>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
</div>

