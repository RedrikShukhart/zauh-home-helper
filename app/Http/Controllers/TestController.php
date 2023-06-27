<?php

namespace App\Http\Controllers;

use App\Models\Zh_views;
use App\Models\Zh_categories;
use App\Models\Zh_category_views;
use App\Models\Zh_cards;
use App\Models\Zh_views_values;
use App\Models\Zh_views_values_variants;


use Illuminate\Http\Request;

class TestController extends Controller
{
    public function __invoke()
    {
        // for ($i = 0; $i < 55; $i++) {
        //     Post::query()->create([
        //         'user_id' => User::query()->value('id'),
        //         'title' => fake()->sentence(),
        //         'content' => fake()->paragraph(),
        //         'published' => true,
        //         'published_at' => fake()->dateTimeBetween(now()->subYear(), now()),
        //     ]);  
        // }
        
// заполнение типов вью BEGIN
        // Zh_views::query()->create([
        //     'view_name' => 'альбом',
        //     'folder_name' => 'album',
        // ]);

        // Zh_views::query()->create([
        //     'view_name' => 'карточка товара',
        //     'folder_name' => 'cards',
        // ]);

        // Zh_views::query()->create([
        //     'view_name' => 'список - ссылки',
        //     'folder_name' => 'link-list',
        // ]);

        // Zh_views::query()->create([
        //     'view_name' => 'список - таблица',
        //     'folder_name' => 'table-list',
        // ]);
// заполнение типов вью END


// заполнение категорий BEGIN
        //раздел самого верхнего уровня Готовка
        // Zh_categories::query()->create([
        //     'parent_id' => 0,
        //     'path_id' => '1',
        //     'level' => '0',
        //     'user_id' => '1',
        //     'route_name' => 'gotovka',
        //     'short_name' => 'Готовка',
        //     'full_name' => 'Готовка',
        // ]);
        //следующий раздел самого верхнего уровня
        //     Zh_categories::query()->create([
        //         'parent_id' => 0,
        //         'path_id' => '2',
        //         'level' => '0',
        //         'user_id' => '1',
        //         'route_name' => 'razmery',
        //         'short_name' => 'Размеры',
        //         'full_name' => 'Размеры',
        //     ]);

        // Zh_categories::query()->create([
        //     'parent_id' => 1,
        //     'path_id' => '1/3',
        //     'level' => '1',
        //     'user_id' => '1',
        //     'route_name' => 'recepty',
        //     'short_name' => 'Рецепты',
        //     'full_name' => 'Все рецепты',
        // ]);
        // Zh_categories::query()->create([
        //     'parent_id' => 1,
        //     'path_id' => '1/4',
        //     'level' => '1',
        //     'user_id' => '1',
        //     'route_name' => 'gotovka-nuansy',
        //     'short_name' => 'Нюансы приготовления',
        //     'full_name' => 'Нюансы приготовления',
        // ]);

        // Zh_categories::query()->create([
        //     'parent_id' => 1,
        //     'path_id' => '1/5',
        //     'level' => '1',
        //     'user_id' => '1',
        //     'route_name' => 'vkusno',
        //     'short_name' => 'Вкусные товары',
        //     'full_name' => 'Понравившиеся товары и продукты',
        // ]);
        // Zh_categories::query()->create([
        //     'parent_id' => 1,
        //     'path_id' => '1/6',
        //     'level' => '1',
        //     'user_id' => '1',
        //     'route_name' => 'ne-vkusno',
        //     'short_name' => 'Не вкусные товары',
        //     'full_name' => 'Не понравившиеся товары и продукты',
        // ]);

        // Zh_categories::query()->create([
        //     'parent_id' => 4,
        //     'path_id' => '1/4/7',
        //     'level' => '2',
        //     'user_id' => '1',
        //     'route_name' => 'cook-time',
        //     'short_name' => 'Время готовки',
        //     'full_name' => 'Время готовки',
        // ]);
        // Zh_categories::query()->create([
        //     'parent_id' => 4,
        //     'path_id' => '1/4/8',
        //     'level' => '2',
        //     'user_id' => '1',
        //     'route_name' => 'proporcii',
        //     'short_name' => 'Пропорции',
        //     'full_name' => 'Пропорции',
        // ]);
        // Zh_categories::query()->create([
        //     'parent_id' => 4,
        //     'path_id' => '1/4/9',
        //     'level' => '2',
        //     'user_id' => '1',
        //     'route_name' => 'opisanie-processov',
        //     'short_name' => 'Описание процессов',
        //     'full_name' => 'Описание процессов',
        // ]);


        // Zh_categories::query()->create([
        //     'parent_id' => 2,
        //     'path_id' => '2/10',
        //     'level' => '1',
        //     'user_id' => '1',
        //     'route_name' => 'gabarity-zauh',
        //     'short_name' => 'Габариты Заюх',
        //     'full_name' => 'Габариты Заюх',
        // ]);
        // Zh_categories::query()->create([
        //     'parent_id' => 2,
        //     'path_id' => '2/11',
        //     'level' => '1',
        //     'user_id' => '1',
        //     'route_name' => 'gabarity-zauhovna',
        //     'short_name' => 'Габариты Заюховна',
        //     'full_name' => 'Габариты Заюховна',
        // ]);
// заполнение категорий END

// заполнение связей категория-вью BEGIN
        // Zh_category_views::query()->create([
        //     'category_id' => 3,
        //     'view_id' => 2,
        //     ]);

        // Zh_category_views::query()->create([
        //     'category_id' => 4,
        //     'view_id' => 3,
        //     ]);
        // Zh_category_views::query()->create([
        //     'category_id' => 5,
        //     'view_id' => 1,
        //     ]);
        // Zh_category_views::query()->create([
        //     'category_id' => 6,
        //     'view_id' => 3,
        //     ]);
        // Zh_category_views::query()->create([
        //     'category_id' => 7,
        //     'view_id' => 3,
        //     ]);
        // Zh_category_views::query()->create([
        //     'category_id' => 8,
        //     'view_id' => 4,
        //     ]);

        // Zh_category_views::query()->create([
        //     'category_id' => 9,
        //     'view_id' => 3,
        //     ]);
        // Zh_category_views::query()->create([
        //     'category_id' => 10,
        //     'view_id' => 4,
        //     ]);
        // Zh_category_views::query()->create([
        //     'category_id' => 11,
        //     'view_id' => 4,
        //     ]);
// заполнение связей категория-вью END

        // Zh_cards::query()->create([
        //     'user_id' => 1,
        //     'card_type_id' => 7,
        //     'title' => 'Сибас в духовке в фольге',
        //     'short_description' => '25 минут',
        //     ]);

        // Zh_cards::query()->create([
        //     'user_id' => 1,
        //     'card_type_id' => 7,
        //     'title' => 'Вареники с картошкой',
        //     'short_description' => '7 минут',
        //     ]);
        // Zh_cards::query()->create([
        //     'user_id' => 1,
        //     'card_type_id' => 7,
        //     'title' => 'Хинкали',
        //     'short_description' => '11 минут',
        //     ]);
        // Zh_cards::query()->create([
        //     'user_id' => 1,
        //     'card_type_id' => 7,
        //     'title' => 'Яйца в мешочек',
        //     'short_description' => '5 минут',
        //     ]);
        // Zh_cards::query()->create([
        //     'user_id' => 1,
        //     'card_type_id' => 7,
        //     'title' => 'Курица с сулугуни в духовке',
        //     'short_description' => '15 минут',
        //     ]);

        echo 'ok';

// заполнение vars вью BEGIN
        // Zh_views_values::query()->create([
        //     'view_id' => 4,
        //     'view_var' => 'title',
        // ]);

        // Zh_views_values::query()->create([
        //     'view_id' => 4,
        //     'view_var' => 'description',
        // ]);

        // Zh_views_values::query()->create([
        //     'view_id' => 2,
        //     'view_var' => 'features',
        // ]);

        // Zh_views_values::query()->create([
        //     'view_id' => 2,
        //     'view_var' => 'feature_name',
        // ]);

        // Zh_views_values::query()->create([
        //     'view_id' => 2,
        //     'view_var' => 'feature_amount',
        // ]);

        // Zh_views_values::query()->create([
        //     'view_id' => 2,
        //     'view_var' => 'description',
        // ]);




// заполнение vars вью END

        // Zh_views_values_variants::query()->create([
        //     'user_id' => 1,
        //     'view_var_id' => 1,
        //     'view_category_id' => 7,
        //     'var_variant' => 'наименование продукта',
        // ]);

        // Zh_views_values_variants::query()->create([
        //         'user_id' => 1,
        //         'view_var_id' => 1,
        //         'view_category_id' => 7,
        //         'var_variant' => 'время приготовления',
        //     ]);

        // Zh_views_values_variants::query()->create([
        //     'user_id' => 1,
        //     'view_var_id' => 1,
        //     'view_category_id' => 8,
        //     'var_variant' => 'Наименование продукта',
        // ]);

        // Zh_views_values_variants::query()->create([
        //         'user_id' => 1,
        //         'view_var_id' => 2,
        //         'view_category_id' => 8,
        //         'var_variant' => 'Пропорции',
        // ]);

        // Zh_views_values_variants::query()->create([
        //         'user_id' => 1,
        //         'view_var_id' => 1,
        //         'view_category_id' => 10,
        //         'var_variant' => 'Наименование',
        // ]);
    
        // Zh_views_values_variants::query()->create([
        //         'user_id' => 1,
        //         'view_var_id' => 2,
        //         'view_category_id' => 10,
        //         'var_variant' => 'Габариты - Размеры',
        // ]);

        // Zh_views_values_variants::query()->create([
        // 'user_id' => 1,
        // 'view_var_id' => 1,
        // 'view_category_id' => 11,
        // 'var_variant' => 'Наименование',
        // ]);

        // Zh_views_values_variants::query()->create([
        //         'user_id' => 1,
        //         'view_var_id' => 2,
        //         'view_category_id' => 11,
        //         'var_variant' => 'Габариты - Размеры',
        // ]);


        // Zh_cards::query()->create([
        //     'user_id' => 1,
        //     'card_type_id' => 9,
        //     'title' => 'Запеченая свинина',
        //     'description' => 'На запекание свинины в духовке хорошо подходят окорок и лопатка
        //     Сухой чеснок
        //     Гвоздика
        //     Мускатный орех
        //     Кореандр молотый
        //     Сухая аджика 
        //     Если делать именно буженину, то есть сформировать кусочек перевязав джутом слегка добавляем масла подсолнечного, чтобы специи прилипли
        //     Соли, черного перца и даем помариноваться
        //     Кладем и заворачиваем в «конвертик» из бумаги, но оставляем так, чтобы лишняя влага выходила. В духовку 180 градусов. На небольшой кусочек 30-40 минут так готовим, потом открыть надо будет мясо. В общей сложности примерно 1,5-2 часа готовить
        //     Чеснок в пасту превратив и с маслом сливочным растопленным перемешав намазываем на свинину. Заворачиваем в пленку и кладем в холодильник остывать полностью',
        //     ]);



        // Zh_views_values::query()->create([
        //     'view_id' => 3,
        //     'view_var' => 'title',
        // ]);

        // Zh_views_values::query()->create([
        //     'view_id' => 3,
        //     'view_var' => 'description',
        // ]);


        // Zh_views_values_variants::query()->create([
        //     'user_id' => 1,
        //     'view_var_id' => 7,
        //     'view_category_id' => 9,
        //     'var_variant' => 'Название',
        // ]);

        // Zh_views_values_variants::query()->create([
        //         'user_id' => 1,
        //         'view_var_id' => 8,
        //         'view_category_id' => 9,
        //         'var_variant' => 'Описание процесса',
        //     ]);

    }
}
