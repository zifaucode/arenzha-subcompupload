<?php

namespace App\Http\Controllers;

use Exception;

use App\Models\Subcompany;
use Illuminate\Http\Request;


class SubcompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcompanies = Subcompany::all();
        return view('subcompany.index', [
            'subcompanies' => $subcompanies,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('subcompany.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subcompanies = new Subcompany;
        $subcompanies->company_name = $request->company_name;
        $subcompanies->address = $request->address;
        $subcompanies->phone_number = $request->phone_number;
        $subcompanies->fax_number = $request->fax_number;
        $subcompanies->email = $request->email;
        $subcompanies->npwp = $request->npwp;
        $subcompanies->akte_pendirian_terakhir = $request->akte_pendirian_terakhir;
        $subcompanies->nib = $request->nib;
        $subcompanies->jenis_usaha = $request->jenis_usaha;
        $subcompanies->no_klu = $request->no_klu;
        $subcompanies->directur = $request->directur;
        $subcompanies->npwp_directur = $request->npwp_directur;

        try {
            $subcompanies->save();
            return redirect('/subcompany');
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Internal error',
                'code' => '500',
                'error' => true,
                'errors' => $e,
            ]);
        }
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
        $subcompany = Subcompany::findOrFail($id);
        return view('subcompany.edit', [
            'subcompany' => $subcompany,

        ]);
    }

    public function detail($id)
    {
        $subcompany = Subcompany::findOrFail($id);
        //return $subcompanies;
    
        return view('subcompany.detail', [
            'subcompany' => $subcompany,
        ]);
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
        $subcompanies = Subcompany::findOrFail($id);
        $subcompanies->company_name = $request->company_name;
        $subcompanies->address = $request->address;
        $subcompanies->phone_number = $request->phone_number;
        $subcompanies->fax_number = $request->fax_number;
        $subcompanies->email = $request->email;
        $subcompanies->npwp = $request->npwp;
        $subcompanies->akte_pendirian_terakhir = $request->akte_pendirian_terakhir;
        $subcompanies->nib = $request->nib;
        $subcompanies->jenis_usaha = $request->jenis_usaha;
        $subcompanies->no_klu = $request->no_klu;
        $subcompanies->directur = $request->directur;
        $subcompanies->npwp_directur = $request->npwp_directur;
        try {
            $subcompanies->save();
            // return redirect('/subcompany');
            return response()->json([
                'message' => 'OK',
                'code' => '200',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Internal error',
                'code' => '500',
                'error' => true,
                'errors' => $e,
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcompany = Subcompany::findOrFail($id);
        try {
            $subcompany->delete();
            return response()->json([
                'message' => 'OK',
                'code' => '200',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Internal error',
                'code' => '500',
                'error' => true,
                'errors' => $e,
            ]);
        }
    }
}
