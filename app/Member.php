<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Member
 * @property mixed Id
 * @property mixed UserId
 * @property mixed TotalReservations
 * @property mixed UnattendedReservations
 */

class Member extends Model
{
    protected $guarded = 'Id';
}
