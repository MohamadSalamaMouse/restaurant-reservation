@extends('admin.layout.master')
@section('title','Food')
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Food </h3>

        </div>
        <div class="row">

            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Food      @if(Session::has('msg'))
                                <div class="alert alert-success" role="alert">
                                    {{Session::get('msg')}}
                                </div>
                            @endif</h4>

                        <form class="forms-sample" enctype="multipart/form-data" method="post" action="{{route('food.store')}}">
                           @csrf
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">title</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="exampleInputUsername2" name="title" required placeholder="title">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">price</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="exampleInputUsername2" style="font-style: italic;color:black;" name="price" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Image</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control" id="exampleInputMobile" name="image" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Description</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="exampleInputMobile" required name="description">
                                </div>
                            </div>



                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                            <button class="btn btn-dark">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>




        </div>
    </div>
@endsection
