<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CallGroupQueue extends Model
{
    protected $table = 'call_group_queue';

    public $timestamps = false;

    protected $fillable = ['id_call_group', 'did', 'queue'];

    public function callGroup(): BelongsTo
    {
        return $this->belongsTo(CallGroup::class, 'id_call_group');
    }
}
