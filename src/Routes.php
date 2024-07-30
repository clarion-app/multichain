<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use ClarionApp\MultiChain\Controllers\BlockchainController;
use ClarionApp\MultiChain\Controllers\NodeController;
use ClarionApp\MultiChain\Controllers\StreamController;
use ClarionApp\MultiChain\Controllers\ItemController;

Route::group(['middleware'=>config('multichain.middleware'), 'prefix'=>'api/clarion-app/multichain' ], function () {
    Route::resource('blockchain', BlockchainController::class);
    Route::resource('blockchain/{chain}/node', NodeController::class);
    Route::resource('blockchain/{chain}/stream', StreamController::class);
    Route::resource('blockchain/{chain}/stream/{stream}/item', ItemController::class);
});
