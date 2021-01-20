<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FriendContact;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\FriendContactRequest;

class FriendContactController extends Controller
{
    public function index()
    {
        // TODO:whereにfriend_idを入れたい
        $query = FriendContact::query();
        $contacts = $query->get();

        
        // $contacts->where('friend_id', $friend_id);
                    // ->orderByRaw('contanct_date desc');

        return view('friendContact/index', compact('contacts'));
    }

    public function create($friend_id, $redirect_type)
    {
        logger("@create");
        $contact = new friendContact();
        $contact->friend_id = $friend_id;
        return view('friendContact/create')->with([
            'contact' => $contact,
            'redirect_type' => $redirect_type
        ]);
    }

    public function store(FriendContactRequest $request)
    {
        logger("@store");

        $contact = new FriendContact();
        $contact->user_id = Auth::id();
        $contact->friend_id = $request->friend_id;
        $contact->contact_date = $request->contact_date;
        $contact->detail = $request->detail;

        $contact->save();
        session()->flash('success', 'コンタクトを登録しました。');

        if ($request->redirect_type == 'friend') {
            return redirect("/friend/$contact->friend_id");
        } elseif ($request->redirect_type == 'contact') {
            return redirect("/friendContact");
        }
    }

    public function edit($id, $redirect_type)
    {
        logger("@edit");
        $contact = FriendContact::findOrFail($id);
        return view("/friendContact/edit")->with([
            'contact' => $contact,
            'redirect_type' => $redirect_type
        ]);
    }

    public function update(FriendContactRequest $request, $id)
    {
        logger("@update");
        $contact = FriendContact::findOrFail($id);
        $contact->friend_id = $request->friend_id;
        $contact->contact_date = $request->contact_date;
        $contact->detail = $request->detail;

        $contact->save();
        session()->flash('success', 'コンタクトを保存しました。');

        if ($request->redirect_type == 'friend') {
            logger("redirect_type = friend");
            return redirect("/friend/$contact->friend_id");
        } elseif ($request->redirect_type == 'contact') {
            logger("redirect_type = contact");
            return redirect("/friendContact");
        }
    }

    public function destroy($id, $redirect_type)
    {
        $contact = FriendContact::findOrFail($id);
        $friend_id = $contact->friend_id;
        $contact->delete();
        session()->flash('success', 'コンタクトを削除しました。');

        if ($redirect_type == 'friend') {
            return redirect("/friend/$friend_id");
        } elseif ($redirect_type == 'contact') {
            return redirect("/friendContact");
        }

        return redirect("/friendContact");
    }
}
