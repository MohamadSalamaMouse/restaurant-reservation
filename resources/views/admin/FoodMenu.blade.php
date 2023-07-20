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
                                    <input type="text" class="form-control" id="exampleInputUsername2"  style="font-style: italic;color:black;"name="title" required placeholder="title">
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
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label" >Description</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="exampleInputMobile" style="font-style: italic;color:black;"required name="description">
                                </div>
                            </div>



                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                            <button class="btn btn-dark">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <div class="page-header">  <div class="row">


            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Food table
                                 @if(Session::has('Delete'))
                                    <div class="alert alert-danger" role="alert">
                                        {{Session::get('Delete')}}
                                    </div>
                                @endif

                        </h4>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th> Title </th>
                                    <th> Price </th>
                                    <th> Description </th>
                                    <th> Image </th>
                                    <th> Actions </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $count=0?>
                                @foreach($foodData as $food)
                                    <tr>

                                        <td> {{$food->title}} </td>
                                        <td>
                                            {{$food->price}}
                                        </td>
                                        <td>
                                            {{$food->description}}
                                        </td>
                                        <td>
                                            <img src="{{$food->image}}" style="width: 120px;height:120px" alt="{{$food->title}}">
                                        </td>
                                        <td> <form action="{{route('FoodMenu.destroy',$food->id)}}" method="post">
                                                @csrf

                                                    <button type="submit" class="btn btn-danger"
                                                            onclick="return confirm('Are you sure you want to delete this Food?')">Delete</button>
                                                    <a  class="btn btn-outline-primary" href="{{route('FoodMenu.edit',$food->id)}}">Edit</a>

                                            </form>
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
