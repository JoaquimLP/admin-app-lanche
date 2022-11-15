@extends('layouts.user_type.auth')

@section('content')
    @livewire('admin.produto-categoria', ['produto' => $produto])
@endsection

