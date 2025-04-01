<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProposedSale\ProposedSaleStoreRequest;
use App\Http\Requests\ProposedSale\ProposedSaleUpdateRequest;
use App\Models\ProposedSale;
use App\Models\ProposedSaleLog;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProposedSaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = ProposedSale::with('status:id,name')->get();
        return view('proposedsale.list',['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('proposedsale.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProposedSaleStoreRequest $request)
    {
        // $this->validate($request);
        $data = ProposedSale::create($request->all());
        $msg = 'alert-success|Proposta criada com sucesso!';
        return redirect()->route('proposedsale.show',$data->id)->with('alertMessage', $msg);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = ProposedSale::findOrFail($id);
        $logs = ProposedSaleLog::where('proposed_sale_id', $id)->with(
            ['userCreate:id,name', 'userEdit:id,name']
        )->orderBy('id','desc')->get();
        return view('proposedsale.show', ['data' => $data, 'status' => $data->status->name, 'logs' => $logs]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = ProposedSale::findOrFail($id);
        $status = Status::where('status','A')->orderBy('id','asc')->get();
        return view('proposedsale.edit', ['data' => $data, 'status' => $data->status->name, 'allStatus' => $status]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProposedSaleUpdateRequest $request, string $id)
    {
        $data = ProposedSale::findOrFail($id);
        $data->status_id = $request->status_id;
        $data->end_date = ((bool) $request->end_date)? implode('-',array_reverse(explode('/',$request->end_date))): null;
        $data->obs = $request->obs;
        $data->save();
        $msg = 'alert-success|Proposta alterada com sucesso!';
        return redirect()->route('proposedsale.show',$data->id)->with('alertMessage', $msg);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
