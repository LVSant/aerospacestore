<!DOCTYPE html>
<html lang="en">

    <head>
        @include('partials._head')
        <title>Aerospace Store @yield('title')</title>
    </head>

    <body>


        <div class='container container-padding-bottom'>            
            @include('partials._nav')


          {!! Breadcrumbs::render() !!}             
             <div class="flash-message">
                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                    @if(Session::has('alert-' . $msg))
                       <p class="alert alert-{{ $msg }}"><i class="fa fa-exclamation-circle fa-2x" aria-hidden="true"></i> {!! Session::get('alert-' . $msg) !!} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                    @endif
                @endforeach
             </div> 


            @yield('content')

      

          <footer>
            @include('partials._footer')
          </footer>
        </div>
        @include('partials._scripts')
    </body>
</html>