<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Human;

class HumanController extends Controller
{
    public function index()
    {
        $humans = Human::all();

        return view('human/index', compact('humans'));
    }

    public function create()
    {
        $human = new Human();
        return view('human/create', compact('human'));
    }

    public function store(Request $request)
    {
        $human = new Human();
        $human->last_name = $request->last_name;
        $human->first_name = $request->first_name;
        $human->save();

        return redirect("/human");
    }

    public function edit($id)
    {
        $human = Human::findOrFail($id);

        return view('human/edit', compact('human'));
    }

    public function update(Request $request, $id)
    {
        $human = Human::findOrFail($id);
        $human->last_name = $request->last_name;
        $human->first_name = $request->first_name;
        $human->feature = $request->feature;
        $human->save();

        return redirect("/human");
    }

    public function destroy($id)
    {
        $human = Human::findOrFail($id);
        $human->delete();

        return view("/human");
    }
}
