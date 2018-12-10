@extends('layout')

@section('content')
    <h1>Посты по категориям</h1>

    <h2>Категория: {{$category->title}}</h2>

    @forelse($category->posts as $post)
        <h3>{{ $post->title }}</h3>

        @foreach($post->categories as $category)
            <i>{{ $category->title }}</i>
        @endforeach

        <p>{{ $post->description }}</p>
    @empty
        <p>Нет постов</p>
    @endforelse

@endsection