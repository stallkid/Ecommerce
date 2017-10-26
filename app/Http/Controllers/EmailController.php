<?php

namespace codecommerce\Http\Controllers;

use Illuminate\Http\Request;

use codecommerce\Http\Requests;
use codecommerce\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function send(Request $requests)
    {
        $title = $requests->input('title');
        $content = $requests->input('content');

        Mail::send('emails.send', ['title'=> $title, 'content' => $content], function($message)
        {
            $message->from('ecommerce@commerce.com', 'Staff');

            $message->to(user()->email);
        });

        return response()->json(['message'=> 'Request completed']);
    }
}
