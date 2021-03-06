<?php namespace Dpc\Importer;


use Illuminate\Support\Facades\DB;

class ForeignConnectionManager implements ForeignConnectionContract
{
    protected $connection;

    public function __construct()
    {
        $this->connection = config('importer.connection');
    }

    public function table(string $table)
    {
      return DB::connection($this->connection)->table($table);
    }
    


}