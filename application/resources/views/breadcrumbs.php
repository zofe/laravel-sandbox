<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

Breadcrumbs::register('home', function($breadcrumbs) {
    $breadcrumbs->push('Home', url('/'));
});

//post

Breadcrumbs::register('posts', function($breadcrumbs, $category) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Posts', route('posts.list',  array('maincat'=> $category)));
});

Breadcrumbs::register('post', function($breadcrumbs, $category, $page) {
    $breadcrumbs->parent('posts', $category);
    $breadcrumbs->push($page->title, route('posts.page', array('maincat'=> $category, 'slug'=>$page->sef)));
});



