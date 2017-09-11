@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @foreach($data as $id=>$name)
                    <a href="{{ url('company/'.$id)}}">{{$name}}</a>
                    <br>
                @endforeach
                <p>profit: <strong>{{$data->profit}}</strong></p>
                <p>debts: {{$data->debts}}</p>
                <p>in bank: {{$data->in_bank}}</p>
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>
                    <div class="panel-body">
                        <form action="{{route('company.store')}}" method="post">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="name"></label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Google Inc">
                            </div>
                            <div class="form-group">
                                <label for="owner"></label>
                                <input type="text" class="form-control" name="owner" id="owner" placeholder="First name">
                            </div>
                            <div class="form-group">
                                <label for="phone"></label>
                                <input type="tel" class="form-control" name="phone" id="phone" placeholder="+380117779988">
                            </div>
                            <div class="form-group">
                                <label for="email"></label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="test@google.com">
                            </div>
                            <div class="form-group">
                                <label for="site"></label>
                                <input type="text" class="form-control" name="site" id="site" placeholder="google.com">
                            </div>
                            <div class="form-group">
                                <label for="address"></label>
                                <input type="text" class="form-control" name="address" id="address" placeholder="Main str. 42">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="form-control" class="btn btn-primary" value="add">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
