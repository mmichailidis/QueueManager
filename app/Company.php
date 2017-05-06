<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed Id
 * @property mixed CategoryId
 * @property mixed AutoProceedActivated
 * @property mixed AutoProceedTime
 * @property mixed VerificationRequired
 * @property mixed ImageLocation
 * @property mixed created_at
 * @property mixed updated_at
 */

class Company extends Model
{
    protected $primaryKey = 'Id';

    protected $table = 'companies';

    protected $fillable = [
        'CategoryId',
        'AutoProceedActivated',
        'AutoProceedTime',
        'VerificationRequired',
        'ImageLocation'
    ];

    protected $guarded = 'Id';
}
