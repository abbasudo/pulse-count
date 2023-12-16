<?php

use Workbench\App\Jobs\ProcessPodcast;
use Workbench\App\Models\User;

Route::get('/test', function () {
    ProcessPodcast::dispatch();
    User::factory()->make();
    return response('Hello', 418);
});
