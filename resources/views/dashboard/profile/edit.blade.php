@extends('layouts.admin')
@section('title','Dashboard')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">Basic Forms</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">الرئيسية</a>
                                </li>
                                <li class="breadcrumb-item active"><a href="{{route('edit.profile')}}">الملف الشخصي</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="content-header-right col-md-6 col-12">
                    <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
                        <button class="btn btn-info round dropdown-toggle dropdown-menu-right box-shadow-2 px-2"
                                id="btnGroupDrop1" type="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false"><i class="ft-settings icon-left"></i> Settings</button>
                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1"><a class="dropdown-item" href="card-bootstrap.html">Cards</a><a class="dropdown-item"
                                                                                                                                                   href="component-buttons-extended.html">Buttons</a></div>
                    </div>
                </div>
            </div>
            <div class="content-body">

                <section id="horizontal-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-form">الملف الشخصي</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                @include('dashboard.include.alerts.success')
                                @include('dashboard.include.alerts.errors')
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form class="form" method="post" action="{{route('update.profile')}}">
                                            @csrf
                                            @method('put')
                                            <div class="form-body">
                                                <h4 class="form-section"><i class="fas fa-user"></i> تعديل الملف الشخصي</h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">الاسم</label>
                                                            <input type="text" id="projectinput1" class="form-control" value="{{$admin->name}}" placeholder="الاسم"
                                                                   name="name">
                                                            @error('name')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput2">البريد الإلكتروني</label>
                                                            <input type="email" id="projectinput2" class="form-control" placeholder="البريد الإلكتورني"
                                                                   name="email" value="{{$admin->email}}">
                                                            @error('email')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">كلمة المرور الحالية</label>
                                                            <input type="password" id="projectinput1" class="form-control"  placeholder="كلمة المرور الحالية"
                                                                   name="current_password">
                                                            @error('current_password')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput2">كلمة المرور الجديدة</label>
                                                            <input type="password" id="projectinput2" class="form-control" placeholder="كلمة المرور الجديدة"
                                                                   name="password">
                                                            @error('password')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>

                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">تأكيد كلمة المرور الجديدة</label>
                                                            <input type="password" id="projectinput1" class="form-control"  placeholder="تأكيد كلمة المرور الجديدة"
                                                                   name="password_confirmation">
                                                            @error('password_confirmation')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
{{--                                                <div class="row">--}}
{{--                                                    <div class="col-md-6">--}}
{{--                                                        <div class="form-group">--}}
{{--                                                            <label for="projectinput3">E-mail</label>--}}
{{--                                                            <input type="text" id="projectinput3" class="form-control" placeholder="E-mail" name="email">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="col-md-6">--}}
{{--                                                        <div class="form-group">--}}
{{--                                                            <label for="projectinput4">Contact Number</label>--}}
{{--                                                            <input type="text" id="projectinput4" class="form-control" placeholder="Phone" name="phone">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}

                                            <div class="form-actions">
                                                <button type="button" class="btn btn-warning mr-1">
                                                    <i class="ft-x"></i> إلغاء
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> حفظ
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
