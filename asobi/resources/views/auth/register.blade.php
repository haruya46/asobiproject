<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>登録</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="min-h-screen bg-gray-50 flex items-center justify-center p-4">
    <div class="w-full max-w-md bg-white border rounded-xl p-6">
        <h1 class="text-xl font-semibold mb-4">会員登録</h1>

        @if ($errors->any())
            <div class="mb-4 text-sm text-red-600">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}" class="space-y-3">
            @csrf
            <div>
                <label class="text-sm text-gray-700">名前</label>
                <input name="name" value="{{ old('name') }}" class="w-full border rounded-lg p-2" required>
            </div>

            <div>
                <label class="text-sm text-gray-700">メール</label>
                <input type="email" name="email" value="{{ old('email') }}" class="w-full border rounded-lg p-2" required>
            </div>

            <div>
                <label class="text-sm text-gray-700">パスワード</label>
                <input type="password" name="password" class="w-full border rounded-lg p-2" required>
            </div>

            <div>
                <label class="text-sm text-gray-700">パスワード（確認）</label>
                <input type="password" name="password_confirmation" class="w-full border rounded-lg p-2" required>
            </div>

            <button class="w-full bg-blue-600 hover:bg-blue-700 text-white rounded-lg py-2">
                登録して始める
            </button>

            <p class="text-sm text-gray-600 text-center">
                すでにアカウントありますか？
                <a class="text-blue-600 underline" href="{{ route('login') }}">ログイン</a>
            </p>
        </form>
    </div>
</body>
</html>
