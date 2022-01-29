@extends('adminlte::page')

@section('title', 'Заявки')

@section('content_header')
    <h1>Заявки</h1>
@stop

@section('template_title')
    Petition
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Petition') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('petitions.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Создать') }}
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

										<th>User Id</th>
										<th>Address Id</th>
										<th>Status</th>
										<th>Description</th>
										<th>Rating</th>
										<th>Views</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($petitions as $petition)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $petition->user_id }}</td>
											<td>{{ $petition->address_id }}</td>
                                            <td>
                                                @if($petition->status === 1)
                                                    Активен
                                                @elseif($petition->status === 0)
                                                    Не активен
                                                @endif
                                            </td>
											<td>{{ $petition->description }}</td>
											<td>{{ $petition->rating }}</td>
											<td>{{ $petition->views }}</td>

                                            <td>
                                                <form action="{{ route('petitions.destroy',$petition->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('petitions.show',$petition->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('petitions.edit',$petition->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $petitions->links() !!}
            </div>
        </div>
    </div>
@endsection
