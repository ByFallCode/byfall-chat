<?php
namespace Database\Seeders;

use App\Models\InitParam;
use Illuminate\Database\Seeder;

class InitParamSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        InitParam::create(['name' => 'ByFall Code','logo' => 'images/logo-bycode.png','adresse' => 'Dakar, Sénégal','email' => 'contact@ByFall Code.com',
            'siteweb' => 'www.ByFall Code.com','phone' => '+221781503140']);
    }
}
