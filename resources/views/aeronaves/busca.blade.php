@extends('layout.index')
@section('title', ' | Listagem de Aeronaves')
@section('content')
<div class="panel panel-default">
   <div class="panel-body">
      <div class="panel-heading">
         <h1> Aeronaves a venda </h1>
      </div>
      <hr>
      @if(empty($aeronaves))
      <div class="alert alert-danger">    
         Você não tem nenhum produto.
      </div>
      @else
      @if(!empty($novaAeronave))
      <div class="alert alert-success">    
         Aeronave {{$novaAeronave->modelo}} foi cadastrada com sucesso;
      </div>
      @endif
      <!-- Filters -->
      <div class='row'>
         @if(Session::has('query'))          
         <div class='alert alert-warning' style="max-width:440px; margin-left: 15px">Há filtros aplicados. </br>Clique em "Limpar busca" para remover os filtros.</div>
         @endif
         <div class="col-md-6">
            <div class='btn-group' role='busca' aria-pressed='true'>        
               <a class='btn btn-default btn-sm' style=" bottom: 10px;" data-toggle='collapse' href='#collapseExample' aria-expanded='false' aria-controls='collapseExample'>
               <span class="glyphicon glyphicon-filter"></span>
               Exibir buscador</a>
               <a class='btn btn-danger btn-sm' style="bottom: 10px;" data-toggle='limpabusca' href='{{url('/aeronaves/limparbusca')}}' type='submit' aria-expanded='false' aria-controls='collapseExample'>Limpar busca</a>
               
               @if(Auth::user() && Auth::user()->tipo == 'J')
               <a class='btn btn-sm btn-success' style="bottom: 10px;" data-toggle='novaaeronave' href='{{url('aeronaves/addbyme')}}' type='submit' aria-expanded='true'>
               <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
               <span class="glyphicon glyphicon-plane" aria-hidden="true">
               </span>
               Cadastrar aeronaves
               </a>
               @endif
            </div>
         </div>
      </div>
      <div class='collapse' id='collapseExample'>
         <div class='card card-block'>
            <div class='text-center'>
               <form class="form-horizontal" action="{{url('/aeronaves/busca')}}" method="get">
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
            <td><strong>Foto</strong></td>
            @if(empty($sortModelo) || ($sortModelo == 'asc')) 
            <td><a href="/aeronaves?sort=Modelo&order=desc" > <span class="fa fa-sort-desc"></span><strong> Modelo</strong> </a></td>
            @else
            <td><a href="/aeronaves?sort=Modelo&order=asc" > <span class="fa fa-sort-asc"></span><strong> Modelo</strong> </a></td>
            @endif
            @if(empty($sortPreco) || ($sortPreco == 'asc')) 
            <td><a href="/aeronaves?sort=valor&order=desc" > <span class="fa fa-sort-desc"></span><strong> Preço</strong> </a></td>
            @else
            <td><a href="/aeronaves?sort=valor&order=asc" > <span class="fa fa-sort-asc"></span><strong> Preço</strong> </a></td>
            @endif
            @if(empty($sortAno) || ($sortAno == 'asc')) 
            <td><a href="/aeronaves?sort=Ano&order=desc" > <span class="fa fa-sort-desc"></span><strong> Ano de Fabricação</strong> </a></td>
            @else
            <td><a href="/aeronaves?sort=Ano&order=asc" > <span class="fa fa-sort-asc"></span><strong> Ano de Fabricação</strong> </a></td>
            @endif
            <td><strong>Descrição</strong></td>
            <td><strong>Detalhes</strong></td>
         </tr>
         @foreach ($aeronaves as $p)
         <tr>
            <td><img src="<?= $p->link_img?>" style="max-width: 100px; max-height: 100px;" class="img-responsive img-thumbnail" alt="{{$p->modelo}}"></td>
            <td> <?= $p->modelo ?> </td>
            <td> U$ {{ number_format($p->valor,0) }} </td>
            <td> <?= $p->ano ?> </td>
            <td> <?= $p->descricao ?></td>

            <td> <a href="/aeronaves/<?= $p->id ?>"> <span class="glyphicon glyphicon-hand-down"></span></a></td>
         </tr>
         @endforeach
      </table>
   </div>
   @endif
</div>
</div>
@endsection


