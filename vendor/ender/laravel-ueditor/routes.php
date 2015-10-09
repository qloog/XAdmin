<?php

/**
 * Your package routes would go here
 */

$uploadRoutes=$routeName=config('ueditor.upload_routes_config_map');
$routeName=config('ueditor.upload_route');
$middleware=config('ueditor.core.route.middleware');
foreach($uploadRoutes as $routeName=>$configName){
    Route::any($routeName,['middleware'=> $middleware,'uses'=>'Ender\UEditor\UEditorController@server']);
}