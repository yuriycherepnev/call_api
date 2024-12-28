<?php namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CallTag extends Model
{
    use HasFactory;

    protected $table = 'call_tag';

    protected $fillable = ['name'];

    public function callInfos(): HasMany
    {
        return $this->hasMany(CallInfo::class, 'id_tag');
    }
}
