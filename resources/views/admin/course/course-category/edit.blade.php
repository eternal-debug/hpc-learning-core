@extends('admin.layouts.master')

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Update Category</h3>
                    <div class="card-actions">
                        <a href="{{ route('admin.course-category.index') }}" class="btn btn-danger">
                            <i class="ti ti-arrow-left"></i>Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.course-category.update', $course_category->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <x-image-preview class="" src="{{ asset($course_category->image) }}" />
                            </div>
                            <div class="col-md-6">
                                <x-input-file-block name="image" />
                            </div>
                            <div class="col-md-6">
                                <x-input-block name="icon" placeholder="Enter category icon" :value="$course_category->icon">
                                    <x-slot name="hint">
                                        <small class="text-muted">Get icon classes from <a href="https://tabler.io/icons"
                                                target="_blank">Tabler Icons</a></small>
                                    </x-slot>
                                </x-input-block>
                            </div>
                            <div class="col-md-12">
                                <x-input-block name="name" placeholder="Enter category name" :value="$course_category->name" />
                            </div>
                            <div class="col-md-3">
                                <x-input-toggle-block name="show_at_trending" label="Show at trending?" :checked="$course_category->show_at_trending" />
                            </div>
                            <div class="col-md-3">
                                <x-input-toggle-block name="status" label="Status" :checked="$course_category->status" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit">
                                <i class="ti ti-device-floppy"></i>Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
