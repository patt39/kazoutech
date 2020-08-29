<?php

namespace App\Services\Admin;

use App\Jobs\MailContactMessageJob;
use App\Model\user\User;

class MailContactService
{
    /**
     * Return the permission with the given id, or null if no product is found.
     *
     * @param int $id
     */
    public static function newMailContact($request)
    {
        $firstname = $request->get('first_name');
        $lastname = $request->get('last_name');
        $subject = $request->get('subject');
        $emailFrom = $request->get('email');
        $message = $request->get('message');


        //my_status c'est pour recuperer le statu des admin a "0" c'est un utilisateur a "active" c'est un admin
        $users = User::where('my_status','active')->get();

        foreach ($users as $item){
            $roleGet = $item->roles->pluck('name');
            if ($roleGet[0] === 'super-admin' || $roleGet[0] === 'admin')
                $to[] = $item->email;continue;
        }

        $from = ['address' => $emailFrom, 'name' => $firstname];
        $emailcontactJob = (new MailContactMessageJob($firstname,$lastname,$subject,$message,$to,$from));
        dispatch($emailcontactJob);

    }

}
