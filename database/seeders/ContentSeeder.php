<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('contents')->insert([
        'section' => 'slider',
        'slag' => 'main_foto',
        'header' => 'add-a-photo.jpg',
        'description' => '',
        ],
      );
      DB::table('contents')->insert([
        'section' => 'slider',
        'slag' => 'header_1',
        'header' => 'Fast Food Restaurant',
        'description' => 'Doloremque, itaque aperiam facilis rerum, commodi, temporibus sapiente ad mollitia laborum quam quisquam esse error unde. Tempora ex doloremque, labore, sunt repellat dolore, iste magni quos nihil ducimus libero ipsam.',
        ],
      );
      DB::table('contents')->insert([
        'section' => 'slider',
        'slag' => 'header_2',
        'header' => 'Fast Food Restaurant',
        'description' => 'Doloremque, itaque aperiam facilis rerum, commodi, temporibus sapiente ad mollitia laborum quam quisquam esse error unde. Tempora ex doloremque, labore, sunt repellat dolore, iste magni quos nihil ducimus libero ipsam.',
        ],
      );
      DB::table('contents')->insert([
        'section' => 'slider',
        'slag' => 'header_3',
        'header' => 'Fast Food Restaurant',
        'description' => 'Doloremque, itaque aperiam facilis rerum, commodi, temporibus sapiente ad mollitia laborum quam quisquam esse error unde. Tempora ex doloremque, labore, sunt repellat dolore, iste magni quos nihil ducimus libero ipsam.',
        ],
      );
      DB::table('contents')->insert([
        'section' => 'about',
        'slag' => 'foto',
        'header' => 'add-a-photo.jpg',
        'description' => '',
        ],
      );
      DB::table('contents')->insert([
        'section' => 'about',
        'slag' => 'header',
        'header' => 'We Are Feane',
        'description' => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All',
        ],
      );
      DB::table('contents')->insert([
        'section' => 'contact',
        'slag' => 'coordinate',
        'header' => '47.715603;29.976045',
        'description' => '',
        ],
      );
    }
}
