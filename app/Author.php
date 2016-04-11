<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use Scopes\RandomScope;
    //
    protected $table = 'authors';
}
