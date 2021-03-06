@extends('layouts.master')

@section('content-header')
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title ">
                {{$team['team_name']}}
            </h3>
        </div>
    </div>
@endsection

@section('content-body')

    <div id="app">
        <admin-view-team-moderator :team-id='@json($id)' :team-info='@json($team)'></admin-view-team-moderator>
    </div>

@endsection
