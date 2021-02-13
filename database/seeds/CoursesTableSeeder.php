<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Course;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 5 ; $i++) {

              $new_course = new Course();
              $new_course->name = $faker->word();
              $new_course->save();
      }
  }
}
