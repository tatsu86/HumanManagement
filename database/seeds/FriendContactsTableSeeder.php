<?php

use Illuminate\Database\Seeder;

class FriendContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('friend_contacts')->truncate();

        $contacts = [
            [
                'user_id' => 1,
                'friend_id' => 1,
                'contact_date' => '2021/01/01',
                'detail' => 'ゲームをして遊んだ。',
            ],
            [
                'user_id' => 1,
                'friend_id' => 1,
                'contact_date' => '2021/01/02',
                'detail' => 'カフェで勉強をした。',
            ],
            [
                'user_id' => 1,
                'friend_id' => 1,
                'contact_date' => '2021/01/05',
                'detail' => '買い物に付き合ってもらった',
            ],
            [
                'user_id' => 1,
                'friend_id' => 2,
                'contact_date' => '2021/01/01',
                'detail' => '久しぶりにジャンカラに行った。',
            ],
            [
                'user_id' => 1,
                'friend_id' => 3,
                'contact_date' => '2021/01/03',
                'detail' => 'zoomで飲み会をした。',
            ],
            [
                'user_id' => 1,
                'friend_id' => 3,
                'contact_date' => '2021/01/04',
                'detail' => 'Among Usをした。',
            ],
        ];

        foreach($contacts as $contact) {
            \App\FriendContact::create($contact);
        }
    }
}
