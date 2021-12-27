@extends('admin.layouts.master')

@section('content')

    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-inbox bg-blue"></i>
                    <div class="d-inline">
                        <h5>Records</h5>
                        <span>List of All Records</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <nav class="breadcrumb-container" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="../index.html"><i class="ik ik-home"></i></a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('community.index') }}">Records</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Index</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            @if (Session::has('message'))
                <div class="alert bg-success alert-success text-white text-center" role="alert">
                    {{ Session::get('message') }}
                </div>
            @endif
            <div class="card">
                <div class="card-body ">
                    <table id="data_table" class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Matrics No</th>
                                <th>Role Type</th>
                                <th class="nosort">Avatar</th>
                                <th>Status</th>
                                <th>Gender</th>
                                <th>Description</th>
                                <th class="nosort">&nbsp;</th>
                                <th class="nosort">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($communities) > 0)
                                @foreach ($communities as $community)
                                    <tr>
                                        <td>{{ $community->name }}</td>
                                        
                                        <td>{{ $community->matricsno }}</td>
                                        <td>{{ $community->role }}</td>
                                        <td><img src="data:image/jpg;base64,{{ chunk_split(base64_encode($community->image)) }}" width="150"  alt=""/>
                                      <!--   <img src="/image/{{ $community->image }}" class="table-user-thumb"
                                                alt=""> -->
                                        </td>
                                        <td>{{ $community->status }}</td>
                                        <td>{{ $community->gender }}</td>
                                        <td>{{ $community->description }}</td>
                                        <td>
                                            <div class="table-actions">
                                                <a href="#" data-toggle="modal" data-target="#exampleModal{{ $community->id }}">
                                                    <i class="btn btn-primary ik ik-eye"></i>
                                                </a>
                                                <a href="{{ route('community.edit', [$community->id]) }}"><i
                                                        class="btn btn-warning ik ik-edit-2"></i></a>

                                                <a href="{{ route('community.show', [$community->id]) }}">
                                                    <i class="btn btn-danger ik ik-trash-2"></i>
                                                </a>

                                            </div>
                                        </td>
                                        <td></td>

                                    </tr>

                                    <!-- View Modal -->
                                    @include('community.modal')
                                @endforeach

                            @else
                                <td>No community to display</td>
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
