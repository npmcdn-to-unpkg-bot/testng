<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use Scopes\RandomScope;
    //
    protected $table = 'genres';
}
