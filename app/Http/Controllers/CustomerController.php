<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Commune;
use App\Models\Customer;
use App\Models\CustomerBankAccount;
use App\Models\Region;
//use Illuminate\Contracts\Validation\Rule;
use Illuminate\Validation\Rule;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Activitylog\Facades\LogBatch;
use Spatie\Activitylog\Models\Activity;
use MNC\ChileanRut\Rut;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        #$data['customers'] = Customer::all();
        //$data['customers'] = Customer::latest()->paginate(10);
        $data=[];
        return view('customer.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $data['region'] = Region::orderBy('name')->get();
        $data['comunas'] = Commune::orderBy('name')->get();
        $data['banks'] = Bank::orderBy('name')->get();
        $data['customer'] = new Customer;
        return view('customer.customer-form',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
        $request->validate([
            'name' => 'required',
            'email_1' => 'required|email',
            'type_id' => 'required',
            'rut' => $request->input('type_id') == 1 ? 'required|unique:customers' : '',
            'passport' => $request->input('type_id') == 2 ? 'required|unique:customers' : '',
        ]);
        try {
            DB::transaction(function () use ($request,&$id) { 
                ////CUSTOMER////
                $customer = Customer::create([
                    'payer_rut' => $request->input('payer_rut'),
                    'name' => $request->input('name'),
                    'rut' => str_replace(['.', '-'], '',$request->input('rut')),
                    'passport' =>  $request->input('passport'),
                    'region_id' => $request->input('region_id'),
                    'commune_id' => $request->input('commune_id'),
                    'city' => $request->input('city'),
                    'direction' => $request->input('direction'),
                    'email_1' => $request->input('email_1'),
                    'email_2' => $request->input('email_2'),
                    'phone_1' => $request->input('phone_1'),
                    'phone_2' => $request->input('phone_2'),
                    'invoice_name' => $request->input('invoice_name'),
                    'contact_company' => $request->input('contact_company'),
                    'penalty_fee' => $request->input('penalty_fee'),
                    'commission_tax' => $request->input('commission_tax'),
                    'retired' => $request->input('retired'),
                    'obs' => $request->input('obs'),
                    'aval_name' => $request->input('aval_name'),
                    'aval_rut' => str_replace(['.', '-'], '',$request->input('aval_rut')),
                    'aval_region_id' => $request->input('aval_region_id'),
                    'aval_commune_id' => $request->input('aval_commune_id'),
                    'aval_city' => $request->input('aval_city'),
                    'aval_direction' => $request->input('aval_direction'),
                    'aval_email' => $request->input('aval_email'),
                    'aval_phone' => $request->input('aval_phone'),
                    'third_name' => $request->input('third_name'),
                    'third_rut' => str_replace(['.', '-'], '',$request->input('third_rut')),
                    'third_region_id' => $request->input('third_region_id'),
                    'third_commune_id' => $request->input('third_commune_id'),
                    'third_city' => $request->input('third_city'),
                    'third_direction' => $request->input('third_direction'),
                    'third_email' => $request->input('third_email'),
                    'third_phone' => $request->input('third_phone'),
                ]);
                $account_holder_array = $request->input('account_holder');
                $account_number_array = $request->input('account_number');
                $bank_id_array = $request->input('bank_id');
                $account_type_array = $request->input('account_type');
                if(!empty($account_holder_array)){
                    foreach ($account_holder_array as $key => $value) {
                        CustomerBankAccount::create([
                            'customer_id' => $customer->id,
                            'account_holder' => $value,
                            'account_number' => $account_number_array[$key],
                            'bank_id' => $bank_id_array[$key],
                            'account_type' => $account_type_array[$key],
                        ]);
                    }
                }
                $id = $customer->id;
            });
            return redirect()->route('customer.edit',$id)
            ->with('notification_type', 'success')
            ->with('notification_message', 'Cliente creado correctamente!');
        } catch (\Exception $e) {
            return redirect()->route('customer.create')->with('notification_type', 'danger')->with('notification_message', 'Error al crear el cliente: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
        $data['region'] = Region::orderBy('name')->get();
        $data['comunas'] = Commune::orderBy('name')->get();
        $data['banks'] = Bank::orderBy('name')->get();
        $data['customer'] = Customer::with('bank_account')->find($customer->id);        
        return view('customer.customer-form',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer): RedirectResponse
    {
        //
        /*$request->validate([
            'name' => ['required'],
            'email_1' => ['required'],
            'rut' => [
                'required',
                Rule::unique('customers')->ignore($customer),
            ],
            'passport' => [
                Rule::unique('customers')->ignore($customer),
            ]
        ]);*/
        try {
            DB::transaction(function () use ($request,&$customer) { 
                ////CUSTOMER////
                LogBatch::startBatch();
                    $old_data = $customer->getOriginal();
                    $customer->update([
                        'payer_rut' => $request->input('payer_rut'),
                        'name' => $request->input('name'),
                        'rut' => str_replace(['.', '-'], '',$request->input('rut')),
                        'passport' =>  $request->input('passport'),
                        'region_id' => $request->input('region_id'),
                        'commune_id' => $request->input('commune_id'),
                        'city' => $request->input('city'),
                        'direction' => $request->input('direction'),
                        'email_1' => $request->input('email_1'),
                        'email_2' => $request->input('email_2'),
                        'phone_1' => $request->input('phone_1'),
                        'phone_2' => $request->input('phone_2'),
                        'invoice_name' => $request->input('invoice_name'),
                        'contact_company' => $request->input('contact_company'),
                        'penalty_fee' => $request->input('penalty_fee'),
                        'commission_tax' => $request->input('commission_tax'),
                        'retired' => $request->input('retired'),
                        'obs' => $request->input('obs'),
                        'aval_name' => $request->input('aval_name'),
                        'aval_rut' => str_replace(['.', '-'], '',$request->input('aval_rut')),
                        'aval_region_id' => $request->input('aval_region_id'),
                        'aval_commune_id' => $request->input('aval_commune_id'),
                        'aval_city' => $request->input('aval_city'),
                        'aval_direction' => $request->input('aval_direction'),
                        'aval_email' => $request->input('aval_email'),
                        'aval_phone' => $request->input('aval_phone'),
                        'third_name' => $request->input('third_name'),
                        'third_rut' => str_replace(['.', '-'], '',$request->input('third_rut')),
                        'third_region_id' => $request->input('third_region_id'),
                        'third_commune_id' => $request->input('third_commune_id'),
                        'third_city' => $request->input('third_city'),
                        'third_direction' => $request->input('third_direction'),
                        'third_email' => $request->input('third_email'),
                        'third_phone' => $request->input('third_phone'),
                    ]);
                    activity()
                    ->performedOn($customer)
                    ->withProperties(['old_data' => $old_data, 'new_data' => $customer])
                    ->causedBy(Auth::user())
                    ->event('update')
                    ->log('update customer');
                    $account_id_array = $request->input('account_id');
                    $account_holder_array = $request->input('account_holder');
                    $account_number_array = $request->input('account_number');
                    $bank_id_array = $request->input('bank_id');
                    $account_type_array = $request->input('account_type');
                    if(!empty($account_id_array)){
                        foreach ($account_id_array as $key => $value) {
                            $account_data = CustomerBankAccount::find($value);
                            if(!empty($account_data)){
                                $old_data = $account_data->getOriginal();
                                $account_data->update([
                                    'account_holder' => $account_holder_array[$value],
                                    'account_number' => $account_number_array[$value],
                                    'bank_id' => $bank_id_array[$value],
                                    'account_type' => $account_type_array[$value],
                                ]);
                                activity()
                                ->performedOn($account_data)
                                ->withProperties(['old_data' => $old_data, 'new_data' => $account_data])
                                ->causedBy(Auth::user())
                                ->event('update')
                                ->log('update customer bank account');
                            }else{
                                CustomerBankAccount::create([
                                    'customer_id' => $customer->id,
                                    'account_holder' => $account_holder_array[$value],
                                    'account_number' => $account_number_array[$value],
                                    'bank_id' => $bank_id_array[$value],
                                    'account_type' => $account_type_array[$value],
                                ]);
                            }
                        }
                    }
                    LogBatch::endBatch();
            });
            return redirect()->route('customer.edit',$customer)
            ->with('notification_type', 'success')
            ->with('notification_message', 'Cliente actualizado correctamente!');
            
        } catch (\Exception $e) {
            return redirect()->route('customer.edit',$customer)->with('notification_type', 'danger')->with('notification_message', 'Error al actualizar el cliente: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }

    public function search(Request $request)
    {
        $term = $request->input('search');
        $customer=[];
        if(!empty($term)){
            $customer_q = Customer::where('name', 'like', '%' . $term . '%')
                ->orWhere('rut', 'like', '%' . $term . '%')
                ->orWhere('passport', 'like', '%' . $term . '%')
                ->get();
            foreach ($customer_q as $item) {
                $customer['results'][]=['id' => $item->id , 'text' => Rut::parse($item->rut)->format()->dotted()->hyphened().' | '.$item->name.' | '.$item->email_1.' | '.$item->phone_1 ];
            }
        }
        return response()->json($customer);
    }
}
