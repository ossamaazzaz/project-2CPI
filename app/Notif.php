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
            array_push($notifications ,substr($notif->data,1,count($notif->data)-2));
        }
        return $notifications;
	}
}