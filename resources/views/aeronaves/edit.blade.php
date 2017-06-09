@extends('layout.index') 


@section('title', ' | Edição de Aeronave')
@section('content')

<div class="panel panel-default">
  <div class="panel-body">
    <div class="panel-heading">
      <h1> <span class='glyphicon glyphicon-plane' area-hidden='true'></span> Edição de Aeronave  </h1>
    </div>
      @if(empty($acft))
      
    <div class="alert alert-danger">
         Esta aeronave não existe.
      </div>
      @else

<div class="alert alert-info"> <i class="fa fa-exclamation-circle fa-2x" aria-hidden="true"></i>
         Aeronave Cadastrada por <strong>{{Auth::user()->name}}</strong>
      </div>
    

      
    <div class="jumbotron">
      <div class="row">
        <div class="col-md-3">
          <br>
          
            <br>
              <br>
                <img src="
                  <?= $acft->link_img?>" style="max-width: 250px; max-height: 300px;" class="img-responsive img-circle" alt="{{$acft->modelo}}">
                </div>
                <div class="col-md-9">
                  <form class="form-horizontal" action="{{url('/aeronaves/update')}}" method="post">
                    <fieldset>
                      <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                      <input type="hidden" name="_id" value="{{$acft->id}}" />
                      <!-- Form Name -->
                      <legend>
                        
                      </legend>
                      <div class="title-website">
                        <h1> &nbsp; {{$acft->modelo}}</h1>
                      </div>
                      <!-- Modelo input-->
                      <div class="form-group" {{ $errors->has('modelo') ? ' has-error' : '' }}>
                        <label class="col-md-4 control-label " for="modelo">Modelo</label>
                        <div class="col-md-8">
                          <input id="modelo" name="modelo" type="text-area" placeholder="" value="{{$acft->modelo}}" class="form-control input-md" required=""/>

                 @if ($errors->has('modelo')) 
                          <p class="alert alert-danger">{{ $errors->first('modelo') }}</p> @endif
            
                        </div>
                      </div>
                      <!-- Descricao input-->
                      <div class="form-group" {{ $errors->has('descricao') ? ' has-error' : '' }}>
                        <label class="col-md-4 control-label" for="descricao">Descrição</label>
                        <div class="col-md-8">
                          <textarea id="descricao" name="descricao" type="text" placeholder=""  class="form-control input-md" required="">{{$acft->descricao}}</textarea>

                 @if ($errors->has('descricao')) 
                          <p class="alert alert-danger">{{ $errors->first('descricao') }}</p> @endif
            
                        </div>
                      </div>
                      <!-- Valor input-->
                      <div class="form-group" {{ $errors->has('valor') ? ' has-error' : '' }}>
                        <label class="col-md-4 control-label" for="valor">Preço</label>
                        <div class="col-md-8">
                          <input id="valor" name="valor" type="number" placeholder="" value="{{$acft->valor}}" class="form-control input-md" required=""/>

                 @if ($errors->has('valor')) 
                          <p class="alert alert-danger">{{ $errors->first('valor') }}</p> @endif
            
                        </div>
                      </div>
                      <!-- ano input-->
                      <div class="form-group" {{ $errors->has('ano') ? ' has-error' : '' }}>
                        <label class="col-md-4 control-label" for="ano">Ano de Fabricação</label>
                        <div class="col-md-8">
                          <input id="ano" name="ano" type="number" placeholder="" value="{{$acft->ano}}" class="form-control input-md" required=""/>

                 @if ($errors->has('ano')) 
                          <p class="alert alert-danger">{{ $errors->first('ano') }}</p> @endif
            
                        </div>
                      </div>
                      <!-- horas de voo input-->
                      <div class="form-group" {{ $errors->has('hvoo') ? ' has-error' : '' }}>
                        <label class="col-md-4 control-label" for="ano">Horas de Vôo</label>
                        <div class="col-md-8">
                          <input id="hvoo" name="hvoo" type="number" placeholder="" value="{{$acft->hvoo}}" class="form-control input-md" required=""/>

                 @if ($errors->has('hvoo')) 
                          <p class="alert alert-danger">{{ $errors->first('hvoo') }}</p> @endif
            
                        </div>
                      </div>
                      <!-- Radio tipo Motor -->
                      <div class="form-group {{ $errors->has('motor') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label" for="tipomotor"> Tipo de motorização da aeronave</label>
                        <div class="col-md-8">
                          <label class="radio-inline" for="planador">
            @if($acft->tipomotor == 'planador')
                    
                            <input type="radio" name="tipomotor" id="planador" value="planador" onclick="disableMotor();" checked="checked">
                    @else
                    
                              <input type="radio" name="tipomotor" id="planador" value="planador" onclick="disableMotor();" >
                    @endif
                    Planador 
                
                              </label>
                              <label class="radio-inline" for="helice">
                @if($acft->tipomotor == 'helice')
                    
                                <input type="radio" name="tipomotor" id="helice" value="helice" onclick="enableMotor();" checked="checked">
                    @else
                    
                                  <input type="radio" name="tipomotor" id="helice" value="helice" onclick="enableMotor();" >
                    @endif
                    Hélice 
                
                                  </label>
                                  <label class="radio-inline" for="jato">
                    @if($acft->tipomotor == 'jato')
                    
                                    <input type="radio" name="tipomotor" id="jato" value="jato" onclick="enableMotor();" checked="checked">
                    @else
                                      <input type="radio" name="tipomotor" id="jato" value="jato" onclick="enableMotor();">
                    @endif
                    Jato
                
                                      </label>
                 @if ($errors->has('tipomotor')) 
                                      <p class="alert alert-danger">{{ $errors->first('tipomotor') }}</p> @endif
            
                                    </div>
                                  </div>
                                  <!-- Radio Numero Motor -->
                                  <div class="form-group {{ $errors->has('motor') ? ' has-error' : '' }}">
                                    <label class="col-md-4 control-label" for="numeromotor"> Número de motores da aeronave</label>
                                    <div class="col-md-8">
                                      <label class="radio-inline" for="monomotor">
                @if($acft->numeromotor == 'monomotor')
                    
                                        <input type="radio" name="numeromotor" id="monomotor" value="monomotor" checked="checked">
                    @else
                    
                                          <input type="radio" name="numeromotor" id="monomotor" value="monomotor">
                    @endif
                    Monomotor 
                
                                          </label>
                 @if ($errors->has('numeromotor')) 
                                          <p class="alert alert-danger">{{ $errors->first('numeromotor') }}</p> @endif

                 
                                          <label class="radio-inline" for="bimotor">
                 @if($acft->numeromotor == 'bimotor')
                    
                                            <input type="radio" name="numeromotor" id="bimotor" value="bimotor" checked="checked">
                    @else
                    
                                              <input type="radio" name="numeromotor" id="bimotor" value="bimotor">
                    @endif
                    Bimotor ou superior
                
                                              </label>
                 @if ($errors->has('numeromotor')) 
                                              <p class="alert alert-danger">{{ $errors->first('numeromotor') }}</p> @endif
            
                                            </div>
                                          </div>
                                          <!-- link img input-->
                                          <div class="form-group" {{ $errors->has('link_img') ? ' has-error' : '' }}>
                                            <label class="col-md-4 control-label " for="link_img">Link para imagem</label>
                                            <div class="col-md-8">
                                              <input id="link_img" name="link_img" type="text-area" placeholder="" value="{{$acft->link_img}}" class="form-control input-md" />

                 @if ($errors->has('link_img')) 
                                              <p class="alert alert-danger">{{ $errors->first('link_img') }}</p> @endif
            
                                            </div>
                                          </div>
                                          <!-- Button (Double) -->
                                          <div class="form-group">
                                            <label class="col-md-4 control-label" for="register">Confirma edição da aeronave</label>
                                            <div class="col-md-8">
                                              <button type="submit" id="register" name="register" class="btn btn-primary">Ok</button>
                                              <a href={{url('/aeronaves/addbyme')}} class="btn btn-danger">Voltar</a>
                                            </div>
                                          </div>
                                        </fieldset>
                                      </form>
                                    </div>
                                  </br>
                                  <br>
                                  </div>
                                </div>
   @endif

                              </div>
                            </div>
@endsection