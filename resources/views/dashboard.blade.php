@extends('layouts.app')

@section('content')
    <div class="container">
        @role('admin')
            <p>Selamat datang, Admin!</p>
        @endrole

        @role('staff')
            <p>Selamat datang, Staff!</p>
        @endrole

        @role('user')
            <p>Selamat datang, User!</p>
        @endrole
    </div>
@endsection
