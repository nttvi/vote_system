<?php
$namespace = 'HPro\Member\Http\Controllers';
Route::group(
    ['module'=>'Member', 'namespace' => $namespace,'middleware' => ['web']],
    function() {

    	require('Routes\web.php');
    	require('Routes\admin.php');
});
