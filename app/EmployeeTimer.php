<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed Id
 * @property mixed EmployeeId
 * @property mixed MemberId
 * @property mixed Timer
 * @property mixed IsFinalized
 * @property mixed created_at
 * @property mixed updated_at
 */

class EmployeeTimer extends Model
{
    protected $primaryKey = 'Id';

    protected $table = 'employee_timers';

    protected $fillable = [
        'EmployeeId',
        'MemberId',
        'Timer',
        'IsFinalized',
    ];

    protected $guarded = 'Id';
}
