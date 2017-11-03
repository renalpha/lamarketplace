@if(count($errors) > 0)
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger text-center">
                    @foreach($errors->all() AS $error)
                        {!!  $error !!}<br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endif

@if(Session::has('status'))
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success text-center">
                    {!! Session::get('status') !!}
                </div>
            </div>
        </div>
    </div>
@endif