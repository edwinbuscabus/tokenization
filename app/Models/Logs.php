<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Logs
 * @package App\Models
 * @version November 8, 2021, 9:48 am UTC
 *
 * @property string $user_id
 * @property string $log
 * @property string $logdetails
 * @property string $logtype
 */
class Logs extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'logs';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'log',
        'logdetails',
        'logtype'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'string',
        'log' => 'string',
        'logdetails' => 'string',
        'logtype' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required|string|max:255',
        'log' => 'required|string|max:255',
        'logdetails' => 'nullable|string|max:1000',
        'logtype' => 'nullable|string|max:100',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
