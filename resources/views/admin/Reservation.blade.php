@extends('admin.layout.master')
@section('title','Reservation')
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Reservations </h3>

        </div>
        <div class="row">


            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Reservations table</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th> # </th>
                                    <th> Name </th>
                                    <th> Email </th>
                                    <th> Phone </th>
                                    <th> Message </th>
                                    <th> Date </th>
                                    <th> Time </th>
                                    <th> Number Of Guests </th>
                                    <th> Actions </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $count=0?>
                                @foreach($reservations as $reservation)
                                    <tr>
                                        <td> {{++$count}} </td>
                                        <td> {{$reservation->name}} </td>
                                        <td>
                                            {{$reservation->email}}
                                        </td>
                                        <td>
                                            {{$reservation->phone}}
                                        </td>
                                        <td>
                                            {{$reservation->message}}
                                        </td>
                                        <td>
                                            {{$reservation->date}}

                                        </td>
                                        <td>
                                            {{$reservation->time}}
                                        </td>
                                        <td>
                                            {{$reservation->NumberOfGuests}}
                                        </td>

{{--                                        <td> <form action="{{route('user.destroy',$user->id)}}" method="post">--}}
{{--                                                @csrf--}}
{{--                                                @if($user->usertype == '0')--}}
{{--                                                    <button type="submit" class="btn btn-danger"--}}
{{--                                                            onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>--}}
{{--                                                @else--}}
{{--                                                    <h3>Not Allowed</h3>--}}
{{--                                                @endif--}}
{{--                                            </form>--}}
{{--                                        </td>--}}

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

