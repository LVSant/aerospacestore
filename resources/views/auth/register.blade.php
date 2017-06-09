@extends('layout.index')


@section('title', ' | Registra-se') 

@section('content')

<div class="panel panel-default">
<form class="form-horizontal" action="{{url('/register')}}" method="post">
    <fieldset>

        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />  
        <input type="hidden" name="tipo" value="C" />  

        <!-- Form Name -->
        <div class="panel panel-heading"><legend>Registra-se</legend></div>


        <!-- Text input-->
        <div class="form-group" {{ $errors->has('name') ? ' has-error' : '' }}>
            <label class="col-md-4 control-label " for="name">Nome </label>  
            <div class="col-md-4">
                <input id="name" name="name" type="text" placeholder="Nome" value="{{old('name')}}" class="form-control input-md" required=""/>

                 @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
            </div>
        </div>        
        



        <!-- Text input-->
        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
            <label class="col-md-4 control-label" for="email">Email</label>  
            <div class="col-md-4">
                <input id="email" name="email" type="text" placeholder="Email" value="{{ old('email') }}" class="form-control input-md" required="">
                @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
            </div>
        </div>



        <!-- Password input-->
        <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
            <label class="col-md-4 control-label" for="password">Senha</label>
            <div class="col-md-4">
                <input id="password" name="password" type="password" placeholder="Senha" value="" class="form-control input-md" required="">
                @if ($errors->has('password')) <p class="help-block">{{ $errors->first('password') }}</p> @endif
            </div>
        </div>

        <!-- Password input-->
        <div class="form-group {{ $errors->has('passwordconfirm') ? ' has-error' : '' }}">
            <label class="col-md-4 control-label" for="passwordconfirm">Confirmação de senha</label>
            <div class="col-md-4">
                <input id="passwordconfirm" name="passwordconfirm" type="password" placeholder="senha" class="form-control input-md" required="">
                 @if ($errors->has('passwordconfirm')) <p class="help-block">{{ $errors->first('passwordconfirm') }}</p> @endif
                
            </div>
        </div>

        <!-- Multiple Checkboxes (inline) -->
        <div class="form-group {{ $errors->has('termos') ? ' has-error' : '' }}">
            <label class="col-md-4 control-label" for="checktermos"> Termos</label>
            <div class="col-md-4">
                <label class="checkbox-inline" for="checktermos-0">
                    <input type="checkbox" name="checktermos" id="checktermos-0" value="">
                    Confirma que leu e aceita os termos
                </label>
                 @if ($errors->has('termos')) <p class="help-block">{{ $errors->first('termos') }}</p> @endif

            </div>
        </div>

        

        <!-- Button (Double) -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="register">Confirma criação de conta</label>
            <div class="col-md-8">
                <button type="submit" id="register" name="register" class="btn btn-primary">Ok</button>
                <a id="cancel"  name="cancel" href="{{url('/')}}" class="btn btn-danger" >Cancelar</a>
            </div>
        </div>

    </fieldset>
</form>
</div>
@endsection
