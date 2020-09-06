<?php

use Illuminate\Database\Seeder;

class HumansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('humans')->truncate();

        $humans = [
            [
                'last_name' => '本田',
                'first_name' => '翼',
                'last_name_kana' => 'ホンダ',
                'first_name_kana' => 'ツバサ',
                'feature' => 'ゲーマー',
                'detail' => '詳細',
                'birthday' => '1994/01/01',
            ],
            [
                'last_name' => '桜井',
                'first_name' => '日奈子',
                'last_name_kana' => 'サクライ',
                'first_name_kana' => 'ヒナコ',
                'feature' => 'おっとり',
                'detail' => '詳細',
                'birthday' => '1994/01/01',
            ],
            [
                'last_name' => '桜庭',
                'first_name' => 'ななみ',
                'last_name_kana' => 'サクラバ',
                'first_name_kana' => 'ナナミ',
                'feature' => '13',
                'detail' => '詳細',
                'birthday' => '1994/01/01',
            ],
        ];

        foreach($humans as $human) {
            \App\Human::create($human);
        }
    }
}
