@extends('admin.layouts.master')

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><b>{{ $course_category->name }}</b>'s Sub Categories</h3>
                    <div class="card-actions">
                        <a href="{{ route('admin.course-category.index') }}"
                            class="btn btn-danger">
                            <i class="ti ti-arrow-left"></i>Back
                        </a>
                        <a href="{{ route('admin.course-sub-category.create', $course_category->id) }}"
                            class="btn btn-primary">
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
                                @forelse ($subCategories as $subCategory)
                                    <tr>
                                        <td><i class="{{ $subCategory->icon }}"></i></td>
                                        <td> {{ $subCategory->name }} </td>
                                        <td>
                                            @if ($subCategory->show_at_trending)
                                                <span class="badge bg-green text-green-fg">Yes</span>
                                            @else
                                                <span class="badge bg-danger text-danger-fg">No</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($subCategory->status)
                                                <span class="badge bg-green text-green-fg">Active</span>
                                            @else
                                                <span class="badge bg-danger text-danger-fg">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.course-sub-category.edit', ['course_category' => $course_category->id, 'course_sub_category' => $subCategory->id]) }}"
                                                class="text-primary" style="text-decoration: none">
                                                <i class="ti ti-edit"></i>
                                            </a>
                                            <a href="{{ route('admin.course-sub-category.destroy', ['course_category' => $course_category->id, 'course_sub_category' => $subCategory->id]) }}"
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
