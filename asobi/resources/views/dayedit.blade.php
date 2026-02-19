@extends('layouts.app')

@section('content')

<div class="space-y-4 p-4 w-[70%] mx-auto">

    <h2 class="text-xl font-semibold text-gray-800 text-center">
        {{ $day_ymd }}
    </h2>

    <form method="post" action="{{ route('memoedit', $day_ymd) }}" enctype="multipart/form-data" class="space-y-3">
        @csrf
        @method('patch')
            <textarea
                name="memo"
                rows="5"
                placeholder="ここにメモを書いてください"
                class="w-full border border-gray-300 rounded-lg p-3 text-sm focus:ring-2 focus:ring-blue-400 focus:outline-none resize-none"
            >{{old('memo', $memo->memo)}}</textarea>

        <div class="flex justify-end gap-3 pt-2">

            <a href="{{ route('home') }}"
               class="inline-flex items-center justify-center px-4 py-2 rounded bg-gray-200 hover:bg-gray-300 transition text-sm">
                閉じる
            </a>

            <button type="submit"
                    class="inline-flex items-center justify-center px-4 py-2 rounded bg-blue-500 text-white hover:bg-blue-600 transition text-sm">
                保存
            </button>

        </div>
    </form>

</div>

@endsection
