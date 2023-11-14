@extends('backend.layouts.app')


@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 offset-2">

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Create Coupon</h3>
                    @include('backend.partials.msg')
                </div>
                <form role="form" method="post" action="{{route('admin.storeCoupon')}}">
                    {{csrf_field()}}
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Cupon Code*</label>
                                    <input type="text" name="code" class="form-control" placeholder="Cupon Code" value="{{old('code')}}" required />
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Cupon Value*</label>
                                    <input type="text" name="value" class="form-control" placeholder="Cupon Value" value="{{old('value')}}" required />
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Select Cupon type*</label>
                                    <select type="text" name="type" class="form-control" required>
                                        <option value="percent">Percent</option>
                                        <option value="fixed">Fixed</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection