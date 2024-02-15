<?php

namespace App\Helpers\Content\AlbumContent;

use App\Zh_helpers\Content\CardContent;
use App\Models\Zh_cards;
use App\Models\Zh_categories;
use Illuminate\Support\Facades\DB;

class AlbumContent implements CardContent
{

    /**
     * @inheritDoc
     */
    public function getAllContent($categoryName, $userId)
    {
        // TODO: Implement getAllContent() method.
    }

    /**
     * @inheritDoc
     */
    public function getContent($id, $userId)
    {
        // TODO: Implement getContent() method.
    }

    /**
     * Add a new card in data
     * @inheritDoc
     */
    public static function addContent($albumName, array $dataToAdd, $userId)
    {
        // TODO: Implement addContent() method.
        $id = Zh_categories::getCategoryIdOnRouteName($albumName);
    }

    /**
     * @inheritDoc
     */
    public function updateContent($id, array $dataToUpdate, $userId)
    {
        // TODO: Implement updateContent() method.
    }

    /**
     * @inheritDoc
     */
    public static function deleteContent($id)
    {
        // TODO: Implement deleteContent() method.
    }
}
