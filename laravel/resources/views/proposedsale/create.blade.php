@extends('layout.app')

@section('includesScriptsAlpineJS')
    @parent
    <script src="/js/proposedsale/create-alpine.js"></script>
@endsection


@section('content')
<div x-data="appData" class="container">
    <h1 class="h3">Proposta venda - Cadastrar</h1>
    <form method="POST" id="frm-create" action="{{route('proposedsale.store')}}">
        @method('POST')
        @csrf
        <div class="row">
            <div class="form-group col-6">
                <label for="item_sold" class="form-label">Item vendido</label>
                <input type="text" name="item_sold" id="item_sold" maxlength="70" value="{{old('item_sold')}}" class="form-control">
            </div>
            <div class="form-group col-3">
                <label for="price" class="form-label">Valor (min.: R$ 0,02)</label>
                <input type="text" name="price" id="price" maxlength="12" value="{{old('price')}}" placeholder="Formato ex.: 0.02" class="form-control">
            </div>
            <div class="form-group col-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" disabled class="form-select">
                    <option value="1">Aberto</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="d-flex justify-content-end pt-3">
                <button @click="submitData" id="create" class="btn btn-primary" type="button" x-text="buttonLabel" :disabled="loading"></button>
            </div>
        </div>
    </form>
</div>
@endsection

@section('includesJS')
    @parent
    <script src="/js/proposedsale/create.js"></script>
@endsection
