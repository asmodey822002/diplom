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

class MastersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.masters.index');
    }
    public function mastersData()
    {
        return Datatables::of(Masters::query())
        ->addColumn('users_id', function ($masters) {
            return $masters->users->name;
        })
        ->addColumn('action', function ($masters) {
            return '<a href="/admin/masters/'.$masters->id.'/edit" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a> | <span class="btn btn-xs btn-danger" data-id="'.$masters->id.'"><i class="glyphicon glyphicon-remove"></i> Dellete</span>';
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
        $masters=new Masters();
        $name=User::pluck('name', 'id');
        return view('admin.masters.edit', compact('masters', 'name'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $masters=new Masters();
        $masters->users_id=$request->users_id;
        $masters->price_kartridj_zapravka=$request->price_kartridj_zapravka;
        $masters->price_kartridj_regeniraciya=$request->price_kartridj_regeniraciya;
        $masters->nacenka_kartridj_zapravka=$request->nacenka_kartridj_zapravka;
        $masters->nacenka_kartridj_regeniraciya=$request->nacenka_kartridj_regeniraciya;
        $masters->price_remont=$request->price_remont;
        $masters->nacenka_remont=$request->nacenka_remont;
        $masters->save();
        return redirect('/admin/masters')->with('success', 'Сохранено id: '.$masters->id);
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
        $masters=Masters::find($id);
        //$n=Masters::all();
        $name=$masters->users->pluck('name', 'id');
        return view('admin.masters.edit', compact('masters', 'name'));

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
        $masters=Masters::find($id);
        $masters->users_id=$request->users_id;
        $masters->price_kartridj_zapravka=$request->price_kartridj_zapravka;
        $masters->price_kartridj_regeniraciya=$request->price_kartridj_regeniraciya;
        $masters->nacenka_kartridj_zapravka=$request->nacenka_kartridj_zapravka;
        $masters->nacenka_kartridj_regeniraciya=$request->nacenka_kartridj_regeniraciya;
        $masters->price_remont=$request->price_remont;
        $masters->nacenka_remont=$request->nacenka_remont;
        $masters->save();
        return redirect('/admin/masters')->with('success', 'Сохранено id: '.$masters->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $masters=Masters::find($id);
        if($masters){
            $masters->delete();
        }
    }
}
