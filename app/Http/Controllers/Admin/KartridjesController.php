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
use App\Models\Rabota_kartridjes;
use App\Models\Rabota_ks;

class KartridjesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.kartridjes.index');
    }
    public function kartridjesData()
    {
        return Datatables::of(Kartridjes::query())
        ->addColumn('models_kartridjes_id', function ($kartridjes) {
            return $kartridjes->models_kartridjes->models;
            })
        ->addColumn('master_id', function ($kartridjes) {
            if(isset($kartridjes->masters->users->name)){
                return $kartridjes->masters->users->name;
            }
            else
                return '---';
            })
        ->addColumn('sostoyanies_id', function ($kartridjes) {
            return $kartridjes->sostoyanies->sostoyanies;
            })
        ->addColumn('materials_kartridjes_id', function ($kartridjes) {
            if(isset($kartridjes->materials_kartridjes->materials)){
                return $kartridjes->materials_kartridjes->materials;
            }
            else
                return '---';
            })
        ->addColumn('client_id', function ($kartridjes) {
            if(isset($kartridjes->client->name))
                return $kartridjes->client->name;
            else
                return '---';
            })
        ->addColumn('action', function ($kartridjes) {
            return '<a href="/admin/kartridjes/'.$kartridjes->id.'/edit" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
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
        $kartridjes=new Kartridjes();
        $models_kartridjes=Models_kartridjes::pluck('models', 'id');
        //$masters=User::pluck('name', 'id');
        //$sostoyanies=Sostoyanies::pluck('sostoyanies', 'id');
        $client=new Client;
        //$masters=$kartridjes->masters->users->pluck('name')->implode(', ');
        return view('admin.kartridjes.create', compact('kartridjes', 'models_kartridjes', 'masters', 'sostoyanies', 'client'));
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
            'name'=>'required|min:4|max:32',
            'email'=>'required|email',
            'phone'=>'sometimes|nullable|regex:/^[0-9]{7,10}$/',
        ]);
        $kartridjes=new Kartridjes();
        $kartridjes->models_kartridjes_id=$request->models_kartridjes_id;
        $kartridjes->serial_number=$request->serial_number;
        $kartridjes->complaint=$request->complaint;
        $kartridjes->sostoyanies_id=1;

        $client=new Client;
        $client->name=$request->name;
        $client->surname=$request->surname;
        $client->email=$request->email;
        $client->phone=$request->phone;
        $client->save();
        $kartridjes->client_id=$client->id;
        $kartridjes->save();
        return redirect('/admin/kartridjes')->with('success', 'Картридж принят');
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
        $kartridjes=Kartridjes::find($id);
        $sostoyanies=Sostoyanies::pluck('sostoyanies', 'id');
        $models=Models_kartridjes::pluck('models', 'id');
        //
        $us=User::pluck('name', 'id');
        $mas=Masters::pluck('id', 'users_id');
        $mast=$us->diffKeys($mas);
        $maste=$us->diffKeys($mast);
        $masters=$maste->all();
        if(isset($kartridjes->master_id)){
            $mast_chk=$kartridjes->masters->users->id;
        }
        else{
            $mast_chk=null;
        }
        //
        if(isset($kartridjes->materials_kartridjes->materials)){
            $materials=$kartridjes->materials_kartridjes->materials;
            $materials_price=$kartridjes->materials_kartridjes->price;
        }
        else{
            $materials='---------';
            $materials_price=0;
        }
        $client=$kartridjes->client;
        //
        if(isset($kartridjes->master_id)){

        }
        $rabota=Rabota_ks::pluck('name', 'id');
        if(isset($kartridjes->rabota->rabota_id)){
            $rab_chk=$kartridjes->rabota->rabota_id;
        }
        else{
            $rab_chk=null;
        }
        //$kartridjes->price=;

        return view('admin.kartridjes.edit', compact('kartridjes', 'sostoyanies', 'masters', 'models', 'materials', 'client', 'materials_price', 'mast_chk', 'rabota', 'rab_chk'));
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
        $kartridjes=Kartridjes::find($id);
        $kartridjes->models_kartridjes_id=$request->models_kartridjes_id;
        $kartridjes->serial_number=$request->serial_number;
        $kartridjes->complaint=$request->complaint;
        //
        if($request->user!=null){
            $us_id=$request->user;
            $user_master=User::find($us_id);
            $user_master_id=$user_master->mastersId->id;
            $kartridjes->master_id=$user_master_id;
        }
        else{
            $kartridjes->master_id=null;
        }
        //

        $kartridjes->diagnostik=$request->diagnostik;
        $kartridjes->sostoyanies_id=$request->sostoyanies_id;
        //$kartridjes->sostoyanies_id=$request->sostoyanies_id;
        if(isset($kartridjes->materials_kartridjes_id)){
            /*$kartridjes->materials_kartridjes->materials=$request->materials;
            $kartridjes->materials_kartridjes->price=$request->materials_price;*/
            $mat_cat=Materials_kartridjes::find($kartridjes->materials_kartridjes_id);
            $mat_cat->materials=$request->materials;
            $mat_cat->price=$request->materials_price;
            $mat_cat->save();
        }
        else{
            $materialsNew=new Materials_kartridjes();
            $materialsNew->materials=$request->materials;
            $materialsNew->price=$request->materials_price;
            $materialsNew->save();
            $kartridjes->materials_kartridjes_id=$materialsNew->id;
        }
        if(isset($kartridjes->client_id)){
            $client=Client::find($kartridjes->client_id);
            $client->name=$request->name;
            $client->surname=$request->surname;
            $client->phone=$request->phone;
            $client->email=$request->email;
            $client->save();
            $kartridjes->client_id=$client->id;
        }
        else{
            $client=new Client();
            $client->name=$request->name;
            $client->surname=$request->surname;
            $client->phone=$request->phone;
            $client->email=$request->email;
            $client->save();
            $kartridjes->client_id=$client->id;
        }
        //
        
        if($request->rabota!=null){
            //$new_rab_k=new Rabota_kartridjes();
            if($request->rabota==1){
                $price_master=$kartridjes->masters->price_kartridj_regeniraciya;
                $price_firm=$kartridjes->masters->nacenka_kartridj_regeniraciya;
            }
            else{
                $price_master=$kartridjes->masters->price_kartridj_zapravka;
                $price_firm=$kartridjes->masters->nacenka_kartridj_zapravka;
            }
            $price_m_al=$kartridjes->materials_kartridjes->price;
            $rabota_kartridjes=$price_master+$price_firm;
            if(isset($kartridjes->client_id)){
                if(isset($kartridjes->client->skidka)){
                    $skidka=$kartridjes->client->skidka;
                }
                else{
                    $skidka=0;
                }
            }
            else{
                $skidka=0;
            }
            $k_oplate=$price_m_al+$rabota_kartridjes-(($price_m_al+$rabota_kartridjes)*$skidka);
            //
            $r_k_p=Rabota_kartridjes::pluck('kartridjes_id', 'id');
            $k_id=$kartridjes->id;
            $r_k_id='';
            foreach ($r_k_p as $id => $value) {
                if($value==$k_id){
                    $r_k_id=$id;
                }
            }
            if($r_k_id!=''){//???
                //$r_k_id=$kartridjes->has_id->id;
                $rabota_kartridjes=Rabota_kartridjes::find($r_k_id);
                $rabota_kartridjes->rabota_id=$request->rabota;
                //$kartridjes->rabota->rabota_id=$request->rabota;
                $rabota_kartridjes->save();
            }
            else{
                $rabota_kartridjes= new Rabota_kartridjes();
                $rabota_kartridjes->kartridjes_id=$kartridjes->id;
                $rabota_kartridjes->rabota_id=$request->rabota;
                $rabota_kartridjes->save();
            }
            //
        }
        else{
            $k_oplate=null;
            //$new_rab_k=new Rabota_kartridjes();
            //$new_rab_k->;
        }
        //
        $kartridjes->price=$k_oplate;
        
        $kartridjes->save();
        return redirect('/admin/kartridjes')->with('success', 'Изменения сохранены');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kartridjes=Kartridjes::find($id);
        if($kartridjes){
            $kartridjes->delete();
        }
    }
}
