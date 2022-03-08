@extends('admin.masterlayout')
@section('pagecontent')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Petty Cash Record</h1>
                </div>
                <!--div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">System Settings</li>
                    </ol>
                </div-->
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">New Petty Cash Record</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fas fa-times"></i></button>
                </div>
            </div>


            <div class="card-body">
                <div class="box-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                    @endif
                    <form action="{{ route('savelocation') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Location Name</label>
                                    <input type="text" name="loc_name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Delivery Price</label>
                                    <input type="number" name="loc_price" class="form-control">
                                </div>

                               
                            </div>
                            <!-- /.col -->
                            <div class="col-md-6">
                            <div class="form-group">
                                    <label>Location Delivery Time</label>
                                    <input type="text" name="loc_delivery_time" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>&nbsp;</label>
                                    <div class="col"></div> <input type="submit" class="btn btn-primary float-right" value="Save Location">
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>
                    <!-- /.row -->
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                {{-- Footer--}}
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection