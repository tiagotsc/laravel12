@extends('layout.app')

@section('content')
<div class="container">
    <h1 class="h3">Proposta venda - Listagem</h1>
    <table class="table table-striped">
        <thead>
          <tr class="table-dark">
            <th scope="col">ID</th>
            <th scope="col">Item Vendido</th>
            <th scope="col">Valor</th>
            <th scope="col">Status da Proposta</th>
            <th scope="col">Data de Cadastro</th>
            <th scope="col">Data de Finalização</th>
            <th scope="col" class="text-center">Ação</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($data as $d)
            <tr>
                <th><a title="Visualizar" href="{{route('proposedsale.show',$d->id)}}">{{$d->id}}</a></th>
                <td>{{$d->item_sold}}</td>
                <td>R$ {{number_format($d->price,2,',','.')}}</td>
                <td>{{$d->status->name}}</td>
                <td>{{$d->created_at->format('d/m/Y H:i:s')}}</td>
                <td>
                    @if ((bool)$d->end_date)
                        {{$d->end_date->format('d/m/Y')}}
                    @endif
                <td class="text-center">
                    <a title="Visualizar" href="{{route('proposedsale.show',$d->id)}}" class="me-4"><i class="bi bi-search fs-5"></i></a>
                    @if($d->status->name != 'Finalizado')
                    <a title="Gestão de proposta" href="{{route('proposedsale.edit',$d->id)}}"><i class="bi bi-pencil-square fs-5"></i></a>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
      </table>
</div>
@endsection
