
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <h1 class="mb-3">Laravel 8 User Roles and Permissions Step by Step Tutorial - codeanddeploy.com</h1>

    <div class="bg-light p-4 rounded">
        <h2>Show post</h2>
        <div class="lead">

        </div>

        <div class="container mt-4">
            <div>
                Title: {{ $post->title }}
            </div>
            <div>
                Description: {{ $post->description }}
            </div>
            <div>
                Body: {{ $post->body }}
            </div>
        </div>

    </div>
    <div class="mt-4">
        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-info">Edit</a>
        <a href="{{ route('posts.index') }}" class="btn btn-default">Back</a>
    </div>
        </div>
    </div>


</x-app-layout>

{{--
@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-4 rounded">
        <h2>Show post</h2>
        <div class="lead">

        </div>

        <div class="container mt-4">
            <div>
                Title: {{ $post->title }}
            </div>
            <div>
                Description: {{ $post->description }}
            </div>
            <div>
                Body: {{ $post->body }}
            </div>
        </div>

    </div>
    <div class="mt-4">
        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-info">Edit</a>
        <a href="{{ route('posts.index') }}" class="btn btn-default">Back</a>
    </div>
@endsection --}}
