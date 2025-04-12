@extends('admin.layouts.master')

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Create Category</h3>
                    <div class="card-actions">
                        <a href="{{ route('admin.course-category.index') }}" class="btn btn-primary">
                            <i class="ti ti-arrow-left"></i>Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.course-category.store') }}" method="POST">
                        @csrf
                        {{-- <div class="mb-3">
                            <label class="form-label" for="name">Name</label>
                            <input type="text" class="form-control" placeholder="Enter category name" name="name">
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div> --}}
                        <x-input-block name="name" placeholder="Enter category name" />
                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit">
                                <i class="ti ti-device-floppy"></i>Create
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
