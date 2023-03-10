<?php

namespace App\Http\Controllers;

use App\Bahan_Baku;
use BahanBaku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Controller_BahanBaku extends Controller
{

    function master(){
        $bahanbaku = Bahan_Baku::all();
        return view('Back_End.bahan_baku',['bahanbaku'=>$bahanbaku]);
    }

 function form_input(){
     return view('Form.input_bahan');
 }

 function simpan(Request $request) {
    $Bahan_Baku = new Bahan_Baku();
    $Bahan_Baku->Nama_bahan = $request->nama;
    $Bahan_Baku->satuan = $request->satuan;
    $Bahan_Baku->status= $request->status;

    $Bahan_Baku->save();

    return redirect('/Master/Bahan');

 }

 function ambil($id) {
     $Bahan_Baku = DB::table('bahanbaku')->where('Id_bahan_baku',$id)->get();
     return view('Form.update_bahan',['bahanbaku'=>$Bahan_Baku]);

 }

 function update(Request $request) {
    Bahan_Baku::where('Id_bahan_baku',$request->id)->update([
        'Nama_bahan' => $request->nama,
        'satuan'     => $request->satuan,
        'status'     => $request->status
    ]);
    return redirect('/Master/Bahan');
 }

 function delete($id) {
    Bahan_Baku::where('Id_bahan_baku',$id)->delete();
    return redirect('/Master/Bahan');
 }
}
