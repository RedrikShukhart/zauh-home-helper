<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

if (!function_exists('ktHello')) {
    function ktHello()
    {
//        return app('test');
        return ('Hello from Zauhovna');
    }
}

if (!function_exists('activeLink')) {
    /**
     * Проверка соотвествия текущей странице маршруту и установки линк в активный
     * @return string
     */
    function activeLink(string $name, string $class = 'active'): string
    {
        return Route::is($name) ? $class : '';
    }
}

if (!function_exists('alert')) {
    /**
     * Set text alert notifications and notification color
     * 
     * @param string $text Messege to show
     * @param string $type Messege type: S - sucsess, D - danger, I - info
     * 
     * @return void
     */
    function alert(string $text, string $type): void
    {
        session(['alert' => __($text)]);

        $alertColor = '';
        $type = strtoupper($type);

        switch($type) {
            case 'S': 
                $alertColor = 'success';
                break;
            case 'D': 
                $alertColor = 'danger';
                break;
            case 'I': 
                $alertColor = 'info';
                break;
        }

        session(['alertColor' => $alertColor]);
    }
}

if (!function_exists('getMenuCategories')) {
    /**
     * Получение списка категорий для построения меню
     * 
     * @return Illuminate\Support\Collection
     */
    function getMenuCategories()
    {
        //получение авторизованного пользователя, пока в таком виде
        $userId = 1;

        $categories = DB::table('zh_categories')
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

        return $categories;
    }
}

if (!function_exists('makeTreeCategories')) {
    /**
     * Подготовка данных по родителям из списка с категориями
     * возвращается виде дерева
     */
    function formTreeCategories(Illuminate\Support\Collection $categories)
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
}

// if (!function_exists('printTree')) {
//     function printTree($categories, $rootLevel = 0)
//     {
//         $tree = '';

//         if (is_array($categories) & isset($categories[$rootLevel])) {
//             $tree = '<ul>';
//             foreach ($categories[$rootLevel] as $item) {
//                 $tree .= '<li>' . $item->short_name;
//                 $tree .= printTree($categories, $item->id);
//                 $tree .= '</li>';
//             }
//             $tree .= '</ul>';
//         } else {
//             return false;
//         }

//         return $tree;
//     }
// }

if (!function_exists('getUpdateData')) {
    /**
     * Filtering out what data need to update in the query
     * @param array validatedData Data get after validate
     * 
     * @return array
     */
    function getUpdateData(array $validatedData): array
    {
        $resultData = [];

        $fields = [
            'name',
            'email',
            'current_password',
            'new_password',
            'phone',
            'telegram',
            'title',
            'short_description',
            'description',
            'sourse_link',
            'status',
            'title',
            'short_description',
            'description',
        ];

        foreach ($validatedData as $key => $value) {
            if (in_array($key, $fields) & $value != null) {
                $resultData[$key] = $value;
            }
        }

        return $resultData;
    }
}

if (!function_exists('getCategoryIdOnRouteName')) {
    /**
     * Get category id on category's route name
     * @param string $categoryName Route category name
     * @return void|int id if route exists
     */
    function getCategoryIdOnRouteName($categoryName)
    {
        if (DB::table('zh_categories')->where('route_name', $categoryName)->exists()) {
            return App\Models\Zh_categories::where('route_name', $categoryName)->first()->id;
        }
    }
}

if (!function_exists('getCategoryNameOnRouteName')) {
    /**
     * Get category title-name on category's route name
     * @param string $categoryName Route category name
     * @return void|int id if route exists
     */
    function getCategoryNameOnRouteName($categoryName)
    {
        if (DB::table('zh_categories')->where('route_name', $categoryName)->exists()) {
            return App\Models\Zh_categories::where('route_name', $categoryName)->first()->full_name;
        }
    }
}

if (!function_exists('getViewsValuesOnCategoryId')) {
    /**
     * Get values for views on category's id
     * @param string $categoryName Route category name
     * @return void|mixed Values if route exists
     */
    function getViewsValuesOnCategoryId($categoryName)
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
