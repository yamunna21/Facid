@extends('admin.layouts.master')

@section('content')

    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-edit bg-blue"></i>
                    <div class="d-inline">
                        <h5>Records</h5>
                        <span>Update Record</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <nav class="breadcrumb-container" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ url('dashboard') }}"><i class="ik ik-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('community.index') }}">Record</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Update</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-10">
            @if (Session::has('message'))
                <div class="alert bg-success alert-success text-white text-center" role="alert">
                    {{ Session::get('message') }}
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h3>Update Record</h3>
                </div>
                <div class="card-body">
                    <form class="forms-sample" action="{{ route('community.update', [$community->id]) }}" method="post"
                        enctype="multipart/form-data">@csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                    value="{{ $community->name }}">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label for="">Matrics No</label>
                                <input type="matricsno" name="matricsno" class="form-control @error('matricsno') is-invalid @enderror"
                                    value="{{ $community->matricsno }}">
                                @error('matricsno')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                             <div class="col-lg-6">
                                <label for="">Role Type</label>
                                <select class="form-control @error('role') is-invalid @enderror" name="role">
                                    @foreach (['staff', 'student'] as $role)
                                        <option value="{{ $role }}" @if ($community->role == $role)selected
                                    @endif>{{ $role }}</option>
                                    @endforeach
                                </select>
                                @error('role')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" name="image" class="form-control" placeholder="image">
                                    <img src="data:image/jpg;base64,{{ chunk_split(base64_encode($community->image)) }}" width="300px">
                                    <span class="input-group-append">

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <label for="">Status</label>
                                <select class="form-control @error('status') is-invalid @enderror" name="status">
                                    @foreach (['quarantine', 'covid19+'] as $status)
                                        <option value="{{ $status }}" @if ($community->status == $status)selected
                                    @endif>{{ $status }}</option>
                                    @endforeach
                                </select>
                                @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                             <div class="col-lg-6">
                                <label for="">Gender</label>
                                <select class="form-control @error('gender') is-invalid @enderror" name="gender">
                                    @foreach (['male', 'female'] as $gender)
                                        <option value="{{ $gender }}" @if ($community->gender == $gender)selected
                                    @endif>{{ $gender }}</option>
                                    @endforeach
                                </select>
                                @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleTextarea1">About</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="exampleTextarea1"
                                rows="4" name="description">{{ $community->description }}
                            </textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <button   href="{{ url()->previous() }}" class="btn btn-light">Cancel</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
