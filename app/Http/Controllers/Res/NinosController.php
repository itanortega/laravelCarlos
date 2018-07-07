<?php

namespace App\Http\Controllers\Res;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class NinosController extends Controller 
{
    // php artisan make:controller PhotoController --resource
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) // mostrar todos
    {
        $data=null;
        $transaction = true;
        $message = "";

        $limite = $request['limite'];
        $inicial = $request['inicial'];

        $sql = <<<SQL
            SELECT
                *
            FROM
                paises
            WHERE
                paisnom like '$inicial%'
            LIMIT $limite
SQL;
           try {
             $data = DB::select ($sql);
               $message = (count($data)>0) ? 'Consulta exitosa.' : 'No hay paises.';
           } catch (\Exception $e) {
               $transaction = false;
               //$message = $e->getMessage();
               $message = "Ocurrió un error al intentar conulstar la lista de paises";
           }

           return response()->json([
                "success"   => $transaction,
                "msg"       => $message,
                "data"        => $data
             ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() // crear
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) // insert
    {
        return "hola";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) // mostrar uno
    {
        return 4*$id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) // editar
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
    public function update(Request $request, $id) // actualizar update
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) //eliminar
    {
        //
    }
}
