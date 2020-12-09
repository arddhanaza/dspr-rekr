<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Caas extends Model
{
    use HasFactory;

    protected $table = 'caas';

    public static function isExisted($username)
    {
        $data = DB::table('caas')
            ->where('nim', '=', $username)
            ->get();
        if (!$data->isEmpty()) {
            return true;
        } else {
            return false;
        }
    }

    protected static function isValidated($username, $password)
    {
        $data = DB::table('caas')
            ->where([
                ['nim', $username],
                ['nim', $password],
            ])
            ->get();

        if (!$data->isEmpty()) {
            return true;
        } else {
            return false;
        }
    }
}
