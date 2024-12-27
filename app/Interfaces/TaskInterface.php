<?php

namespace App\Interfaces;

use Illuminate\Support\Collection;

interface TaskInterface
{
    public function all($request);

    public function show($task);

    public function store(array $parms);

    public function update(array $parms, $task);

    public function destroy($task);
}
