<?php

namespace App\Livewire;

use App\Models\Customer;
use Livewire\WithPagination;
use Livewire\Component;
use MNC\ChileanRut\Rut;

class CustomerTable extends Component
{
    use WithPagination;
    public $search = '';
    public $created_at = '';
    public function render()
    {
        // Realiza la búsqueda utilizando Eloquent y aplica los filtros según sea necesario
        $data['customers'] = Customer::where(function ($query) {
            $query->where('name', 'like', '%' . $this->search . '%')
                ->orWhere('rut', 'like', '%' . $this->search . '%')
                ->orWhere('email_1', 'like', '%' . $this->search . '%');
        })
        ->when($this->created_at, function ($query) {
            // Aplica el filtro por fecha de creación si la fecha está presente
            $query->whereDate('created_at', $this->created_at);
        })->paginate(10);
        //$data['customers'] = Customer::where('name', 'like', '%'.$this->search.'%')->orWhere('email_1', 'like', '%'.$this->search.'%')->orWhere('rut', 'like', '%'.$this->search.'%')->orWhere('created_at', 'like', '%'.$this->created_at.'%')->paginate(10);
        return view('livewire.customer-table',$data);
    }
}
