<?php

namespace App\Http\Controllers;

use App\ContactAnalysis;
use App\FriendContact;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ContactAnalysisController extends Controller
{
    public function index() {
        $sql = "";
        $sql = " set @rownum=0;";
        $sql = " select @rownum:=@rownum+1 as ranking, friends.name, friend_contacts.contact_count";
        $sql .= " from (";
        $sql .= "   select friend_id, count(*) as contact_count";
        $sql .= "   from friend_contacts";
        $sql .= "   group by friend_id";
        $sql .= "   order by contact_count desc";
        $sql .= "   limit 3";
        $sql .= " ) as friend_contacts";
        $sql .= " left join friends on friends.id = friend_contacts.friend_id";

        $contacts = DB::select($sql);


        // $contact_analysis = $query->get();

        logger($contacts);

        return view('/contactAnalysis/index', compact('contacts'));
    }
}
