<?php

namespace Mooc\Policies;

use Mooc\Entities\Sku;
use Mooc\Entities\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SkuPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

}
