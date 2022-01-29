@extends('adminlte::page')

@section('title', 'Заявки')

@section('content_header')
    <h1>Заявки</h1>
@stop

@section('template_title')
    {{ $petition->name ?? 'Show Petition' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Petition</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('petitions.index') }}"> Назад</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $petition->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Address Id:</strong>
                            {{ $petition->address_id }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $petition->status }}
                        </div>
                        <div class="form-group">
                            <strong>Description:</strong>
                            {{ $petition->description }}
                        </div>
                        <div class="form-group">
                            <strong>Rating:</strong>
                            {{ $petition->rating }}
                        </div>
                        <div class="form-group">
                            <strong>Views:</strong>
                            {{ $petition->views }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
