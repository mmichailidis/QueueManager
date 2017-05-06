<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed Id
 * @property mixed CompanyId
 * @property mixed Name
 * @property mixed IsByName
 * @property mixed LastNumber
 * @property mixed TypeOfJob
 * @property mixed AverageWaitingTime
 * @property mixed created_at
 * @property mixed updated_at
 */

class Job extends Model
{
    protected $primaryKey = 'Id';

    protected $table = 'jobs';

    protected $fillable = [
        'CompanyId',
        'Name',
        'IsByName',
        'LastNumber',
        'TypeOfJob',
        'AverageWaitingTime'
    ];

    protected $guarded = 'Id';
}
