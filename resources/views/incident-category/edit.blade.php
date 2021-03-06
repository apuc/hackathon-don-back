@extends('adminlte::page')

@section('title', 'Редактировать категорию')

@section('content_header')
    <h1>Редактировать категорию</h1>
@stop

@section('template_title')
    Update Incident Category
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Incident Category</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('incident-categories.update', $incidentCategory->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('incident-category.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
