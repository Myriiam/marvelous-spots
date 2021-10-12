<?php

namespace Database\Seeders;

use App\Models\ArticleComment;
use App\Models\Category;
use App\Models\FavoriteGuide;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            UserSeeder::class,
            GuideSeeder::class,
            ContactSeeder::class,
            CategorySeeder::class,
            LanguageSeeder::class,
            GuideLanguageSeeder::class,
            CategoryGuideSeeder::class,
            ArticleSeeder::class,
            ArticleCategorySeeder::class,
            PictureSeeder::class,
            BookingSeeder::class,
            CommentGuideSeeder::class,
            FavoriteGuideSeeder::class,
            ArticleCommentSeeder::class,
        ]);
    }
}
