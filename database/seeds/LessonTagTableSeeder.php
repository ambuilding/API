<?php

use Illuminate\Database\Seeder;

class LessonTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory(App\Tag::class, 30)->create();

    	$faker = \Faker\Factory::create();

    	$lessonIds = \App\Lesson::pluck('id')->all();
    	$tagIds = \App\Tag::pluck('id')->all();

    	foreach (range(1, 30) as $index) {
    		\DB::table('lesson_tag')->insert([
    			'lesson_id' => $faker->randomElement($lessonIds),
    			'tag_id' => $faker->randomElement($tagIds)
    		]);
    	}
    }
}
