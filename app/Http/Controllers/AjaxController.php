<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{
    //Stelle den view searchuseres dar
    public function viewJQueryJSON()
    {
        $users = [];

        return view('searchusers', compact('users'));
    }

    //übergebe die User an JSON
    public function matchJSON(Request $request)
    {
        $users = $this->queryUsers($request);
        return response()->json($users);
    }

    //gebe die User die gefunden wurden zurück
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
