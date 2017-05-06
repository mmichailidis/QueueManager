<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Member
 * @property mixed Id
 * @property mixed UserId
 * @property mixed TotalReservations
 * @property mixed UnattendedReservations
 * @property mixed created_at
 * @property mixed updated_at
 */

class Member extends Model
{
    protected $primaryKey = 'Id';

    protected $table = 'members';

    protected $fillable = [
        'UserId',
        'TotalReservations',
        'UnattendedReservations'
    ];

    protected $guarded = 'Id';
}
