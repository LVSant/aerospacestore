@extends('layout.index')


@section('title', ' | Logout') 



@section('content')
<div class="panel panel-default">
<form class="form-horizontal" action="{{url('/logout')}}" method="post">
    <fieldset>
<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />  
        

        <!-- Form Name -->
        <div class="panel panel-heading"><legend>Logout</legend></div>

        Tem certeza que deseja realizar logout?
       

        <!-- Button (Double) -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="register">Login</label>
            <div class="col-md-8">
                <button type="submit" id="register" name="register" class="btn btn-primary">Ok</button>
                <button id="cancel" name="cancel" class="btn btn-danger" >Cancelar</button>
            </div>
        </div>

    </fieldset>
</form>
</div>
@endsection
