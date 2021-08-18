<?php
namespace App\Utilities;

use App\Post;

/**
 *
 */
class Helper
{
	public static function getRecentPosts($count = 4)
	{
		return Post::orderBy('id', 'desc')
					->paginate($count);
    }


	public static function getRecentNewsUpdates($count = 4)
	{
        return Post::join('posts_categories', 'posts.id', 'posts_categories.post_id')
                            ->join(
                                'posts_category_types',
                                'posts_categories.category_id',
                                'posts_category_types.id')
                            ->where('posts_category_types.category', 'news_update')
                            ->orderBy('posts.id', 'desc')
                            ->select('posts.*')
                            ->paginate($count);
	}
}
