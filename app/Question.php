<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\database\Eloquent;

class Question extends Model
{
    protected $fillable = ['body','title'];

    //
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function answers()
    {
        return $this->hasMany('App\Answer');
    }

    public static function FilterQuestions()
    {
        //Archived Questions
        if ((\request('month')) and (\request('year')) ) {
            return static::query()
                ->whereMonth('created_at', \request('month'))
                ->whereYear('created_at', \request('year'))
                ->latest()
                ->paginate('6');
        }
        //My Questions
        elseif(\request('user_id'))
        {
            return static::query()
                ->where('user_id','=',\request('user_id'))
                ->latest()
                ->paginate(6);
        }
        //All Questions
        else
        {
            //All Questions paginated
            return static::query()
                ->latest()
                ->paginate('6');
        }

    }

    /*public static function ArchiveStats()
    {
        return static::query()->selectRaw('strftime(? ,created_at)as year,
            strftime(?,created_at) as month,count(id) as qcount' ,['%Y','%m'])
            -> groupBy('year','month')
            ->orderByDesc('created_at')
            ->get();
    }*/

    public static function ArchiveStats()
    {
        //returnDB::select(select EXTRACT(YEAR FROM TIMESTAMP created_at)as year,
            //EXTRACT(MONTH FROM TIMESTAMP created_at) as month,count(id) as qcount group by year,month order by created_at desc')->get();
    }

}
