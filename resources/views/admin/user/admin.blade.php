@extends('layouts.admin_layout')

@section('title')
Admin - Admins
@endsection


@section('search')
{{--sesrch--}}
@endsection


@section('admin_content')

<div class="sl-mainpanel m-4">
    <nav class="breadcrumb sl-breadcrumb">

        <p>Admin Panel / Admins</p>
    </nav>

    <div class="sl-pagebody">
        <div class="row row-sm">
            <div class="col-md-12">

                @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('status') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif

                @if (session('delete'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ session('delete') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif



                <div class="card p-4" style="overflow: auto">

                    <div style="display: flex; justify-content: space-between;" class="mb-2">
                        <h6 class="card-body-title mb-4">Admins List</h6>

                        <div class="row">
                            <div class="my-auto">
                                <form action="{{url('admins_search')}}" method="GET" class="nav-link mt-2 mt-md-0  d-lg-flex search">
                                    {{csrf_field()}}

                                    <div class="input-group ">
                                        <input type="search" name="search" id="search_admin" class=" form-control bg-white text-dark " placeholder="search admins">
                                        <button type="submit" class="btn" title="Search">
                                            <i class="fa-solid fa-magnifying-glass"></i></button>
                                    </div>

                                </form>
                            </div>
                        </div>

                    </div>




                    <div class="table-wrapper" style="overflow: auto">

                        <ul class="nav nav-pills">
                            <li class="nav-item">
                                <a class="nav-link text-success btn-sm" aria-current="page" href="{{ url('users') }}">Users</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active btn-primary btn-sm" href="{{ url('admins') }}">Admins</a>
                            </li>
                        </ul>


                        @if ($admins->count() > 0)
                        <div class="product">
                            <table width="100%" class="table display responsive nowrap text-white">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>Status</th>
                                        <th>Create User</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <?php $i = $admins->perPage() * ($admins->currentPage() - 1); ?>

                                    @foreach ($admins as $row)
                                    <tr>
                                        <td> <?php $i++; ?> {{ $i }}</td>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->email }}</td>
                                        <td>{{ $row->phone }}</td>{{-- $row->category_id --}}
                                        <td>{{ $row->address }}</td>
                                        <td>
                                            @if ($row->usertype == 1)
                                            <span class="badge badge-primary">Admin</span>
                                            @else
                                            <span class="badge badge-success">User</span>
                                            @endif
                                        </td>

                                        <td>
                                            @if ($row->usertype == 1)
                                            <a href="{{ url('user_create/' . $row->id) }}" class="btn btn-sm btn-success"><i class="fa fa-arrow-up"></i></a>
                                            @else
                                            @endif
                                        </td>

                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        @else
                        <h2 class="text-center p-5">Admins Not Available</h2>
                        @endif
                    </div><!-- table-wrapper -->
                </div><!-- card -->



            </div>

        </div>

    </div>


    <div class="d-flex mt-5">
        {{-- (paginate) ->Providers\AppServiceProvider.php --}}
        {{ $admins->links() }}
        {{-- {{$appoint->onEachSide(1)-> links()}} --}}
    </div>
</div>

@endsection