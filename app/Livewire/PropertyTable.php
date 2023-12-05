<?php

namespace App\Livewire;

use App\Models\Property;
use Livewire\Component;
use Livewire\WithPagination;

class PropertyTable extends Component
{
    use WithPagination;
    public $search = '';
    public $code = '';
    public $created_at = '';
    public function render()
    {
        // Realiza la búsqueda utilizando Eloquent y aplica los filtros según sea necesario
        $data['properties'] = Property::with('owner','region','commune')
        ->when($this->created_at, function ($query) {
            // Aplica el filtro por fecha de creación si la fecha está presente
            $query->whereDate('created_at', $this->created_at);
        })->when($this->code, function ($query) {
            // Aplica el filtro por fecha de creación si la fecha está presente
            $query->where('code', 'like', '%' . $this->code . '%');
        })->when($this->search, function ($query) {
            // Aplica el filtro por fecha de creación si la fecha está presente
            $query->orWhereHas('owner', function ($ownerQuery) {
                $ownerQuery->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('rut', 'like', '%' . $this->search . '%');
            });
        })
        ->paginate(10);
        return view('livewire.property-table',$data);
    }
}
