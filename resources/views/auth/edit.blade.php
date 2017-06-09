@extends('layout.index')


@section('title', ' | Minha Conta') 



@section('content')
<div class="panel panel-default">
<form class="form-horizontal" action="{{url('/updateuser')}}" method="post">
<fieldset>

<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />  

<!-- Form Name -->
<div class="panel panel-heading"><legend>Edição da minha conta</legend></div>

<!-- Text input-->
<div class="form-group" {{ $errors->has('name') ? ' has-error' : '' }}>

<label class="col-md-4 control-label " for="name">Nome</label>  
<div class="col-md-4">
<input id="name" name="name" type="text" placeholder="Nome" value="{{$user->name}}" class="form-control input-md" required=""/>

@if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
</div>
</div>


@if(Auth::user()->tipo == 'J')
<!-- Text input-->
<div class="form-group" {{ $errors->has('localizacao') ? ' has-error' : '' }}>

<label class="col-md-4 control-label " for="localizacao">Localização</label>  
<div class="col-md-4">
<input id="localizacao" name="localizacao" type="text" value="{{$user->localizacao}}" class="form-control input-md" required=""/>

@if ($errors->has('localizacao')) <p class="help-block">{{ $errors->first('localizacao') }}</p> @endif
</div>
</div>
@endif
<!-- Text input-->
<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
<label class="col-md-4 control-label" for="email">Email</label>  
<div class="col-md-4">
<input id="email" name="email" type="text" placeholder="Email" value="{{$user->email}}" class="form-control input-md" readonly="true" required="">               
</div>
</div>




<!-- Button (Double) -->
<div class="form-group">
<label class="col-md-4 control-label" for="register">Confirma edição de seus dados</label>
<div class="col-md-8">
<button type="submit" id="register" name="register" class="btn btn-primary">Ok</button>
<a id="cancel"  name="cancel" href="{{url('/')}}" class="btn btn-danger" >Cancelar</a>
</div>
</div>

</fieldset>
</form>
</div>
@endsection
