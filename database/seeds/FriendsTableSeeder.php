<?php

use Illuminate\Database\Seeder;

class FriendsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('friends')->truncate();

        $friends = [
            [
                'user_id' => '1',
                'last_name' => '竈門',
                'first_name' => '炭治郎',
                'last_name_kana' => 'カマド',
                'first_name_kana' => 'タンジロウ',
                'gender' => '男',
                'tel' => '000-0000-0000',
                'email' => 'sample@example.com',
                'feature' => 'CV：花江夏樹',
                'detail' => '詳細',
                'birthday' => '2005/07/14',
            ],
            [
                'user_id' => '1',
                'last_name' => '竈門',
                'first_name' => '禰豆子',
                'last_name_kana' => 'カマド',
                'first_name_kana' => 'ネズコ',
                'gender' => '女',
                'tel' => '000-0000-0000',
                'email' => 'sample@example.com',
                'feature' => 'CV：鬼頭明里',
                'detail' => '詳細',
                'birthday' => '2005/12/28',
            ],
            [
                'user_id' => '1',
                'last_name' => '我妻',
                'first_name' => '善逸',
                'last_name_kana' => 'アガツマ',
                'first_name_kana' => 'ゼンイツ',
                'gender' => '男',
                'tel' => '000-0000-0000',
                'email' => 'sample@example.com',
                'feature' => 'CV：下野紘',
                'detail' => '詳細',
                'birthday' => '2004/09/03',
            ],
            [
                'user_id' => '1',
                'last_name' => '嘴平',
                'first_name' => '伊之助',
                'last_name_kana' => 'ハシビラ',
                'first_name_kana' => 'イノスケ',
                'gender' => '男',
                'tel' => '000-0000-0000',
                'email' => 'sample@example.com',
                'feature' => 'CV：松岡禎丞',
                'detail' => '詳細',
                'birthday' => '2005/04/22',
            ],
        ];

        foreach($friends as $friend) {
            \App\Friend::create($friend);
        }
    }
}