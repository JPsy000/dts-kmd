<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Offices;
use App\Positions;

class UserController extends Controller
{
    public function index()
    {
        $officeQuery = Offices::all();  
        $positionQuery = Positions::all();
        $userQuery = User::with('officeRel')->get();
        return view('admin.userslist', compact('officeQuery', 'positionQuery', 'userQuery'));
    } 

    public function store(Request $request)
    {
        try {
            if ($request->user_id != null) {
                $addUser = User::where('id', $request->user_id)->first();
                if (!$addUser) {
                    return redirect()->back()->with('error', 'User not found');
                }
                $message = 'Updated';
            } else {
                $addUser = new User();
                $message = 'Added';
            }
            $addUser->first_name = $request->first_name;
            $addUser->last_name = $request->last_name;
            $addUser->phone_number = $request->phone_number;
            $addUser->address = $request->address;
            $addUser->office_id = $request->office_id;
            $addUser->position_id = $request->position_id;
            $addUser->profile_picture = $request->profile_picture;
            $addUser->email = $request->email;
            $addUser->password = hash::make($request->password);

            $addUser->save();
            return redirect()->back()->with('message', "Successfully $message details!")->with('icon', 'success');
        } catch (\Exception $e) {
            return redirect()->back()->with('message', 'Failed to save details: ' . $e->getMessage())->with('icon', 'error');
        }
    }
}
