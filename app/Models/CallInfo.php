<?php namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CallInfo extends Model
{
    use HasFactory;

    protected $table = 'call_info';

    protected $fillable = ['phone', 'comment', 'linkedid', 'id_tag', 'id_status'];

    public function callTag()
    {
        return $this->belongsTo(CallTag::class, 'id_tag');
    }

    public function callStatus(): BelongsTo
    {
        return $this->belongsTo(CallStatus::class, 'id_status');
    }
}
