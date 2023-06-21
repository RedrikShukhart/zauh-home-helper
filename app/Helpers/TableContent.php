<?php

namespace App\Zh_helpers\TableContent;

use App\Models\Zh_cards;
use App\Zh_helpers\CardContent;
use Illuminate\Support\Facades\DB;

class TableContent implements CardContent
{
    //для этого свойства нужно получение айди уже потом по авторизации, пока так
    public $userId = 1;

    public function getAllContent($tableName)
    {
        $content = DB::table('zh_cards')
            ->orderBy('zh_cards.id', 'asc')
            ->join('zh_categories', 'zh_cards.card_type_id', 'zh_categories.id')
            ->select('zh_cards.id',
                     'title',
                     'short_description',
                     'description')
            ->where('zh_categories.route_name', $tableName)
            ->where('zh_cards.user_id', $this->userId)
            ->where('zh_cards.status', 'A')
            ->get();

            return $content->toArray();
    }

    /**
     * Get content for a concrete page
     */
    public function getContent($id)
    {
        #code
        $content = Zh_cards::query()
            ->where('user_id', $this->userId)
            ->findOrFail($id,
                [
                    'id',
                    'title',
                    'short_description',
                    'description',
                ]);
        return $content;
    }

    /**
     * Add a new card in data
     */
    public function addContent()
    {
        #code
    }
    
    /**
     * Update a card data in database
     */
    public function updateContent($id, $dataToUpdate)
    {
        #code

        $affected = DB::table('zh_cards')
              ->where('id', $id)
              ->where('user_id', $this->userId)
              ->update($dataToUpdate);

        if ($affected !== 0) {
            alert("Сохранено", 'S');
        }
    }
    
    /**
     * Set a card in database in status "disable"
     */
    public function deleteContent()
    {
        #code
    }

}