<?php 

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('admin.dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('dashboard'));
});

Breadcrumbs::for('admin.products', function (BreadcrumbTrail $trail) {
    $trail->push('Products', route('admin.products'));
});

Breadcrumbs::for('admin.profile', function (BreadcrumbTrail $trail) {
    $trail->push('Profile', route('profile.edit'));
});

// Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
//     $trail->parent('home');
//     $trail->push('Dashboard', route('dashboard'));
// });

// // Home > Blog > [Category]
// Breadcrumbs::for('category', function (BreadcrumbTrail $trail, $category) {
//     $trail->parent('blog');
//     $trail->push($category->title, route('category', $category));
// });