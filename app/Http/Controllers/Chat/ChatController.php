<?php

namespace App\Http\Controllers\Chat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Message;

class ChatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('chat');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function messages()
    {
        return Message::with('user')->get();
    }

    /**
     * @TODO: This should handle persisting of messages to the DB.
     * @param Request $request
     * @return array
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $user->messages()->create([
            'message' =>$request->get('message')
        ]);
    }
}
