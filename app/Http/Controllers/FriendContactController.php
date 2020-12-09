<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\friendContact;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\FriendContactRequest;

class FriendContactController extends Controller
{
    public function index()
    {
        // TODO:whereにfriend_idを入れたい
        $query = friendContact::query();
        $contacts = $query->get();

        
        // $contacts->where('friend_id', $friend_id);
                    // ->orderByRaw('contanct_date desc');

        return view('friendContact/index', compact('contacts'));
    }

    public function create($friend_id)
    {
        logger("@create");
        $contact = new friendContact();
        $contact->friend_id = $friend_id;
        return view('friendContact/create', compact('contact'));
    }

    public function store(FriendContactRequest $request)
    {
        logger("@store");

        $contact = new friendContact();
        $contact->user_id = Auth::id();
        $contact->friend_id = $request->friend_id;
        $contact->contact_date = $request->contact_date;
        $contact->detail = $request->detail;

        $contact->save();
        return redirect("/friend/$contact->friend_id");
    }

    public function edit($id)
    {
        logger("@edit");
        $contact = friendContact::findOrFail($id);
        return view("/friendContact/edit", compact('contact'));
    }

    public function update(FriendContactRequest $request, $id)
    {
        logger("@update");
        $contact = friendContact::findOrFail($id);
        $contact->friend_id = $request->friend_id;
        $contact->contact_date = $request->contact_date;
        $contact->detail = $request->detail;

        $contact->save();
        return redirect("/friendContact");
    }

    public function destroy($id)
    {

        $contact = friendContact::findOrFail($id);
        $contact->delete();

        //TODO:進捗詳細を開く時に、削除ボタンのアクションを引数で渡す
        //フレンド画面から開いた場合　→　フレンド画面
        //進捗一覧から開いた場合　→　進捗一覧
        return redirect("/friendContact");
    }
}
