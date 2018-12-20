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

class KartridjesModelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.kartridjesmodels.index');
    }
    public function kartridjesModelsData()
    {
        return Datatables::of(Models_kartridjes::query())
        ->addColumn('action', function ($models_kartridjes) {
            return '<a href="/admin/kartridjesmodels/'.$models_kartridjes->id.'/edit" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a> | <span class="btn btn-xs btn-danger" data-id="'.$models_kartridjes->id.'"><i class="glyphicon glyphicon-remove"></i> Dellete</span>';
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
        $models_kartridjes= new Models_kartridjes();
        return view('admin.kartridjesmodels.create', compact('models_kartridjes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'models'=>'required|unique:models_kartridjes',
        ]);
        $models_kartridjes= new Models_kartridjes();
        $models_kartridjes->models=$request->models;
        $models_kartridjes->save();
        return redirect('/admin/kartridjesmodels')->with('success', 'Модель добавлина');
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
        $models_kartridjes=Models_kartridjes::find($id);
        return view('admin.kartridjesmodels.create', compact('models_kartridjes'));
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
        $this->validate($request, [
            'models'=>'required|unique:models_kartridjes',
        ]);
        $models_kartridjes=Models_kartridjes::find($id);
        $models_kartridjes->models=$request->models;
        $models_kartridjes->save();
        return redirect('/admin/kartridjesmodels')->with('success', 'Изменения сохранены');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $models_kartridjes=Models_kartridjes::find($id);
        $models_kartridjes->delete();
        //return redirect('/admin/kartridjesmodels')->with('success', 'Изменения сохранены');
    }
}
