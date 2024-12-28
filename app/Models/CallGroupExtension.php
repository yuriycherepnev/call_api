<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CallGroupExtension extends Model
{
    protected $table = 'call_group_extension';

    public $timestamps = false;

    protected $fillable = ['id_call_group', 'extension'];

    public function callGroup(): BelongsTo
    {
        return $this->belongsTo(CallGroup::class, 'id_call_group');
    }
}
