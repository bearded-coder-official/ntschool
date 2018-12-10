@extends('layout')

@section('content')
    <h1>Главная страница</h1>

    @forelse($posts as $post)
        <h2>{{ $post->title }}</h2>

        @foreach($post->categories as $category)
            <i>{{ $category->title }}</i>
        @endforeach

        <p>{{ $post->description }}</p>
    @empty
        <p>Нет постов</p>
    @endforelse

    @if ($posts->currentPage() != 1)
        <a href="?page=1">First Page</a>
        <a href="?page={{$posts->currentPage() - 1}}">Prev Page</a>
    @endif
    @for($i = 1; $i <= $total; $i++)
        <a class="@if($i == $posts->currentPage()) current @endif" href="?page={{ $i }}">{{ $i }}</a>
    @endfor
    @if ($posts->currentPage() != $total)
        <a href="?page={{$posts->currentPage() + 1}}">Next Page</a>
        <a href="?page={{$total}}">Last Page</a>
    @endif


@endsection