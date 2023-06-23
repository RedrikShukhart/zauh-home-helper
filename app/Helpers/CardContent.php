<?php

namespace App\Zh_helpers;

use Illuminate\Support\Facades\DB;

interface CardContent
{
    /**
     * Get all short content data for a common page
     */
    public function getAllContent($categoryName, $userId);

    /**
     * Get content for a concrete page
     * @param $id - content-card id
     */
    public function getContent($id, $userId);

    /**
     * Add a new card in data
     */
    public static function addContent($categoryName, array $dataToAdd, $userId);

    /**
     * Update a card data in database
     */
    public function updateContent($id, array $dataToUpdate, $userId);

    /**
     * Set a card in database in status "disable"
     */
    public static function deleteContent($id);
}