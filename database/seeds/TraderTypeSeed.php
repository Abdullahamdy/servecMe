<?php

use App\Models\TraderType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TraderTypeSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('trader_types')->delete();
       $tradeTypes = ['Sentence','sectoral'];
       foreach($tradeTypes as $tyadeType){
           TraderType::create(['type'=>$tyadeType]);

       }
    }
}
