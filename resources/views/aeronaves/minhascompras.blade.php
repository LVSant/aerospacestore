@extends('layout.index')
@section('title', ' | Minhas Aeronaves')
@section('content')
<div class="panel panel-default">
   <div class="panel-body">
      <div class="panel-heading">
         <h1> Gerenciador de Compras </h1>
      <div class="alert alert-info">
      Na tabela abaixo estão exibidas as <b>compras</b> que foram realizadas pelo seu usuário!
      </div>
      <hr>
      @if(empty($compras))
      <div class="alert alert-danger">    
         Você não tem nenhuma Compra
      </div>
      @else
      
      <!-- Filters -->
     	
      
   </div>
   <div class="table-responsive">
      <table class="table table-hover table-striped table-condensed" >
         <tr>
         <td><strong>Data</strong></td>
            
            <td><strong>Aeronave</strong></td>
            <td><strong>Valor</strong></td>
            <td><strong>Status </strong></td>
            <td><strong>Mensagem</strong></td>
            <td><strong>Ação</strong></td>
         </tr>
       
         <tr>
         @foreach($compras as $c)
         <td>{{$c->created_at}}</td>
         
          <td>{{$c->aeronave->modelo}}</td>
            <td>U$ {{number_format($c->aeronave->valor)}}</td>
          <td> @php switch($c->status){
            case 'I': echo "Inicial"; break; 
            case 'C': echo "Pedente pelo Comprador"; break; 
            case 'V': echo "Pedente pelo Vendedor"; break; 
            case 'F': echo "Finalizada"; break; 
            case 'D': echo "Cancelada"; break; 
            default: echo ""; break; 
            }@endphp </td>

            <td>{{$c->mensagem}}</td>
            
           @if($c->status == 'V')
           <td>
			<a class="btn btn-sm btn-danger" href='{{url('/aeronaves/compra/'.$c->id.'/cancelacompra')}}'>Cancelar intenção de compra</a>
           </td>
           @else
           <td><a class="btn btn-sm btn-danger disabled">Cancelar intenção de compra</a> </td>
           @endif
         </tr>
       @endforeach
      </table>
   </div>

   @endif

</div>
</div>
@endsection


