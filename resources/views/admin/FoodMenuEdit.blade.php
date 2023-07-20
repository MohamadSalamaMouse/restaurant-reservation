@extends('admin.layout.master')
@section('title','FoodEdit')
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> FoodEdit </h3>

        </div>
        <div class="row">

            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Food Edit     @if(Session::has('msg'))
                                <div class="alert alert-success" role="alert">
                                    {{Session::get('msg')}}
                                </div>
                            @endif</h4>

                        <form class="forms-sample" enctype="multipart/form-data" method="post" action="{{route('food.update',$food->id)}}">
                            @csrf
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">title</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="exampleInputUsername2"  style="font-style: italic;color:black;"name="title" required placeholder="title" value="{{$food->title}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">price</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="exampleInputUsername2" style="font-style: italic;color:black;" name="price" value="{{$food->price}}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Image</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control" id="exampleInputMobile" name="image" >
                                    <img src="{{asset("$food->image")}}" alt="{{$food->title}}" style="width: 200px;height: 200px">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label" >Description</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="exampleInputMobile" style="font-style: italic;color:black;"required name="description" value="{{$food->description}}">
                                </div>
                            </div>



                            <button type="submit" class="btn btn-primary me-2">Submit</button>

                        </form>
                    </div>
                </div>
            </div>

        </div>


        </div>
@endsection
