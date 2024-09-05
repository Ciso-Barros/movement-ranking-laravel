<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ModelPersonalRecord extends Model {

    use HasFactory;

    protected $table = 'personal_records';
    protected $fillable = [
        'id',
        'user_id',
        'movement_id',
        'value',
        'date',
    ];

    public static function getRankedPersonalRecords() {
        $query = DB::table(DB::raw('(select 
                    pr.id as id,
                    pr.date as date,
                    pr.value as score,
                    m.name as movement_name,
                    u.name as user_name,
                    u.id as user_id,
                    rank() over (partition by m.name order by pr.value desc) as rank
                from 
                    personal_records pr
                    left join movements m on m.id = pr.movement_id
                    left join users u on u.id = pr.user_id
                ) as ranked_records'))
                ->select('id','date', 'score', 'movement_name', 'user_name', 'rank', 'user_id')
                ->orderBy('movement_name')
                ->orderBy('rank');
        return $query->get();
    }

    public static function getRankedPersonalRecordsByName($name) {
         $query = DB::table(DB::raw('(select 
                    pr.id as id,
                    pr.date as date,
                    pr.value as score,
                    m.name as movement_name,
                    u.name as user_name,
                    u.id as user_id,
                    rank() over (partition by m.name order by pr.value desc) as rank
                from 
                    personal_records pr
                    left join movements m on m.id = pr.movement_id
                    left join users u on u.id = pr.user_id
                ) as ranked_records'))
                ->select('id','date', 'score', 'movement_name', 'user_name', 'rank', 'user_id')
                ->where('user_name', 'ILIKE', '%' . trim($name) . '%')
                ->orderBy('movement_name')
                ->orderBy('rank');

        return $query->get();
//        dd($query->toSql());
    }
}
