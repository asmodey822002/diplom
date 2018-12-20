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

class ActsKartridjesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('admin.actskartridjes.index');
    }
    public function actsKartridjesData()
    {
        return Datatables::of(Acts_kartridjes::query())
        ->addColumn('models_kartridjes_id', function (Acts_kartridjes $acts_kartridjes) {
            $html=[];
            foreach ( explode(',', $acts_kartridjes->kartridjes_id) as $id) {
                $html[] = Kartridjes::find($id)->models_kartridjes->models;
            }
            return implode(', ', $html);
            })
        ->addColumn('serial_number', function (Acts_kartridjes $acts_kartridjes) {
            $html=[];
            foreach ( explode(',', $acts_kartridjes->kartridjes_id) as $id) {
            $html[] = Kartridjes::find($id)->serial_number;
            }
            return implode(', ', $html);
            })
        ->addColumn('complaint', function (Acts_kartridjes $acts_kartridjes) {
            $html=[];
            foreach ( explode(',', $acts_kartridjes->kartridjes_id) as $id) {
            $html[] = Kartridjes::find($id)->complaint;
            }
            return implode(', ', $html);
            })
        ->addColumn('sostoyanies_id', function (Acts_kartridjes $acts_kartridjes) {
             $html=[];
            foreach ( explode(',', $acts_kartridjes->kartridjes_id) as $id) {
            $html[] = Kartridjes::find($id)->sostoyanies->sostoyanies;
             }
            return implode(', ', $html);
            })
        ->addColumn('price', function (Acts_kartridjes $acts_kartridjes) {
            $html=[];
            foreach ( explode(',', $acts_kartridjes->kartridjes_id) as $id) {
                if(isset(Kartridjes::find($id)->price))
                    $html[] = Kartridjes::find($id)->price;
                else
                    $html[] = 0;
            }
            return implode(', ', $html);
            })
        ->addColumn('client_id', function (Acts_kartridjes $acts_kartridjes) {
            if(isset($acts_kartridjes->kartridjes->client->name))
                return $acts_kartridjes->kartridjes->client->name;
            else
                return '---';
            })
        ->addColumn('action', function ($acts_kartridjes) {
            return '<a href="/'.$acts_kartridjes->files.'" class="btn btn-xs btn-success" target="_blank"><i class="glyphicon glyphicon-eye-open"></i> Show </a> | <span class="btn btn-xs btn-danger" data-id="'.$acts_kartridjes->id.'"><i class="glyphicon glyphicon-remove"></i> Dellete</span>';
            })
        ->make(true);
    }

    function generate_pdf($acts_kartridjes) {
        $kartridjes=[];
        foreach ( explode(',', $acts_kartridjes->kartridjes_id) as $id){
            $kartridjes[]=Kartridjes::find($id);
        }

        $data = [
            'acts_kartridjes' => $acts_kartridjes,
            'kartridjes'=>$kartridjes,
        ];
        $pdf = PDF::loadView('pdf.document', $data);
        return $pdf->save('pdf/'.$acts_kartridjes->id.'_kartridjes.pdf');
    }

    function show_pdf($id){
        $filename=Kartridjes::find($id)->files;
        return stream($filename);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $acts_kartridjes=new Acts_kartridjes();
        $kartridjes=new Kartridjes();
        $models_kartridjes=Models_kartridjes::pluck('models', 'id');

        $client=new Client;
        return view('admin.actskartridjes.create', compact('acts_kartridjes', 'kartridjes', 'models_kartridjes', 'masters', 'sostoyanies', 'client'));
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
            //'email'=>'required|email|unique:users',
            'email'=>'required|email',
            'phone'=>'sometimes|nullable|regex:/^[0-9]{7,10}$/',
        ]);
        
        $client=new Client;
        $client->name=$request->name;
        $client->surname=$request->surname;
        $client->email=$request->email;
        $client->phone=$request->phone;
        $client->address=$request->address;
        $client->save();



        $arrKartridjes = [];
        for ($i=0; $i < count($request->models_kartridjes_id); $i++) { 
            $kartridjes=new Kartridjes();
            $kartridjes->models_kartridjes_id=$request->models_kartridjes_id[$i];
            $kartridjes->serial_number=$request->serial_number[$i];
            $kartridjes->complaint=$request->complaint[$i];
            $kartridjes->sostoyanies_id=1;
            $kartridjes->client_id=$client->id;
            $kartridjes->save();
            $arrKartridjes[] =  $kartridjes->id;
        }


        $acts_kartridjes = new Acts_kartridjes();
        $acts_kartridjes->kartridjes_id=implode(',', $arrKartridjes);
        $acts_kartridjes->save();

        $this->generate_pdf($acts_kartridjes);
        $acts_kartridjes->files='pdf/'.$acts_kartridjes->id.'_kartridjes.pdf';
        $acts_kartridjes->save();
        
        return redirect('/admin/actskartridjes')->with('success', 'Картридж принят');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
        $acts_kartridjes=Acts_kartridjes::find($id);
        foreach ( explode(',', $acts_kartridjes->kartridjes_id) as $id) {
                Kartridjes::find($id)->delete();
            }
        if($acts_kartridjes){
            $acts_kartridjes->delete();
        }
    }
}
