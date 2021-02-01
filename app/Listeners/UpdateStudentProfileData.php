<?php

namespace App\Listeners;

use App\Events\StudentProfileData;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Services\ImgToDatabase;


class UpdateStudentProfileData
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  StudentProfileData  $event
     * @return void
     */
    public function handle(StudentProfileData $event)
    {
        if(isset($event->request->img_name)){
            $fileNameToStore = ImgToDatabase::ImgToDatabase($event->request->img_name);
        }
        unset($event->data['_token']);
        $event->user->fill($event->data);
        if(isset($event->data['img_name'])){
            $event->user->img_name = $fileNameToStore;
        }
        $event->user->save();
    }
}
