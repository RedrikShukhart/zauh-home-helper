<?php

namespace App\Zh_helpers\Categories;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class Categories
{
    /**
     * Получение списка категорий для построения меню с учетом конкретного юзера
     */
    public static function getMenuCategories()
    {
        //получение авторизованного пользователя, пока в таком виде
        $userId = 1;

        return DB::table('zh_categories')
            ->orderBy('parent_id', 'asc')
            ->orderBy('zh_categories.id', 'asc')
            ->leftJoin('zh_category_views', 'zh_category_views.category_id', '=', 'zh_categories.id')
            ->leftJoin('zh_views', 'zh_category_views.view_id', '=', 'zh_views.id')
            ->select('zh_categories.id AS id',
                'zh_categories.parent_id',
                'zh_categories.path_id',
                'zh_categories.level',
                'zh_categories.route_name',
                'zh_categories.short_name',
                'zh_categories.full_name',

                'zh_category_views.category_id',
                'zh_category_views.view_id AS cat_view_id',

                'zh_views.id AS view_id',
                'zh_views.folder_name'
            )
            ->where('user_id', $userId)
            ->get();
    }

    /**
     * не используется
     * Подготовка данных по родителям из списка с категориями
     * возвращается виде дерева
     */
    public static function formTreeCategories($categories)
    {
        foreach ($categories as $category) {
            $groupedByParent[$category->parent_id][$category->id] = $category;
        }

        foreach ($categories as $category) {
            if (Arr::has($groupedByParent, $category->id)) {
                $category->child = $groupedByParent[$category->id];
            }
        }

        unset($groupedByParent);

        return $categories->where('parent_id', 0);
    }

    /**
     * Формирование дерева категорий
     */
    public static function getCategoryTree()
    {
        $categories = self::getMenuCategories();

        foreach ($categories as $category) {
            $groupedByParent[$category->parent_id][$category->id] = $category;
        }

        foreach ($categories as $category) {
            if (Arr::has($groupedByParent, $category->id)) {
                $category->child = $groupedByParent[$category->id];
            }
        }

        unset($groupedByParent);

        return $categories->where('parent_id', 0);
    }

    /**
     * Get values for views on category's id
     *
     * @param string $categoryName Route category name
     * @return void|mixed Values if route exists
     */
    public static function getViewsValuesOnCategoryId($categoryName)
    {
        //потом получать пользователя по авторизации, пока так
        $userId = 1;

        $vars = DB::table('zh_views_values_variants')
            ->join('zh_views_values', 'zh_views_values.id', 'zh_views_values_variants.view_var_id')
            ->join('zh_categories', 'zh_categories.id', 'zh_views_values_variants.view_category_id')
            ->select('view_var',
                'var_variant'
            )
            ->where('zh_views_values_variants.user_id', $userId)
            ->where('zh_categories.route_name', $categoryName)
            ->get();

        $vars->toArray();

        $result = [];
        foreach ($vars as $var) {
            $result[$var->view_var] = $var->var_variant;
        }

        return (object) $result;
    }
}
