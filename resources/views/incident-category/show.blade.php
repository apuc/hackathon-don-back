@extends('layouts.app')

@section('template_title')
    {{ $incidentCategory->name ?? 'Show Incident Category' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Incident Category</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('incident-categories.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Title:</strong>
                            {{ $incidentCategory->title }}
                        </div>
                        <div class="form-group">
                            <strong>Mnemonic Name:</strong>
                            {{ $incidentCategory->mnemonic_name }}
                        </div>
                        <div class="form-group">
                            <strong>Icon:</strong>
                            {{ $incidentCategory->icon }}
                        </div>
                        <div class="form-group">
                            <strong>Rating:</strong>
                            {{ $incidentCategory->rating }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $incidentCategory->status }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
