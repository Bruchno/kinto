<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{
    public function index(){
      $users_model = User::all();
      return view('admin.users.index', [
        'users_model' => $users_model
      ]);
    }

    public function admin_edit($id){
      $model = User::find($id);
      return view('admin.users.edit', [
        'model' => $model
      ]);
    }

    public function admin_update(Request $request, $id){
      $user = User::find($id);
      if($request['is_admin'] !== NULL){
        $user->admin = 1;
      } else { $user->admin = 0; }
      $user->save();
      return redirect()->route('users')->with('status', 'Оновлено!');

    }

    public function user_destroy($id){
      $user = User::find($id);
      if($user->admin == 1){
        $count_admin = User::where('admin', '=', 1)->count();
        if($count_admin == 1){
          return back()->withErrors(['admin' => 'Завжди має залишитися хоча б один адмін!']);
        }
      }
      $user->delete();
      return redirect()->route('users')->with('status', 'Видалено!');
    }
}
