@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <form method="POST" action="{{ url('category') }}">
                        {{ csrf_field() }}
                        <div class="panel-heading">Create Category</div>

                        <div class="panel-body">

                            <div class="form-group">
                                <label>Name
                                    <input type="text" name="name" required/>
                                </label>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <button type="submit" class="btn btn-primary pull-right">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
