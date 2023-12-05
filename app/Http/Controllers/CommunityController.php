<?php

namespace App\Http\Controllers;

use App\Models\Commune;
use App\Models\Community;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommunityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data['communities'] = Community::all();
        return view('community.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $data['region'] = Region::orderBy('name')->get();
        $data['comunas'] = Commune::orderBy('name')->get();
        $data['community'] = new Community;
        return view('community.community-form',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required'
        ]);
        try {
            DB::transaction(function () use ($request,&$id) {
                Community::create([
                    'name' => $request->input('name'),
                    'phone' => $request->input('phone'),
                    'region_id' => $request->input('region_id'),
                    'commune_id' => $request->input('commune_id'),
                    'name' => $request->input('name'),
                    'administrator_name' => $request->input('administrator_name'),
                    'administrator_phone' => $request->input('administrator_phone'),
                    'email' => $request->input('email'),
                    'obs' => $request->input('obs'),
                ]);
            });
            return redirect()->route('community.edit',$id)
            ->with('notification_type', 'success')
            ->with('notification_message', '¡Comunidad/Edificio creada correctamente!');
        } catch (\Exception $e) {
            return redirect()->route('community.create')->with('notification_type', 'danger')->with('notification_message', 'Error al crear la comunidad/edificio: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Community $community)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Community $community)
    {
        //
        $data['region'] = Region::orderBy('name')->get();
        $data['comunas'] = Commune::orderBy('name')->get();
        $data['community'] = $community;
        return view('community.community-form',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Community $community)
    {
        //
        $request->validate([
            'name' => 'required'
        ]);
        try {
            DB::transaction(function () use ($request,&$community) {
                $old_data = $community->getOriginal();
                $community->update([
                    'name' => $request->input('name'),
                    'phone' => $request->input('phone'),
                    'region_id' => $request->input('region_id'),
                    'commune_id' => $request->input('commune_id'),
                    'name' => $request->input('name'),
                    'administrator_name' => $request->input('administrator_name'),
                    'administrator_phone' => $request->input('administrator_phone'),
                    'email' => $request->input('email'),
                    'obs' => $request->input('obs'),
                ]);
                activity()
                    ->performedOn($community)
                    ->withProperties(['old_data' => $old_data, 'new_data' => $community])
                    ->causedBy(Auth::user())
                    ->event('update')
                    ->log('update community');
            });
            return redirect()->route('community.edit',$community->id)
            ->with('notification_type', 'success')
            ->with('notification_message', '¡Comunidad/Edificio actualizada correctamente!');
        } catch (\Exception $e) {
            return redirect()->route('community.edit',$community->id)->with('notification_type', 'danger')->with('notification_message', 'Error al actualizar la comunidad/edificio: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Community $community)
    {
        //
    }
}
