<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class LabelController extends Controller
{

    function showLabels(Request $request){

        $label = $request->tag;

        $labels = DB::table('labels')
            ->where('label', 'like', '%'.$label.'%')
            ->get();

        return response()->json(['labels'=>$labels]);

    }

}
