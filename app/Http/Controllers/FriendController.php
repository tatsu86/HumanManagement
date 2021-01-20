<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Friend;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\FriendRequest;

class friendController extends Controller
{
    public function index(Request $request)
    {
        $name = $request->input('name');
        $feature = $request->input('feature');
        $gender = $request->input('gender');

        $query = Friend::query();

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
        $friend = new Friend();
        return view('friend/create', compact('friend'));
    }

    public function store(FriendRequest $request)
    {
        $friend = new Friend();
        $friend->user_id = Auth::id();
        $friend->name = $request->name;
        $friend->name_kana = $request->name_kana;
        $friend->gender = $request->gender;
        $friend->feature = $request->feature;
        // TODO:画像圧縮をする
        $file = $request->profile_img;
        if ($file) {
            $path = $image->store('public/img');
            // Image::make($file)->resize(150, 150)->save(storage_path() . '/app/public/img');
            $friend->profile_img = basename($path);
        }
        $friend->save();
        session()->flash('success', '友達を登録しました。');

        return redirect("/friend");
    }

    public function show($id)
    {
        $friend = Friend::findOrFail($id);

        return view('friend/show', compact('friend'));
    }

    public function edit($id)
    {
        $friend = Friend::findOrFail($id);

        return view('friend/edit', compact('friend'));
    }

    public function update(FriendRequest $request, $id)
    {
        $friend = Friend::findOrFail($id);
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
            
        }
        $friend->save();
        session()->flash('success', '友達の情報を保存しました。');

        return redirect("/friend");
    }

    public function destroy($id)
    {
        $friend = Friend::findOrFail($id);
        $file_name = $friend->profile_img;
        $friend->delete();
        
        $delete_path = storage_path() . '/app/public/img/' . $file_name;
        if (\File::exists($delete_path)) {
            // 画像を削除
            \File::delete($delete_path);
        }

        session()->flash('success', '友達を削除しました。');

        return redirect("/friend");
    }
}
