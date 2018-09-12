<?php

namespace App;

use Spatie\Activitylog\LogsActivity;
use Spatie\Activitylog\LogsActivityInterface;
use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission implements LogsActivityInterface
{
    use LogsActivity;

    public static function getCount()
    {
        return Permission::count();
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
            return $this->user.' created permission <strong>'.$this->name.'</strong> successfully';
        }

        if ($eventName == 'updated')
        {
            return $this->user.' updated permission <strong>'.$this->name.'</strong> successfully';
        }

        if ($eventName == 'deleted')
        {
            return $this->user.' deleted permission <strong>'.$this->name.'</strong> successfully';
        }

        return '';
    }

}
