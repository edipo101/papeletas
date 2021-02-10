<?php

// Inicio
Breadcrumbs::register('home', function ($trail) {
    $trail->push('Principal', route('home'));
});

// Usuarios
Breadcrumbs::register('users', function ($trail) {
    $trail->parent('home');
    $trail->push('Usuarios', route('users.index'));
});
Breadcrumbs::register('userscreate', function ($trail) {
    $trail->parent('users');
    $trail->push('Nuevo', route('users.create'));
});
Breadcrumbs::register('usersedit', function ($trail) {
    $trail->parent('users');
    $trail->push('Edicion', route('users.index'));
});
// Perfil
Breadcrumbs::register('perfil', function ($trail) {
    $trail->parent('home');
    $trail->push('Perfil', route('users.perfil'));
});

// Roles
Breadcrumbs::register('roles', function ($trail) {
    $trail->parent('home');
    $trail->push('Roles', route('roles.index'));
});
Breadcrumbs::register('rolescreate', function ($trail) {
    $trail->parent('roles');
    $trail->push('Nuevo', route('roles.create'));
});
Breadcrumbs::register('rolesedit', function ($trail) {
    $trail->parent('roles');
    $trail->push('Edicion', route('roles.index'));
});

// Empresa
Breadcrumbs::register('empresas', function ($trail) {
    $trail->parent('home');
    $trail->push('Empresa', route('empresas.index'));
});

// Modalidades
Breadcrumbs::register('modalidads', function ($trail) {
    $trail->parent('home');
    $trail->push('Modalidades', route('modalidads.index'));
});
Breadcrumbs::register('modalidadscreate', function ($trail) {
    $trail->parent('modalidads');
    $trail->push('Nuevo', route('modalidads.create'));
});
Breadcrumbs::register('modalidadsedit', function ($trail) {
    $trail->parent('modalidads');
    $trail->push('Edicion', route('modalidads.index'));
});

// Funcionarios
Breadcrumbs::register('funcionarios', function ($trail) {
    $trail->parent('home');
    $trail->push('Funcionarios', route('funcionarios.index'));
});
Breadcrumbs::register('funcionarioscreate', function ($trail) {
    $trail->parent('funcionarios');
    $trail->push('Nuevo', route('funcionarios.create'));
});
Breadcrumbs::register('funcionariosedit', function ($trail) {
    $trail->parent('funcionarios');
    $trail->push('Edicion', route('funcionarios.index'));
});

// Planillas
Breadcrumbs::register('planillas', function ($trail) {
    $trail->parent('home');
    $trail->push('Planillas', route('planillas.index'));
});
Breadcrumbs::register('planillascreate', function ($trail) {
    $trail->parent('planillas');
    $trail->push('Nuevo', route('planillas.create'));
});
Breadcrumbs::register('planillasedit', function ($trail) {
    $trail->parent('planillas');
    $trail->push('Edicion', route('planillas.index'));
});