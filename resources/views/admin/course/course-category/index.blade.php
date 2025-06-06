@extends('admin.layouts.master')

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Course Categories</h3>
                    <div class="card-actions">
                        <a href="{{ route('admin.course-category.create') }}" class="btn btn-primary">
                            <i class="ti ti-plus"></i>Add new
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-vcenter card-table">
                            <thead>
                                <tr>
                                    <th>Icon</th>
                                    <th>Name</th>
                                    <th>Trending</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($categories as $category)
                                    <tr>
                                        <td><i class="{{ $category->icon }}"></i></td>
                                        <td> {{ $category->name }} </td>
                                        <td> 
                                            @if ($category->show_at_trending)
                                                <span class="badge bg-green text-green-fg">Yes</span>
                                            @else
                                                <span class="badge bg-danger text-danger-fg">No</span>
                                            @endif
                                        </td>
                                        <td> 
                                            @if ($category->status)
                                                <span class="badge bg-green text-green-fg">Active</span>
                                            @else
                                                <span class="badge bg-danger text-danger-fg">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.course-sub-category.index', $category->id) }}"
                                                class="text-warning" style="text-decoration: none">
                                                <i class="ti ti-list"></i>
                                            </a>
                                            <a href="{{ route('admin.course-category.edit', $category->id) }}"
                                                class="text-primary" style="text-decoration: none">
                                                <i class="ti ti-edit"></i>
                                            </a>
                                            <a href="{{ route('admin.course-category.destroy', $category->id) }}"
                                                class="text-danger delete-item" style="text-decoration: none">
                                                <i class="ti ti-trash-x"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">No data found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center mt-3">
                            {{-- {{ $categories->links() }} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
