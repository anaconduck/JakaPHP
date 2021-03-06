<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class HistoryTest extends Model
{
    use HasFactory;

    protected $fillable = [
        'identity',
        'id_course'
    ];
    public $attributes = [
        'status_selesai' => false
    ];

    public static function getLastTest($idCourse){
        return self::where('identity', auth()->user()->identity)
            ->where('id_course',$idCourse)
            ->orderBy('created_at','desc')
            ->first();
    }

    public static function makeHistoryTest($identity, $course, $sesiSoal){
        $idCourse = config('app.indexCourse')[$course];
        $h = new HistoryTest([
            'identity' => $identity,
            'id_course' => $idCourse
        ]);

        DB::beginTransaction();
        $h->save();
        $size = min(config('app.' . $course)[0]['num'], Test::countQuest($idCourse, $sesiSoal));
        $historyJawaban = HistoryJawabanTest::makeHistoryJawaban($h->id, 0, $size);
        DB::commit();

        return [$h, $historyJawaban];
    }

    public static function countTest($identity){
        return self::selectRaw('id_course, count(id_course) as jumlah')
            ->where('identity', $identity)
            ->groupBy('id_course')
            ->get()->toArray();
    }

    public static function report($identity){
        return self::join('history_jawaban_tests','history_tests.id','=', 'history_jawaban_tests.id_history_test')
            ->where('history_tests.identity', $identity)
            ->orderBy('history_tests.created_at','desc')
            ->get();
    }

    public function allWithIdentity($identity){
        return self::where('identity',$identity)
            ->get();
    }

    public static function riwayat($identity, $limit = null, $paginate = false){
        $query =  self::where('identity',$identity)
            ->orderBy('created_at', 'desc')
            ->limit($limit);
        if($limit) $query = $query->limit($limit);
        if($paginate) return $query->paginate(9);
        return $query->get();
    }

    public static function countHT(){
        return self::select('identity')
            ->groupBy('identity')
            ->lazy()
            ->count();
    }

    public static function mean($idCourse = null){
        if(!$idCourse){
            $q = self::select('jumlah_benar', 'sesi', 'id_course')
                ->join('history_jawaban_tests', 'history_jawaban_tests.id_history_test', '=', 'history_tests.id')
                ->lazy();
            $mean = 0;
            if($q->count() == 0) return $mean;
            foreach($q as $data){
                $course = config('app.allCourse.'.$data->id_course);
                $mean += $data->jumlah_benar*100/config("app.$course.$data->sesi.num");
            }
            $mean /= $q->count();
            return $mean;
        }
    }

    public static function pointer($idCourse){
        return self::where('created_at', '>', now()->subYear())
            ->where('id_course', $idCourse)
            ->lazy();
    }

    public static function countHarian(){
        return self::select('identity')
            ->where('created_at' ,'>', now()->subDay())
            ->groupBy('identity')
            ->lazy()
            ->count();
    }

}
