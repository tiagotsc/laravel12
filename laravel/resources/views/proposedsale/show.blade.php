@extends('layout.app')

@if (session('alertMessage'))
    @php
        $alert = explode('|',session('alertMessage'));
    @endphp
    <div class="container">
        <div class="row">
            <div class="alert {{ $alert[0] }} alert-dismissible fade show" role="alert">
                {{ $alert[1] }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
@endisset

@section('content')
<div class="container">
    <h1 class="h3">Proposta venda - Visualização</h1>
    <div class="row">
        <div class="form-group col-1">
            <label for="id" class="form-label">ID</label>
            <input type="text" disabled name="id" id="id" value="{{$data->id}}" class="form-control">
        </div>
        <div class="form-group col-3">
            <label for="item_sold" class="form-label">Item vendido</label>
            <input type="text" disabled name="item_sold" id="item_sold" value="{{$data->item_sold}}" class="form-control">
        </div>
        <div class="form-group col-2">
            <label for="price" class="form-label">Valor</label>
            <input type="text" disabled name="price" id="price" value="{{number_format($data->price,2,',','.')}}" class="form-control">
        </div>
        <div class="form-group col-2">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" disabled class="form-select">
                <option value="">{{$status}}</option>
            </select>
        </div>
        <div class="form-group col-2">
            <label for="created_at" class="form-label">Data de Cadastro</label>
            <input type="text" disabled name="created_at" id="created_at" value="{{$data->created_at->format('d/m/Y H:i:s')}}" class="form-control">
        </div>
        <div class="form-group col-2">
            <label for="end_date" class="form-label">Data de Finalização</label>
            <input type="text" disabled name="end_date" id="end_date" value="{{((bool)$data->end_date)? $data->end_date->format('d/m/Y'): ''}}" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="d-flex justify-content-end pt-3">
            <a href="{{route('proposedsale.index')}}" class="btn btn-secondary me-5" type="button">Listar propostas</a>
            @if($status != 'Finalizado')
            <a href="{{route('proposedsale.edit',$data->id)}}" class="btn btn-primary" type="button">Gestão de proposta</a>
            @endif
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <h2 class="h4">Log de alterações</h1>
        <table class="table table-striped">
            <thead>
                <tr class="table-dark">
                    <th scope="col">Quem cadastrou</th>
                    <th scope="col">Quem alterou</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Data/Horário alteração</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($logs as $l)
                <tr>
                    <td>{{$l->userCreate->name}}</td>
                    <td>{{$l->userEdit->name}}</td>
                    <td>{{$l->obs}}</td>
                    <td>{{$l->created_at->format('d/m/Y H:i:s')}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
