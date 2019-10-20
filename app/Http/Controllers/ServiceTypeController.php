<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceTypeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $services = DB::table('service_types')->get();
        if($request->query('id') !== null)
        {
            $services = $services->where('service_type_id', $request->query('id'));
        }
        //return response()->json($services);
        return view('services.index', ['services' => $services]);
    }
}
