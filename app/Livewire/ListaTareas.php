<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Tarea;

class ListaTareas extends Component
{
    public $tareas, $id, $titulo_tarea, $descripcion, $pendiente, $completada;
    public $modal =0;

    public function render()
    {
        $this->tareas = Tarea::all();
        return view('livewire.lista-tareas');
    }

    public function crearTarea(){

        $this->limpiarTarea();
        $this->abrirModal();

    }

    public function abrirModal(){
        $this->modal = true;
    }
    public function cerrarModal(){
        $this->modal = false;
    }

    public function limpiarTarea(){
        $this->titulo_tarea = '';
        $this->descripcion = '';
        $this->pendiente = 0;
        $this->completada = 0;
    }

    public function editarTarea($id){
        $tarea = Tarea::findOrFail($id);
        $this->id = $tarea->id;
        $this->titulo_tarea = $tarea->titulo_tarea;
        $this->descripcion = $tarea->descripcion;
        $this->abrirModal();
    }

    public function eliminarTarea($id){
        Tarea::findOrFail($id)->delete();
    }

    public function guardarTarea(){
        $this->validate([
            'titulo_tarea' => 'required',
            'descripcion' => 'required',
        ], [
            'titulo_tarea.required' => 'El campo título de la tarea es obligatorio.',
            'descripcion.required' => 'El campo descripción es obligatorio.',
        ]);

        Tarea::updateOrCreate(['id' => $this->id], [
            'titulo_tarea' => $this->titulo_tarea,
            'descripcion' => $this->descripcion,
        ]);

        $this->cerrarModal();
        $this->limpiarTarea();
    }

    public function completarTarea($id){
        $tarea = Tarea::findOrFail($id);
        $tarea->completada = 1;
        $tarea->pendiente = 0;
        $tarea->save();
    }

    public function descompletarTarea($id){
        $tarea = Tarea::findOrFail($id);
        $tarea->completada = 0;
        $tarea->pendiente = 1;
        $tarea->save();
    }

}
