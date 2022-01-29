@extends('adminlte::page')

@section('title', 'Новости')

@section('content_header')
    <h1>Новости</h1>
@stop

@section('template_title')
    News
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('News') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('news.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
										<th>Description</th>
										<th>News Category Id</th>
										<th>User Id</th>
										<th>Status</th>
										<th>Rating</th>
										<th>Views</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($news as $news)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $news->title }}</td>
											<td>{{ $news->description }}</td>
											<td>{{ $news->category->title }}</td>
											<td>{{ $news->user->name }}</td>
											<td>{{ $news->status }}</td>
											<td>{{ $news->rating }}</td>
											<td>{{ $news->views }}</td>

                                            <td>
                                                <form action="{{ route('news.destroy',$news->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('news.show',$news->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('news.edit',$news->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
{{--                {!! $news->links() !!}--}}
            </div>
        </div>
    </div>
@endsection
