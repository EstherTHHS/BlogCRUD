<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $username = Auth::user()->name;
        Log::channel("custom")->alert("LogIn", ["User < $username > is Login to the system."]);

        return view('backend.index');
    }

    public function widget()
    {
        //for API
        $client = new Client();
        $request = $client->get('https://api.publicapis.org/entries');
        if ($request->getStatusCode() == 200) {
            $response = json_decode($request->getBody());
            // dd($response);
        }
        return view('backend.widget', compact('response'));
    }
}
