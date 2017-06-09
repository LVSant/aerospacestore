<nav class="navbar navbar-default navbar-fixed-top " role="navigation">
   <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
         <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
         <span class="sr-only">Toggle navigation</span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         </button>
         <a href="/" class="navbar-left icon-up">
         <img src="/airplane-xxls.png"/>
         </a>
         <div class="title-website navbar-brand  brand-right">Aerospace Store</div>
      </div>
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
         <ul class="nav navbar-nav navbar-right">
            @if(Auth::check()) 
            <!-- Single button -->
            <button type="button" class="btn btn-link btn-lg dropdown-toggle button-logout" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

            <span class="glyphicon glyphicon-user"></span> 
            {{ Auth::user()->name }}  

            </button>
            <ul class="dropdown-menu">
               <li><a href="{{url('/user/edit')}}">Minha conta</a></li>
               <li role="separator" class="divider"></li>
               @if(Auth::user() && Auth::user()->tipo == 'J')
               <li><a href="{{url('/aeronaves/addbyme')}}">Aeronaves adicionadas por mim</a></li>
               <li><a href="{{url('/aeronaves/pendent')}}"><b>Negociações</b></a></li>
               @endif
               <li><a href="{{url('/aeronaves/mybuys')}}">Minhas compras</a></li>               
               <li role="separator" class="divider"></li>
               <li>
                  <form class="form-horizontal" action="{{url('/logout')}}" method="post">
                     <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />  
                     <button type="submit" id="logout" name="logout" class="btn btn-danger btn-sm button-logout">Logout</button>
                  </form>
               </li>
            </ul>
            @else 
            <li> 
            <a type="link" href="/registerdealer"> Cadastro Vendedor <i class="fa   fa-plane " aria-hidden="true"></i></a>
            </li>
            

            <li> 
            <a type="link" href="/register">  Cadastro Comprador <i class="fa fa-shopping-basket" aria-hidden="true"></i></a>
            </li>
            <li><a type="link" href="/login">Login <i class="fa fa-user-circle-o" aria-hidden="true"></i></a> 
            </li>
            @endif
        </ul>
      </div>
      <!-- /.navbar-collapse -->
   </div>
   <!-- /.container-fluid -->
</nav>