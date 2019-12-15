<?php


namespace App\Services\Admin;


use App\Jobs\MailTaskEmailJob;
use App\Model\admin\note;
use App\Model\user\User;
use Illuminate\Support\Facades\Auth;

class MailTaskService
{
    /**
     * Return the permission with the given id, or null if no product is found.
     *
     * @param int $id
     */
    public static function newTask($request)
    {
        $notes = note::with('user')->latest()->get();
        $users = User::where('my_status','active')->get();
        $administratorID =  (int)$request->get('administrator_id');
        $nodeID = (int)$request->get('note_id');

        foreach ($users as $item) {
            if ($item['id'] === $administratorID)
                $to[] = $item->email;continue;
        }

        foreach ($notes as $item){
           if ($item->id === $nodeID)
            $subjectTask = $item->title;
            $messageTask = $item->body;
            continue;
        }

        $userEmail = Auth::user()->email;
        $userName = Auth::user()->name;
        $from = ['address' => $userEmail, 'name' => $userName];
        $emailuserJob = (new MailTaskEmailJob($subjectTask,$messageTask,$to,$from));
        dispatch($emailuserJob);
    }

}
