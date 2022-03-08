@extends('admin.masterlayout')
@section('pagecontent')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Gas Purchase History</h1>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">View All Locations</h3>

                <div class="card-tools">

                </div>
            </div>
            <div class="card-body">
                <div class="box-body">

                    <div class="table-responsive-sm table-striped">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Location Name</th>
                                    <th>Delivery Cost</th>
                                    <th>Delivery Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($locations as $location)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $location->loc_name }}</td>
                                    <td>#{{ number_format($location->loc_price) }}</td>
                                    <td>#{{ ($location->loc_delivery_time) }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-primary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                               Action
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="#">Edit</a>
                                                <a class="dropdown-item" href="#">Delete</a>
                                            </div>
                                        </div>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                    <!-- /.row -->
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                {{$locations->links() }}
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection