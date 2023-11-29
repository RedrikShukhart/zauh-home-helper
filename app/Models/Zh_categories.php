<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zh_categories extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'parent_id',
        'path_id',
        'level',
        'user_id',
        'route_name',
        'short_name',
        'full_name',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [

    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [

    ];


    /**
     * Get category id on category's route name
     *
     * @param string $categoryName Route category name
     * @return void|int id if route exists
     */
    public static function getCategoryIdOnRouteName(string $categoryName)
    {
        if (self::where('route_name', $categoryName)->exists()) {
            return self::where('route_name', $categoryName)->first()->id;
        }
    }

    /**
     * Get category title-name on category's route name
     *
     * @param string $categoryName Route category name
     * @return void|int id if route exists
     */
    public static function getCategoryNameOnRouteName(string $categoryName)
    {
        if (self::where('route_name', $categoryName)->exists()) {
            return self::where('route_name', $categoryName)->first()->full_name;
        }
    }

    /**
     * Получение данных по childName для хлебных крошек
     * @param string $childName Child category name
     * @return object|void if route exists
     */
    public static function getParentOnChildName(string $childName)
    {
        if (self::where('route_name', $childName)->exists()) {
            $parent = self::where('id', function ($query) use ($childName) {
                        $query->select('parent_id')
                              ->from('zh_categories')
                              ->where('route_name', $childName);
                      })->first();

            return (object) [
                'id' => $parent->id,
                'route_name' => $parent->route_name,
                'full_name' => $parent->full_name
            ];
        }
    }

//    public static function getParentsPathForCard($childName)
//    {
//        if (self::where('route_name', $childName)->exists()) {
//            return self::where('route_name', $childName)
//                ->first()->path_id;
//        }
//    }
//
//    public static function getParentsPathForChildCategory($childName)
//    {
//        if (self::where('route_name', $childName)->exists()) {
//        return self::where('id', function ($query) use ($childName) {
//            $query->select('parent_id')
//                ->from('zh_categories')
//                ->where('route_name', $childName);
//        })->first()->path_id;
//        }
//    }
//
//    public static function getParents($path)
//    {
//        $parents = [];
//        foreach (explode('/', $path) as $item) {
//            $parent = self::find($item);
//
//            $parents[] = (object) [
//                'id' => $parent->id,
//                'route_name' => $parent->route_name,
//                'full_name' => $parent->full_name
//            ];
//        }
//        return $parents;
//    }

    /**
     * Получение прародителей и родителя для конкретной карточки в категории
     * Использование для хлебных крошек
     * @param $childName string Child category name
     * @return array|void if route exists
     */
    public static function getParentsForCard(string $childName)
    {
        if (self::where('route_name', $childName)->exists()) {
            $parents = self::getParentsForChildCategory($childName);

            $parentCategory = self::where('route_name', $childName)->first();
            $parents['parent']= (object) [
                'id' => $parentCategory->id,
                'route_name' => $parentCategory->route_name,
                'full_name' => $parentCategory->full_name
            ];

            return $parents;
        }
    }

    /**
     * Получение прародителей для категории при просмотре всех
     * Использование для хлебных крошек
     * @param $childName string Child category name
     * @return array|void if route exists
     */
    public static function getParentsForChildCategory(string $childName)
    {
        if (self::where('route_name', $childName)->exists()) {
            $path = self::where('id', function ($query) use ($childName) {
                $query->select('parent_id')
                    ->from('zh_categories')
                    ->where('route_name', $childName);
                })->first()->path_id;

        $parents = [];
        foreach (explode('/', $path) as $item) {
            $parent = self::find($item);

            $parents['grand_parents'][] = (object) [
                'id' => $parent->id,
                'route_name' => $parent->route_name,
                'full_name' => $parent->full_name
            ];
        }
        return $parents;
        }
    }
}
