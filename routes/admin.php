<?php

use App\Http\Controllers\Admin\RecipeController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    Route::get('/admin')->name('admin');//главная страничка пользователя


    //страница всех рецептов
    Route::get('recipes', [RecipeController::class, 'index'])->name('admin.recipes');

//страница создания рецепта
    Route::get('recipes/create', [RecipeController::class, 'create'])->name('admin.recipes.create');
//после создания рецепта форма отправляется, это уже post запрос
    Route::post('recipes', [RecipeController::class, 'store'])->name('admin.recipes.store');

//страница для отображения рецепта
    Route::get('recipes/{recipe}', [RecipeController::class, 'show'])->name('admin.recipes.show');
//страница для изменения рецепта
    Route::get('recipes/{recipe}/edit', [RecipeController::class, 'edit'])->name('admin.recipes.edit');
//обновление рецепта
    Route::put('recipes/{recipe}', [RecipeController::class, 'update'])->name('admin.recipes.update');
//удалить рецепт
    Route::delete('recipes/{recipe}', [RecipeController::class, 'delete'])->name('admin.recipes.destroy');
});
