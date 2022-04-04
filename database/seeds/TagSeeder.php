<?php

use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            [ 'name' => 'importante', 'class' => 'danger'],
            [ 'name' => 'tranding', 'class' => 'warning'],
            [ 'name' => 'risolved', 'class' => 'success'],
            [ 'name' => 'smartwork', 'class' => 'info'],
            [ 'name' => 'new', 'class' => 'primary'],
            [ 'name' => 'broken', 'class' => 'secondary']
           
        ];

        foreach ($tags as $tag) {
            $new_tag = new Tag();
            $new_tag->name = $tag['name'];
            $new_tag->class = $tag['class'];
            $new_tag->save();
        }
    }
}
