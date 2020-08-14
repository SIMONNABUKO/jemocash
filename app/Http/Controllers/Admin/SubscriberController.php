<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\SendSubscriberMail;
use App\Subscriber;
use App\User;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function index()
    {
        $page_title = 'Subscriber Manager';
        $empty_message = 'No premium subscriber yet.';
        $users = User::latest()->paginate(config('constants.table.default'));
       
        return view('admin.subscriber.index', compact('page_title', 'empty_message',  'users'));
    }

    public function sendEmailForm()
    {
        $page_title = 'Send Email to Subscribers';
        return view('admin.subscriber.send_email', compact('page_title'));
    }

    public function remove(Request $request)
    {
        $request->validate(['subscriber' => 'required|integer']);
        $subscriber = User::findOrFail($request->subscriber);
        $subscriber->delete();

        $notify[] = ['success', 'Subscriber has been removed'];
        return back()->withNotify($notify);
    }

    public function sendEmail(Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'body' => 'required',
        ]);
        if (!User::first()) return back()->withErrors(['No subscribers to send email.']);
        $subscribers = User::all();
        foreach ($subscribers as $subscriber) {
            $receiver_name = $subscriber->firstname;
            send_general_email($subscriber->email, $request->subject, $request->body, $receiver_name);
        }
        $notify[] = ['success', 'Email will be sent to all subscribers.'];
        return back()->withNotify($notify);
    }
}
