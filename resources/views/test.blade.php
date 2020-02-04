@extends('layouts.app')
@section('content') 
<div class="card-body">
                    <div class="list-group">
                        <div class="card-body">
                        @if(count($orders))
                        <div class="list-group">
                        @foreach ($orders as $order) 
                        <div class="list-group-item">
                       <a href="/location/">{{ $order->price }}</a>
                       <!-- <a href="/location/{{ $location->id }}/edit" class="btn btn-info float-right">Edit</a></td> -->
                        </div>
                        @endforeach
                        </div>
                        @endif
@endsection 