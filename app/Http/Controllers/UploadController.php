<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

use App\Models\Subcompany;

class UploadController extends Controller
{

  public function index(Request $request)
  {
    // $miscsales = session('miscsale');
    // $miscsales = collect($miscsales)->filter(function ($sale) {
    //   return count($sale) > 1;
    // })->values()->all();
    // dd($miscsales);
    // dd(request()->session()->get('journal'));
    $subcompanies = Subcompany::all()->map(function ($sub) {
      $sub['model'] = [];
      $sub['sales'] = [];
      return $sub;

      // sub = {
      //   id: 1,
      // }

      // sub = {
      //   id: 1,
      //   model: [],
      //   sales: [],
      // }

    })->all();
    // $miscsales = session('miscsale');
    // $miscsales = collect($miscsales)->filter(function($sale) {
    //   return count($sale) > 1;
    // })->values()->all();
    // $paginations = $this->paginate($miscsale);
    // $paginations->withPath('/upload');
    // return $paginations;
    // return $miscsales;
    return view('upload.index', [
      'subcompanies' => $subcompanies,
      // 'paginations'=>$paginations,
      // 'miscsales' => $miscsales,
    ]);
  }

  public function create()
  {
    return view('upload.create');
  }

  public function upload(Request $request)
  {
    $this->validate($request, [
      'account' => 'required',
      'miscsale' => 'required',
      // 'journal' => 'required',
    ]);



    $requestAccount = $request->file('account');
    $requestMiscsale = $request->file('miscsale');
    $requestJournal = $request->file('journal');


    if ($request->hasFile('account')) {
      if ($requestAccount->extension() !== 'txt') {
        return response()->json([
          'message' => 'File uploaded successfully',
        ], 400);
      }
    }

    if ($request->hasFile('miscsale')) {
      if ($requestMiscsale->extension() !== 'txt') {
        return response()->json([
          'message' => 'File uploaded successfully',
        ], 400);
      }
    }


    // if ($request->hasFile('journal')) {
    //   if ($requestJournal->extension() !== 'txt') {
    //     return response()->json([
    //       'message' => 'File uploaded successfully',
    //     ], 400);
    //   }
    // }



    $account = [];
    $uploadedAccount = $request->file('account');
    $file = fopen($uploadedAccount, "r");
    while (!feof($file)) {
      $line = fgets($file);
      $columns = explode("\t", $line);
      array_push($account, $columns);
    }
    fclose($file);

    // return response()->json([
    //   'data' => $account,
    // ]);

    $miscsale = [];
    $uploadedMiscsale = $request->file('miscsale');
    $file = fopen($uploadedMiscsale, "r");
    while (!feof($file)) {
      $line = fgets($file);
      $columns = explode("\t", $line);
      array_push($miscsale, $columns);
    }
    fclose($file);



    $journal = [];
    if ($request->hasFile('journal')) {
      $uploadedJournal = $request->file('journal');
      $file = fopen($uploadedJournal, "r");
      while (!feof($file)) {
        $line = fgets($file);
        $columns = explode("\t", $line);
        array_push($journal, $columns);
      }
      fclose($file);
    }

    // $request->session()->put('account', json_encode($account));
    // $request->session()->put('miscsale', json_encode($miscsale));
    // $request->session()->put('journal', json_encode($journal));

    $request->session()->put('account', $account);
    $request->session()->put('miscsale', $miscsale);
    $request->session()->put('journal', $journal);


    return response()->json([
      // 'account' => $account,
      // 'miscsale' => $miscsale,
      // 'journal' => $journal,
      'message' => 'ok',
    ]);

    // return redirect('/upload')->with('account', json_encode($account));
    // return redirect('/upload')->with('miscsale', json_encode($miscsale));
    // return redirect('/upload')->with('journal', json_encode($journal));

  }

  public function paginate($items, $perPage = 5, $page = null, $options = [])
  {
    $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
    $items = $items instanceof Collection ? $items : Collection::make($items);
    return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function miscsalesApi(Request $request)
  {
    // $miscsales = [];
    // if(session('miscsales')) {
    // }
    $miscsales = session('miscsale');
    // return $miscsales;
    $miscsales = collect($miscsales)->filter(function ($sale) {
      return count($sale) > 1;
    })->values()->all();
    return response()->json([
      'success' => true,
      'message' => 'Data Miscsales',
      'data' => $miscsales,
    ], 200);
  }
}
