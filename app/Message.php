<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed Id
 * @property mixed ThreadId
 * @property mixed Body
 * @property mixed ReadStatus
 * @property mixed From
 * @property mixed created_at
 * @property mixed updated_at
 */

class Message extends Model
{
    protected $primaryKey = 'Id';

    protected $table = 'messages';

    protected $fillable = [
        'ThreadId',
        'Body',
        'ReadStatus',
        'From'
    ];

    protected $guarded = 'Id';
}
