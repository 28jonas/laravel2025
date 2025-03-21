<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

class ExportCollection implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $data;
    protected $headers;

    public function __construct($data, $headers)
    {
        $this->data = $data;
        $this->headers = $headers;
    }
    public function collection()
    {
        //
        return collect($this->data);
    }

    public function headers():array{
        return $this->headers;
    }
}
