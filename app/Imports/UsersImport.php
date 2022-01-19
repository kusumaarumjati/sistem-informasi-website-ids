<?php

namespace App\Imports;

use App\Models\cust;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;

class CustomerImport implements ToModel, WithHeadingRow, SkipsOnError, WithBatchInserts, SkipsOnFailure, WithValidation
{
    use Importable, SkipsErrors, SkipsFailures;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
         return new cust([
                'id_customer' => $row[0],
                'nama' => $row[1],
                'alamat' => $row[2],
                'kodepos' => $row[3],
                //'password' => Hash::make('password')
            ]);
        // foreach ($rows as $row) {
        //     $customer = cust::create([
        //         'id_customer' => $row['id_customer'],
        //         'nama' => $row['nama'],
        //         'alamat' => $row['alamat'],
        //         'kodepos' => $row['kodepos'],
        //         //'password' => Hash::make('password')
        //     ]);

            // $user->address()->create([
            //     'country' => $row['country']
            // ]);
        
    }

    public function batchSize(): int
    {
        return 1000;
    }
    
    public function rules(): array
    {
        return [
            '*.id_customer' => ['unique:customer,id_customer']
        ];
    }
    
}