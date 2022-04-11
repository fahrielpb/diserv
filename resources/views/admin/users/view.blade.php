@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>User Details
                    </h4>
                    <hr>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mt-3">
                            <label class="form-label" for="">User Role</label>
                            <div class="form-control p-2 border" value="">
                                {{ $users->role_as == '0'? 'User':'Admin' }}
                            </div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label class="form-label" for="">First Name</label>
                            <div class="form-control p-2 border">
                                {{ $users->name }}
                            </div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label class="form-label" for="">Last Name</label>
                            <div class="form-control p-2 border">
                                {{ $users->lname }}
                            </div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label class="form-label" for="">Email</label>
                            <div class="form-control p-2 border">
                                {{ $users->email }}
                            </div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label class="form-label" for="">Phone</label>
                            <div class="form-control p-2 border">
                                {{ $users->phone }}
                            </div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label class="form-label" for="">Address 1</label>
                            <div class="form-control p-2 border">
                                {{ $users->address1 }}
                            </div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label class="form-label" for="">Address 2</label>
                            <div class="form-control p-2 border">
                                {{ $users->address2 }}
                            </div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label class="form-label" for="">Provinsi</label>
                            <div class="form-control p-2 border">
                                {{ $users->provinsi }}
                            </div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label class="form-label" for="">Kecamatan</label>
                            <div class="form-control p-2 border">
                                {{ $users->kecamatan }}
                            </div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label class="form-label" for="">Kelurahan/Desa</label>
                            <div class="form-control p-2 border">
                                {{ $users->kelurahan }}
                            </div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label class="form-label" for="">Kode Pos</label>
                            <div class="form-control p-2 border">
                                {{ $users->kode_pos }}
                            </div>
                        </div>
                    </div>
                    <hr>
                    <a href="{{ url('users') }}" class="btn btn-primary btn-sm float-end">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection