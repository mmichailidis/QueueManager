<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed MemberId
 * @property mixed JobId
 * @property mixed Number
 * @property mixed Time
 * @property mixed IsUsed
 * @property mixed DiscardedByUser
 * @property mixed created_at
 * @property mixed updated_at
 */

class NumberAssign extends Model
{
    protected $primaryKey = 'Id';

    protected $table = 'number_assigns';

    protected $fillable = [
        'MemberId',
        'JobId',
        'Number',
        'Time',
        'IsUsed',
        'DiscardedByUser'
    ];

    protected $guarded = 'Id';
}
