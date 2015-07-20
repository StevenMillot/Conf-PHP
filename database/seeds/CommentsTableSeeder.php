<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->delete();
        DB::statement('ALTER TABLE comments AUTO_INCREMENT=1');
        DB::table('comments')->insert([
            [
                'post_id' => 1,
                'email' => 'toto@gmail.com',
                'content' => 'Prem\'s troll XD',
            ],
            [
                'post_id' => 1,
                'email' => 'titi@gmail.com',
                'content' => 'Merci beaucoup',
            ],
            [
                'post_id' => 2,
                'email' => 'tata@gmail.com',
                'content' => 'C\'est genial:P',
            ],
            [
                'post_id' => 3,
                'email' => 'tutu@gmail.com',
                'content' => 'Super post merci a vous',
            ],
        ]);
    }
}
