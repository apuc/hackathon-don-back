@extends('adminlte::page')

@section('title', 'Заявки')

@section('content_header')
    <h1>Заявки</h1>
@stop

@section('template_title')
    Create Petition
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Petition</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('petitions.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('petition.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
