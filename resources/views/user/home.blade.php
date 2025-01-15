<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザー管理画面</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
    <script src="{{ asset('js/calendar.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/calendar.css') }}">
</head>
<body class="bg-gray-100">
    <!-- ナビゲーションバー -->
    <nav class="bg-white shadow">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <a href="{{ route('user.home') }}" class="text-xl font-bold text-gray-700">投稿サイト</a>
            <ul class="flex space-x-4">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-red-500 hover:text-red-700">ログアウト</button>
                </form>
            </ul>
        </div>
    </nav>

    <!-- ヘッダー -->
    <header class="bg-blue-500 text-white text-center py-16">
        <div class="container mx-auto">
            <h1 class="text-4xl font-bold">ようこそ、{{auth()->user()->name}}さん！</h1>
            <p class="mt-4">今日も新しいことに挑戦しましょう。</p>
        </div>
    </header>

    <!-- メインコンテンツ -->
    <main class="container mx-auto px-4 py-10">
        <div id="app">
            <div class="m-auto w-50 m-5 p-5">
                <div id='calendar'></div>
            </div>
        </div>
      <!-- 投稿管理セクション -->
        <section>
            <h2 class="text-2xl font-bold mb-6">あなたの投稿</h2>
            <form method="GET" action="{{ route('posts.search') }}" class="mb-6">
            <input type="text" name="tag" placeholder="タグで検索" class="p-2 border rounded" value="{{ request('tag') }}">
            <button type="submit" class="bg-blue-500 text-white p-2 rounded">検索</button>
            </form>

        @if($posts->isEmpty())
            <p>検索結果はありませんでした。</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach ($posts as $post)
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <img src="https://via.placeholder.com/150" alt="投稿画像" class="w-full">
                    <div class="p-4">
                        <h3 class="text-lg font-bold">{{ $post->title }}</h3>
                        <p class="text-gray-700 mt-2">{{ $post->content }}</p>
                        <div class="flex justify-between items-center mt-4">
                            <a href="{{ route('posts.edit', $post->id) }}" class="text-blue-500">編集</a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500">削除</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @endif
            <div class="mt-6">
                <a href="{{route('posts.create')}}" class="inline-block bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-600">新しい投稿を追加</a>
            </div>
        </section>
            <div class="mt-6">
                {{ $posts->links() }}
            </div>
    </main>

    <!-- フッター -->
    <footer class="bg-gray-800 text-white text-center py-4">
        <p>© 2024 投稿サイト. All rights reserved.</p>
    </footer>
</body>
</html>


