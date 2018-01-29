<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
            $this->call(LocalitiesSeeder::class);
            $this->call(ReferenceSeeder::class);
            $this->call(ServiHotelSeeder::class);
            $this->call(RestaurantSeeder::class);
            $this->call(TypeHostelSeeder::class);
            $this->call(CompanySeeder::class);
            $this->call(TypeTransportSeeder::class);
            $this->call(TypeRoomSeeder::class);
            $this->call(TypeUserSeeder::class);
            $this->call(HostelGalapagosSeeder::class);
            $this->call(GuideSeeder::class);
            $this->call(TransferSeeder::class);
            $this->call(PackageSeeder::class);
            $this->call(UserSeeder::class);
            //$this->call(HostelGalapagosSeeder::class); esta definido mas arriba
        Model::reguard();
    }
}
