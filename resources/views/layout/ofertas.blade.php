@extends('layout.index')

@section('content')
<div class="panel panel-default">
<div class="panel-body">


<div class="panel-heading">
     
</div>


<div class="jumbotron">

    <div class="row">
        <div class="col-md-8">
            <div class="title-website">
                <h1>Aerospace Store</h1>
            </div>


            <p class="lead">
                The best airline seller in the world! _\|/_
            </big>

        </div>


            
        <div class="col-md-4" >
                

            <a href={{url('/aeronaves/')}} class="btn  btn-block btn-success">Buscar aeronaves</a>

            <a href={{url('/aeronaves/novo')}} class="btn btn-block btn-info">Anunciar aeronave</a>
        
        </div>
    </div>
</div>

    

    
     
</div>
</div>
@endsection
