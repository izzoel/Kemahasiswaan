<?php

namespace App\Imports;

use App\Models\Mahasiswa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportMahasiswa implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // Log the row to see actual keys
        // Log::info($row);

        if (!isset($row['nim']) || empty($row['nim'])) {
            return null;
        }

        return new Mahasiswa([
            'nim'     => $row['nim'],
            'nama'    => $row['nama'],
            'fakultas' => $row['fakultas'],
            'prodi'   => $row['prodi'],
        ]);
    }
}
