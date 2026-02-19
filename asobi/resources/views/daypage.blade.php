<div class=" sm:px-6 lg:px-0 w-11/12 mx-auto lg:w-4/4 h-[60vh] overflow-y-auto overscroll-contain">


    <h2 class="text-lg sm:text-xl font-semibold text-gray-800 text-center">
        {{ $day_ymd }}
    </h2>

    {{-- ボタン：スマホは縦並び、sm以上は横並び --}}
    <div class="flex flex-col sm:flex-row items-stretch sm:items-center justify-center gap-2 sm:gap-4 my-4">
        @if (empty($todayMemo))
        <a href="{{ route('daypost', [$day_ymd])}}"
           class="px-4 py-2 rounded bg-blue-500 text-white hover:bg-blue-600 transition text-center text-sm sm:text-base">
            新規投稿
        </a>
        @endif


        <a href=""
           class="px-4 py-2 rounded bg-blue-500 text-white hover:bg-blue-600 transition text-center text-sm sm:text-base">
            面談を予約する
        </a>
    </div>

    @if($memos)
        @foreach($memos as $memo)
            @if(strtotime($day_ymd)==strtotime($memo->post_day))
              <a href="{{route('dayedit',[$memo->id, $day_ymd])}}"
            class="px-4 py-2 rounded bg-blue-500 text-white hover:bg-blue-600 transition text-center text-sm sm:text-base">
                編集する
            </a>
                <div class="border rounded-lg p-3 sm:p-4 bg-gray-50 text-sm sm:text-base text-gray-700 shadow-sm mt-5">
                    <p class="text-xs sm:text-sm text-gray-500">{{ $memo->post_day }}</p>
                    <p class="mt-2 leading-relaxed break-words">{{ $memo->memo }}</p>
                </div>
            @endif
        @endforeach
    @else
        <p class="text-center text-gray-400 text-sm sm:text-base">
            まだ投稿はありません
        </p>
    @endif

    <div class="text-right pt-2">
        <a href="{{ route('home') }}"
           class="inline-block px-4 py-2 rounded bg-gray-200 hover:bg-gray-300 transition text-sm sm:text-base">
            戻る
        </a>
    </div>

</div>
