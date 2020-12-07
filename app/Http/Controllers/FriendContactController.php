<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\friendContact;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\FriendContactRequest;

class FriendContactController extends Controller
{
    public function index($friend_id)
    {
        // TODO:whereにfriend_idを入れたい
        $contacts = friendContact::query();
        $contacts->where('friend_id', $friend_id);
                    // ->orderByRaw('contanct_date desc');

        return view('friendContact/index', compact('contacts'));
    }

    public function create($friend_id)
    {
        logger("FriendContactController@create: " . $friend_id);

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

        logger($contact->detail);

        $contact->save();

        logger($erros);

        return redirect("/friend/$contact->friend_id");
    }
}
