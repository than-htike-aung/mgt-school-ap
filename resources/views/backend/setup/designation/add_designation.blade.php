@extends('admin.admin_master')

@section('admin')
<div class="content-wrapper">
    <div class="container-full">

        <section class="content">

            <!-- Basic Forms -->
             <div class="box">

               <!-- /.box-header -->
               <div class="box-body">
                <div class="box-header with-border">
                    <h4 class="box-title">Add Designation</h4>
                 </div>
                 <div class="row">
                   <div class="col">
                    <form method="POST" action="{{ route('store.designation') }}">
                          @csrf

                         <div class="row">
                          <div class="col-12">
                                    <div class="form-group">
                                        <h5>Designation Name<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" id="name" name="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" > <div class="help-block"></div></div>
                                            @if ($errors->has('name'))
                                            <span class="text-danger invalid feedback"role="alert">
                                                <strong>{{ $errors->first('name') }}.</strong>
                                            </span>
                                    @endif
                                    </div>

                          </div>

                        </div>

                <div class="text-xs-right">
                  <input type="submit" class="btn btn-rounded btn-info mb-5" value="Submit " >
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
