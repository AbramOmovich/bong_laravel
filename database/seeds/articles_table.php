<?php

use Illuminate\Database\Seeder;

class articles_table extends Seeder
{
    private $faker;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $db = DB::table('articles');

        $db->truncate();

        $this->faker = Faker\Factory::create();

        for($i = 0; $i < 50; $i++){

            $values ['title']= $this->faker->sentence;
            $values ['slug'] = str_slug($values['title']);
            $values ['body'] = $this->faker->realText(3000);
            $values ['short_descr']= str_limit($values['body'],300);
            $values ['created']= $this->faker->dateTimeBetween('-1 years');
            $values ['updated'] = clone $values['created'];
            $values ['updated']->add($values['created']->diff(new $this->faker->dateTimeBetween('-1 years'),true));

            $db->insert($values);
        }

    }
}