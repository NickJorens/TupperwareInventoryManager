@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <form method="POST" action="{{ url('inventory') }}">
                        {{ csrf_field() }}
                        <div class="panel-heading">Add product to inventory</div>

                        <div class="panel-body">

                            <div class="form-group">
                                <label>Products
                                    <select name="product" class="form-control" required>
                                        @foreach($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                                        @endforeach
                                    </select>
                                </label>
                            </div>

                            <div class="form-group">
                                <label>Amount
                                    <input type="number" min="1" class="form-control" name="amount"/>
                                </label>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <div>
                            <button type="submit" class="btn btn-primary pull-right">Add</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
