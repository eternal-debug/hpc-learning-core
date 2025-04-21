@extends('admin.layouts.master')

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Course Levels</h3>
                    <div class="card-actions">
                        <a href="{{ route('admin.course-level.create') }}" class="btn btn-danger">
                            <i class="ti ti-plus"></i>Add new
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-vcenter card-table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($levels as $level)
                                    <tr>
                                        <td> {{ $level->name }} </td>
                                        <td> {{ $level->slug }}</td>
                                        <td>
                                            <a href="{{ route('admin.course-level.edit', $level->id) }}"
                                                class="btn-sm btn-primary" style="text-decoration: none">
                                                <i class="ti ti-edit"></i>
                                            </a>
                                            <a href="{{ route('admin.course-level.destroy', $level->id) }}"
                                                class="text-danger delete-item" style="text-decoration: none">
                                                <i class="ti ti-trash-x"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">No data found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center mt-3">
                            {{ $levels->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
