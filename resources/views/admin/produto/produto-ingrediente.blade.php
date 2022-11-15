@extends('layouts.user_type.auth')

@section('content')
    @livewire('admin.produto-ingrediente-component', ['produto' => $produto])
@endsection

