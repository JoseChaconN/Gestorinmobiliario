<?php

namespace App\Http\Controllers;

use App\Models\CustomerBankAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CustomerBankAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CustomerBankAccount $customerBankAccount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CustomerBankAccount $customerBankAccount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CustomerBankAccount $customerBankAccount)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        //
        try {
            DB::transaction(function () use ($id,&$data) { 
                $data = CustomerBankAccount::find($id);
                $data->delete();
            });            
            activity()
            ->performedOn($data)
            ->causedBy(Auth::user())
            ->event('delete')
            ->log('delete customer bank account');
            return response()->json(['success' => TRUE,'message' => '¡Cuenta bancaria eliminada con éxito!']);
        } catch (\Exception $e) {         
            return response()->json(['success' => FALSE,'message' => '¡Error al eliminar la Cuenta bancaria borrada '.$e->getMessage()]);               
        }
        
    }
    public function search(Request $request)
    {
        $id = $request->input('id');
        $accounts=[];
        if(!empty($id)){
            $accounts = CustomerBankAccount::with('bank')->where('customer_id', $id)->get();
        }
        return response()->json($accounts);
    }
}
