<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $email
 * @property string $token
 * @property string $created_at
 */
class PasswordReset extends Model
{
    public $timestamps = false;

    /**
     * The table associated with the model.
     *
     * @var string
     */

    protected $table = 'password_resets';

    /**
     * @var array
     */
    protected $fillable = ['email', 'token', 'created_at'];

}
