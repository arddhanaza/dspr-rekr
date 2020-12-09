<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Asisten extends Model
{
    use HasFactory;
    protected $table = 'asisten';

    public static function isExisted($username)
    {
        $data = DB::table('asisten')
            ->where('username', '=', $username)
            ->get();
        if (!$data->isEmpty()) {
            return true;
        } else {
            return false;
        }
    }

    protected static function isValidated($username, $password)
    {
        $data = DB::table('asisten')
            ->where([
                ['username', $username],
                ['password', $password],
            ])
            ->get();

        if (!$data->isEmpty()) {
            return true;
        } else {
            return false;
        }
    }

}
