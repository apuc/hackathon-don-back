@extends('adminlte::page')

@section('title', 'Просмотр')

@section('content_header')
    <h1>Просмотр {{ $news->title }}</h1>
@stop

@section('template_title')
    {{ $news->title ?? 'Show new' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show News</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('news.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Title:</strong>
                            {{ $news->title }}
                        </div>
                        <div class="form-group">
                            <strong>Description:</strong>
                            {{ $news->description }}
                        </div>
                        <div class="form-group">
                            <strong>News Category Id:</strong>
                            {{ $news->category->title }}
                        </div>
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $news->user->name }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $news->status }}
                        </div>
                        <div class="form-group">
                            <strong>Rating:</strong>
                            {{ $news->rating }}
                        </div>
                        <div class="form-group">
                            <strong>Views:</strong>
                            {{ $news->views }}
                        </div>
                        <div class="form-group">
                            <strong>Media:</strong>
                            <img src="{{ \Illuminate\Support\Facades\Storage::url($news->media) }}" alt="{{ $news->media }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
