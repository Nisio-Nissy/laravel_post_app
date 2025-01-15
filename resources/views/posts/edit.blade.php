<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>投稿サイト</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <main class="container mx-auto px-6 py-10">
        <div class="bg-white p-8 rounded-lg shadow-md max-w-2xl mx-auto">
            <h1 class="text-2xl font-semibold mb-6 text-center">投稿の編集</h1>
            
            <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- タイトル -->
                <div class="mb-4">
                    <label for="title" class="block text-gray-700 font-medium">タイトル</label>
                    <input type="text" id="title" name="title" value="{{ old('title', $post->title) }}" class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500" required>
                </div>

                <!-- 内容 -->
                <div class="mb-4">
                    <label for="content" class="block text-gray-700 font-medium">内容</label>
                    <textarea id="content" name="content" class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500" rows="6" required>{{ old('content', $post->content) }}</textarea>
                </div>

                <!-- 画像 -->
                <div class="mb-6">
                    <label for="image" class="block text-gray-700 font-medium">画像</label>
                    <input type="file" id="image" name="image" class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500">
                    @if ($post->image_path)
                        <div class="mt-4">
                            <img src="{{ asset('storage/' . $post->image_path) }}" alt="投稿画像" class="rounded-md" width="150">
                        </div>
                    @endif
                </div>

                <!-- 更新ボタン -->
                <div class="flex justify-center">
                    <button type="submit" class="bg-blue-500 text-white font-semibold py-2 px-6 rounded-md hover:bg-blue-600 transition duration-200">投稿を更新</button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>
