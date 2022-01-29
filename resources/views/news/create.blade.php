@extends('adminlte::page')

@section('title', 'Добавить новость')

@section('content_header')
    <h1>Добавить новость</h1>
@stop

@section('template_title')
    Create new
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create New</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('news.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('news.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
