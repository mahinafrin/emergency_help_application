<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Messenger;
use App\Models\RepliedMessage;
use Illuminate\Http\Request;
use Flasher\Laravel\Facade\Flasher;

class MessengerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = null)
    {
        $messengers = Messenger::select()->get();

        $messages = [];
        $msgr = null;
        if (!is_null($id)) {
            $messages = Messenger::find($id)->messages;
            $msgr = Messenger::find($id);
        }
        return \view('admin.show-message', \compact('messengers', 'messages', 'msgr'));
    }

    public function getMessages()
    {
        $messages = Message::select()->where('messenger_id', \optional(session('messenger'))->id)->get();
        $messages->load('replies');
        return $this->respondWithSuccess('fetched done',  $messages);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lastmsg = Message::where('messenger_id', session()->get('messenger')->id)->orderBy('id', 'desc')->first();
        $lastmsg->replies->each(function ($reply) {
            $reply->replied_at = now();
            $reply->save();
        });

        $message = Message::create([
            'messenger_id' => session()->get('messenger')->id,
            'message' => $request->message,
            'read_at' => null
        ]);

        return $this->respondWithSuccess('Message sent successfully', $message);
    }

    public function messengerInfoStore(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'phone' => 'required|numeric',
            'address' => 'required',
        ]);

        $messenger = Messenger::where([
            'name'  => $data['name'],
            'phone' => $data['phone'],
        ])->first();

        if ($messenger) {
            session()->put('messenger', $messenger);
            Flasher::addSuccess('Thanks for comeback! Please Continue your discussion');
            return redirect()->back();
        }

        $messenger = Messenger::where(['phone' => $data['phone']])->count();
        if ($messenger > 0) {
            Flasher::addError('Phone number is exist. Please try with right information');
            return redirect()->back();
        }

        $messenger = Messenger::create($data);
        Message::create([
            'messenger_id' => $messenger->id,
            'message' => "Hi, Please make me a reply!"
        ]);
        session()->put('messenger', $messenger);
        Flasher::addSuccess('Please continue your messaging..!');
        return back();
    }

    public function reply(Request $request, $messengerId)
    {
        $request->validate([
            'message' => 'required'
        ]);

        $messages = Messenger::find($messengerId)->messages;
        $lastMessage = $messages[count($messages) - 1];
        RepliedMessage::create([
            'user_id' => auth()->user()->id,
            'message_id' => $lastMessage->id,
            'message'     => $request->message,
        ]);

        foreach ($messages as $msg) {
            $msg->read_at = now();
            $msg->save();
        }

        return back();
    }
}
