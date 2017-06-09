@extends('layout.index')
@section('title', ' | Minhas Aeronaves')
@section('content')
<div class="panel panel-default">
   <div class="panel-body">
      <div class="panel-heading">
         <h1> Gerenciador de Vendas </h1>
      <div class="alert alert-info">
      Na tabela abaixo estão exibidas as intenções de <b>venda</b> de suas aeronaves!
      </div>
      <hr>
      @if(empty($compras))
      <div class="alert alert-danger">    
         Você não tem nenhuma Compra
      </div>
      @else
      
      <!-- Filters -->
      <div class='row'>
         @if(Session::has('queryme')) 
         

         <div class='alert alert-warning' style="max-width:440px; margin-left: 15px">Há filtros aplicados. </br>Clique em "Limpar busca" para remover os filtros.</div>
         @endif
    
      </div>
      <div class='collapse' id='collapseExample'>
         <div class='card card-block'>
            <div class='text-center'>
               <form class="form-horizontal" action="{{url('/aeronaves/addbyme')}}" method="get">
                  <fieldset>
                     <!-- Modelo input-->
                     <div class="form-group" >
                        <label class="col-md-4 control-label " for="modelo">Modelo: </label>  
                        <div class="col-md-4">
                           <input id="modelo" name="modelo" type="text" placeholder="Modelo" value="{{old('modelo')}}" class="form-control input-md" />                 
                        </div>
                     </div>
                     <!-- Valor input-->
                     <div class="form-group" }>
                        <label class="col-md-4 control-label " for="preco">Preço máximo: U$ </label>  
                        <div class="col-md-4">
                           <input id="preco" name="preco" type="number"  value="{{old('preco')}}" class="form-control input-md" />                 
                        </div>
                     </div>
                     <!-- Ano input-->
                     <div class="form-group" }}>
                        <label class="col-md-4 control-label " for="ano"> Fabricação após:</label>  
                        <div class="col-md-4">
                           <input id="ano" name="ano" type="number" placeholder="2000" value="{{old('ano')}}" class="form-control input-md" />                 
                        </div>
                     </div>
                     <!-- tipo Motor -->
                     <div class="form-group ">
                        <label class="col-md-4 control-label" for="tipomotor"> Motorização:</label>
                        <div class="col-md-4">
                           <label class="radio-inline" for="planador">
                           <input type="radio" name="tipomotor" id="planador" value="planador" onclick="disableMotor();">
                           Planador 
                           </label>
                           <label class="radio-inline" for="helice">
                           <input type="radio" name="tipomotor" id="helice" value="helice" onclick="enableMotor();">
                           Hélice 
                           </label>
                           <label class="radio-inline" for="jato">
                           <input type="radio" name="tipomotor" id="jato" value="jato" onclick="enableMotor();">
                           Jato
                           </label>
                        </div>
                     </div>
                     <!--  Numero Motor -->
                     <div class="form-group">
                        <label class="col-md-4 control-label" for="numeromotor"> Número de motores:</label>
                        <div class="col-md-4">               
                           <label class="radio-inline" for="monomotor">
                           <input type="radio" name="numeromotor" id="monomotor" value="monomotor">
                           Monomotor 
                           </label>               
                           <label class="radio-inline" for="bimotor">
                           <input type="radio" name="numeromotor" id="bimotor" value="bimotor">
                           Bimotor ou superior
                           </label>                 
                        </div>
                     </div>
                     <!-- Botoes -->
                     <div class="form-group">
                        <label class="col-md-4 control-label " for="ano"></label>  
                        <div class="col-md-4">
                           <button type="submit" id="search" name="search" class="btn btn-primary"> <span class="glyphicon glyphicon-search"></span> Procura!</button>
                           <button id="cancel" name="cancel" class="btn btn-danger">Cancelar</button>
                        </div>
                     </div>
                  </fieldset>
               </form>
            </div>
         </div>
      </div>
   </div>
   <div class="table-responsive">
      <table class="table table-hover table-striped table-condensed" >
         <tr>
         	<td><strong>Data</strong></td>
            <td><strong>Comprador</strong></td>
            <td><strong>Aeronave</strong></td>
            <td><strong>Valor</strong></td>
            <td><strong>Status</strong></td>
            <td><strong>Mensagem</strong></td>
            <td><strong>Ação</strong></td>
         </tr>
       
         <tr>
         @foreach($compras as $c)
         <td>{{$c->created_at}}</td>
         <td>{{$c->comprador->name}}</td>
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
           <td><a class="btn btn-sm btn-success" href='{{url('/aeronaves/compra/'.$c->id.'/confirmacompra')}}'>Confirma Venda</a>
			<a class="btn btn-sm btn-danger" href='{{url('/aeronaves/compra/'.$c->id.'/cancelacompra')}}'>Cancela Venda</a>
           </td>
           @else
           <td><a class="btn btn-sm btn-success disabled">Confirma Venda</a> <a class="btn btn-sm btn-danger disabled">Cancela Venda</a></td>
           @endif
         </tr>
       @endforeach
      </table>
   </div>

   @endif

</div>
</div>
@endsection


