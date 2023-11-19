<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Masmerise\Toaster\Toaster;

class MessageController extends Controller
{
    public function create()
    {
        return view('messages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        Message::create([
            'title' => request('title'),
            'user_id' => auth()->user()->id,
            'message-trixFields' => request('message-trixFields'),
            'attachment-message-trixFields' => request('attachment-message-trixFields')
        ]);

        Toaster::success('New Bulletin created.');
        return redirect(route('dashboard'));
    }

    public function edit(Message $message)
    {
        if(!auth()->user()->admin) {
            Toaster::error('Only Admin users can edit bulletins.');
            return redirect()->back();
        } else {
            return view('messages.edit',
            [
                'message' => $message
            ]);
        }

    }
}
