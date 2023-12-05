<?php

namespace App\Http\Controllers;

use App\Models\Commune;
use App\Models\Community;
use App\Models\Property;
use App\Models\Region;
use App\Models\Service;
use Illuminate\Validation\Rule;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Activitylog\Facades\LogBatch;
use Spatie\Activitylog\Models\Activity;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data=[];
        return view('property.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $data['region'] = Region::orderBy('name')->get();
        $data['comunas'] = Commune::orderBy('name')->get();
        $data['community'] = Community::orderBy('name')->get();
        $data['services'] = Service::orderBy('name')->get();
        $data['property'] = new Property;
        return view('property.property-form',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
        $request->validate([
            'owner_id' => 'required',
            'code' => 'required|unique:properties',
        ]);
        try {
            DB::transaction(function () use ($request,&$id) {
                $property = Property::create([
                    'owner_id' => $request->input('owner_id'),
                    'region_id' => $request->input('region_id'),
                    'commune_id' => $request->input('commune_id'),
                    'community_id' => $request->input('community_id'),
                    'property_type' => $request->input('property_type'),
                    'code' => $request->input('code'),
                    'role' => $request->input('role'),
                    'address' => $request->input('address'),
                    'city' => $request->input('city'),
                    'subclassification' => $request->input('subclassification'),
                    'm2' => $request->input('m2'),
                    'account_id' => $request->input('account_id'),
                    'currency_type' => $request->input('currency_type'),
                    'rental_value_p' => $request->input('rental_value_p'),
                    'rental_value_uf' => $request->input('rental_value_uf'),
                    'start_pay_day' => $request->input('start_pay_day'),
                    'end_pay_day' => $request->input('end_pay_day'),
                    'administration_currency_type' => $request->input('administration_currency_type'),
                    'administration_fee' => $request->input('administration_fee'),
                    'warranty_ammount' => $request->input('warranty_ammount'),
                    'warranty_currency_type' => $request->input('warranty_currency_type'),
                    'lease_adjustment_type' => $request->input('lease_adjustment_type'),
                    'lease_adjustment_month' => $request->input('lease_adjustment_month'),
                    'validity' => $request->input('validity'),
                    'renewal_alert' => $request->input('renewal_alert'),
                    'period' => $request->input('period'),
                    'rent_iva' => $request->input('rent_iva'),
                    'use_gc' => $request->input('use_gc'),
                    'pay_contributions' => $request->input('pay_contributions'),
                    'retired' => $request->input('retired'),
                    'reaso_retired' => $request->input('reaso_retired'),
                    'n_rooms' => $request->input('n_rooms'),
                    'n_bathrooms' => $request->input('n_bathrooms'),
                    'water_service_id' => $request->input('water_service_id'),
                    'water_service_number' => $request->input('water_service_number'),
                    'electric_service_id' => $request->input('electric_service_id'),
                    'electric_service_number' => $request->input('electric_service_number'),
                    'gas_service_id' => $request->input('gas_service_id'),
                    'gas_service_number' => $request->input('gas_service_number'),
                    'gc_service_id' => $request->input('gc_service_id'),
                    'observation' => $request->input('observation'),
                ]);
                $file_name_list = $request->input('file_name');
                $file_list = $request->file('file');
                $file_obs_list = $request->input('file_obs');
                if(!empty($file_list)){
                    foreach ($file_list as $key => $value) {
                        if (!empty($value)) {
                            if ($value->isValid()) {
                                $property->addMedia($value)
                                ->withCustomProperties(['name' => $file_name_list[$key] , 'obs' => $file_obs_list[$key]])
                                ->toMediaCollection('property-files');
                            }
                        }
                    }
                }
                $id = $property->id;
            });
            return redirect()->route('property.edit',$id)
            ->with('notification_type', 'success')
            ->with('notification_message', '¡Propiedad creada correctamente!');
        } catch (\Exception $e) {
            return redirect()->route('property.create')->with('notification_type', 'danger')->with('notification_message', 'Error al crear la propiedad: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Property $property)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        //
        $data['region'] = Region::orderBy('name')->get();
        $data['comunas'] = Commune::orderBy('name')->get();
        $data['community'] = Community::orderBy('name')->get();
        $data['services'] = Service::orderBy('name')->get();
        $data['property'] = Property::with('owner')->find($property->id);
        return view('property.property-form',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Property $property): RedirectResponse
    {
        //
        $request->validate([
            'owner_id' => 'required',
            'code' => [
                'required',
                Rule::unique('properties')->ignore($property)],
        ]);
        try {
            DB::transaction(function () use ($request,&$property) {
                $old_data = $property->getOriginal();
                $property->update([
                    'owner_id' => $request->input('owner_id'),
                    'region_id' => $request->input('region_id'),
                    'commune_id' => $request->input('commune_id'),
                    'community_id' => $request->input('community_id'),
                    'property_type' => $request->input('property_type'),
                    'code' => $request->input('code'),
                    'role' => $request->input('role'),
                    'address' => $request->input('address'),
                    'city' => $request->input('city'),
                    'subclassification' => $request->input('subclassification'),
                    'm2' => $request->input('m2'),
                    'account_id' => $request->input('account_id'),
                    'currency_type' => $request->input('currency_type'),
                    'rental_value_p' => $request->input('rental_value_p'),
                    'rental_value_uf' => $request->input('rental_value_uf'),
                    'start_pay_day' => $request->input('start_pay_day'),
                    'end_pay_day' => $request->input('end_pay_day'),
                    'administration_currency_type' => $request->input('administration_currency_type'),
                    'administration_fee' => $request->input('administration_fee'),
                    'warranty_ammount' => $request->input('warranty_ammount'),
                    'warranty_currency_type' => $request->input('warranty_currency_type'),
                    'lease_adjustment_type' => $request->input('lease_adjustment_type'),
                    'lease_adjustment_month' => $request->input('lease_adjustment_month'),
                    'validity' => $request->input('validity'),
                    'renewal_alert' => $request->input('renewal_alert'),
                    'period' => $request->input('period'),
                    'rent_iva' => $request->input('rent_iva'),
                    'use_gc' => $request->input('use_gc'),
                    'pay_contributions' => $request->input('pay_contributions'),
                    'retired' => $request->input('retired'),
                    'reaso_retired' => $request->input('reaso_retired'),
                    'n_rooms' => $request->input('n_rooms'),
                    'n_bathrooms' => $request->input('n_bathrooms'),
                    'water_service_id' => $request->input('water_service_id'),
                    'water_service_number' => $request->input('water_service_number'),
                    'electric_service_id' => $request->input('electric_service_id'),
                    'electric_service_number' => $request->input('electric_service_number'),
                    'gas_service_id' => $request->input('gas_service_id'),
                    'gas_service_number' => $request->input('gas_service_number'),
                    'gc_service_id' => $request->input('gc_service_id'),
                    'observation' => $request->input('observation'),
                ]);
                $file_name_list = $request->input('file_name');
                $file_list = $request->file('file');
                $file_obs_list = $request->input('file_obs');
                if(!empty($file_list)){
                    foreach ($file_list as $key => $value) {
                        if (!empty($value)) {
                            if ($value->isValid()) {
                                $property->addMedia($value)
                                ->withCustomProperties(['name' => $file_name_list[$key] , 'obs' => $file_obs_list[$key]])
                                ->toMediaCollection('property-files');
                            }
                        }
                    }
                }
                activity()
                    ->performedOn($property)
                    ->withProperties(['old_data' => $old_data, 'new_data' => $property])
                    ->causedBy(Auth::user())
                    ->event('update')
                    ->log('update property');
            });
            return redirect()->route('property.edit',$property->id)
            ->with('notification_type', 'success')
            ->with('notification_message', '¡Propiedad actualizada correctamente!');
        } catch (\Exception $e) {
            return redirect()->route('property.edit',$property->id)->with('notification_type', 'danger')->with('notification_message', 'Error al actualizar la propiedad: ' . $e->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        //
    }
}
