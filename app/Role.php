<?php

namespace App;

use Spatie\Activitylog\LogsActivity;
use Spatie\Activitylog\LogsActivityInterface;
use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole implements LogsActivityInterface
{
    use LogsActivity;

    /**
     * @return mixed
     */

    public static function getCount()
    {
        return Role::count();
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
            return $this->user.' created role <strong>'.$this->name.'</strong> successfully';
        }

        if ($eventName == 'updated')
        {
            return $this->user.' updated role <strong>'.$this->name.'</strong> successfully';
        }

        if ($eventName == 'deleted')
        {
            return $this->user.' deleted role <strong>'.$this->name.'</strong> successfully';
        }

        return '';
    }

}
