<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>投稿サイト</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <main class="container mx-auto px-6 py-10">
        <div class="bg-white p-8 rounded-lg shadow-lg max-w-xl mx-auto">
            <h2 class="text-3xl font-bold text-center mb-6">新しい投稿を追加</h2>
            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- タイトル -->
                <div class="mb-6">
                    <label for="title" class="block text-gray-700 font-medium">タイトル</label>
                    <input type="text" name="title" id="title" class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500" required>
                </div>

                <!-- 内容 -->
                <div class="mb-6">
                    <label for="content" class="block text-gray-700 font-medium">内容</label>
                    <textarea name="content" id="content" rows="5" class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500" required></textarea>
                </div>

                <!-- 画像 -->
                <div class="mb-6">
                    <label for="image" class="block text-gray-700 font-medium">画像</label>
                    <input type="file" name="image" id="image" class="block w-full text-sm text-gray-700 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500">
                </div>

                <!-- 投稿ボタン -->
                <div class="flex justify-center">
                    <button type="submit" class="bg-blue-500 text-white font-semibold py-3 px-8 rounded-md hover:bg-blue-600 transition duration-200">投稿する</button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>
