<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed Id
 * @property mixed MemberId
 * @property mixed EmployeeId
 * @property mixed MessageCount
 * @property mixed IsActive
 * @property mixed RequestForEnd
 * @property mixed created_at
 * @property mixed updated_at
 */

class Thread extends Model
{
    protected $primaryKey = 'Id';

    protected $table = 'threads';

    protected $fillable = [
        'MemberId',
        'EmployeeId',
        'MessageCount',
        'IsActive',
        'RequestForEnd'
    ];

    protected $guarded = 'Id';
}
