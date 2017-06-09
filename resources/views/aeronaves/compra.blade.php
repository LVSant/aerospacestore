@extends('layout.index') 

@section('title', ' | Compra')

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
               <p><small>{{$acft->descricao}}</small></p>
               <br><br>
            </div>
   
            </div>
            <div class="col-md-7">
                  <p>Ao clicar no botão <b>Confirma</b>, o vendedor será contactado por e-mail de sua intenção de compra, e assim será possível finalizar a negociação</p>

               <a href={{url( '/aeronaves/compra/'.$acft->id.'/confirma')}} class="btn btn-block btn-success">Confirma</a>
               <a href={{url( '/aeronaves/')}} class="btn btn-block btn-warning">Voltar a busca</a>
               <br><br>
               


               

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