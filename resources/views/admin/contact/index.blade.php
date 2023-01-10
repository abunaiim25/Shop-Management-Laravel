@extends('layouts.admin_layout')

@section('title')
Admin - Contact
@endsection

@section('search')
{{--sesrch--}}
@endsection

@section('admin_content')

<div class="sl-mainpanel m-3">
    <nav class="breadcrumb sl-breadcrumb">
        <p>Admin Panel / Contact </p>
    </nav>

    <div class="sl-pagebody ">

        <div class="card p-3">
            <div style="display: flex; justify-content: space-between;" class="mb-2">
                <h6 class="card-body-title">Contact list</h6>

                <div class="row">
                    <div class="my-auto">
                        <form action="{{url('contact_search')}}" method="GET" class="nav-link mt-2 mt-md-0  d-lg-flex search">
                            {{csrf_field()}}

                            <div class="input-group ">
                                <input type="search" name="search" id="contact_search" class=" form-control bg-white text-dark " placeholder="search contact">
                                <button type="submit" class="btn" title="Search">
                                    <i class="fa-solid fa-magnifying-glass"></i></button>
                            </div>
                        </form>
                    </div>
                    <div class="my-auto">
                    </div>
                </div>
            </div>

            @if (session('Catupdated'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('Catupdated') }}</strong>
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


            <div class="table-wrapper " style="overflow: auto">
                @if ($contact->count() > 0)
                <table id="datatable1" class="table display responsive nowrap text-white">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Date & Time</th>Customer
                            <th> Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Message</th>
                            <th>Status</th>
                            <th>Send Mail</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($contact as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td> {{$item->updated_at ?? $item->created_at}}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ Str::limit(strip_tags($item->message), 20) }}
                                <button type="button" class="btn btn-warning btn-sm seenBtn" value=" {{$item->id}}">
                                    <i class="fa fa-eye"></i>
                                </button>
                            </td>

                            <td>
                                @if ($item->status == "Progress")
                                <a class="btn btn-info btn-sm" href="{{ url('contact_seen_admin', $item->id) }}">
                                    <i class="fas fa-thumbs-up"></i> </a>
                                @else
                                <span class="badge badge-info">Seen</span>
                                @endif
                            </td>

                            <td><a class="btn btn-primary btn-sm" href="{{ url('contact_email_view', $item->id) }}"><i class="fas fa-share"></i></a></td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>

                @else
                <h2 class="text-center p-5">Contacts Not Available</h2>
                @endif

            </div><!-- table-wrapper -->
        </div>



        <!--seen Modal-->
        <div class="modal fade" id="seenModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="
            true">
            <div class="modal-dialog " role="document">
                <div class="modal-content  bg-white">
                    <div class="text-center my-4">
                        <h4 class="modal-title w-100 font-weight-bold text-dark">Message
                        </h4>
                    </div>

                    <div class="modal-body mx-3">
                        <div class="row">

                            <div class="col-lg-12 col-md-12 col-12">
                                <textarea style="width:100%;" rows="10" id="message" readonly></textarea>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!--End seen Modal-->


        <div class="d-flex ">
            {{-- (paginate) ->Providers\AppServiceProvider.php --}}
            {{ $contact->links() }}
            {{-- {{$appoint->onEachSide(1)-> links()}} --}}
        </div>
    </div>


    <!--seen Modal-->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $(document).on('click', '.seenBtn', function() {
                var id = $(this).val();
                //alert(response);
                $('#seenModal').modal('show');

                $.ajax({
                    type: "GET",
                    url: "/message_seen/" + id,
                    success: function(response) {
                        console.log(response.id);
                        $('#message').val(response.contact.message);
                    }
                });
            });
        });
    </script>
    @endsection