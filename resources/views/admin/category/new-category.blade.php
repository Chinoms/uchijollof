@extends('admin.masterlayout')
@section('pagecontent')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create New Category</h1>
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
                <h3 class="card-title">New Category</h3>

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
                    <form action="{{ route('savecategory') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Category Name</label>
                                    <input type="text" name="cat_name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Featured Category?</label>
                                    <select name="is_featured" class="form-control">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>


                            </div>
                            <!-- /.col -->
                            <div class="col-md-6">
                            <div class="form-group">
                                    <label>Category Banner</label>
                                    <input type="file" name="category_banner" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Category Thumbnail</label>
                                    <input type="file" name="thumbnail" class="form-control">
                                </div>
                            </div>
                            <div class="form-group col-lg-12">

                                <label>Category Description</label>
                                <textarea id="editorx" name="description" rows="5" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>&nbsp;</label>
                            <div class="col"></div> <input type="submit" class="btn btn-primary float-right" value="Save Item">
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