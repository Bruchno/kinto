<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Storage;

class TeamsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $models = Team::all();
        return view('admin.teams.index',[
          'models' => $models
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.teams.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validated = $request->validate([
        'fullname' => 'required|string|max:255|min:3',
        'position' => 'required|max:255|min:3',
        'avatar' => 'required|image'
      ]);
      if(empty($err)){
        $model = new Team();
        $model->fullname = $request['fullname'];
        $model->position = $request['position'];
        $model->description = $request['description'];
        $image = $request->file('avatar');
        if ($image) {
            $path = $image->store('source', 'public');
            $base = basename($path);
            $model->avatar = $base;
        }
        $model->save();
        return redirect()->route('team.show', $model->id)->with('status', 'Збережено!');
      } else {
        return redirect()->back()->withErrors(['msg' => implode('<br>', $err)]);
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        return view('admin.teams.show', [
          'model' => $team
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
      return view('admin.teams.edit', [
        'model' => $team,
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
      $validated = $request->validate([
        'fullname' => 'required|string|max:255|min:3',
        'position' => 'required|max:255|min:3',
        'avatar' => 'image'
      ]);
      if(empty($err)){
        $model = $team;
        $model->fullname = $request['fullname'];
        $model->position = $request['position'];
        $model->description = $request['description'];
        $image = $request->file('avatar');
        if ($image) {
            $path = $image->store('source', 'public');
            $base = basename($path);
            if ($model->avatar) {
              Storage::disk('public')->delete('source/' . $model->avatar);
            }
            $model->avatar = $base;
        }
        $model->save();
        return redirect()->route('team.show', $model->id)->with('status', 'Збережено!');
      } else {
        return redirect()->back()->withErrors(['msg' => implode('<br>', $err)]);
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
      if ($team->avatar) {
        Storage::disk('public')->delete('source/' . $team->avatar);
      }
      $team->delete();
      return redirect()->route('team.index')->with('status', 'Видалено!');
    }
}
