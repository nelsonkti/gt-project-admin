<?php

use Illuminate\Database\Seeder;
use  App\Models\Video\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [
            [
                'name' => '电视剧',
                'tree_level' => '0,',
            ],
            [
                'name' => '电影',
                'tree_level' => '0,',
            ],
            [
                'name' => '综艺',
                'tree_level' => '0,',
            ],
            [
                'name' => '漫画',
                'tree_level' => '0,',
            ],
        ];

        foreach ($list as $v) {
            if ( !Category::query()->where('name',$v['name'])->exists()) {
                Category::query()->create($v);
            }
        }
    }
}
