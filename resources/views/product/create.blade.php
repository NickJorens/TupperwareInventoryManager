@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <form method="POST" action="{{ url('product') }}">
                        {{ csrf_field() }}
                        <div class="panel-heading">Create Product</div>

                        <div class="panel-body">
                            <div class="form-group">
                                <label>Code
                                    <input type="text" name="code" required/>
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Name
                                    <input type="text" name="name" required/>
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Description
                                    <textarea name="description"></textarea>
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Categorie
                                    <select class="form-control" name="category" required>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
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
