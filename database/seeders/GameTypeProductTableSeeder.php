<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GameTypeProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            // Mapping based on products.sql game_type field to game_type.sql id
            // product_id => 1, game_type => 'SLOT' -> game_type_id => 1
            ['product_id' => 1, 'game_type_id' => 1, 'image' => 'pp_play.png', 'rate' => 1.0000],
            // product_id => 2, game_type => 'LIVE_CASINO_PREMIUM' -> game_type_id => 14
            ['product_id' => 2, 'game_type_id' => 14, 'image' => 'Pragmatic_Play_Casino.png', 'rate' => 1.0000],
            // product_id => 3, game_type => 'VIRTUAL_SPORT' -> game_type_id => 4
            ['product_id' => 3, 'game_type_id' => 4, 'image' => 'pp_play.png', 'rate' => 1.0000],
            // product_id => 4, game_type => 'LIVE_CASINO' -> game_type_id => 2
            ['product_id' => 4, 'game_type_id' => 2, 'image' => 'Pragmatic_Play_Casino.png', 'rate' => 1.0000],

            // product_id => 5, game_type => 'SLOT' -> game_type_id => 1
            ['product_id' => 5, 'game_type_id' => 1, 'image' => 'PG_Soft.png', 'rate' => 1.0000],
            // product_id => 6, game_type => 'SLOT' -> game_type_id => 1
            ['product_id' => 6, 'game_type_id' => 1, 'image' => 'live_22.png', 'rate' => 1.0000],

            // product_id => 7, game_type => 'SLOT' -> game_type_id => 1
            ['product_id' => 7, 'game_type_id' => 1, 'image' => 'ji_li.png', 'rate' => 1.0000],
            // product_id => 8, game_type => 'FISHING' -> game_type_id => 8
            ['product_id' => 8, 'game_type_id' => 8, 'image' => 'ji_li.png', 'rate' => 1.0000],
            // product_id => 9, game_type => 'LIVE_CASINO' -> game_type_id => 2
            ['product_id' => 9, 'game_type_id' => 2, 'image' => 'Jili-tcg_Casino.png', 'rate' => 1.0000],
            // product_id => 10, game_type => 'POKER' -> game_type_id => 12
            ['product_id' => 10, 'game_type_id' => 12, 'image' => 'ji_li.png', 'rate' => 1.0000],

            // product_id => 11, game_type => 'SLOT' -> game_type_id => 1
            ['product_id' => 11, 'game_type_id' => 1, 'image' => 'cq_9.png', 'rate' => 1.0000],
            // product_id => 12, game_type => 'FISHING' -> game_type_id => 8
            ['product_id' => 12, 'game_type_id' => 8, 'image' => 'cq_9.png', 'rate' => 1.0000],

            // product_id => 13, game_type => 'SLOT' -> game_type_id => 1
            ['product_id' => 13, 'game_type_id' => 1, 'image' => 'j_db.png', 'rate' => 1.0000],
            // product_id => 14, game_type => 'FISHING' -> game_type_id => 8
            ['product_id' => 14, 'game_type_id' => 8, 'image' => 'j_db.png', 'rate' => 1.0000],
            // product_id => 15, game_type => 'OTHER' -> game_type_id => 13
            ['product_id' => 15, 'game_type_id' => 13, 'image' => 'j_db.png', 'rate' => 1.0000],
            // product_id => 16, game_type => 'SLOT' -> game_type_id => 1
            ['product_id' => 16, 'game_type_id' => 1, 'image' => 'play_star_slot.png', 'rate' => 1.0000],

            // product_id => 17, game_type => 'SLOT' -> game_type_id => 1
            ['product_id' => 17, 'game_type_id' => 1, 'image' => 'jo_ker.png', 'rate' => 1.0000],
            // product_id => 18, game_type => 'OTHER' -> game_type_id => 13
            ['product_id' => 18, 'game_type_id' => 13, 'image' => 'jo_ker.png', 'rate' => 1.0000],
            // product_id => 19, game_type => 'FISHING' -> game_type_id => 8
            ['product_id' => 19, 'game_type_id' => 8, 'image' => 'jo_ker_fishing.png', 'rate' => 1.0000],
            // product_id => 20, game_type => 'LIVE_CASINO' -> game_type_id => 2
            ['product_id' => 20, 'game_type_id' => 2, 'image' => 'Sa-Gaming_Casino.png', 'rate' => 1.0000],

            // product_id => 21, game_type => 'SLOT' -> game_type_id => 1
            ['product_id' => 21, 'game_type_id' => 1, 'image' => 'spadegaming.png', 'rate' => 1.0000],
            // product_id => 22, game_type => 'FISHING' -> game_type_id => 8
            ['product_id' => 22, 'game_type_id' => 8, 'image' => 'spadegaming.png', 'rate' => 1.0000],
            // product_id => 23, game_type => 'LIVE_CASINO' -> game_type_id => 2
            ['product_id' => 23, 'game_type_id' => 2, 'image' => 'wm_new_casino.png', 'rate' => 1.0000],
            // product_id => 24, game_type => 'SLOT' -> game_type_id => 1
            ['product_id' => 24, 'game_type_id' => 1, 'image' => 'ha_banero.png', 'rate' => 1.0000],
            // product_id => 25, game_type => 'SPORT_BOOK' -> game_type_id => 3
            ['product_id' => 25, 'game_type_id' => 3, 'image' => 'wbet.jfif', 'rate' => 1.0000],
            // product_id => 26, game_type => 'SLOT' -> game_type_id => 1
            ['product_id' => 26, 'game_type_id' => 1, 'image' => 'fastspin.png', 'rate' => 1.0000],
            // product_id => 27, game_type => 'FISHING' -> game_type_id => 8
            ['product_id' => 27, 'game_type_id' => 8, 'image' => 'fastspin.png', 'rate' => 1.0000],
            // product_id => 28, game_type => 'LIVE_CASINO' -> game_type_id => 2
            ['product_id' => 28, 'game_type_id' => 2, 'image' => 'fastspin.png', 'rate' => 1.0000],
            // product_id => 29, game_type => 'COCK_FIGHTING' -> game_type_id => 9
            ['product_id' => 29, 'game_type_id' => 9, 'image' => 'fastspin.png', 'rate' => 1.0000],
            // product_id => 30, game_type => 'SPORT_BOOK' -> game_type_id => 3
            ['product_id' => 30, 'game_type_id' => 3, 'image' => 'ibc.jfif', 'rate' => 1.0000],
            // product_id => 31, game_type => 'VIRTUAL_SPORT' -> game_type_id => 4
            ['product_id' => 31, 'game_type_id' => 4, 'image' => 'ibc.jfif', 'rate' => 1.0000],
            // product_id => 32, game_type => 'OTHER' -> game_type_id => 13
            ['product_id' => 32, 'game_type_id' => 13, 'image' => 'ibc.jfif', 'rate' => 1.0000],
            // product_id => 33, game_type => 'LIVE_CASINO' -> game_type_id => 2
            ['product_id' => 33, 'game_type_id' => 2, 'image' => 'Dream_Gaming_Casino.png', 'rate' => 1.0000],
            // product_id => 34, game_type => 'LIVE_CASINO' -> game_type_id => 2
            ['product_id' => 34, 'game_type_id' => 2, 'image' => 'BGaming.png', 'rate' => 1.0000],
            // product_id => 35, game_type => 'FISHING' -> game_type_id => 8
            ['product_id' => 35, 'game_type_id' => 8, 'image' => 'BGaming.png', 'rate' => 1.0000],
            // product_id => 36, game_type => 'SLOT' -> game_type_id => 1
            ['product_id' => 36, 'game_type_id' => 1, 'image' => 'evoplay.png', 'rate' => 1.0000],
            // product_id => 37, game_type => 'SLOT' -> game_type_id => 1
            ['product_id' => 37, 'game_type_id' => 1, 'image' => 'Advantplay.png', 'rate' => 1.0000],
            // product_id => 38, game_type => 'LIVE_CASINO' -> game_type_id => 2
            ['product_id' => 38, 'game_type_id' => 2, 'image' => 'King_855_Casino.png', 'rate' => 1.0000],
            // product_id => 39, game_type => 'SLOT' -> game_type_id => 1
            ['product_id' => 39, 'game_type_id' => 1, 'image' => 'MrSlotty.png', 'rate' => 1.0000],
            // product_id => 40, game_type => 'LOTTERY' -> game_type_id => 5
            ['product_id' => 40, 'game_type_id' => 5, 'image' => 'BGaming.png', 'rate' => 1.0000],
            // product_id => 41, game_type => 'OTHER' -> game_type_id => 13
            ['product_id' => 41, 'game_type_id' => 13, 'image' => 'MrSlotty.png', 'rate' => 1.0000],
            // product_id => 42, game_type => 'SLOT' -> game_type_id => 1
            ['product_id' => 42, 'game_type_id' => 1, 'image' => 'MrSlotty.png', 'rate' => 1.0000],
            // product_id => 43, game_type => 'SLOT' -> game_type_id => 1
            ['product_id' => 43, 'game_type_id' => 1, 'image' => 'MrSlotty.png', 'rate' => 1.0000],
            // product_id => 44, game_type => 'SLOT' -> game_type_id => 1
            ['product_id' => 44, 'game_type_id' => 1, 'image' => 'MrSlotty.png', 'rate' => 1.0000],
            // product_id => 45, game_type => 'FISHING' -> game_type_id => 8
            ['product_id' => 45, 'game_type_id' => 8, 'image' => 'MrSlotty.png', 'rate' => 1.0000],
            // product_id => 46, game_type => 'SLOT' -> game_type_id => 1
            ['product_id' => 46, 'game_type_id' => 1, 'image' => 'MrSlotty.png', 'rate' => 1.0000],
            // product_id => 47, game_type => 'SLOT' -> game_type_id => 1
            ['product_id' => 47, 'game_type_id' => 1, 'image' => 'MrSlotty.png', 'rate' => 1.0000],
            // product_id => 48, game_type => 'SLOT' -> game_type_id => 1
            ['product_id' => 48, 'game_type_id' => 1, 'image' => 'MrSlotty.png', 'rate' => 1.0000],
            // product_id => 49, game_type => 'FISHING' -> game_type_id => 8
            ['product_id' => 49, 'game_type_id' => 8, 'image' => 'MrSlotty.png', 'rate' => 1.0000],
            // product_id => 50, game_type => 'SLOT' -> game_type_id => 1
            ['product_id' => 50, 'game_type_id' => 1, 'image' => 'MrSlotty.png', 'rate' => 1.0000],
            // product_id => 51, game_type => 'SLOT' -> game_type_id => 1
            ['product_id' => 51, 'game_type_id' => 1, 'image' => 'MrSlotty.png', 'rate' => 1.0000],
            // product_id => 52, game_type => 'SLOT' -> game_type_id => 1
            ['product_id' => 52, 'game_type_id' => 1, 'image' => 'MrSlotty.png', 'rate' => 1.0000],
            // product_id => 53, game_type => 'FISHING' -> game_type_id => 8
            ['product_id' => 53, 'game_type_id' => 8, 'image' => 'MrSlotty.png', 'rate' => 1.0000],
            // product_id => 54, game_type => 'SLOT' -> game_type_id => 1
            ['product_id' => 54, 'game_type_id' => 1, 'image' => 'MrSlotty.png', 'rate' => 1.0000],
            // product_id => 55, game_type => 'SLOT' -> game_type_id => 1
            ['product_id' => 55, 'game_type_id' => 1, 'image' => 'MrSlotty.png', 'rate' => 1.0000],
            // product_id => 56, game_type => 'SLOT' -> game_type_id => 1
            ['product_id' => 56, 'game_type_id' => 1, 'image' => 'MrSlotty.png', 'rate' => 1.0000],
            // product_id => 57, game_type => 'SLOT' -> game_type_id => 1
            ['product_id' => 57, 'game_type_id' => 1, 'image' => 'Playace.png', 'rate' => 1.0000],
            // product_id => 58, game_type => 'LIVE_CASINO' -> game_type_id => 2
            ['product_id' => 58, 'game_type_id' => 2, 'image' => 'Playace_casino.png', 'rate' => 1.0000],
            // product_id => 59, game_type => 'SLOT' -> game_type_id => 1
            ['product_id' => 59, 'game_type_id' => 1, 'image' => 'booming_game.png', 'rate' => 1.0000],
            // product_id => 60, game_type => 'OTHER' -> game_type_id => 13
            ['product_id' => 60, 'game_type_id' => 13, 'image' => 'spribe.png', 'rate' => 1.0000],
            // product_id => 61, game_type => 'POKER' -> game_type_id => 12
            ['product_id' => 61, 'game_type_id' => 12, 'image' => 'Wow-gamming.png', 'rate' => 1.0000],
            // product_id => 62, game_type => 'SLOT' -> game_type_id => 1
            ['product_id' => 62, 'game_type_id' => 1, 'image' => 'Wow-gamming.png', 'rate' => 1.0000],
            // product_id => 63, game_type => 'P2P' -> game_type_id => 7
            ['product_id' => 63, 'game_type_id' => 7, 'image' => 'Wow-gamming.png', 'rate' => 1.0000],
            // product_id => 64, game_type => 'LIVE_CASINO' -> game_type_id => 2
            ['product_id' => 64, 'game_type_id' => 2, 'image' => 'ai_livecasino.png', 'rate' => 1.0000],
            // product_id => 65, game_type => 'SLOT' -> game_type_id => 1
            ['product_id' => 65, 'game_type_id' => 1, 'image' => 'Hacksaw.png', 'rate' => 1.0000],
            // product_id => 66, game_type => 'SLOT' -> game_type_id => 1
            ['product_id' => 66, 'game_type_id' => 1, 'image' => 'Bigpot.png', 'rate' => 1.0000],
            // product_id => 67, game_type => 'OTHER' -> game_type_id => 13
            ['product_id' => 67, 'game_type_id' => 13, 'image' => 'imoon.jfif', 'rate' => 1.0000],
            // product_id => 68, game_type => 'SLOT' -> game_type_id => 1
            ['product_id' => 68, 'game_type_id' => 1, 'image' => 'Pascal-gaming.png', 'rate' => 1.0000],
            // product_id => 69, game_type => 'SLOT' -> game_type_id => 1
            ['product_id' => 69, 'game_type_id' => 1, 'image' => 'Epicwin.png', 'rate' => 1.0000],
            // product_id => 70, game_type => 'SLOT' -> game_type_id => 1
            ['product_id' => 70, 'game_type_id' => 1, 'image' => 'Fachi.png', 'rate' => 1.0000],
            // product_id => 71, game_type => 'FISHING' -> game_type_id => 8
            ['product_id' => 71, 'game_type_id' => 8, 'image' => 'Fachi.png', 'rate' => 1.0000],
            // product_id => 72, game_type => 'SLOT' -> game_type_id => 1
            ['product_id' => 72, 'game_type_id' => 1, 'image' => 'novomatic.png', 'rate' => 1.0000],
            // product_id => 73, game_type => 'SLOT' -> game_type_id => 1
            ['product_id' => 73, 'game_type_id' => 1, 'image' => 'novomatic.png', 'rate' => 1.0000],
            // product_id => 74, game_type => 'SPORT_BOOK' -> game_type_id => 3
            ['product_id' => 74, 'game_type_id' => 3, 'image' => 'novomatic.png', 'rate' => 1.0000],
            // product_id => 75, game_type => 'OTHER' -> game_type_id => 13
            ['product_id' => 75, 'game_type_id' => 13, 'image' => 'aviatrix.jfif', 'rate' => 1.0000],
            // product_id => 76, game_type => 'SLOT' -> game_type_id => 1
            ['product_id' => 76, 'game_type_id' => 1, 'image' => 'SmartSoft.png', 'rate' => 1.0000],
            // product_id => 77, game_type => 'SLOT' -> game_type_id => 1
            ['product_id' => 77, 'game_type_id' => 1, 'image' => 'WorldEntertainment.png', 'rate' => 1.0000],
            // product_id => 78, game_type => 'SPORT_BOOK' -> game_type_id => 3
            ['product_id' => 78, 'game_type_id' => 3, 'image' => 'WorldEntertainment.png', 'rate' => 1.0000],
            // product_id => 79, game_type => 'VIRTUAL_SPORT' -> game_type_id => 4
            ['product_id' => 79, 'game_type_id' => 4, 'image' => 'WorldEntertainment.png', 'rate' => 1.0000],
            // product_id => 80, game_type => 'LIVE_CASINO' -> game_type_id => 2
            ['product_id' => 80, 'game_type_id' => 2, 'image' => 'WorldEntertainment.png', 'rate' => 1.0000],
            // product_id => 81, game_type => 'SPORT_BOOK' -> game_type_id => 3
            ['product_id' => 81, 'game_type_id' => 3, 'image' => 'WorldEntertainment.png', 'rate' => 1.0000],
            // product_id => 82, game_type => 'SLOT' -> game_type_id => 1
            ['product_id' => 82, 'game_type_id' => 1, 'image' => 'rich_88.png', 'rate' => 1.0000],
            // product_id => 83, game_type => 'LIVE_CASINO' -> game_type_id => 2
            ['product_id' => 83, 'game_type_id' => 2, 'image' => 'rich_88.png', 'rate' => 1.0000],
            // product_id => 84, game_type => 'SLOT' -> game_type_id => 1
            ['product_id' => 84, 'game_type_id' => 1, 'image' => 'rich_88.png', 'rate' => 1.0000],
            // product_id => 85, game_type => 'LIVE_CASINO' -> game_type_id => 2
            ['product_id' => 85, 'game_type_id' => 2, 'image' => 'rich_88.png', 'rate' => 1.0000],
            // product_id => 86, game_type => 'LIVE_CASINO' -> game_type_id => 2
            ['product_id' => 86, 'game_type_id' => 2, 'image' => 'rich_88.png', 'rate' => 1.0000],
            // product_id => 87, game_type => 'LIVE_CASINO' -> game_type_id => 2
            ['product_id' => 87, 'game_type_id' => 2, 'image' => 'rich_88.png', 'rate' => 1.0000],
            // product_id => 88, game_type => 'OTHER' -> game_type_id => 13
            ['product_id' => 88, 'game_type_id' => 13, 'image' => 'rich_88.png', 'rate' => 1.0000],
            // product_id => 89, game_type => 'POKER' -> game_type_id => 12
            ['product_id' => 89, 'game_type_id' => 12, 'image' => 'rich_88.png', 'rate' => 1.0000],
            // product_id => 90, game_type => 'LIVE_CASINO' -> game_type_id => 2
            ['product_id' => 90, 'game_type_id' => 2, 'image' => 'Yee_Bet_Casino.png', 'rate' => 1.0000],
            // product_id => 91, game_type => 'SLOT' -> game_type_id => 1
            ['product_id' => 91, 'game_type_id' => 1, 'image' => 'Yee_Bet_Casino.png', 'rate' => 1.0000],
            // product_id => 92, game_type => 'LIVE_CASINO' -> game_type_id => 2
            ['product_id' => 92, 'game_type_id' => 2, 'image' => 'Yee_Bet_Casino.png', 'rate' => 1.0000],
            // product_id => 93, game_type => 'POKER' -> game_type_id => 12
            ['product_id' => 93, 'game_type_id' => 12, 'image' => 's_bo.png', 'rate' => 1.0000],
            // product_id => 94, game_type => 'VIRTUAL_SPORT' -> game_type_id => 4
            ['product_id' => 94, 'game_type_id' => 4, 'image' => 's_bo.png', 'rate' => 1.0000],
            // product_id => 95, game_type => 'LIVE_CASINO' -> game_type_id => 2
            ['product_id' => 95, 'game_type_id' => 2, 'image' => 's_bo.png', 'rate' => 1.0000],
            // product_id => 96, game_type => 'SPORT_BOOK' -> game_type_id => 3
            ['product_id' => 96, 'game_type_id' => 3, 'image' => 's_bo.png', 'rate' => 1.0000],
        ];

        DB::table('game_type_product')->insert($data);
    }
}
