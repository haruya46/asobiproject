@extends('layouts.app')
@section('content')

<p class="text-center text-gray-700 text-sm sm:text-base leading-relaxed mb-4">
  ご希望の日時を選択してフォームを入力してください
</p>

{{-- 月ナビ：PCはそのまま / スマホだけ縦並びにする --}}
<div class="flex flex-col sm:flex-row items-stretch sm:items-center justify-center gap-2 sm:gap-4 my-4 px-2">

    <a href="{{ route('home', ['ym' => $prev]) }}"
       class="px-4 py-2 rounded bg-gray-200 hover:bg-gray-300 transition text-center">
        ← 前月
    </a>

    <a href="{{ route('home', ['ym' => $today ]) }}"
       class="px-4 py-2 rounded bg-blue-500 text-white hover:bg-blue-600 transition text-center">
        今月
    </a>

    <a href="{{ route('home', ['ym' => $next]) }}"
       class="px-4 py-2 rounded bg-gray-200 hover:bg-gray-300 transition text-center">
        次月 →
    </a>

</div>

<div class="flex  justify-center">
  <div class="w-full sm:flex sm:justify-center overflow-x-auto sm:overflow-visible">
    <table class="calendar w-full table-fixed border-collapse shadow-sm rounded-lg overflow-hidden min-w-[720px] sm:min-w-0">
      <thead>
        <tr class="bg-gray-100 text-gray-700">
          <th class="py-3 border text-center font-semibold">日</th>
          <th class="py-3 border text-center font-semibold">月</th>
          <th class="py-3 border text-center font-semibold">火</th>
          <th class="py-3 border text-center font-semibold">水</th>
          <th class="py-3 border text-center font-semibold">木</th>
          <th class="py-3 border text-center font-semibold">金</th>
          <th class="py-3 border text-center font-semibold">土</th>
        </tr>
      </thead>

      <tbody class="bg-white">
        @foreach ($weeks as $week)
        <tr>
          @foreach($week as $day)
            @if($day === null)
              <td class="h-16 border bg-gray-50"></td>
            @else
              <?php
                $day_ymd = request('ym', date('Y-m')).'-'.sprintf('%02d',$day);
              ?>
              <td class="ajaxbtn h-24 border text-center align-top p-2 cursor-pointer hover:bg-blue-50 transition"
                  title="{{ route('AjaxDayDate', [$day_ymd]) }}">

                <div class="h-full overflow-y-auto space-y-1 text-left text-xs leading-snug">
                  <p class="inline-block w-8 h-8 leading-8 rounded-full hover:bg-blue-500 hover:text-white transition">
                    {{$day}}
                  </p>

                  @if($memos)
                    @foreach($memos as $memo)
                      @if(strtotime($day_ymd) == strtotime($memo->post_day))
                        <div class="border rounded-lg p-3 bg-gray-50 text-sm text-gray-700 shadow-sm">
                          <p>{{$memo->post_day}}</p>
                          <p class="break-words">{{ $memo->memo }}</p>
                        </div>
                      @endif
                    @endforeach
                  @else
                    <p class="text-center text-gray-400 text-sm">
                      まだ投稿はありません
                    </p>
                  @endif
                </div>

              </td>
            @endif
          @endforeach
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <div id="modal" class="modal" style="display:none;">
    <div class="modal-bg"></div>
    <div class="modal-content"></div>
  </div>
</div>

@endsection
