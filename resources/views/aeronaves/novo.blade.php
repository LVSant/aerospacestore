@extends('layout.index')


@section('title', ' | Cadastro de Aeronaves') 

@section('content')
<div class="panel panel-default">
<div class="panel-body">


<form class="form-horizontal" action="{{url('/aeronaves/adiciona')}}" method="post">
    <fieldset>

        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />	

        <!-- Form Name -->
        <legend> <span class='glyphicon glyphicon-plane' area-hidden='true'></span> Cadastro de Aeronave</legend>



        <!-- Modelo input-->
        <div class="form-group" {{ $errors->has('modelo') ? ' has-error' : '' }}>

            <label class="col-md-4 control-label " for="modelo">Modelo</label>  
            <div class="col-md-4">
                <input id="modelo" name="modelo" type="text-area" placeholder="" value="{{old('modelo')}}" class="form-control input-md" required=""/>

                 @if ($errors->has('modelo')) <p class="alert alert-danger">{{ $errors->first('modelo') }}</p> @endif
            </div>    
        </div>
        


        <!-- Descricao input-->
        <div class="form-group" {{ $errors->has('descricao') ? ' has-error' : '' }}>

            <label class="col-md-4 control-label" for="descricao">Descrição</label>  
            <div class="col-md-4">
                <textarea id="descricao" name="descricao" type="text" placeholder="" value="{{old('descricao')}}" class="form-control input-md" required=""></textarea>

                 @if ($errors->has('descricao')) <p class="alert alert-danger">{{ $errors->first('descricao') }}</p> @endif
            </div>    
        </div>
        


        <!-- Valor input-->
        <div class="form-group" {{ $errors->has('valor') ? ' has-error' : '' }}>

            <label class="col-md-4 control-label" for="valor">Preço</label>  
            <div class="col-md-4">
                <input id="valor" name="valor" type="number" placeholder="" value="{{old('valor')}}" class="form-control input-md" required=""/>

                 @if ($errors->has('valor')) <p class="alert alert-danger">{{ $errors->first('valor') }}</p> @endif
            </div>    
        </div>
        


        <!-- ano input-->
        <div class="form-group" {{ $errors->has('ano') ? ' has-error' : '' }}>

            <label class="col-md-4 control-label" for="ano">Ano de Fabricação</label>  
            <div class="col-md-4">
                <input id="ano" name="ano" type="number" placeholder="" value="{{old('ano')}}" class="form-control input-md" required=""/>

                 @if ($errors->has('ano')) <p class="alert alert-danger">{{ $errors->first('ano') }}</p> @endif
            </div>    
        </div>
        

         <!-- ano input-->
        <div class="form-group" {{ $errors->has('hvoo') ? ' has-error' : '' }}>

            <label class="col-md-4 control-label" for="ano">Horas de Vôo</label>  
            <div class="col-md-4">
                <input id="hvoo" name="hvoo" type="number" placeholder="" value="{{old('hvoo')}}" class="form-control input-md" required=""/>

                 @if ($errors->has('hvoo')) <p class="alert alert-danger">{{ $errors->first('hvoo') }}</p> @endif
            </div>    
        </div>


        <!-- Radio tipo Motor -->
        <div class="form-group {{ $errors->has('motor') ? ' has-error' : '' }}">
            <label class="col-md-4 control-label" for="tipomotor"> Tipo de motorização da aeronave</label>
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
                 @if ($errors->has('tipomotor')) <p class="alert alert-danger">{{ $errors->first('tipomotor') }}</p> @endif
            </div>
        </div>

        <!-- Radio Numero Motor -->
        <div class="form-group {{ $errors->has('motor') ? ' has-error' : '' }}">
            <label class="col-md-4 control-label" for="numeromotor"> Número de motores da aeronave</label>
            <div class="col-md-4">
                

                <label class="radio-inline" for="monomotor">
                    <input type="radio" name="numeromotor" id="monomotor" value="monomotor">
                    Monomotor 
                </label>
                 @if ($errors->has('numeromotor')) <p class="alert alert-danger">{{ $errors->first('numeromotor') }}</p> @endif

                 <label class="radio-inline" for="bimotor">
                    <input type="radio" name="numeromotor" id="bimotor" value="bimotor">
                    Bimotor ou superior
                </label>
                 @if ($errors->has('numeromotor')) <p class="alert alert-danger">{{ $errors->first('numeromotor') }}</p> @endif
            </div>
        </div>



        <!-- link img input-->
        <div class="form-group" {{ $errors->has('link_img') ? ' has-error' : '' }}>

            <label class="col-md-4 control-label " for="link_img">Link para imagem</label>  
            <div class="col-md-4">
                <input id="link_img" name="link_img" type="text-area" placeholder="" value="{{old('link_img')}}" class="form-control input-md" />

                 @if ($errors->has('link_img')) <p class="alert alert-danger">{{ $errors->first('link_img') }}</p> @endif
            </div>    
        </div>
        




        <!-- Button (Double) -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="register">Confirma criação de aeronave</label>
            <div class="col-md-8">
                <button type="submit" id="register" name="register" class="btn btn-primary">Ok</button>
                <a href={{url('/')}} class="btn btn-danger">cancelar</a>
        
            </div>
        </div>

    </fieldset>
</form>

</div>
</div>
@endsection
