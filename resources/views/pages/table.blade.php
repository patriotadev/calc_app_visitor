@extends('layouts.base')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h6>Visitor Table</h6>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">No.</th>
                        <th scope="col">User ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Time IN</th>
                        <th scope="col">Time OUT</th>
                        <th scope="col">Duration</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($visitor as $v)
                      <tr>
                        <th>{{$loop->iteration}}</th>
                        <td>{{$v->user_id}}</th>
                        <td>{{$v->name}}</td>
                        <td>{{$v->email}}</td>
                        <td>{{$v->timestamp_in}}</td>
                        <td>{{$v->timestamp_out}}</td>
                        <td>
                            @php
                                $diff = (strtotime($v->timestamp_out) - strtotime($v->timestamp_in)) + strtotime("00:00:00");
                                echo date('H:i:s', $diff);
                            @endphp
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
            <div class="card-footer">
            </div>
        </div>
    </div>
@endsection