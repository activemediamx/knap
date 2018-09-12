<?php namespace App\Models;

/**
 * Class UserChat
 * @package App\Models
 */
class UserChat extends \Eloquent
{
    protected $table = 'users_chat';

    protected $dates = ['created_at', 'updated_at'];

    /**
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    /**
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function fromUser()
    {
        return $this->belongsTo(User::class, 'from');
    }

    /**
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function toUser()
    {
        return $this->belongsTo(User::class, 'to');
    }

}
