@extends('admin.admin_master')


@section('admin')
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <div class="content-body">
        <div class="container-fluid">



            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Add/Edit Information</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Add/Edit Information</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Change Information</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Add Information</h4>
                        </div>
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif


                            <div class="basic-form">
                                <form action="{{ route('store.information') }}" method="POST">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label>About Us</label>
                                            <textarea class="form-control" name="about" id="about"
                                                style="color: #3b3363 !important;"></textarea>
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label>Refund Policy</label>
                                            <textarea class="form-control" name="refund" id="refund"></textarea>
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label>Privacy And Policy</label>
                                            <textarea class="form-control" name="privacy" id="privacy"></textarea>
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label>Terms And Condition</label>
                                            <textarea class="form-control" name="terms" id="terms"></textarea>
                                        </div>





                                    </div>


                                    <button type="submit" class="btn btn-primary">Add Information</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- summernote css/js -->

    <script type="text/javascript">
        $('#about').summernote({
            height: 400
        });
        $('#refund').summernote({
            height: 400
        });
        $('#privacy').summernote({
            height: 400
        });
        $('#terms').summernote({
            height: 400
        });
    </script>



@endsection
