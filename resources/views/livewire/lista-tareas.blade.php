<x-slot name="header">
    <h1 class="text-3xl font-bold text-gray-900"> Lista de tareas </h1>
</x-slot>

<div class="py-12">
    <div class="mx-auto max-w-7x1 sm:px6 lg:px-8">
        <div class="px-4 overflow-hidden bg-white shadow-x1 sm:rounded-lg py4">
            <button class="px-4 py-2 mt-4 font-bold border hover:bg-gray-100" wire:click="crearTarea">Crear Tarea</button>
            @if ($modal)
                @include('livewire.crear-tarea')
            @endif

            <div class="flex flex-col mt-6 divide-y divide-slate-500">
                <div x-data="{ show: false }" class="overflow-hidden">
                    <div class="flex flex-row items-center justify-between px-4 py-4 cursor-pointer" @click="show = !show">
                        <h2 class="text-lg font-bold">Tareas Pendientes </h2>
                        <x-chevron-icon />
                    </div>

                    <div class="overflow-auto">
                        <table x-show="show" x-transition:enter.duration.400ms class="w-full mt-4 mb-4 ">
                            <thead>
                                <tr class="text-black big-indigo-600">
                                    <th class="px-4 py-2">Titulo de la tarea</th>
                                    <th class="px-4 py-2">Descripcion de la tarea</th>
                                    <th class="px-2 py-2">Modificar Tarea</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tareas as $tarea)
                                    @if ($tarea->pendiente == 1)
                                        <tr>
                                            <td class="px-4 py-2 border">{{ $tarea->titulo_tarea }}</td>
                                            <td class="px-4 py-2 border">{{ $tarea->descripcion }}</td>
                                            <td class="flex justify-center gap-4 px-4 py-2 border" >
                                                <button class="px-4 py-2 border hover:bg-emerald-100 hover:text-emerald-500 " wire:click="completarTarea({{ $tarea->id }})">Completar tarea</button>
                                                <button class="px-4 py-2 border hover:bg-blue-100 hover:text-blue-500" wire:click="editarTarea({{ $tarea->id }})">Editar Tarea</button>
                                                <button class="px-4 py-2 border hover:bg-red-100 hover:text-red-500" wire:click="eliminarTarea({{ $tarea->id }})">Eliminar tarea</button>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                                @if ($tareas->where('pendiente', 1)->count() == 0)
                                    <tr>
                                        <td class="w-full px-4 py-2 text-center border" colspan="4">No hay tareas Pendiente, CREA UNA!!</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>

                <div x-data="{ show: false }" class="overflow-hidden">
                    <div class="flex flex-row items-center justify-between px-4 py-4 cursor-pointer" @click="show = !show">
                        <h2 class="text-lg font-bold">Tareas Completada </h2>
                        <x-chevron-icon />
                    </div>
                    <div class="overflow-auto">
                        <table x-show="show" x-transition:enter.duration.400ms class="w-full mt-4 mb-4 ">
                            <thead>
                                <tr class="text-black big-indigo-600">
                                    <th class="px-4 py-2">Titulo de la tarea</th>
                                    <th class="px-4 py-2">Descripcion de la tarea</th>
                                    <th class="px-2 py-2">Modificar Tarea</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tareas as $tarea)
                                    @if ($tarea->completada == 1)
                                        <tr>
                                            <td class="px-4 py-2 border">{{ $tarea->titulo_tarea }}</td>
                                            <td class="px-4 py-2 border">{{ $tarea->descripcion }}</td>
                                            <td class="flex justify-center gap-4 px-4 py-2 border" >
                                                <button class="px-4 py-2 border hover:bg-blue-100 hover:text-blue-500" wire:click="descompletarTarea({{ $tarea->id }})">Pasar a pendiente</button>
                                                <button class="px-4 py-2 border hover:bg-red-100 hover:text-red-500" wire:click="eliminarTarea({{ $tarea->id }})">Eliminar tarea</button>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                                @if ($tareas->where('completada', 1)->count() == 0)
                                    <tr>
                                        <td class="w-full px-4 py-2 text-center border" colspan="4">No hay tareas completada, COMPLETA UNA!!</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

