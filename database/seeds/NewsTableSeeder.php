<?php

use Illuminate\Database\Seeder;
use App\Models\News;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->delete();

        for ($i=0; $i < 100; $i++) {
            News::create([
                    'title'   => 'Title '.$i,
                    'meta_description' => 'meta desc ' . $i,
                    'views'    => '1000',
                    'content'    => 'Body '.$i,
                    'user_id' => 1,
                ]);
        }
    }
}
