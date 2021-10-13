@extends('admin.admin_master')
@section('admin')

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <div class="content-body" style="min-height: 788px;">
        <div class="container-fluid">
            <!-- Add Project -->
            <div class="modal fade" id="addProjectSidebar">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">


                        </div>
                        <div class="modal-body">

                        </div>
                    </div>
                </div>
            </div>




            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">

                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">

                </div>
            </div>



            <!-- row -->
            <div class="row">

                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Information </h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">

                                <form method="post" action="{{ route('information.update', $information->id) }}">
                                    @csrf

                                    <div class="form-group">
                                        <label class="info-title">About Information </label>
                                        <textarea class="form-control" name="about" id="about">

                                            {{ $information->about }}
                                        </textarea>
                                    </div>

                                    <div class="form-group">
                                        <label class="info-title">Refund Policy</label>
                                        <textarea class="form-control" name="refund" id="refund">
                                           {{ $information->refund }}
                                       </textarea>
                                    </div>

                                    <div class="form-group">
                                        <label class="info-title">Terms And Condition</label>
                                        <textarea class="form-control" name="terms" id="terms">
                                            {{ $information->terms }}
                                        </textarea>
                                    </div>



                                    <div class="form-group">
                                        <label class="info-title">Privacy And Policy</label>
                                        <textarea class="form-control" name="privacy" id="privacy">
                                            {{ $information->privacy }}
                                        </textarea>
                                    </div>



                                    <input type="submit" class="btn btn-success" value="Update Information">

                                </form>
                            </div>
                        </div>
                    </div>
                </div>







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
