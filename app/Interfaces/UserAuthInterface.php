<?php

namespace App\Interfaces;

use Illuminate\Support\Collection;

interface UserAuthInterface
{
    public function store(array $parms);

    public function login(array $parms);

    public function logout(array $parms);

    public function show();

    public function update(array $parms, $id);
}
