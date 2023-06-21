<?php

namespace App\Zh_helpers;

use Illuminate\Support\Facades\DB;

interface CardContent
{

    //нужны методы: определения, - какой именно тип карточки нам поступил,
    // - методы получения данных для каждого типа карточки
    // - метод выдающий итоговые данные для общих страниц
    // - веротно метод выдающий итоговые данные для каждой карточки
/**
 * Get all short content data for a common page
 */
public function getAllContent($tableName);

/**
 * Get content for a concrete page
 * @param $id - content-card id
 */
public function getContent($id);

/**
 * Add a new card in data
 */
public function addContent();

/**
 * Update a card data in database
 */
public function updateContent($id, $validatetContent);

/**
 * Set a card in database in status "disable"
 */
public function deleteContent();

}