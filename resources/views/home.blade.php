@extends('layouts.app')

@section('content')
    <div class="container" xmlns="http://www.w3.org/1999/html">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Inventory</div>

                    <div class="panel-body">
                        <table class="table table-responsive table-striped table-hover">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Amount</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)

                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td id="amount-{{ $product->id }}">{{ $product->pivot->amount }}</td>
                                    <td>
                                        <button id="add-{{ $product->id }}" class="btn btn-success">+</button>
                                        <button id="subtract-{{ $product->id }}" class="btn btn-warning">-</button>
                                    </td>
                                </tr>
                                <script>

                                    $('#add-{{ $product->id }}').on('click', function () {
                                        $.ajax({
                                            url: '/inventory/{{ $product->id }}',
                                            method: 'PUT',
                                            headers: {
                                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                            },
                                            data: {'method': 'add'},
                                            success: function (data) {
                                                $('#amount-{{ $product->id }}').html(parseInt($('#amount-{{ $product->id }}').html()) + 1);
                                            }
                                        });
                                    });
                                    $('#subtract-{{ $product->id }}').on('click', function () {
                                        $.ajax({
                                            url: '/inventory/{{ $product->id }}',
                                            method: 'PUT',
                                            headers: {
                                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                            },
                                            data: {'method': 'subtract'},
                                            success: function (data) {
                                                $('#amount-{{ $product->id }}').html(parseInt($('#amount-{{ $product->id }}').html()) - 1);
                                            }
                                        });
                                    });
                                </script>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="panel-footer">
                        <div>
                            <a href="{{ url('inventory/create') }}" class="btn btn-success pull-right">Add Product</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
