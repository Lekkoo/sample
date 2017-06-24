<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\User;

class UsersController extends Controller
{
    public function create()
    {
      return view('users.create');
    }

    public function show($id){

      $user = User::findOrFail($id);
      return view('users.show',compact('user'));
      // return compact('user');
    }

    //储存用户
    public function store(Request $request)
    {
      $this->validate(
        $request, [
          'name' => 'required|max:50',
          'email' => 'required|email|unique:users|max:255', //针对users表验证unique性
          'password' => 'required|confirmed|min:6'
        ]
      );

      //保存到数据库
      $user = User::create([
        'name' => $request->name,
        'emain' => $request->eamil,
        'password' => bcrypt($request->password),
      ]);

      session()->flash('success', '操作成功哦～');
      Auth::login($user);
      return redirect()->route('users.show', [$user]);
      // return redirect()->route('users.show', [$user->id]);


    }
}
