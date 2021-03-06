@extends('adminlte::page')

@section('title', 'Добавить категорию')

@section('content_header')
    <h1>Добавить категорию</h1>
@stop

@section('template_title')
    Create Incident Category
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Incident Category</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('incident-categories.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('incident-category.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
