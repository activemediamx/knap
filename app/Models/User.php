<?php

namespace App\Models;

use App\Presenters\UserPresenter;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laracasts\Presenter\PresentableTrait;
use App\Traits\CustomFieldsTrait;
use Spatie\Activitylog\LogsActivity;
use Spatie\Activitylog\LogsActivityInterface;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable implements LogsActivityInterface
{
    use EntrustUserTrait;
    use PresentableTrait;
    use CustomFieldsTrait;
    use LogsActivity;

    protected $presenter = UserPresenter::class;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'facebookClientID', 'facebookClientSecret',
        'googleClientID', 'googleClientSecret', 'twitterClientID', 'twitterClientSecret',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $appends = [
        'gravatar','trim_name'
    ];

    public function getTrimNameAttribute()
    {
        $str   = $this->name;
        $limit = 10;

        if (strlen($str) > $limit) {
            $str = substr($str, 0, $limit - 3);

            return (substr($str, 0, $limit) . '...');
        }

        return trim($str);

    }

    public static function getCount($status = null)
    {
        if($status == null){
            return User::count();

        }
        else{
            return User::where('status', $status)->count();
        }
    }

    public function getGravatarAttribute($size= 250, $d = 'mm')
    {
        if($this->avatar === 'default.png'){
            $url = 'https://www.gravatar.com/avatar/' . md5( strtolower( trim( $this->email ) ) ) . '?d='.$d.'&s='. $size;

        }else{
            $url = asset('avatar/'.$this->avatar);
        }

        return $url;
    }

    /**
     * @param $loggedInAdmin
     * @return mixed
     */
    public function unreadChatMessage($loggedInAdmin)
    {
        return UserChat::where('from', $this->id)->where('to', $loggedInAdmin)->where('message_seen', 'no')->count();
    }

    /**
     * @param string $eventName
     * @return string
     */
    public function getActivityDescriptionForEvent($eventName)
    {
        if (\Auth::check()){
            $this->user = \Auth::user()->name;

        }else{
            $this->user = 'Seeder';
        }

        if ($eventName == 'created')
        {
            return $this->user.' created user <strong>'.$this->name.'</strong> successfully';
        }

        if ($eventName == 'updated')
        {
            return $this->user.' updated user <strong>'.$this->name.'</strong> successfully';
        }

        if ($eventName == 'deleted')
        {
            return $this->user.' deleted user <strong>'.$this->name.'</strong> successfully';
        }

        return '';
    }

}
