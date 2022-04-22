@extends('admin.admin_master')

@section('admin')
<div class="content-wrapper">
    <div class="container-full">

        <section class="content">

            <!-- Basic Forms -->
             <div class="box">

                <div class="box-header with-border">
                    <h4 class="box-title">Change Password</h4>
                 </div>
               <!-- /.box-header -->
               <div class="box-body">

                 <div class="row">
                   <div class="col">
                    <form method="POST" action="{{ route('password.update') }}">
                          @csrf

                         <div class="row">
                          <div class="col-12">


                                  <div class="form-group">
                                      <h5>Current Password<span class="text-danger">*</span></h5>
                                      <div class="controls">
                                          <input type="password" id="current_password"name="oldpassword" class="form-control {{ $errors->has('oldpassword') ? ' is-invalid' : '' }}" > <div class="help-block"></div></div>
                                          @if ($errors->has('oldpassword'))
                                          <span class="text-danger invalid feedback"role="alert">
                                              <strong>{{ $errors->first('oldpassword') }}.</strong>
                                          </span>
                                  @endif
                                  </div>


                                    <div class="form-group">
                                        <h5>New Password<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="password" id="password" name="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" > <div class="help-block"></div></div>
                                            @if ($errors->has('password'))
                                            <span class="text-danger invalid feedback"role="alert">
                                                <strong>{{ $errors->first('password') }}.</strong>
                                            </span>
                                    @endif
                                    </div>

                                    <div class="form-group">
                                        <h5>Confirm Password<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control {{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" > <div class="help-block"></div></div>
                                            @if ($errors->has('password_confirmation'))
                                            <span class="text-danger invalid feedback"role="alert">
                                                <strong>{{ $errors->first('password_confirmation') }}.</strong>
                                            </span>
                                    @endif
                                    </div>



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
@endsection
