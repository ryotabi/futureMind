<?php

namespace App\Listeners;

use App\Events\CompanyProfileData;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Services\ImgToDatabase;


class UpdateCompanyProfileData
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
     * @param  CompanyProfileData  $event
     * @return void
     */
    public function handle(CompanyProfileData $event)
    {
        unset($event->data['_token']);
        if(isset($event->data['company_icon'])){
            $fileNameToStore = ImgToDatabase::ImgToDatabase($event->data['company_icon']);
            $event->company->company_icon = $fileNameToStore;
        };
        $event->company->name = $event->data['name'];
        $event->company->industry = $event->data['industry'];
        $event->company->office = $event->data['office'];
        $event->company->employee = $event->data['employee'];
        $event->company->homepage = $event->data['homepage'];
        $event->company->comment = $event->data['comment'];
        $event->company->save();
    }
}
