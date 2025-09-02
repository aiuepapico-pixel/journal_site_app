<?php

use function Livewire\Volt\{state,rules};
use App\Models\Article;

state(['title', 'body']);

rules([
    'title' => 'required|string|max:50',
    'body' => 'required|string|max:2000',
]);

$store = function () {
    $this->Validate();
    Article::create([
        'title' => $this->title,
        'body' => $this->body,
    ]);
    // 一覧ページにリダイレクト
    return redirect()->route('articles.index');
};

?>

<div>
    <h1>新規論文投稿</h1>
    <form wire:submit="store">
        <p>
            <label for="title">論文タイトル</label>
            @error('title')
                <span class="error">({{ $message }})</span>
            @enderror
            <br>
            <input type="text" wire:model="title" id="title">
        </p>
        <p>
            <label for="body">本文</label>
            @error('body')
                <span class="error">({{ $message }})</span>
            @enderror
            <br>
        <textarea wire:model="body" id="body" id="body"></textarea>
        <br>
        <button type="submit">投稿</button>
    </form>
    
</div>
