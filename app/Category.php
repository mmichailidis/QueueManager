<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed Id
 * @property mixed Name
 * @property mixed Photo
 * @property mixed TypeOfCategory
 * @property mixed created_at
 * @property mixed updated_at
 */
class Category extends Model
{
    protected $primaryKey = 'Id';

    protected $table = 'categories';

    protected $fillable = [
        'Name',
        'Photo',
        'TypeOfCategory'
    ];

    protected $guarded = 'Id';
}
