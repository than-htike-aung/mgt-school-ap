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
                    <h4 class="box-title">Add Student</h4>
                 </div>
                 <div class="row">
                   <div class="col">
                    <form method="POST" action="{{ route('store.student.registration') }}" enctype="multipart/form-data">
                          @csrf

                         <div class="row">
                          <div class="col-12">

            <div class="row"> {{-- 1st Row --}}
                <div class="col-md-4">
                    <div class="form-group">
                        <h5>Student Name<span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="text" id="name" name="name" required="" class="form-control"> <div class="help-block"></div>
                        </div>       
                    </div>
                </div>{{-- End Col md 4 --}}
                <div class="col-md-4">
                    <div class="form-group">
                        <h5>Father's Name<span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="text" id="fname" name="name" required="" class="form-control"> <div class="help-block"></div>
                        </div>       
                    </div>
                </div>{{-- End Col md 4 --}}
                <div class="col-md-4">
                    <div class="form-group">
                        <h5>Mother's Name<span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="text" id="mname" name="name" required="" class="form-control"> <div class="help-block"></div>
                        </div>       
                    </div>
                </div>{{-- End Col md 4 --}}
            </div> {{-- End Row --}}

            
            <div class="row"> {{-- 2nd Row --}}
                <div class="col-md-4">
                    <div class="form-group">
                        <h5>Mobile Number<span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="text" id="mobile" name="mobile" required="" class="form-control"> <div class="help-block"></div>
                        </div>       
                    </div>
                </div>{{-- End Col md 4 --}}
                <div class="col-md-4">
                    <div class="form-group">
                        <h5>Address<span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="text" id="address" name="address" required="" class="form-control"> <div class="help-block"></div>
                        </div>       
                    </div>
                </div>{{-- End Col md 4 --}}
                <div class="col-md-4">
                    <div class="form-group">
                        <h5>Gender<span class="text-danger">*</span></h5>
                        <div class="controls">
                            <select name="gender" id="select"  class="form-control">
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>

                            </select>
                        </div>       
                    </div>
                </div>{{-- End Col md 4 --}}
            </div> {{-- End Row --}}

            
            <div class="row"> {{-- 3rd Row --}}
                <div class="col-md-4">
                    <div class="form-group">
                        <h5>Religion<span class="text-danger">*</span></h5>
                        <div class="controls">
                            <select name="religion" id="select"  class="form-control">
                                <option value="">Select Religion</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Christan">Christan</option>
                                <option value="Burma">Burma</option>

                            </select>
                        </div>       
                    </div>
                </div>{{-- End Col md 4 --}}
                <div class="col-md-4">
                    <div class="form-group">
                        <h5>Date Of Birth<span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="date" id="dob" name="dob" required="" class="form-control"> <div class="help-block"></div>
                        </div>       
                    </div>
                </div>{{-- End Col md 4 --}}
                <div class="col-md-4">
                    <div class="form-group">
                        <h5>Discount<span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="text" id="discount" name="discount" required="" class="form-control"> <div class="help-block"></div>
                        </div>       
                    </div>
                </div>{{-- End Col md 4 --}}
            </div> {{-- End Row --}}

            <div class="row"> {{-- 4th Row --}}
                <div class="col-md-4">
                    <div class="form-group">
                        <h5>Year<span class="text-danger">*</span></h5>
                        <div class="controls">
                            <select name="year_id" id="select"  class="form-control">
                                <option value="">Select Year</option>
                              @foreach($years as $year)
                                <option value="{{$year->id}}">{{$year->name}}</option>
                              @endforeach 
                               
                            </select>
                        </div>       
                    </div>
                </div>{{-- End Col md 4 --}}
                <div class="col-md-4">
                    <div class="form-group">
                        <h5>Class<span class="text-danger">*</span></h5>
                        <div class="controls">
                            <select name="class_id" id="select"  class="form-control">
                                <option value="">Select Class</option>
                               @foreach($classes as $class)
                                <option value="{{$class->id}}">{{$class->name}}</option>
                               @endforeach
                               
                            </select>
                        </div>       
                    </div>
                </div>{{-- End Col md 4 --}}
                <div class="col-md-4">
                    <div class="form-group">
                        <h5>Group<span class="text-danger">*</span></h5>
                        <div class="controls">
                            <select name="group_id" id="select"  class="form-control">
                                <option value="">Select Group</option>
                               @foreach($groups as $group)
                                <option value="{{$group->id}}">{{$group->name}}</option>
                               @endforeach
                              

                            </select>
                        </div>       
                    </div>
                </div>{{-- End Col md 4 --}}
            </div> {{-- End Row --}}

            <div class="row"> {{-- 5th Row --}}
                <div class="col-md-4">
                    <div class="form-group">
                        <h5>Shift<span class="text-danger">*</span></h5>
                        <div class="controls">
                            <select name="shift_id" id="select"  class="form-control">
                                <option value="">Select Shift</option>
                              @foreach($shifts as $shift)
                                <option value="{{$shift->id}}">{{$shift->name}}</option>
                              @endforeach 
                               
                            </select>
                        </div>       
                    </div>
                </div>{{-- End Col md 4 --}}
                <div class="col-md-4">
                    <div class="form-group">
                        <h5>Profile Image<span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="file" id="image" name="image" required="" class="form-control"> <div class="help-block"></div>
                        </div>       
                    </div>
                </div>{{-- End Col md 4 --}}
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="controls">
                            <img id="showImage" src="{{url('upload/no_image.jpg')}}" style="width:100px; height:100px border:1px solid #000;">
                        </div>
                    </div>
                </div>{{-- End Col md 4 --}}
            </div> {{-- End Row --}}


                                   

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
