@extends('layout.index')


@section('title', ' | Login') 



@section('content')
<div class="panel panel-default">
<form class="form-horizontal" action="{{url('/login')}}" method="post">
    <fieldset>

        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />  

        <!-- Form Name -->
        <div class="panel panel-heading"><legend>Login</legend></div>

       
            
        
        


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

        

       

        <!-- Button (Double) -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="register">Login</label>
            <div class="col-md-8">
                <button type="submit" id="register" name="register" class="btn btn-primary">Ok</button>
                <a id="cancel"  name="cancel" href="{{url('/')}}" class="btn btn-danger" >Cancelar</a>
            </div>
        </div>

    </fieldset>
</form>
</div>
@endsection
