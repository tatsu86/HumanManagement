<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\friend;

class friendController extends Controller
{
    public function index(Request $request)
    {
        $name = $request->input('name');
        $feature = $request->input('feature');

        $query = friend::query();

        if (!empty($name)) {
            $query->where('last_name', 'LIKE', "%{$name}%")
                ->orWhere('first_name', 'LIKE', "%{$name}%")
                ->orWhere('last_name_kana', 'LIKE', "%{$name}%")
                ->orWhere('first_name_kana', 'LIKE', "%{$name}%");
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
        $friend->last_name = $request->last_name;
        $friend->first_name = $request->first_name;
        $friend->feature = $request->feature;
        $friend->save();

        return redirect("/friend");
    }

    public function show($id)
    {
        $friend = friend::findOrFail($id);

        return view('friend/show', compact('friend'));
    }

    public function edit($id)
    {
        $friend = friend::findOrFail($id);

        return view('friend/edit', compact('friend'));
    }

    public function update(Request $request, $id)
    {
        $friend = friend::findOrFail($id);
        $friend->last_name = $request->last_name;
        $friend->first_name = $request->first_name;
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
