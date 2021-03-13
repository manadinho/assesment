<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Notifications\WelcomeEmail;

class SuperAdminController extends Controller
{
    public function index()
    {
        return view('super.dashboard');
    }

    public function allUsers()
    {
        return User::where('type', '!=', 'super_admin')->latest()->get()->toJson();
    }

    public function delete(Request $request)
    {
        User::where('id', $request->id)->delete();
        return json_encode(['success' => true]);
    }

    public function addUser($id = 0)
    {   
        $user = new User();
        if($id > 0){
            $user = User::where('type', '!=', 'super_admin')->findOrFail($id);
        }
        return view('super.add-user', ['user' => $user]);
    }

    public function addUpdateUser(UserRequest $request)
    {
        $data = $request->only(['name', 'email', 'type']);
        if($request->method == 'create' || $request->password != null)
        {
            $data['password'] = \Hash::make($request->password);
        }
        try{
            $user = User::updateOrCreate(['id' => $request->id], $data);
            if($request->method == 'create'){
                $user->notify(new WelcomeEmail());
            }
            return json_encode(['success' => true]);
        }
        catch(\Exception $e){
            return json_encode(['success' => false]);
        }
    }

    public function impersonate($id)
    {
        $user = User::findOrFail($id);
        \Auth::user()->impersonate($user);
        return redirect('/');
    }

    public function LeaveImpersonate()
    {
        \Auth::user()->leaveImpersonation();
        return redirect('/');
    }
}
