<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DetailNilaiMicroteaching extends Model
{
    use HasFactory;
    protected $table = 'detail_nilai_microteaching';

    public static function getDataRataan($id){
        $average = DB::table('detail_nilai_microteaching')
            ->where('id_caas','=',$id)
            ->average('rataan');
        $average = $average * 20;
        return $average;
    }

}
