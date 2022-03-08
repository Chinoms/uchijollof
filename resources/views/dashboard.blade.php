@extends('admin.masterlayout')
@section('pagecontent')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create New Menu Item</h1>
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
                <h3 class="card-title">New Menu Item</h3>

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
                    <form action="{{ route('savemenuitem') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Item Name</label>
                                    <input type="text" name="item_name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Item Price</label>
                                    <input type="number" name="item_price" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Item Category</label>
                                    <select>
                                        @foreach($categories as $category)
                                        <option {{ $category->id }}>{{ $category->cat_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <!-- /.col -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Featured Item</label>
                                    <select name="is_featured" class="form-control">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Item Photo</label>
                                    <input type="file" name="item_photo" class="form-control">
                                </div>
                            </div>
                            <div class="form-group col-lg-12">

                                <label>Item Description</label>
                                <textarea id="editorx" name="item_description" rows="5" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>&nbsp;</label>
                            <div class="col"></div> <input type="submit" class="btn btn-primary float-right" value="Save Location">
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