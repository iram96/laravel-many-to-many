<?php
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Post;
use App\Models\Category;
class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        $category_ids = Category::pluck('id')->toArray();
        
        for ($i = 0;$i < 4; $i++ ){
            $post = new Post();
            $post->category_id = Arr::random($category_ids);
            $post->title = $faker->text(15);
            $post->post_content = $faker->text( 20);
            $post->image = $faker->imageurl(150, 150);
            $post->slug = Str::slug($post->title, '-');
            $post->save();
        }
    }
}
