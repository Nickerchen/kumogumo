<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{
    public function match(Request $request)
    {
       if (isset($request->userName)) {
            $prefix = $request->userName;
        } else {
            $prefix = '';
        }
        if ($prefix !== '') {
            $users = DB::table('users')->where('name', 'like', $prefix.'%')->get();
            return view('searchusers', ['userName' => $prefix, 'users' => $users]);
        } else {
            return view('searchusers', ['userName' => $prefix, 'users' => array()]);
        }

    }

    public function viewJQueryJSON()
    {
        $users = [];

        return view('searchusers', compact('users'));
    }

    public function matchJSON(Request $request)
    {
        $users = $this->queryUsers($request);
        return response()->json($users);
    }

    private function queryUsers(Request $request)
    {
        if (isset($request->userName)) {
            $prefix = $request->userName;
        } else {
            $prefix = '';
        }
        if ($prefix !== '') {
            $users = DB::table('users')->where('name', 'like', $prefix . '%')->get();
        }
        return $users;
    }
}
