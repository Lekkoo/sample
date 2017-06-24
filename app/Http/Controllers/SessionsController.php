<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;

class SessionsController extends Controller
{
    public function create()
    {
      return view('sessions.create');
    }

    public function store(Request $request)
    {
      $this->validate($request ,[
        'email' => 'required|email|max:255',
        'password' => 'required'
      ]);

      $creadentials = [
        'email' => $request->email,
        'password' => $request->password,
      ];

      if (Auth::attempt($creadentials)){
        session()->flash('success','用户登录成功～');
        return redirect()->route('users.show',[Auth::user()]);
      }else {
        session()->flash('danger', '用户登录失败～');
        return redirect()->back();
      }

      return ;
    }

    public function destroy()
    {
      Auth::logout();
      session()->flash('success', '退出登录～');
      return redirect('login');
    }
}
