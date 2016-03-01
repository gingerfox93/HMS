@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $profile->name }}</div>
                <div class="panel-body">
                    <dl class="dl-horizontal">
                        <dt>Profile ID: </dt><dd>{{ $profile->id }}</dd>
                        <dt>Name: </dt><dd>{{ $profile->name }}</dd>
                        <dt>Email: </dt><dd>{{ $profile->email }}</dd>
                        <dt>Created: </dt><dd>{{  \Carbon\Carbon::createFromTimeStamp(strtotime($profile->created_at))->diffForHumans() }}</dd>
                        <dt>Last Logged In: </dt><dd>{{  \Carbon\Carbon::createFromTimeStamp(strtotime($profile->updated_at))->diffForHumans() }}</dd>
                    </dl>
                    {{link_to_route('profile.edit','Edit Profile', $profile->id)}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection