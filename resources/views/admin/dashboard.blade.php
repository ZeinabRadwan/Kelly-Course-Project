@extends('layouts.app')

@section('content')
    <h1>Admin Dashboard</h1>
    <a href="{{ route('admin.courses.index') }}">Manage Courses</a>
    <a href="{{ route('admin.students.index') }}">Manage Students</a>
@endsection
