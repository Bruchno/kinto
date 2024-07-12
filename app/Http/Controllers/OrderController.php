<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Order;

class OrderController extends Controller
{
    public function save_order(Request $request)
    {
      $validated = $request->validate([
        'phone' => 'required|regex:/(^[0-9\+ ]+$)+/|min:10|max:22',
        'email' => 'email'
      ]);
      $model = new Order();
      $id = $this->save_data($request, $model);
      return 1;
    }

    public function orders()
    {
      $models = Order::all();
      return view('admin.orders.index', [
        'models' => $models,
      ]);
    }

    public function edit_order($id)
    {
      $model = Order::find($id);
      return view('admin.orders.edit', [
        'model' => $model,
      ]);
    }

    public function store_order(Request $request, $id)
    {
      $validated = $request->validate([
        'phone' => 'required|regex:/(^[0-9\+ ]+$)+/|min:10|max:22',
        'email' => 'email'
      ]);
      $model = Order::find($id);
      $id = $this->save_data($request, $model);
      return redirect()->route('orders')->with('status', 'Збережено!');
    }

    public function save_data($request, $model)
    {
      $model->name = $request['name'];
      $model->email = $request['email'];
      $model->phone = $request['phone'];
      $model->count_person = $request['count_person'] ? $request['count_person'] : 1;
      if($request['date_order']){
        $date_order = date("Y-m-d H:i:s", strtotime($request['date_order']));
        $model->date_order = $date_order;
      }
      if($request->has('status')){
        $model->status = $request['status'] == "on" ? 1 : 0;
      }
      $model->save();
    }

    public function delete_order($id)
    {
      $model = Order::find($id);
      $model->delete();
      return redirect()->route('orders')->with('status', 'Видалено!');
    }
}
