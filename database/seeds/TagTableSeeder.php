<?php

use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->delete();
        DB::statement('ALTER TABLE tags AUTO_INCREMENT=1');
        DB::table('tags')->insert([
            [
                'name'   => 'Design pattern',
            ],
            [
                'name'   => 'Cache',
            ],
            [
                'name'   => 'Security',
            ],
            [
                'name'   => 'Facade',
            ],
            [
                'name'   => 'Behat',
            ],
            [
                'name'   => 'Fabric',
            ],
            [
                'name'   => 'Bash',
            ],
        ]);
    }
}
