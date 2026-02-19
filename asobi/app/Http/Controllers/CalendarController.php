<?php

namespace App\Http\Controllers;
use App\Models\memo;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
     public function home()
    {



        //今月の年月を表示
        //もし ym が無かったら ○○ を使うという意味
        $ym = request('ym', date('Y-m'));
        // 今月の1日を取得
        $timestamp=strtotime($ym . '-01'); 
        // 今月１日の曜日を取得
        //intを入れると整数になる。なしだと文字列になる
        $youbi = (int)date('w', $timestamp);
        $startyoubi = (int)date('w', $timestamp);
        //該当月の月末日を取得
        $day_count = date('t', $timestamp);
        //カレンダー作成の準備
        $weeks = [];
        $week  = array_fill(0, $startyoubi, null); 
        // array_fill(開始番号, 個数, 入れたい中身);
        // 先月・今月・翌月
        $today = date('Y-m');
        //strtotime("時間のずらし方", 基準の時間)やstrtotime("文字の日時")として使う。文字列で認識されている数字をコンピューターが使える数字に変える
        $prev = date('Y-m', strtotime('-1 month', $timestamp));
        $next = date('Y-m', strtotime('+1 month', $timestamp));

        for($day = 1; $day <= $day_count; $day++,$youbi++){
            $week[] = $day; 
            if (($youbi % 7) == 6) {
                $weeks[] = $week;
                $week = [];
            }elseif(($youbi % 7) > 5){
                $weeks[] = $week;
                $week = [];
            }

        }
        // empty()は、変数が空（null、0、空文字、false、空配列など）であるかを確認する
        //残っている場合は配列に追加される
        if (!empty($week)) {
            $weeks[] = $week; // 最後の週
        }

        $memos=memo::all();
        return view('home', compact('weeks','youbi','prev','next','today','memos'));
    }



    public function daypage($day_ymd)
    {
        $memos=memo::all();
        return view('daypage',compact('day_ymd','memos'));
    }

       public function daypost($day_ymd)
    {
        return view('daypost',compact('day_ymd'));
    }



    public function memostore(Request $request,$day_ymd){
        $memos=new memo;
        if($request->memo){
            $memos->memo=$request->memo;
            $memos->post_day=$day_ymd;
            $memos->save();
        }
        
     
        return $this->home();
    }


        
        
}
    