<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザー管理画面</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* 背景アニメーション */
        .animated-bg {
            background: linear-gradient(45deg, #4f46e5, #3b82f6, #06b6d4);
            background-size: 300% 300%;
            animation: gradient 6s ease infinite;
        }

        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* テキストアニメーション */
        .fade-in {
            opacity: 0;
            animation: fadeIn 2s forwards;
        }

        @keyframes fadeIn {
            to { opacity: 1; }
        }
    </style>
</head>
<body class="bg-gray-100">

    <!-- ナビゲーションバー -->
    <nav class="bg-white shadow">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <a href="#" class="text-xl font-bold text-gray-700">投稿サイト</a>
            <ul class="flex space-x-4">
                <form method="GET" action="{{ route('login') }}">
                    @csrf
                    <button type="submit" class="text-red-500 hover:text-red-700">ログイン</button>
                </form>
                <a href="{{ route('register') }}" class="text-blue-500 hover:text-blue-700">新規登録</a>
            </ul>
        </div>
    </nav>

    <!-- フルスクリーンヘッダー -->
    <header class="animated-bg h-screen text-white flex flex-col justify-center items-center text-center">
        <h1 class="text-5xl font-bold fade-in">ようこそ、投稿サイトへ！</h1>
        <p class="text-xl mt-4 fade-in" style="animation-delay: 0.5s;">今日も新しいことに挑戦しましょう。</p>
        <div class="mt-8 fade-in" style="animation-delay: 1s;">
            <a href="{{ route('posts.create') }}" class="bg-white text-blue-500 font-bold py-3 px-6 rounded-lg shadow-lg hover:bg-blue-100">
                新しい投稿を追加
            </a>
        </div>
    </header>

    <!-- フッター -->
    <footer class="bg-gray-800 text-white text-center py-4">
        <p>© 2024 投稿サイト. All rights reserved.</p>
    </footer>
</body>
</html>