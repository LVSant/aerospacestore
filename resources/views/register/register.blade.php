@extends('layout.index')


@section('title', ' | Registra-se') 



@section('content')
<form class="form-horizontal" action="{{url('/usuario/adiciona')}}" method="post">
    <fieldset>

        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />	

        <!-- Form Name -->
        <legend>Registra-se</legend>

        <!-- Text input-->
        <div class="form-group" {{ $errors->has('name') ? ' has-error' : '' }}>

            <label class="col-md-4 control-label " for="name">Nome</label>  
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
                <input id="password" name="password" type="password" placeholder="Senha" value="{{ old('password') }}" class="form-control input-md" required="">
                @if ($errors->has('password')) <p class="help-block">{{ $errors->first('password') }}</p> @endif
            </div>
        </div>

        <!-- Password input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="passwordconfirm">Confirmação de senha</label>
            <div class="col-md-4">
                <input id="passwordconfirm" name="passwordconfirm" type="password" placeholder="senha" class="form-control input-md" required="">
                <span class="help-block">Repita a senha</span>
            </div>
        </div>

        <!-- Multiple Checkboxes (inline) -->
        <div class="form-group {{ $errors->has('termos') ? ' has-error' : '' }}">
            <label class="col-md-4 control-label" for="checktermos"> Termos</label>
            <div class="col-md-4">
                <label class="checkbox-inline" for="checktermos-0">
                    <input type="checkbox" name="checktermos" id="checktermos-0" value="">
                    Confirma que leu e aceita nossos termos
                </label>
                 @if ($errors->has('termos')) <p class="help-block">{{ $errors->first('termos') }}</p> @endif

            </div>
        </div>

        <!-- Button (Double) -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="register">Confirma criação de conta</label>
            <div class="col-md-8">
                <button type="submit" id="register" name="register" class="btn btn-primary">Ok</button>
                <button id="cancel" name="cancel" class="btn btn-danger">Cancelar</button>
            </div>
        </div>

    </fieldset>
</form>
@endsection
