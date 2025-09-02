<?php

use function Livewire\Volt\{state};
use App\Models\Article;

// ルートモデルバインディング
state(['articles' => fn() => Article::all()]);

$create = function () {
    return redirect()->route('articles.index');
};
?>

<div>
    <h1>タイトル一覧</h1>
    <ul>
        @foreach ($articles as $article)
            <li>
                <a href="{{ route('articles.show', $article) }}">{{ $article->title }}</a>
            </li>
        @endforeach
    </ul>

</div>
