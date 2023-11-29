<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

if (!function_exists('ktHello')) {
    function ktHello()
    {
        return ('Hello from Zauhovna');
    }
}

if (!function_exists('activeLink')) {
    /**
     * Проверка соотвествия текущей странице маршруту и установки линк в активный
     *
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
     * @param string $text Message to show
     * @param string $type Message type: S - success, D - danger, I - info
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

if (!function_exists('getParentTree')) {
    /**
     * Переделанное, работает
     * в функции нет возврата, самое главное в ней, что она изменяет значение
     * переменной $result, которое потом используется в дальнейшем в контроллере
     */
    function getParentTree($categories, $name, &$result)
    {
        foreach ($categories as $category) {
            if (isset($category->child) && ($category->route_name === $name)) {
                $result = $category;
                break;
            } else {
                if (isset($category->child)) {
                    getParentTree($category->child, $name, $result);
                }
            }
        }
    }
}

///**
// * переделать для отрисовки дерева на шаблон показа категорий родительских
// * использование для HomeParentCategoriesController
// */
// if (!function_exists('printParentTree')) {
//     function printParentTree($categories, $rootLevel = 0)
//     {
//         $tree = '';
//
//         if (is_array($categories) & isset($categories[$rootLevel])) {
//             $tree = '<ul>';
//             foreach ($categories[$rootLevel] as $item) {
//                 $tree .= '<li>' . $item->short_name;
//                 $tree .= printParentTree($categories, $item->id);
//                 $tree .= '</li>';
//             }
//             $tree .= '</ul>';
//         } else {
//             return false;
//         }
//
//         return $tree;
//     }
// }

if (!function_exists('getUpdateData')) {
    /**
     * Filtering out what data need to update in the query
     *
     * @param array validatedData Data get after validate
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

//if (!function_exists('getCategoryIdOnRouteName')) {
//    /**
//     * ПЕРЕНЕСЕНО В МОДЕЛЬ
//     * Get category id on category's route name
//     *
//     * @param string $categoryName Route category name
//     * @return void|int id if route exists
//     */
//    function getCategoryIdOnRouteName($categoryName)
//    {
//        if (DB::table('zh_categories')->where('route_name', $categoryName)->exists()) {
//            return App\Models\Zh_categories::where('route_name', $categoryName)->first()->id;
//        }
//    }
//}

//if (!function_exists('getCategoryNameOnRouteName')) {
//    /**
//     * ПЕРЕНЕСЕНО В МОДЕЛЬ
//     * Get category title-name on category's route name
//     *
//     * @param string $categoryName Route category name
//     * @return void|int id if route exists
//     */
//    function getCategoryNameOnRouteName($categoryName)
//    {
//        if (DB::table('zh_categories')->where('route_name', $categoryName)->exists()) {
//            return App\Models\Zh_categories::where('route_name', $categoryName)->first()->full_name;
//        }
//    }
//}

//if (!function_exists('getViewsValuesOnCategoryId')) {
//    /**
//     * НЕ ИСПОЛЬЗУЕТСЯ, ПЕРЕНЕСЕНО В ОТДЕЛЬНЫЙ КЛАСС
//     * Get values for views on category's id
//     *
//     * @param string $categoryName Route category name
//     * @return void|mixed Values if route exists
//     */
//    function getViewsValuesOnCategoryId($categoryName)
//    {
//        //потом получать пользователя по авторизации, пока так
//        $userId = 1;
//
//        $vars = DB::table('zh_views_values_variants')
//            ->join('zh_views_values', 'zh_views_values.id', 'zh_views_values_variants.view_var_id')
//            ->join('zh_categories', 'zh_categories.id', 'zh_views_values_variants.view_category_id')
//            ->select('view_var',
//                        'var_variant'
//                        )
//            ->where('zh_views_values_variants.user_id', $userId)
//            ->where('zh_categories.route_name', $categoryName)
//            ->get();
//
//        $vars->toArray();
//
//        $result = [];
//        foreach ($vars as $var) {
//            $result[$var->view_var] = $var->var_variant;
//        }
//
//        return (object) $result;
//    }
//}
