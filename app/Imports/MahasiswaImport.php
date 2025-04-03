<?php

namespace App\Imports;

use Carbon\Carbon;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MahasiswaImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $mahasiswa = Mahasiswa::where('nim', $row['nim'])->first();

        $prodi = strtoupper(str_contains($row['prodi'], 'D3') ? str_replace('D3', 'DIPLOMA TIGA', $row['prodi']) : $row['prodi']);

        $fakultas = match ($prodi) {
            'DIPLOMA TIGA FARMASI', 'D3 FARMASI' => 'Farmasi',
            'DIPLOMA TIGA ANALIS KESEHATAN', 'D3 ANALIS KESEHATAN' => 'Ilmu Kesehatan Dan Sains Teknologi',
            'SARJANA FARMASI', 'S1 FARMASI' => 'Farmasi',
            'SARJANA ADMINISTRASI RUMAH SAKIT', 'S1 ADMINISTRASI RUMAH SAKIT' => 'Ilmu Kesehatan Dan Sains Teknologi',
            'SARJANA GIZI', 'S1 GIZI' => 'Ilmu Kesehatan Dan Sains Teknologi',
            'SARJANA HUKUM', 'S1 HUKUM' => 'Ilmu Sosial Dan Humaniora',
            'SARJANA MANAJEMEN', 'S1 MANAJEMEN' => 'Ilmu Sosial Dan Humaniora',
            'SARJANA PENDIDIKAN GURU SEKOLAH DASAR', 'S1 PENDIDIKAN GURU SEKOLAH DASAR' => 'Ilmu Sosial Dan Humaniora',
            default => throw new \Exception("Data pada template salah"),
        };
        $gelar = match ($prodi) {
            'DIPLOMA TIGA FARMASI' => 'Ahli Madya Farmasi (A.Md.Farm.)',
            'DIPLOMA TIGA ANALIS KESEHATAN' => 'Ahli Madya Analis Kesehatan (A.Md.A.K.)',
            'SARJANA FARMASI' => 'Sarjana Farmasi (S.Farm.)',
            'SARJANA ADMINISTRASI RUMAH SAKIT' => 'Sarjana Kesehatan (S.Kes.)',
            'SARJANA GIZI' => 'Sarjana Gizi (S.Gz.)',
            'SARJANA HUKUM' => 'Sarjana Hukum (S.H.)',
            'SARJANA MANAJEMEN' => 'Sarjana Manajemen (S.M.)',
            'SARJANA PENDIDIKAN GURU SEKOLAH DASAR' => 'Sarjana Pendidikan (S.Pd.)',
            default => throw new \Exception("Data pada template salah"),
        };

        $tanggal_lahir = !empty($row['tanggal_lahir']) ? Carbon::createFromFormat('d/m/Y', $row['tanggal_lahir'])->format('Y-m-d') : null;
        $tanggal_yudisium = !empty($row['tanggal_yudisium']) ? Carbon::createFromFormat('d/m/Y', $row['tanggal_yudisium'])->format('Y-m-d') : null;

        if ($mahasiswa) {
            $mahasiswa->update([
                'nim'  => $row['nim'],
                'nama' => $row['nama'],
                'tempat_lahir' => strtoupper($row['tempat_lahir']),
                'kelamin' => $row['kelamin'],
                'tanggal_lahir' => $tanggal_lahir,
                'fakultas' => $fakultas,
                'prodi' => $prodi,
                'gelar' => $gelar,
                'no_hp' => $row['no_hp'],
                'status' => $row['status'],
                'alamat' => $row['alamat'],
            ]);
        } else {
            try {

                return new Mahasiswa([
                    'nim'  => $row['nim'],
                    'nama' => $row['nama'],
                    'password' => bcrypt($row['nim']),
                    'tempat_lahir' => strtoupper($row['tempat_lahir']),
                    'kelamin' => $row['kelamin'],
                    'tanggal_lahir' => $tanggal_lahir,
                    'fakultas' => $fakultas,
                    'prodi' => $prodi,
                    'gelar' => $gelar,
                    'no_hp' => $row['no_hp'],
                    'status' => $row['status'],
                    'alamat' => $row['alamat'],
                    'foto' => rand(0, 11),
                    'role' => 'mahasiswa'
                ]);
            } catch (\Exception $e) {
                Log::error('Gagal insert data mahasiswa dengan NIM ' . $row['nim'] . ': ' . $e->getMessage());
            }
        }
    }
}
