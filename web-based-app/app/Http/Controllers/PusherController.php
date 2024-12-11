<?php

namespace App\Http\Controllers;
use App\Events\PusherBroadcast;

use Illuminate\Http\Request;

class PusherController extends Controller
{
    //
    public function index()
    {
        return view('admin.chat');
    }

    public function broadcast(Request $request)
    {
        broadcast(new PusherBroadcast($request->get('message')))->toOthers();

        return view('admin.broadcast', ['message' => $request->get('message')]);
    }

    public function receive(Request $request)
    {
        return view('admin.receive', ['message' => $request->get('message')]);
    }
}
