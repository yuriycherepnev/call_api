<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CallGroup extends Model
{
    protected $table = 'call_group';

    public $timestamps = false;

    protected $fillable = ['id', 'name'];
}
