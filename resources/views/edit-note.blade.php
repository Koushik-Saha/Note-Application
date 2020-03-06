@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <form action="{{route('note-edit', ['id' => $note->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h4 style="text-align: center">Edit</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-row mb-3">
                                <div class="col">
                                    <small class="text-uppercase text-dark">Title<span
                                            class="required text-danger">*</span></small>
                                    <input type="text" id="mother_name" name="title" class="form-control"
                                           placeholder="Title" value="{{ old('title', $note->title) }}" required="">

                                </div>
                            </div>

                            <div class="form-row mb-3">
                                <div class="col">
                                    <small class="text-uppercase text-dark">Note<span
                                            class="required text-danger">*</span></small>
                                    <textarea rows="15" id="description" name="description" class="form-control"
                                              placeholder="Description"  required="">{{ old('description', $note->description) }}</textarea>
                                </div>
                            </div>

                            <div class="form-row mb-3">
                                <div class="col">
                                    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <br>
    </div>
@endsection
