<?php
namespace Lio\Http\Controllers;

class ChatController extends Controller
{
    public function getIndex()
    {
        return view('chat.index');
    }
}
