@extends('admin.admin_master')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<div class="content-wrapper">
    <div class="container-full">

        <section class="content">

            <!-- Basic Forms -->
             <div class="box">

               <!-- /.box-header -->
               <div class="box-body">
                <div class="box-header with-border">
                    <h4 class="box-title">Edit Assign Subject</h4>
                 </div>
                 <div class="row">
                   <div class="col">
                    <form method="POST" action="{{ route('update.assign.subject', $editData[0]->class_id) }}">
                          @csrf

                         <div class="row">
                          <div class="col-12">
                                <div class="add_item">

                            <div class="form-group">
                                <h5>Class Name<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="class_id" class="form-control">
                                        <option value="" selected="" disabled="">Select Class</option>

                                       @foreach ($classes as $class )
                                       <option value="{{ $class->id }}"
                                            {{$editData[0]->class_id == $class->id ? "selected" : ""}}
                                        >{{ $class->name }}</option>
                                       @endforeach

                                    </select>
                                <div class="help-block"></div>
                            </div>
                            </div>   <!-- /end form group -->
                    @foreach ($editData as $edit )

                    <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Student Subject<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="subject_id[]" class="form-control">
                                                <option value="" selected="" disabled="">Select Subject</option>

                                               @foreach ($subjects as $subject )
                                               <option value="{{ $subject->id }}" 
                                                {{($edit->subject_id == $subject->id) ? "selected": ""}}
                                                >{{ $subject->name }}</option>
                                               @endforeach

                                            </select>
                                        <div class="help-block"></div>
                                    </div>
                                    </div>   <!-- /end form group -->
                                </div> <!-- /end col-md-4 -->
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <h5>Full Mark<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" id="full_mark" name="full_mark[]" value="{{$edit->full_mark}}" class="form-control {{ $errors->has('full_mark') ? ' is-invalid' : '' }}" > <div class="help-block"></div></div>
                                            @if ($errors->has('full_mark'))
                                            <span class="text-danger invalid feedback"role="alert">
                                                <strong>{{ $errors->first('full_mark') }}.</strong>
                                            </span>
                                    @endif
                                    </div> <!-- /end form group -->
                                </div>  <!-- /end col-md-2 -->
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <h5>Pass Mark<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" id="pass_mark" name="pass_mark[]" value="{{$edit->pass_mark}}" class="form-control {{ $errors->has('pass_mark') ? ' is-invalid' : '' }}" > <div class="help-block"></div></div>
                                            @if ($errors->has('pass_mark'))
                                            <span class="text-danger invalid feedback"role="alert">
                                                <strong>{{ $errors->first('pass_mark') }}.</strong>
                                            </span>
                                    @endif
                                    </div> <!-- /end form group -->
                                </div>  <!-- /end col-md-2 -->
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <h5>Subjective Mark<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" id="subjective_mark" name="subjective_mark[]" value="{{$edit->subjective_mark}}"  class="form-control {{ $errors->has('amount') ? ' is-invalid' : '' }}" > <div class="help-block"></div></div>
                                            @if ($errors->has('subjective_mark'))
                                            <span class="text-danger invalid feedback"role="alert">
                                                <strong>{{ $errors->first('subjective_mark') }}.</strong>
                                            </span>
                                    @endif
                                    </div> <!-- /end form group -->
                                </div>  <!-- /end col-md-2 -->
                                <div class="col-md-2" style="padding-top: 25px">
                                    <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
                                    <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i></span>
                                </div>  <!-- /end col-md-2 -->
                            </div> <!-- /end row -->
                    </div> <!-- /end remove delete -->

                    @endforeach

                                </div> <!-- /end add item -->
                          </div>

                        </div>

                <div class="text-xs-right">
                  <input type="submit" class="btn btn-rounded btn-info mb-5" value="Update " >
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

<div style="visibility: hidden">
    <div class="whole_extra_item_add" id="whole_extra_item_add">
        <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
            <div class="form-row">
                <div class="col-md-4">
                    <div class="form-group">
                        <h5>Student Subject<span class="text-danger">*</span></h5>
                        <div class="controls">
                            <select name="subject_id[]" class="form-control">
                                <option value="" selected="" disabled="">Select Subject</option>

                               @foreach ($subjects as $subject )
                               <option value="{{ $subject->id }}" >{{ $subject->name }}</option>
                               @endforeach

                            </select>
                        <div class="help-block"></div>
                    </div>
                    </div>   <!-- /end form group -->
                </div> <!-- /end col-md-4 -->
                <div class="col-md-2">
                    <div class="form-group">
                        <h5>Full Mark<span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="text" id="full_mark" name="full_mark[]" class="form-control {{ $errors->has('full_mark') ? ' is-invalid' : '' }}" > <div class="help-block"></div></div>
                            @if ($errors->has('full_mark'))
                            <span class="text-danger invalid feedback"role="alert">
                                <strong>{{ $errors->first('full_mark') }}.</strong>
                            </span>
                    @endif
                    </div> <!-- /end form group -->
                </div>  <!-- /end col-md-2 -->
                <div class="col-md-2">
                    <div class="form-group">
                        <h5>Pass Mark<span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="text" id="pass_mark" name="pass_mark[]" class="form-control {{ $errors->has('pass_mark') ? ' is-invalid' : '' }}" > <div class="help-block"></div></div>
                            @if ($errors->has('pass_mark'))
                            <span class="text-danger invalid feedback"role="alert">
                                <strong>{{ $errors->first('pass_mark') }}.</strong>
                            </span>
                    @endif
                    </div> <!-- /end form group -->
                </div>  <!-- /end col-md-2 -->
                <div class="col-md-2">
                    <div class="form-group">
                        <h5>Subjective Mark<span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="text" id="subjective_mark" name="subjective_mark[]" class="form-control {{ $errors->has('amount') ? ' is-invalid' : '' }}" > <div class="help-block"></div></div>
                            @if ($errors->has('subjective_mark'))
                            <span class="text-danger invalid feedback"role="alert">
                                <strong>{{ $errors->first('subjective_mark') }}.</strong>
                            </span>
                    @endif
                    </div> <!-- /end form group -->
                </div>  <!-- /end col-md-2 -->

                <div class="col-md-2" style="padding-top: 25px">
                    <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
                    <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i></span>
                </div>  <!-- /end col-md-2 -->

            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        var counter = 0;
        $(document).on("click", ".addeventmore", function(){
            var whole_extra_item_add = $("#whole_extra_item_add").html();
            $(this).closest(".add_item").append(whole_extra_item_add);
            counter++;
        });
        $(document).on("click", ".removeeventmore", function(event){
            $(this).closest(".delete_whole_extra_item_add").remove();
            counter -= 1;
        });
    });
</script>

@endsection