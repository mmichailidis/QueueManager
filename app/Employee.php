<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed Id
 * @property mixed IsOnline
 * @property mixed JobId
 * @property mixed UserId
 * @property mixed CurrentNumber
 * @property mixed NumberStatus
 * @property mixed created_at
 * @property mixed updated_at
 */

class Employee extends Model
{
    protected $primaryKey = 'Id';

    protected $table = 'employees';

    protected $fillable = [
        'IsOnline',
        'JobId',
        'UserId',
        'CurrentNumber',
        'NumberStatus'
    ];

    protected $guarded = 'Id';
}
