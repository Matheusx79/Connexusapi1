<?php
require 'vendor/autoload.php';
use facades\app;


$container = app::getContainer();
$container['user']= new con\user;

app::setContainer($container);

app::get('/login', 'user.checkuser');
app::get('/checklogin', 'user.validateuser');
app::get('/logout', 'user.logout');
app::get('/loadpost', 'user.loadpost');
app::get('/returnuser', 'user.pushuser');
app::get('/insertpost', 'user.insertpost');



app::run();

