<?php

use Illuminate\Database\Seeder;

use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['label' => 'Html', 'color' => 'danger'],
            ['label' => 'PHP', 'color' => 'primary'],
            ['label' => 'Css', 'color' => 'info'],
            ['label' => 'Laravel', 'color' => 'warning'],
            ['label' => 'Vue', 'color' => 'success'],
            ['label' => 'Sass', 'color' => 'dark']
        ];

        foreach($categories as $category){
            $myCategory = new Category();
            $myCategory->label = $category['label'];
            $myCategory->color = $category['color'];
            $myCategory->save();
        }

    }
}
