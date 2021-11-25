<?php

namespace App\Http\Controllers;

use App\Models\Pc;
use App\Models\PcCategory;
use App\Models\pcType;
use App\Models\PersonCategory;
use App\Models\personType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class PcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $i = 1;
        $pc = Pc::all();
        $data = array('pc'=>$pc, 'i'=>$i);
        return view('pc.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pt  = DB::table('person_categories')->pluck('name','id')->toArray();
        return view('pc.create')->with('pt',$pt);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'first_name' => 'required',
            'last_name'=>'required',
            'id_number' =>'required',
            'serial_number'=>'required',
            'person_type'=>'required',
            'phone_number'=>['required','regex:/^(\+251|0)9[0-9]{8}/']
          ]);
          $pc = new Pc();
        
          $pc->first_name = $request->input('first_name');
          $pc->last_name = $request->input('last_name');
          $pc->id_number = $request->input('id_number');
        //   $pc->serial_number = $request->input('serial_number');
          $pc->phone_number = $request->input('phone_number');
          $pc->person_type_id = $request->input('person_type');
          $pc->save();

          foreach($request->input('pc_model') as $key => $model){
              $pctype = new PcCategory();
              $pctype->person_id = $pc->id;
              $pctype->pc_name = $model;
              $pctype->serial_number = $request->input('serial_number')[$key];
              $pctype->save();
          }

          return redirect(route('pc.index'));
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

    public function search(){
        // $svalue='ru39767/09';
        // $pcSearch2 = Pc::all();
        // $pcSearch = Pc::select('*')->where('id_number',$svalue)
        // ->orWhere('phone_number',$svalue)->get();
        // if(count($pcSearch)>0){
        //     dd($pcSearch);
        // }else{
        //     dd('sfdfsd');
        // }
        return view('pc.search');
    }

    public function searchpc(){
        $svalue = $_GET['svalue'];
        $pcSearch = Pc::select('*')->where('id_number',$svalue )
        ->orWhere('phone_number',$svalue)->get();
        if(count($pcSearch) > 0 ){
            $type = $pcSearch[0]->type;
            $pcserial = PcCategory::select('*')->where('person_id',$pcSearch[0]->id)->get();
        }
        else{
            $type = '';
            $pcserial = '';
        }
        // $pcSearch = Pc::where('id_number',$svalue);
        // $pcSearch = Pc::all();
        return response()->json([
            'pcSearch'=>$pcSearch,
            'type'=>$type,
            'pcserial'=>$pcserial
        ]);
    }

    public function home(){
        $pclatest = Pc::latest()->take(5)->get();
        $pctype = PersonCategory::all();
        $pc = Pc::all();
        $data = array('pc'=>$pc, 'pctype'=>$pctype, 'pclatest'=>$pclatest);
        return view('front.home')->with('data',$data);
    }
    
    public function student()
    {
        $i = 1;
        $pctype= DB::table('person_categories')->where('name','student')->value('id');
        $pc = Pc::select('*')->where('person_type_id', $pctype)->get();
        $data = array('pc'=>$pc, 'i'=>$i);
        return view('pc.index')->with('data', $data);
    }

    public function staff()
    {
        $i = 1;
        $pctype= DB::table('person_categories')->where('name','staff')->value('id');
        $pc = Pc::select('*')->where('person_type_id', $pctype)->get();
        $data = array('pc'=>$pc, 'i'=>$i);
        return view('pc.index')->with('data', $data);
    }

    public function other()
    {
        $i = 1;
        $pctype= DB::table('person_categories')->where('name','other')->value('id');
        $pc = Pc::select('*')->where('person_type_id', $pctype)->get();
        $data = array('pc'=>$pc, 'i'=>$i);
        return view('pc.index')->with('data', $data);
    }
}