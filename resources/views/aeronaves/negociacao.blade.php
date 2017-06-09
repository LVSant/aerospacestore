@extends('layout.index') 

@section('title', ' | Negociação')

@section('content')
<div class="panel panel-default">
   <div class="panel-body">
      <div class="panel-heading">
         <h1> Negociação da Aeronave {{$acft->modelo}}  </h1>
      </div>

     
      @if(empty($acft))
      <div class="alert alert-danger">
         Esta aeronave não existe.
      </div>
      @else
      <div class="jumbotron">
         <div class="row">
      <p><h3>Vendido por: {{$acft->vendedor->name}}<br>
      Proposta de compra por: {{$comprador->name}}</h3></p>
            <div class="title-website">
               <h3> &nbsp; {{$acft->modelo}}</h3>
            </div>         
            <div class="col-md-12">

            
            
           
      <div class="table-responsive">
         <table class="table table-hover table-striped table-condensed" >
         <tr>
            <td><strong>Foto</strong></td>                                
            <td><strong>Preço</strong> </td>            
            <td><strong>Ano de Fabricação</strong> </td>                                             
            <td><strong>Mensagem</strong></td>            
            <td><strong>Status da Compra</strong></td>
         </tr>
         
         <tr>
            <td><img src="<?= $acft->link_img ?>" style="max-width: 100px; max-height: 100px;" class="img-responsive img-thumbnail" alt="{{$acft->modelo}}"></td>
            
            <td> U$ {{ number_format($acft->valor,0) }} </td>
            <td> <?= $acft->ano ?> </td>
            <td> <?= $compra->mensagem ?></td>
            <td>   @php switch($compra->status){
            case 'I': echo "Inicial"; break; 
            case 'C': echo "Pedente pelo Comprador"; break; 
            case 'V': echo "Pedente pelo Vendedor"; break; 
            case 'F': echo "Finalizada"; break; 
            case 'D': echo "Cancelada"; break; 
            default: echo ""; break; 
            }@endphp  </td>  
            
         </tr>
         
      </table>
      @if($compra->status == 'V')
            <p> <div class="alert alert-info">
            A sua compra está em estado <b>Pendende pelo Vendedor</b> <br> Para prosseguir, deve esperar o vendedor confirmar a venda da Aeronave <br><b>Você será notificado por e-mail quando estiver disponível para prosseguir</b></div></p>
            @endif
   </div>
   
              
               <a href={{url( '/aeronaves/')}} class="btn btn btn-warning">Voltar a busca</a>
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