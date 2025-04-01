@extends('layout.app')

@section('includesCSS')
    @parent
    <link rel="stylesheet" href="/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css">
@endsection

@section('includesScriptsAlpineJS')
    @parent
    <script src="/js/proposedsale/edit-alpine.js"></script>
@endsection

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
<div x-data="appData" x-init="initData" class="container">
    <h1 class="h3">Proposta venda - Gestão de proposta</h1>

    <form method="POST" id="frm-edit" action="{{route('proposedsale.update', $data->id)}}">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="form-group col-1">
                <label for="id" class="form-label">ID</label>
                <input type="text" disabled name="id" id="id" value="{{$data->id}}" class="form-control">
            </div>
            <div class="form-group col-7">
                <label for="item_sold" class="form-label">Item vendido</label>
                <input type="text" disabled name="item_sold" id="item_sold" value="{{$data->item_sold}}" class="form-control">
            </div>
            <div class="form-group col-2">
                <label for="price" class="form-label">Valor</label>
                <input type="text" disabled name="price" id="price" value="{{number_format($data->price,2,',','.')}}" class="form-control">
            </div>
            <div class="form-group col-2">
                <label for="created_at" class="form-label">Data de Cadastro</label>
                <input type="text" disabled name="created_at" id="created_at" value="{{$data->created_at->format('d/m/Y H:i:s')}}" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-2">
                <label for="status_id" class="form-label">Status</label>
                <select @change="changeStatus($event)" name="status_id" id="status_id" class="form-select">
                    @foreach($allStatus as $st)
                        <option value="{{ $st->id }}"
                            {{ $data->status_id == $st->id ? 'selected' : '' }}>
                            {{ $st->name }}</option>
                    @endforeach
                </select>
            </div>
            <div x-show="showEndDate" class="form-group col-2">
                <label for="end_date" class="form-label">Data de Finalização</label>
                <input type="text" name="end_date" id="end_date" readonly value="{{((bool)$data->end_date)? $data->end_date->format('d/m/Y'): ''}}" class="form-control">
            </div>
            <div class="form-group col-8">
                <label for="obs" class="form-label">Observação</label>
                <input type="text" name="obs" id="obs" maxlength="255" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="d-flex justify-content-end pt-3">
                <a href="{{route('proposedsale.index')}}" class="btn btn-secondary" type="button">Listar propostas</a>
                <a href="{{route('proposedsale.create')}}" class="btn btn-success ms-5" type="button">Criar nova proposta</a>
                @if($status != 'Finalizado')
                <button @click="submitData" id="edit" class="btn btn-primary ms-5" type="button" x-text="buttonLabel" :disabled="loading"></button>
                @endif
            </div>
        </div>
    </form>
</div>
@endsection

@section('includesJS')
    @parent
    <script defer src="/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script defer src="/assets/plugins/bootstrap-datepicker/locales/bootstrap-datepicker.pt-BR.min.js"></script>
    <script src="/js/proposedsale/edit.js"></script>
@endsection
