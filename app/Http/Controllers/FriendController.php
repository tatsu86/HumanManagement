<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\friend;
use Illuminate\Support\Facades\Auth;

class friendController extends Controller
{
    public function index(Request $request)
    {
        $name = $request->input('name');
        $feature = $request->input('feature');

        $query = friend::query();

        $query->where('user_id', Auth::id());

        if (!empty($name)) {
            $query->where('name', 'LIKE', "%{$name}%")
                ->orWhere('name_kana', 'LIKE', "%{$name}%");
        }

        if(!empty($feature)) {
            $query->where('feature', 'LIKE', "%{$feature}%");
        }
        
        $friends = $query->get();

        return view('friend/index', compact('friends', 'name', 'feature'));
    }

    public function create()
    {
        $friend = new friend();
        return view('friend/create', compact('friend'));
    }

    public function store(Request $request)
    {
        $friend = new friend();
        $friend->user_id = Auth::id();
        $friend->name = $request->name;
        $friend->name_kana = $request->name_kana;
        $friend->gender = $request->gender;
        $friend->feature = $request->feature;
        $friend->save();

        return redirect("/friend");
    }

    // public function show($id)
    // {
    //     $friend = friend::findOrFail($id);

    //     return view('friend/show', compact('friend'));
    // }

    public function edit($id)
    {
        $friend = friend::findOrFail($id);

        return view('friend/edit', compact('friend'));
    }

    public function update(Request $request, $id)
    {
        $friend = friend::findOrFail($id);
        $friend->name = $request->name;
        $friend->name_kana = $request->name_kana;
        $friend->gender = $request->gender;
        $friend->feature = $request->feature;
        $friend->save();

        return redirect("/friend");
    }

    public function destroy($id)
    {
        $friend = friend::findOrFail($id);

        $friend->delete();

        return redirect("/friend");
    }
}
