<?php
 
namespace App;
/*
* this trait is for get notification from database 
* by Oussama Messabih
*/
use DB;
trait Notif{
	static public function getnotifications(){
		$notificationsCollection = DB::table('notifications')->latest()->get();
        $notifications = array('');
        foreach ($notificationsCollection as $notif) {
        	if ($notif->type == 'App\Notifications\missingproduct') {
        		$notif->type = 'missingproduct';
        		$notif->data = substr($notif->data,1,strlen($notif->data)-2);
        	} else {
        		$notif->data = substr($notif->data,1,strlen($notif->data)-2);
        	}
        }
        return $notificationsCollection;
	}
}