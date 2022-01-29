@extends('adminlte::page')

@section('title', 'Редактировать новость')

@section('content_header')
    <h1>Редактировать новость</h1>
@stop

@section('template_title')
    Update new
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update News</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('news.update', $news->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('news.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
