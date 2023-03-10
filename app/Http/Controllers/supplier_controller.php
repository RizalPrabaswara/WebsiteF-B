<?php

namespace App\Http\Controllers;

use App\Bahan_Baku;
use App\supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class supplier_controller extends Controller
{

    function supplier() {
        $supplier = DB::select('select * from supplier s join bahanbaku b on s.id_bahanbaku = b.Id_bahan_baku');
        return view('Back_End.supplier',compact('supplier'));
    }

  function form(){
    $bahanbaku = Bahan_Baku::all();
    return view('Form.input_supplier',compact('bahanbaku'));
  }

  function input_supplier(Request $request) {

    $supplier = new supplier();

    $supplier->id_bahanbaku = $request->bahan;
    $supplier->nama_supplier = $request->nama;
    $supplier->tempat = $request->tempat;

    $supplier->save();

    return redirect('/supplier');
  }
}
