<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use App\Models\User;
use App\Models\Kartridjes;
use App\Models\Client;
use App\Models\Masters;
use App\Models\Materials_kartridjes;
use App\Models\Models_kartridjes;
use App\Models\Sostoyanies;
use App\Models\Acts_kartridjes;
use PDF;
use App\Models\Zakaz_kuriers;
use App\Models\Vizov_sosts;
use App\Models\Kuriers_sosts;
use App\Models\Zakaz_specs;
use App\Models\Specs_sosts;

class SpecController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.specs.index');
    }
    public function specsData()
    {
        return Datatables::of(Zakaz_specs::query())
        ->addColumn('users_id', function ($zakaz_specs) {
            if(isset($zakaz_specs->users->name)){
                return $zakaz_specs->users->name;
            }
            else
                return '---';
            })
        ->addColumn('hren', function ($zakaz_specs) {
            if(isset($zakaz_specs->hasSosts->vizov_sost_id)){
                $zvid=$zakaz_specs->hasSosts->vizov_sost_id;
                $vsd=Vizov_sosts::find($zvid);
                return $vsd->name;
            }
            else
                return '---';
            })
        ->addColumn('action', function ($zakaz_specs) {
            return '<a href="/admin/specs/'.$zakaz_specs->id.'/edit" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a> | <span class="btn btn-xs btn-danger" data-id="'.$zakaz_specs->id.'"><i class="glyphicon glyphicon-remove"></i> Dellete</span>';
            })
        ->make(true);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $zakaz_kuriers=Zakaz_specs::find($id);
        $kuriers=User::pluck('name', 'id');
        $sosts=Vizov_sosts::pluck('name', 'id');
        $sost_id=$zakaz_kuriers->hasSosts->vizov_sost_id;
        return view('admin.specs.edit', compact('zakaz_kuriers', 'kuriers', 'kur_id', 'sosts', 'sost_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $zakaz_kuriers=Zakaz_specs::find($id);
        $zakaz_kuriers->name=$request->name;
        $zakaz_kuriers->surname=$request->surname;
        $zakaz_kuriers->phone=$request->phone;
        $zakaz_kuriers->email=$request->email;
        $zakaz_kuriers->address=$request->address;
        $zakaz_kuriers->opisanie=$request->opisanie;
        $zakaz_kuriers->taim=$request->taim;
        //
        $zvid=$zakaz_kuriers->hasSosts->id;
        $vsd=Specs_sosts::find($zvid);
        $vsd->vizov_sost_id=$request->sostoyanies_id;
        $vsd->save();
        //
        $zakaz_kuriers->users_id=$request->user;
        $zakaz_kuriers->save();
        return redirect('/admin/specs')->with('success', 'Изменения сохранены');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $zakaz_kuriers=Zakaz_specs::find($id);
        $zakaz_kuriers->delete();
    }
}
