@extends('admin.layouts.master')

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Create Language</h3>
                    <div class="card-actions">
                        <a href="{{ route('admin.course-language.index') }}" class="btn btn-danger">
                            <i class="ti ti-arrow-left"></i>Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.course-language.store') }}" method="POST">
                        @csrf
                        <x-input-block name="name" placeholder="Enter language name" />
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
