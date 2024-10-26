<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Page;
use App\Models\User;

class CategorySeeder extends Seeder
{
    public function run()
    {
        // テストユーザーを取得または作成
        $user = User::firstOrCreate([
            'email' => 'testuser@example.com'
        ], [
            'name' => 'Test User',
            'password' => bcrypt('password'),
        ]);

        // 親カテゴリを作成
        for ($i = 1; $i <= 3; $i++) {
            $parentCategory = Category::create([
                'name' => 'Parent Category ' . $i,
                'description' => 'Description for Parent Category ' . $i,
                'user_id' => $user->id,
            ]);

            // 子カテゴリを作成
            for ($j = 1; $j <= 2; $j++) {
                $childCategory = Category::create([
                    'name' => 'Child Category ' . $i . '-' . $j,
                    'description' => 'Description for Child Category ' . $i . '-' . $j,
                    'user_id' => $user->id,
                    'parent_id' => $parentCategory->id,
                ]);

                // 子カテゴリにページを作成
                for ($k = 1; $k <= 2; $k++) {
                    Page::create([
                        'title' => 'Page ' . $i . '-' . $j . '-' . $k,
                        'content' => 'Content for Page ' . $i . '-' . $j . '-' . $k,
                        'user_id' => $user->id,
                        'category_id' => $childCategory->id,
                    ]);
                }
            }
        }
    }
}

