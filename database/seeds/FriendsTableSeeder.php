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
                'user_id' => 1,
                'name' => '竈門 炭治郎',
                'name_kana' => 'カマド タンジロウ',
                'gender' => '男',
                'tel' => '000-0000-0000',
                'email' => 'sample@example.com',
                'feature' => 'CV：花江夏樹',
                'detail' => '詳細',
                'birthday' => '2005/07/14',
            ],
            [
                'user_id' => 1,
                'name' => '竈門 禰豆子',
                'name_kana' => 'カマド ネズコ',
                'gender' => '女',
                'tel' => '000-0000-0000',
                'email' => 'sample@example.com',
                'feature' => 'CV：鬼頭明里',
                'detail' => '詳細',
                'birthday' => '2005/12/28',
            ],
            [
                'user_id' => 1,
                'name' => '我妻 善逸',
                'name_kana' => 'アガツマ ゼンイツ',
                'gender' => '男',
                'tel' => '000-0000-0000',
                'email' => 'sample@example.com',
                'feature' => 'CV：下野紘',
                'detail' => '詳細',
                'birthday' => '2004/09/03',
            ],
            [
                'user_id' => 1,
                'name' => '嘴平 伊之助',
                'name_kana' => 'ハシビラ イノスケ',
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