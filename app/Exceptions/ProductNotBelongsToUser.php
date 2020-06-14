<?php

namespace App\Exceptions;

use Exception;

class ProductNotBelongsToUser extends Exception
{
    /**
     * @return mixed
     */
    public function render()
    {
        return ['error'=>'Product Not Belong To User'];
    }
}
