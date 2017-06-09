<?php



// Home
Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push('Home', route('home'));
});

// Home > Aeronaves
Breadcrumbs::register('aeronave', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Aeronaves', route('aeronave'));
});

// Home > Aeronaves > {id}
Breadcrumbs::register('aeronaves', function($breadcrumbs, $id)
{
    //$page = Page::findOrFail($id);
    $breadcrumbs->parent('aeronave');
    $breadcrumbs->push('Detalhes da aeronave', route('aeronaves', $id));
});


// Home > Login
Breadcrumbs::register('auth.login', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Login', route('auth.login'));
});


// Home > Register
Breadcrumbs::register('auth.register', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Registra-se', route('auth.register'));
});

// Home > Register Vendedor
Breadcrumbs::register('auth.registerdealer', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Registro de Vendedor', route('auth.registerdealer'));
});

// Home > Editar Usuário
Breadcrumbs::register('edituser', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Editar minha conta', route('edituser'));
});


// Home > Aeronaves > Busca
Breadcrumbs::register('busca', function($breadcrumbs)
{
    
    $breadcrumbs->parent('aeronave');
    $breadcrumbs->push('Busca', route('busca'));
});


// Home > Nova Aeronave 
Breadcrumbs::register('novo', function($breadcrumbs)
{
    
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Nova Aeronave', route('novo'));
});

// Home > Minhas Aeronaves 
Breadcrumbs::register('addbyme', function($breadcrumbs)
{    
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Minhas Aeronaves', route('addbyme'));
});

// Home > Minhas Aeronaves > Editar Aeronave
Breadcrumbs::register('aeronaveedit', function($breadcrumbs, $id)
{    
    $breadcrumbs->parent('addbyme');
    $breadcrumbs->push('Editar Aeronave', route('aeronaveedit', $id));
});


//Home > Aeronaves > Compra
Breadcrumbs::register('aeronavebuy', function($breadcrumbs, $id)
{    
    $breadcrumbs->parent('aeronaves', $id);
    $breadcrumbs->push('Comprar Aeronave', route('aeronavebuy', $id));
});


//Home > Aeronaves > Compra > Confirma Compra
Breadcrumbs::register('aeronavebuyconfirm', function($breadcrumbs, $id)
{    
    $breadcrumbs->parent('aeronavebuy', $id);
    $breadcrumbs->push('Confirmar compra de Aeronave', route('aeronavebuyconfirm', $id));
});


//Home > Aeronaves Pendentes
Breadcrumbs::register('aeronavependent', function($breadcrumbs)
{    
    $breadcrumbs->parent('aeronave');
    $breadcrumbs->push('Aeronaves Pendentes', route('aeronavependent'));
});

//Home > Aeronaves Pendentes
Breadcrumbs::register('aeronavemybuys', function($breadcrumbs)
{    
    $breadcrumbs->parent('aeronave');
    $breadcrumbs->push('Minhas compras', route('aeronavemybuys'));
});

/*
// Home > Blog
Breadcrumbs::register('blog', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Blog', route('blog'));
});

// Home > Blog > [Category]
Breadcrumbs::register('category', function($breadcrumbs, $category)
{
    $breadcrumbs->parent('blog');
    $breadcrumbs->push($category->title, route('category', $category->id));
});

// Home > Blog > [Category] > [Page]
Breadcrumbs::register('page', function($breadcrumbs, $page)
{
    $breadcrumbs->parent('category', $page->category);
    $breadcrumbs->push($page->title, route('page', $page->id));
}

);*/