<?php


namespace App\Services\Admin;


use App\Jobs\MailContactMessageJob;
use Illuminate\Support\Facades\Auth;
use App\Model\admin\taskuserassign;
use App\Jobs\MailTaskassigneJob;
use App\Model\user\User;

class MailTaskassigneService
{
    /**
     * Return the permission with the given id, or null if no product is found.
     *
     * @param int $id
     */
    public static function newMailTaskassigne($request)
    {
        $taskuserassigns = taskuserassign::with('user')->latest()->get();
        $users = User::where('my_status','active')->get();
        $administratorID =  (int)$request->get('administrator_id');
        $taskassigneID = (int)$request->get('taskuserassign_id');

        foreach ($users as $item) {
            if ($item['id'] === $administratorID)
                $to[] = $item->email;continue;
        }

        foreach ($taskuserassigns as $item){
            if ($item->id === $taskassigneID)
             $subjectassigneTask = $item->title;
             $messageassigneTask = $item->body;
             continue;
         }
        
        $userEmail = Auth::user()->email;
        $userName = Auth::user()->name;
        $from = ['address' => $userEmail, 'name' => $userName];
        $emailassigneJob = (new MailTaskassigneJob($subjectassigneTask,$messageassigneTask,$to=[],$from=[]));
        dispatch($emailassigneJob);

    }

}
