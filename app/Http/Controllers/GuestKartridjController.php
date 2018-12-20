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



class GuestKartridjController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kartridj.first');
    }
    public function wotsap()
    {
        return view('kartridj.wotsap');
    }
    public function kurier()
    {
        return view('kartridj.kurier');
    }
    public function kurierVizov(Request $request)
    {
        $this->validate($request, [
            'name'=>'required|min:4|max:32',
            'email'=>'sometimes|nullable|email',
            'phone'=>'sometimes|nullable|regex:/^[0-9]{7,10}$/',
            'surname'=>'sometimes|nullable|regex:/^[0-9a-zA-Zа-яА-я]{2,}$/',
        ]);
        $zakaz= new Zakaz_kuriers();
        $zakaz->name=strip_tags($request->name);
        $zakaz->surname=strip_tags($request->surname);
        $zakaz->phone=strip_tags($request->phone);
        $zakaz->email=strip_tags($request->email);
        $zakaz->address=strip_tags($request->adress);
        $zakaz->kol_vo=strip_tags($request->kol_vo);
        $zakaz->taim=strip_tags($request->taim);
        $zakaz->save();
        $sost= new Kuriers_sosts();
        $sost->zakaz_kuriers_id=$zakaz->id;
        $sost->vizov_sost_id=1;
        $sost->save();

        return redirect('/kartridj')->with('success', 'Ваш заказ принят. С Вами свяжется менеджер для уточнения деталей, при необходимости. Номер вашего заказа '.$zakaz->id);
    }
    public function proveritKartridji(Request $request)
    {
        $this->validate($request, [
            'num'=>'sometimes|nullable|regex:/^[0-9]{1,}$/',
            //'email'=>'required|email|unique:users',
            'email'=>'sometimes|nullable|email',
            'phone'=>'sometimes|nullable|regex:/^[0-9]{7,10}$/',
            'surname'=>'sometimes|nullable|regex:/^[0-9a-zA-Zа-яА-я]{2,}$/',
        ]);
        //$kartridjes=[];
        if(strip_tags($request->num)!=null){
            $akts=Acts_kartridjes::find(strip_tags($request->num));
            if(isset($akts)){
                $aktNum=strip_tags($request->num);
                $kartMod=[];
                $kartSer=[];
                $kartSost=[];
                $kartPrice=[];
                //$kart=[];
                foreach ( explode(',', $akts->kartridjes_id) as $id) {
                    //$kart[] = Kartridjes::find($id);
                    $kart=Kartridjes::find($id);
                    $kartMod[]=$kart->models_kartridjes->models;
                    $kartSer[]=$kart->serial_number;
                    $kartSost[]=$kart->sostoyanies->sostoyanies;
                    $kartPrice[]=$kart->price;
                }
            }
            else{
                $aktNum=null;
            }
        }
        /*elseif(strip_tags($request->email)!=null){
            $clients_email=strip_tags($request->email);
            $clients_new_id=[];
            $aktNum=[];
            $kartMod=[];
            $kartSer=[];
            $kartSost=[];
            $kartPrice=[];
            $clients_arr=Client::pluck('email', 'id');
            foreach ($clients_arr as $key => $value) {
                if($value==$clients_email){
                   $clients_new_id[]=$key;
                }
            }
                for($i=0; $i<count($clients_new_id); $i++){
                    $clients_new[]=Client::find($clients_new_id[$i]);
                    for($asz=0; $asz<count($clients_new); $asz++){
                        if(isset($clients_new[$asz])){
                            $kartr_id=$clients_new[$asz]->kartridjes->id;
                            $kart=Kartridjes::find($kartr_id);
                            $aktNum[]=$kart->acts_kartridjes->id;
                            $kartMod[]=$kart->models_kartridjes->models;
                            $kartSer[]=$kart->serial_number;
                            $kartSost[]=$kart->sostoyanies->sostoyanies;
                            $kartPrice[]=$kart->price;
                        }
                        else{
                            $aktNum=null;
                        }
                    }
                }
        }
        elseif(strip_tags($request->phone)!=null){
            $clients_phone=strip_tags($request->phone);
            $clients_new_id=[];
            //$kart=[];
            $aktNum=[];
            $kartMod=[];
            $kartSer=[];
            $kartSost=[];
            $kartPrice=[];
            $clients_arr=Client::pluck('phone', 'id');
            foreach ($clients_arr as $id => $phone) {
                if($phone==$clients_phone){
                   //$clients_new_id[]=$key;
                    $clients_new_id[]=$id;
                }
            }
            if(isset($clients_new_id)){
                for($i=0; $i<count($clients_new_id); $i++){
                    $clients_new=Client::find($clients_new_id[$i]);
                    $kart_id=$clients_new->kartridjes->id;
                    $kart=Kartridjes::find($kart_id);
                    $aktNum[]=$kart->acts_kartridjes->id;
                    $kartMod[]=$kart->models_kartridjes->models;
                    $kartSer[]=$kart->serial_number;
                    $kartSost[]=$kart->sostoyanies->sostoyanies;
                    $kartPrice[]=$kart->price;
                }
            }
            else{
                $aktNum=null;
            }
        }
        elseif(strip_tags($request->surname)!=null){
            $clients_surname=strip_tags($request->surname);
            $clients_new_id=[];
            //$kart=[];
            $clients_arr=Client::pluck('surname', 'id');
            foreach ($clients_arr as $key => $value) {
                if($value==$clients_surname){
                   $clients_new_id[]=$key;
                }
            }
            if(isset($clients_new_id)){
                for($i=0; $i<count($clients_new_id); $i++){
                    $clients_new=Client::find($clients_new_id[$i]);
                    $kart_id=$clients_new->kartridjes->id;
                    $kart=Kartridjes::find($kart_id);
                    $aktNum[]=$kart->acts_kartridjes->id;
                    $kartMod[]=$kart->models_kartridjes->models;
                    $kartSer[]=$kart->serial_number;
                    $kartSost[]=$kart->sostoyanies->sostoyanies;
                    $kartPrice[]=$kart->price;
                }
            }
            else{
                $aktNum=null;
            }
        }*/
        else{
            $aktNum=null;
        }
        return view('kartridj.rezkart', compact('aktNum', 'kartMod', 'kartSer', 'kartSost', 'kartPrice'));
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
