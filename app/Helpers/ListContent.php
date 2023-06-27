<?php

namespace App\Zh_helpers\TableContent;

use App\Models\Zh_cards;
use App\Zh_helpers\CardContent;
use Illuminate\Support\Facades\DB;

class ListContent implements CardContent
{
    public function getAllContent($listName, $userId)
    {
        #code
        $limit = 5;

        $content = DB::table('zh_cards')
            ->orderBy('zh_cards.id', 'asc')
            ->join('zh_categories', 'zh_cards.card_type_id', 'zh_categories.id')
            ->select('zh_cards.id',
                     'route_name',
                     'title',
                     'short_description',
                     'description')
            ->where('zh_categories.route_name', $listName)
            ->where('zh_cards.user_id', $userId)
            ->where('zh_cards.status', 'A')
            ->paginate($limit);

            return $content;
    }

    /**
     * Get content for a concrete page
     * @param $id - content-card id
     */
    public function getContent($id, $userId)
    {
        #code
        $content = Zh_cards::query()
        ->join('zh_categories', 'zh_cards.card_type_id', 'zh_categories.id')
        ->where('zh_cards.user_id', $userId)
        ->findOrFail($id,
            [
                'zh_cards.id',
                'route_name',
                'title',
                'description',
            ]);
// dump($content);
    return $content;
    }

    /**
     * Add a new card in data
     */
    public static function addContent($listName, array $dataToAdd, $userId)
    {
        #code
        $id = getCategoryIdOnRouteName($listName);

        if (empty($id)) {
            alert("Не удалось добавить запись", 'D');
        } else {
            Zh_cards::query()->create([
                'user_id' => $userId,
                'card_type_id' => $id,
                'title' => $dataToAdd['title'],
                'description' => $dataToAdd['description']
            ]);

            alert("Запись добавлена", 'S');
        }
    }

    /**
     * Update a card data in database
     */
    public function updateContent($id, array $dataToUpdate, $userId)
    {
        #code
        $affected = DB::table('zh_cards')
        ->where('id', $id)
        ->where('user_id', $userId)
        ->update($dataToUpdate);

    if ($affected !== 0) {
        alert("Сохранено", 'S');
    }
    }

    /**
     * Set a card in database in status "disable"
     */
    public static function deleteContent($id)
    {
        DB::table('zh_cards')
            ->where('id', $id)
            ->update(['status'=>'D']);
    }
}