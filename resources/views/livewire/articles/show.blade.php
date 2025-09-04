<?php

use function Livewire\Volt\{state};
use App\Models\Article;

state(['article' => fn(Article $article) => $article]);

$index = function(){
    return redirect()->route('articles.index', $this->article);
};

$edit = function(){
    return redirect()->route('articles.edit', $this->article);
};

$destroy = function(){
    $this->article->delete();
    return redirect()->route('articles.index');
};

?>

<div>
    <h1>論文詳細</h1>

    <p>タイトル：{{ $article->title }}</>

    <p>{!! nl2br($article->body) !!}</p>

    <button wire:click="index">一覧へ戻る</button>
    <button wire:click="edit">編集する</button>
    <button wire:click="destroy" wire:confirm="本当に削除しますか？">削除する</button>
</div>
