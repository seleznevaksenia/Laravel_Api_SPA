@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                    <form action="{{route('company.store')}}" method="post">
                        {{csrf_field()}}
                        <label for="name"></label>
                        <input type="text" name="name" id="name" placeholder="Google Inc">
                        <label for="owner"></label>
                        <input type="text" name="owner" id="owner" placeholder="First name">
                        <label for="phone"></label>
                        <input type="tel" name="phone" id="phone" placeholder="+380117779988">
                        <label for="email"></label>
                        <input type="email" name="email" id="email" placeholder="test@google.com">
                        <label for="site"></label>
                        <input type="text" name="site" id="site" placeholder="google.com">
                        <label for="address"></label>
                        <input type="text" name="address" id="address" placeholder="Main str. 42">
                        <input type="submit" class="btn btn-primary" value="add">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
