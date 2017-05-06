<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed Id
 * @property mixed CompanyId
 * @property mixed UserId
 * @property mixed created_at
 * @property mixed updated_at
 */

class Admin extends Model
{
    protected $primaryKey = 'Id';

    protected $table = 'admins';

    protected $fillable = [
        'CompanyId',
        'UserId'
    ];

    protected $guarded = 'Id';
}
