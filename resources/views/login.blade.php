<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="w-full max-w-sm bg-white p-6 rounded-lg shadow">
        <h2 class="text-2xl font-bold text-center mb-6">ログイン</h2>
        <form action="{{ route('login') }}" method="POST">
            <!-- CSRFトークン -->
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">メールアドレス</label>
                <input type="email" id="email" name="email" required class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">パスワード</label>
                <input type="password" id="password" name="password" required class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 focus:outline-none">ログイン</button>
        </form>
        <p class="text-center text-sm text-gray-600 mt-4">
            アカウントをお持ちでないですか？
            <a href="/register" class="text-blue-500 hover:underline">新規登録</a>
        </p>
    </div>
</body>
</html>
