@extends('frontend.layouts.master')

@section('content')
    <!--===========================
                        BREADCRUMB START
                    ============================-->
    <section class="wsus__breadcrumb" style="background: url(images/breadcrumb_bg.jpg);">
        <div class="wsus__breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12 wow fadeInUp">
                        <div class="wsus__breadcrumb_text">
                            <h1>Student Dashboard</h1>
                            <ul>
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li>Student Dashboard</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--===========================
                        BREADCRUMB END
                    ============================-->


    <!--===========================
                        DASHBOARD OVERVIEW START
                    ============================-->
    <section class="wsus__dashboard mt_90 xs_mt_70 pb_120 xs_pb_100">
        <div class="container">
            <div class="row">
                @include('frontend.student-dashboard.sidebar')
                <div class="col-xl-9 col-md-8 wow fadeInRight">
                    <div class="wsus__dashboard_contant">
                        <div class="wsus__dashboard_contant_top d-flex flex-wrap justify-content-between">
                            <div class="wsus__dashboard_heading">
                                <h4>Update Your Information</h4>
                            </div>
                        </div>

                        <form action="{{ route('student.profile.update') }}" method="post"
                            class="wsus__dashboard_profile_update" enctype="multipart/form-data">
                            @csrf
                            <div class="wsus__dashboard_profile wsus__dashboard_profile_avatar">
                                <div class="img">
                                    <img src="{{ asset(auth()->user()->image) }}" alt="profile" class="img-fluid w-100">
                                    <label for="profile_photo">
                                        <img src="{{ asset('frontend/assets/images/dash_camera.png') }}" alt="camera"
                                            class="img-fluid w-100">
                                    </label>
                                    <input type="file" id="profile_photo" name="avatar" hidden="">
                                </div>
                                <div class="text">
                                    <h6>Your avatar</h6>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="wsus__dashboard_profile_update_info">
                                        <label>Full name</label>
                                        <input type="text" placeholder="Enter your fullname" name="name"
                                            value="{{ auth()->user()->name }}">
                                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="wsus__dashboard_profile_update_info">
                                        <label>Headline</label>
                                        <input type="text" placeholder="Enter your headline" name="headline"
                                            value="{{ auth()->user()->headline }}">
                                        <x-input-error :messages="$errors->get('headline')" class="mt-2" />
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="wsus__dashboard_profile_update_info">
                                        <label>Email</label>
                                        <input type="text" placeholder="Enter your email" name="email"
                                            value="{{ auth()->user()->email }}">
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="wsus__dashboard_profile_update_info">
                                        <label>Gender</label>
                                        <select class="form-control" name="gender">
                                            <option value="">Select</option>
                                            <option @selected(auth()->user()->gender == 'male') value="male">Male</option>
                                            <option @selected(auth()->user()->gender == 'female') value="female">Female</option>
                                        </select>
                                        <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="wsus__dashboard_profile_update_info">
                                        <label>About Me</label>
                                        <textarea rows="7" placeholder="Your text here" name="about">{{ auth()->user()->bio }}</textarea>
                                        <x-input-error :messages="$errors->get('about')" class="mt-2" />
                                    </div>
                                </div>
                                <div class="col-xl-12 text-end">
                                    <div class="wsus__dashboard_profile_update_btn">
                                        <button type="submit" class="common_btn">Update Profile</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="wsus__dashboard_contant">
                        <div class="wsus__dashboard_contant_top d-flex flex-wrap justify-content-between">
                            <div class="wsus__dashboard_heading">
                                <h4>New Password</h4>
                            </div>
                        </div>

                        <form action="{{ route('student.profile.update-password') }}" method="post"
                            class="wsus__dashboard_profile_update">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="wsus__dashboard_profile_update_info">
                                        <label>Current Password</label>
                                        <input type="password" placeholder="Enter your current password"
                                            name="current_password">
                                        <x-input-error :messages="$errors->get('current_password')" class="mt-2" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="wsus__dashboard_profile_update_info">
                                        <label>Password</label>
                                        <input type="password" placeholder="Enter your new password" name="password">
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="wsus__dashboard_profile_update_info">
                                        <label>Confirm Password</label>
                                        <input type="password" placeholder="Enter your confirm password"
                                            name="password_confirmation">
                                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                    </div>
                                </div>
                                <div class="col-xl-12 text-end">
                                    <div class="wsus__dashboard_profile_update_btn">
                                        <button type="submit" class="common_btn">Update Password</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="wsus__dashboard_contant">
                        <div class="wsus__dashboard_contant_top d-flex flex-wrap justify-content-between">
                            <div class="wsus__dashboard_heading">
                                <h4>Social Connect</h4>
                            </div>
                        </div>
                        <form action="{{ route('student.profile.update-social') }}" method="post" class="wsus__dashboard_profile_update">
                            @csrf
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="wsus__dashboard_profile_update_info">
                                        <label>Facebook</label>
                                        <input type="text" placeholder="Enter your Facebook URL" name="facebook" value="{{ auth()->user()->facebook }}">
                                        <x-input-error :messages="$errors->get('facebook')" class="mt-2" />
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="wsus__dashboard_profile_update_info">
                                        <label>X</label>
                                        <input type="text" placeholder="Enter your X URL" name="x" value="{{ auth()->user()->x }}">
                                        <x-input-error :messages="$errors->get('x')" class="mt-2" />
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="wsus__dashboard_profile_update_info">
                                        <label>Linkedin</label>
                                        <input type="text" placeholder="Enter your Linkedin URL" name="linkedin" value="{{ auth()->user()->linkedin }}">
                                        <x-input-error :messages="$errors->get('linkedin')" class="mt-2" />
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="wsus__dashboard_profile_update_info">
                                        <label>Website</label>
                                        <input type="text" placeholder="Enter your Website URL" name="website" value="{{ auth()->user()->website }}">
                                        <x-input-error :messages="$errors->get('website')" class="mt-2" />
                                    </div>
                                </div>
                                <div class="col-xl-12 text-end">
                                    <div class="wsus__dashboard_profile_update_btn">
                                        <button type="submit" class="common_btn">Update Social</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--===========================
                        DASHBOARD OVERVIEW END
                    ============================-->
@endsection
