<?php

// Home
Breadcrumbs::for('admin.home', function ($trail) {
    $trail->push('Главная', route('admin.home'));
});


Breadcrumbs::for('admin.users', function ($trail) {
	$trail->parent('admin.home');
    $trail->push('Пользователи', route('admin.users'));
});

Breadcrumbs::for('admin.dictations', function ($trail) {
	$trail->parent('admin.home');
    $trail->push('Диктанты', route('admin.dictations'));
});

Breadcrumbs::for('admin.dictation_results', function ($trail) {
	$trail->parent('admin.home');
    $trail->push('Результаты Диктантов', route('admin.dictation_results'));
});

