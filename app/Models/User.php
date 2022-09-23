<?php

namespace App\Models;
 
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\UserResetPasswordNotification;

/*class User extends Authenticatable implements UserInterface*/
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'phone_num',
        'mobile_num',
        'company_name',
        'summary',
        'zip_code',
        'state',
        'city',
        'address_2',
        'address_1',
        'termsofservices',
        'user_type',
        'email',
        'password',
        'image',
        'status',
        'parent_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    /*protected $casts = [
        'email_verified_at' => 'datetime',
    ];*/

    public static function getStatesCount($where = [])
    {
        $query = self::select(
            'users.*',
            'states.name as state_name',
            'states.short_code as short_code',
            'states.image as state_image',
            \DB::raw("count(*) as state_count, state"),
        )
            ->leftJoin('states', 'states.short_code', '=', 'users.state')
            ->groupBy('state')
            ->orderBy('state_count', 'desc')
            ->take(5)
            ->get();
            
        return $query;
    }

    public static function getRecentUser($where = [])
    {
        $query = self::where($where)->orderBy('id', 'DESC')->first();

        return $query;
    }

    public static function getUsersCount($where = [])
    {
        $query = self::select(
            'users.*',
            \DB::raw('COUNT(DISTINCT users.id) as total_users')
        )
            ->where($where)
            ->first();

        return $query;
    }

    public static function getUsers($where = [])
    {
        $query = self::select(
            'users.*',
            'self.first_name as parent_first',
            'self.last_name as parent_last',
            'channels.name as channel_name',
            'channels.id as channel_id',
            'states.name as state_name',
        )
            ->leftJoin('users as self', 'self.id', 'users.parent_id')
            ->leftJoin('channels', 'channels.channel_partner_id', 'users.id')
            ->leftJoin('states', 'states.short_code', 'users.state')
            ->where($where)
            ->get();

        return $query;
    }

    public static function getAllUsers($where = [])
    {
        $query = self::where($where)->get();

        return $query;
    }

    public function fullName()
    {
        return $this->first_name.' '.$this->last_name;
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new UserResetPasswordNotification($token));
    }

    public static function getChannelClients($where = [], $whereIn = [])
    {
        $query = self::where($where)->whereIn('id', $whereIn)->get();

        return $query;
    }

    public static function getTransactions($where = [])
    {
        $query = self::select(
            'users.*',
            \DB::raw('MAX(transactions.id) AS latest_transaction_id'),
        )
            ->leftJoin('transactions', 'transactions.user_id', '=', 'users.id')
            ->where($where)
            ->groupBy('users.id')
            ->first();

        return $query;
    }
}
