<?php
$namespace = 'HPro\Election\Http\Controllers';
Route::group(
    ['module'=>'Election', 'namespace' => $namespace,'middleware' => ['web']],
    function() {

    	require('Routes\web.php');
    	require('Routes\admin.php');
});
