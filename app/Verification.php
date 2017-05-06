<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed Id
 * @property mixed CompanyId
 * @property mixed MemberId
 * @property mixed created_at
 * @property mixed updated_at
 */

class Verification extends Model
{
    protected $primaryKey = 'Id';

    protected $table = 'verifications';

    protected $fillable = [
        'CompanyId',
        'MemberId'
    ];

    protected $guarded = 'Id';
}
