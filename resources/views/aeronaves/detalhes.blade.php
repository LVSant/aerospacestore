@extends('layout.index') 
@section('content')
<div class="panel panel-default">
   <div class="panel-body">
      <div class="panel-heading">
         <h1> Detalhes  </h1>
      </div>
      @if(empty($acft))
      <div class="alert alert-danger">
         Esta aeronave não existe.
      </div>
      @else
      <div class="jumbotron">
         <div class="row">
            <div class="title-website">
               <h1> &nbsp; {{$acft->modelo}}</h1>
            </div>         <div class="col-md-5">
            <div class="table-responsive">
               <table class="table table-hover">
                  <tbody>
                     <tr>
                        <th>Fabricação</th>
                        <td>{{$acft->ano}}</td>
                     </tr>
                     <tr>
                        <th>Tipo </th>
                        <td> {{$acft->numeromotor}} {{$acft->tipomotor}}</td>
                     </tr>
                     <tr>
                        <th>Preço</th>
                        <td>U$ {{number_format($acft->valor)}}</td>
                     </tr>
                     <tr>
                        <th>Localização</th>
                        <td>{{$acft->vendedor->localizacao}}</td>
                     </tr>
                     <tr>
                        <th>Horas de vôo</th>
                        <td>{{$acft->hvoo}}</td>
                     </tr>
                     <tr>
                        <th>Vendedor</th>
                        <td>{{$acft->vendedor->name}}</td>
                     </tr>
                  </tbody>
               </table>
            </div>
   
               <a href={{url( '/aeronaves/compra/'.$acft->id)}} class="btn  btn-success">Solicitar dados do vendedor</a><br><br>
               <a href={{url( '/aeronaves/')}} class="btn btn btn-warning">Voltar a busca</a>
               <br><br>
            </div>
            <div class="col-md-7">
               <img src="<?= $acft->link_img?>" style="max-width: 500px; max-height: 500px;" class="img-responsive img-thumbnail" alt="{{$acft->modelo}}">
               <p>{{$acft->descricao}}</p>
            </div>
            <p style="">
               </br>
               <br>
            </p>
         </div>
      </div>
      @endif
   </div>
</div>
@endsection