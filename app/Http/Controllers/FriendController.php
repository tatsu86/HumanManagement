<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\friend;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class friendController extends Controller
{
    public function index(Request $request)
    {
        $name = $request->input('name');
        $feature = $request->input('feature');
        $gender = $request->input('gender');

        $query = friend::query();

        $query->where('user_id', Auth::id());

        if (!empty($name)) {
            $query->where('name', 'LIKE', "%{$name}%")
                ->orWhere('name_kana', 'LIKE', "%{$name}%");
        }

        if (!empty($gender)) {
            $query->where('gender', $gender);
        }

        if(!empty($feature)) {
            $query->where('feature', 'LIKE', "%{$feature}%");
        }
        
        $friends = $query->get();

        return view('friend/index', compact('friends', 'name', 'feature', 'gender'));
    }

    public function create()
    {
        $friend = new friend();
        return view('friend/create', compact('friend'));
    }

    public function store(Request $request)
    {
        logger("storeメソッド開始");
        $friend = new friend();
        $friend->user_id = Auth::id();
        $friend->name = $request->name;
        $friend->name_kana = $request->name_kana;
        $friend->gender = $request->gender;
        $friend->feature = $request->feature;
        // TODO:画像圧縮をする
        $file = $request->profile_img;
        if ($file) {
            $path = $file->store('public/img');
            // Image::make($file)->resize(150, 150)->save(storage_path() . '/app/public/img');
            $friend->profile_img = basename($path);
            $friend->save();
        }
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
        $friend->name = $request->name;
        $friend->name_kana = $request->name_kana;
        $friend->gender = $request->gender;
        $friend->feature = $request->feature;
        $friend->profile_img = $request->profile_img;
        // TODO:画像圧縮をする
        $file = $request->profile_img;
        if ($file) {
            $path = $file->store('public/img');
            // Image::make($file)->resize(150, 150)->save(storage_path() . '/app/public/img');
            $friend->profile_img = basename($path);
            $friend->save();
        }
        return redirect("/friend");
    }

    public function destroy($id)
    {
        $friend = friend::findOrFail($id);
        $file_name = $friend->profile_img;
        $friend->delete();
        
        $delete_path = storage_path() . '/app/public/img/' . $file_name;
        if (\File::exists($delete_path)) {
            // 画像を削除
            \File::delete($delete_path);
        }

        return redirect("/friend");
    }
}
