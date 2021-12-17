<?php

use App\Models\Governorate as ModelsGovernorate;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Governorate extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('governorates')->delete();
            $governorates = ['Alexandria','Aswan','Asyut','Damanhur','Beni Suef','Cairo','Mansoura','Damietta','Faiyum','Tanta','Giza','Ismailia','Kafr El Sheikh','Luxor','Marsa Matruh','Minya
            ','Shibin El Kom','Kharga','Arish','Port Said','Banha','Qena','Hurghada','Zagazig','Sohag','El Tor','Suez'];
            foreach ($governorates as $governorate){
                ModelsGovernorate::create(['name'=>$governorate]);
            }
    }
}
