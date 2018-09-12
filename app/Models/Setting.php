<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogsActivity;
use Spatie\Activitylog\LogsActivityInterface;

class Setting extends Model  implements LogsActivityInterface
{
    use LogsActivity;

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

        if ($eventName == 'updated')
        {
            return $this->user.' updated <strong>'.\Request::get('setting').'</strong> setting successfully';
        }

        return '';
    }

}
