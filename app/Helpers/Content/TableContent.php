<?php

namespace App\Zh_helpers\TableContent;

use App\Models\Zh_cards;
use App\Models\Zh_categories;
use App\Zh_helpers\Content\CardContent;
use Illuminate\Support\Facades\DB;

class TableContent implements CardContent
{
    public function getAllContent($tableName, $userId)
    {
        $limit = 5;

        $content = DB::table('zh_cards')
            ->orderBy('zh_cards.id', 'asc')
            ->join('zh_categories', 'zh_cards.card_type_id', 'zh_categories.id')
            ->select('zh_cards.id',
                     'route_name',
                     'title',
                     'short_description',
                     'description')
            ->where('zh_categories.route_name', $tableName)
            ->where('zh_cards.user_id', $userId)
            ->where('zh_cards.status', 'A')
            ->paginate($limit);

            return $content;
    }

    /**
     * Get content for a concrete page
     * @param $id Card Id need to get
     */
    public function getContent($id, $userId)
    {
        $content = Zh_cards::query()
            ->where('user_id', $userId)
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
    public static function addContent($tableName, array $dataToAdd, $userId)
    {
        $id = Zh_categories::getCategoryIdOnRouteName($tableName);

        if (empty($id)) {
            alert("Не удалось добавить запись", 'D');
        } else {
            Zh_cards::query()->create([
                'user_id' => $userId,
                'card_type_id' => $id,
                'title' => $dataToAdd['title'],
                'short_description' => $dataToAdd['short_description']
            ]);

            alert("Запись добавлена", 'S');
        }
    }

    /**
     * Update a card data in database
     */
    public function updateContent($id, array $dataToUpdate, $userId)
    {
        $affected = DB::table('zh_cards')
              ->where('id', $id)
              ->where('user_id', $userId)
              ->update($dataToUpdate);

        if ($affected !== 0) {
            alert("Сохранено", 'S');
        }
    }

    /**
     * Set a card in database in status 'D' - 'disable'
     */
    public static function deleteContent($id)
    {
        DB::table('zh_cards')
            ->where('id', $id)
            ->update(['status'=>'D']);
    }

}
