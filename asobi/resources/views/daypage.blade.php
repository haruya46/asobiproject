
<div class="space-y-4">

    <h2 class="text-xl font-semibold text-gray-800 text-center">
        {{ $day_ymd }}
    </h2>

    <form method="post" action="{{ route('memostore', $day_ymd) }}" enctype="multipart/form-data" class="space-y-3">
        @csrf

        <textarea
            name="memo"
            rows="4"
            placeholder="ここにメモを書いてください"
            class="w-full border border-gray-300 rounded-lg p-3 text-sm focus:ring-2 focus:ring-blue-400 focus:outline-none"
        ></textarea>

        <div class="flex justify-end gap-2">
            <a href="{{ route('home') }}"class="inline-block px-4 py-2 rounded bg-gray-200 hover:bg-gray-300 transition">
                閉じる
            </a>

            <button type="submit"
                    class="px-4 py-2 rounded bg-blue-500 text-white hover:bg-blue-600 transition">
                保存
            </button>
        </div>
    </form>
    

</div>
