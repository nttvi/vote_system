<?php
$namespace = 'HPro\Object\Http\Controllers';
Route::group(
    ['module'=>'Object', 'namespace' => $namespace,'middleware' => ['web']],
    function() {

    	require('Routes\web.php');
    	require('Routes\admin.php');
});
