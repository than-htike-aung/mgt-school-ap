@extends('admin.admin_master')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<div class="content-wrapper">
    <div class="container-full">
        <section class="content">
            <!-- Basic Forms -->
             <div class="box">
                 <div class="box-header with-border">
                    <h4 class="box-title">Manage Profile</h4>
                 </div>
               <!-- /.box-header -->
               <div class="box-body">

                 <div class="row">
                   <div class="col">
                       <form method="POST" action="{{ route('profile.store', $editData->id) }}" enctype="multipart/form-data">
                          @csrf
                         <div class="row">
                          <div class="col-12">
                              <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>User Name<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="name" value="{{ $editData->name }}" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" > <div class="help-block"></div></div>
                                            @if ($errors->has('name'))
                                            <span class="text-danger invalid feedback"role="alert">
                                                <strong>{{ $errors->first('name') }}.</strong>
                                            </span>
                                    @endif
                                    </div>

                                  </div> <!-- /End Column -->
                                  <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>User Email<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="email" name="email" value="{{ $editData->email }}" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" > <div class="help-block"></div></div>
                                            @if ($errors->has('email'))
                                            <span class="text-danger invalid feedback"role="alert">
                                                <strong>{{ $errors->first('email') }}.</strong>
                                            </span>
                                    @endif
                                    </div>
                                   </div> <!-- /End Column -->
                              </div>  <!-- /End Row -->

                          </div>

                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>User Mobile<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="mobile" value="{{ $editData->mobile }}" class="form-control {{ $errors->has('mobile') ? ' is-invalid' : '' }}" > <div class="help-block"></div></div>
                                                @if ($errors->has('mobile'))
                                                <span class="text-danger invalid feedback"role="alert">
                                                    <strong>{{ $errors->first('mobile') }}.</strong>
                                                </span>
                                        @endif
                                        </div>
                                    </div> <!-- /End Column -->
                                    <div class="col-md-6">
                                     <div class="form-group">
                                         <h5>User Address<span class="text-danger">*</span></h5>
                                         <div class="controls">
                                             <input type="text" name="address" value="{{ $editData->address }}" class="form-control {{ $errors->has('address') ? ' is-invalid' : '' }}" >
                                         </div>
                                             @if ($errors->has('address'))
                                             <span class="text-danger invalid feedback"role="alert">
                                                 <strong>{{ $errors->first('address') }}.</strong>
                                             </span>
                                     @endif
                                     </div>
                                     </div> <!-- /End Column -->
                                </div>  <!-- /End Row -->

                            </div>

                          </div>

                          <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>User Gender<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="gender" id="select"  class="form-control">
                                                    <option value="">Select Gender</option>
                                                    <option value="Male" {{ ($editData->usertype == "Male" ? "selected": "") }}>Male</option>
                                                    <option value="Female" {{ ($editData->usertype == "Female" ? "selected": "") }}>Female</option>

                                                </select>
                                            <div class="help-block"></div></div>
                                        </div>
                                    </div> <!-- /End Column -->
                                    <div class="col-md-6">
                                     <div class="form-group">
                                         <h5>Profile Image<span class="text-danger">*</span></h5>
                                         <div class="controls">
                                             <input type="file" name="image" id="image" class="form-control" >
                                         </div>

                                         <div class="form-group">
                                             <div class="controls">
                                                 <img id="showImage" src="{{(!empty($editData->image) ? url("upload/user_images/".$editData->image) : url('upload/no_image.jpg'))}}" style="width:100px; height:100px border:1px solid #000;">
                                             </div>
                                         </div>

                                     </div>
                                     </div> <!-- /End Column -->
                                </div>  <!-- /End Row -->
                            </div>
                          </div>
                <div class="text-xs-right">
                  <input type="submit" class="btn btn-rounded btn-info mb-5" value="Update" >
                </div>
                       </form>

                   </div>
                   <!-- /.col -->
                 </div>
                 <!-- /.row -->
               </div>
               <!-- /.box-body -->
             </div>
             <!-- /.box -->

           </section>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0'])
        })
    });
</script>

@endsection
