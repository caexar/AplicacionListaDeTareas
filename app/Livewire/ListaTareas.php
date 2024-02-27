<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Tarea;

class ListaTareas extends Component
{
    public $tareas;
    public function render()
    {
        $this->tareas = Tarea::all();
        return view('livewire.lista-tareas');
    }
}
