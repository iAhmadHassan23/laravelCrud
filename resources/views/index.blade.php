@extends('layouts.main')

@section('main-section')


<section class="my-5">
    <div class="container">
        <div class="row text-align-center">
            <div class="col-lg-6">
                <form action="">
                    <div class="input-group">
                        <input type="search" class="form-control" name="search" placeholder="Search..." />
                        <button class="btn btn-primary">Search</button>
                    </div>
                </form>
            </div>
            <div class="col-lg-6">
                <div class="text-end"><a href="{{ url('/add-contact') }}" class="btn btn-primary">Add New Record</a></div>
            </div>
            <div class="col-lg-12 my-5">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Middle Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Title</th>
                        <th scope="col">Suffix</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Email Address</th>
                        <th scope="col">Date</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $contact as $cont )
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{$cont->first_name}}</td>
                            <td>{{$cont->middle_name}}</td>
                            <td>{{$cont->last_name}}</td>
                            <td>{{$cont->title}}</td>
                            <td>{{$cont->Suffix}}</td>
                            <td>
                                @foreach( $num as $phone )
                                    @if( $phone->contact_id == $cont->id )
                                        {{ $phone->number }}
                                    @endif
                                @endforeach
                            </td>
                            <td>{{$cont->email}}</td>
                            <td>{{$cont->updated_at}}</td>
                            <td> <a href="{{ url('/') }}/edit/{{ $cont->id }}" class="btn btn-primary">Edit</a>
                                <a href="{{url('/')}}/delete/{{$cont->id}}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                            
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
       
    </div>
</section>


@endsection