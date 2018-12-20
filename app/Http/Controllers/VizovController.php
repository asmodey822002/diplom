<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use App\Models\Kartridjes;
use App\Models\Client;
use App\Models\Masters;
use App\Models\Materials_kartridjes;
use App\Models\Models_kartridjes;
use App\Models\Sostoyanies;
use App\Models\Rabota_kartridjes;
use App\Models\Rabota_ks;
use App\Models\Acts_kartridjes;
use App\Models\Zakaz_kuriers;
use App\Models\Vizov_sosts;
use App\Models\Kuriers_sosts;
use App\Models\Zakaz_specs;
use App\Models\Specs_sosts;


class VizovController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('vizov.first');
    }
    public function spec()
    {
        return view('vizov.kurier');
    }
    public function specVizov(Request $request)
    {
        $this->validate($request, [
            'name'=>'required|min:4|max:32',
            'email'=>'sometimes|nullable|email',
            'phone'=>'sometimes|nullable|regex:/^[0-9]{7,10}$/',
            'surname'=>'sometimes|nullable|regex:/^[0-9a-zA-Zа-яА-я]{2,}$/',
        ]);
        $zakaz= new Zakaz_specs();
        $zakaz->name=strip_tags($request->name);
        $zakaz->surname=strip_tags($request->surname);
        $zakaz->phone=strip_tags($request->phone);
        $zakaz->email=strip_tags($request->email);
        $zakaz->address=strip_tags($request->adress);
        $zakaz->opisanie=strip_tags($request->opisanie);
        $zakaz->taim=strip_tags($request->taim);
        $zakaz->save();
        $sost= new Specs_sosts();
        $sost->zakaz_spec_id=$zakaz->id;
        $sost->vizov_sost_id=1;
        $sost->save();

        return redirect('/vizov')->with('success', 'Ваш заказ принят. С Вами свяжется менеджер для уточнения деталей, при необходимости. Номер вашего заказа '.$zakaz->id);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
