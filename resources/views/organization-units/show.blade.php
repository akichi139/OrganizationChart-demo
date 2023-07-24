@extends('layouts.app')

@section('content')
@livewire('display-organization-unit', ['orgUnit' => $orgUnit])
@endsection