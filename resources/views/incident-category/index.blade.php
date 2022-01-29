@extends('adminlte::page')

@section('title', 'Категории')

@section('content_header')
    <h1>Категории</h1>
@stop

@section('template_title')
    Incident Category
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Incident Category') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('incident-categories.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

										<th>Title</th>
										<th>Mnemonic Name</th>
										<th>Icon</th>
										<th>Rating</th>
										<th>Status</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($incidentCategories as $incidentCategory)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $incidentCategory->title }}</td>
											<td>{{ $incidentCategory->mnemonic_name }}</td>
											<td>{{ $incidentCategory->icon }}</td>
											<td>{{ $incidentCategory->rating }}</td>
											<td>{{ $incidentCategory->status }}</td>

                                            <td>
                                                <form action="{{ route('incident-categories.destroy',$incidentCategory->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('incident-categories.show',$incidentCategory->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('incident-categories.edit',$incidentCategory->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $incidentCategories->links() !!}
            </div>
        </div>
    </div>
@endsection
