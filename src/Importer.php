<?php namespace Dpc\Importer;


use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class Importer implements ImporterContract
{


    public function import() : ImporterContract
    {
        $seeders = config('importer.seeds');
        DB::transaction(function () use ($seeders) {
            collect($seeders)->map(function ($seeder) {
                $seeder = App::make($seeder);
                $seeder->prepareData()->seed();
            });
        });


        return $this;

    }


}