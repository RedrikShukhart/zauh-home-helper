<?php

use App\Http\Controllers\User\CookingTimeController;
use App\Http\Controllers\User\ProductDislikeController;
use App\Http\Controllers\User\ProductLikeController;
use App\Http\Controllers\User\RecipeController;
use \App\Http\Controllers\User\UserInfoController;
use Illuminate\Support\Facades\Route;

Route::prefix('user')->group(function () {
    Route::get('/', [UserInfoController::class, 'index'])->name('user.user');//главная страничка пользователя

    //Рецепты:
    //страница всех рецептов
    Route::get('recipes', [RecipeController::class, 'index'])->name('user.recipes');
    //страница создания рецепта
    Route::get('recipes/create', [RecipeController::class, 'create'])->name('user.recipes.create');
    //после создания рецепта форма отправляется, это уже post запрос
    Route::post('recipes', [RecipeController::class, 'store'])->name('user.recipes.store');
    //страница для отображения рецепта
    Route::get('recipes/{recipe}', [RecipeController::class, 'show'])->name('user.recipes.show');
    //страница для изменения рецепта
    Route::get('recipes/{recipe}/edit', [RecipeController::class, 'edit'])->name('user.recipes.edit');
    //обновление рецепта
    Route::put('recipes/{recipe}', [RecipeController::class, 'update'])->name('user.recipes.update');
    //удалить рецепт
    Route::delete('recipes/{recipe}', [RecipeController::class, 'delete'])->name('user.recipes.destroy');

    //Время готовки и описание процесса
    Route::resource('dishes', CookingTimeController::class);

    //Понравившиеся продукты
    Route::resource('products', ProductLikeController::class);

    //не понравившиеся продукты
    Route::resource('dislike_products', ProductDislikeController::class);

});
