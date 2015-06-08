<?php namespace CodeCommerce;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

/**
 * CodeCommerce\User
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\CodeCommerce\Order[] $orders
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\CodeCommerce\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\CodeCommerce\User whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\CodeCommerce\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\CodeCommerce\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\CodeCommerce\User whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\CodeCommerce\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\CodeCommerce\User whereUpdatedAt($value)
 * @property boolean $is_admin 
 * @method static \Illuminate\Database\Query\Builder|\CodeCommerce\User whereIsAdmin($value)
 */
class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{

    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'is_admin'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function orders() {
        return $this->hasMany('CodeCommerce\Order');
    }

}
