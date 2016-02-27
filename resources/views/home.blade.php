@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Search</div>
                <div class="panel-body">
                    <form class="form-inline">
                        <div class="form-group">
                            <input id="profileSearch" autocomplete="off" class="form-control" name="name" placeholder="Name">
                        </div>
                        <button type="submit" class="btn btn-default">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Create Case</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Unique ID</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="" placeholder="XXXXXXXX">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputPassword3" placeholder="John Smith">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Age</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="inputPassword3" placeholder="0">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Area</label>
                            <div class="col-sm-10">
                                <select class="form-control">
                                    <option>Birmingham</option>
                                    <option>Stafford</option>
                                    <option>Stoke</option>
                                    <option>Manchester</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Login <abbr title="Personal Identification Number">PIN</abbr></label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="inputPassword3" placeholder="0000" max="9999">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default">Create</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">My Cases</div>
                <div class="panel-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Unique ID</th>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Area</th>
                                <th>Last Active</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="active">
                                <td>00000001</td>
                                <td>Bromley Spelman</td>
                                <td>4</td>
                                <td>Stafford</td>
                                <td>26 minutes ago</td>
                                <td style="text-align: center;">
                                    <btn class="btn btn-xs btn-info">View</btn>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('page-script')
<script type="text/javascript">
    //Initiliaze autocomplete on search form
    $('#profileSearch').typeahead({
        onSelect: function(item) {
            console.log(item);
        },
        ajax: { 
            url: '/profile/search',
            triggerLength: 1,
            method: "POST",
            valueField: 'id',
            displayField: 'name',
        }
    });
</script>
@stop