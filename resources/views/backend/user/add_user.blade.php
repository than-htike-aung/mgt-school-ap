@extends('admin.admin_master')

@section('admin')
<div class="content-wrapper">
    <div class="container-full">

        <section class="content">

            <!-- Basic Forms -->
             <div class="box">


               <!-- /.box-header -->
               <div class="box-body">

                 <div class="row">
                   <div class="col">
                       <form method="POST" action="{{ route('users.store') }}">
                          @csrf
                         <div class="row">
                           <div class="col-12">
                               <div class="row">
                                   <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>User Role<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="role" id="select"  class="form-control">
                                                <option value="">Select Role</option>
                                                <option value="Admin">Admin</option>
                                                <option value="Operator">Operator</option>

                                            </select>
                                        <div class="help-block"></div></div>
                                    </div>
                                   </div> <!-- /End Column -->
                                   <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>User Name<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" >
                                        </div>
                                            @if ($errors->has('name'))
                                            <span class="text-danger invalid feedback"role="alert">
                                                <strong>{{ $errors->first('name') }}.</strong>
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
                                      <h5>User Email<span class="text-danger">*</span></h5>
                                      <div class="controls">
                                          <input type="email" name="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" > <div class="help-block"></div></div>
                                          @if ($errors->has('email'))
                                          <span class="text-danger invalid feedback"role="alert">
                                              <strong>{{ $errors->first('email') }}.</strong>
                                          </span>
                                  @endif
                                  </div>
                                  </div> <!-- /End Column -->
                                  <div class="col-md-6">

                                   </div> <!-- /End Column -->
                              </div>  <!-- /End Row -->

                          </div>

                        </div>

                <div class="text-xs-right">
                  <input type="submit" class="btn btn-rounded btn-info mb-5" value="Submit" >
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
