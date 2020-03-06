@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <form action="{{route('note')}}" method="post">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h4 style="text-align: center">Add Note</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-row mb-3">
                                <div class="col">
                                    <small class="text-uppercase text-dark">Title<span
                                            class="required text-danger">*</span></small>
                                    <input type="text" id="title" name="title" class="form-control"
                                           placeholder="Title" required>
                                </div>
                            </div>
                            <div class="form-row mb-3">
                                <div class="col">
                                    <small class="text-uppercase text-dark">Description<span
                                            class="required text-danger">*</span></small>
                                    <textarea rows="15" id="description" name="description" class="form-control"
                                              placeholder="Description" required>
                                    </textarea>
                                </div>
                            </div>
                            <div class="form-row mb-3">
                                <div class="col">
                                    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Submit
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <br>

        <div class="row">
            <div class="col-md-12">
                <div class="card comp-card">
                    <div class="card-body">
                        <h5 class="w-100 text-center">All Mother categories</h5>
                        <div class="table-responsive">
                            <table class="table table-hover" id="note">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(\App\note::all() as $index => $mc)
                                    <tr>
                                        <th scope="row">{{$index+1}}</th>
                                        <td>{{$mc->title}}</td>
                                        <td>{{$mc->description}}</td>
                                        <td>{{$mc->created_at->format('d M Y, h:i A')}}</td>
                                        <td>
                                            <a href="{{ route('note-edit', ['id' => $mc->id]) }}"
                                               class="btn btn-sm btn-outline-success">Edit</a>
                                            <a id="deleteBtn" data-id="{{$mc->id}}" href="#"
                                               class="btn btn-sm btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection



@section('script')


    <script>
        $('#note').DataTable({

        });
    </script>


    <script>
        $(document).on('click', '#deleteBtn', function (el) {
            var mcId = $(this).data("id");
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this Note",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        swal("You have deleted Note", {
                            icon: "success",
                        });
                        window.location.href = window.location.href = "/note/delete/" + mcId;
                    }


                });
        });

        $(document).on('click', '#deleteNo', function (el) {
            swal("Oops", "You can't delete this. Some item belongs to it!!", "error")
        })
    </script>
@endsection
