<?php
/**
 * Created by PhpStorm.
 * User: programmist
 * Date: 08.04.2016
 * Time: 9:15
 */

namespace App\Scopes;

use Illuminate\Database\Eloquent\Model;

trait RandomScope
{
    public function scopeRandom($query){
        $totalRows = static::count() - 1;
        $skip = $totalRows > 0 ? mt_rand(0, $totalRows) : 0;

        return  $query->skip($skip)->take(1);
    }
}