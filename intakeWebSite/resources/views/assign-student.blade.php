


<x-layout>
    <!DOCTYPE html>
    <html lang="en">
    <head>
    
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/main-modal.css">
    
    <!-- jQuery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script> 
    
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css"> 
    
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script> 
    
    
    </head>
    <body>
    
    <div class="container">
    <div class="table-wrapper">
      <div class="table-title">
      <div class="row">
      <div class="col-sm-6">
      <h2>Assign <b>Students</b></h2>
      </div>
      <div class="col-sm-6">
      <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Room</span></a>
      <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>
      </div>
      </div>
      </div>
    <table id="tableID" class="display nowrap table  table-hover"> 
      <thead> 
        <tr> 
          <th>Name</th>
          <th>Surname</th>
          <th>Building</th>
          <th>Room no.</th>
          <th>Actions</th>
        </tr> 
      </thead> 
      <tbody>
       @foreach ($students as $student)
        <tr>
        <td>{{ $student->name }}</td>
        <td>{{ $student->surname }}</td>
        <td >{{ $student->building_id }}</td>
        <td >{{ $student->room_id }}</td>
        <td>
          <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
          <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
          <a href="create-room" class="view" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="View">&#xe8f4;</i></a>
          </td>
        </tr> 
    @endforeach
      </tbody> 
    </table> 
      </div>
    </div>



    
    
    <!-- Add Modal HTML -->
    <div id="addEmployeeModal" class="modal fade">
    <div class="modal-dialog">
    <div class="modal-content">
      <form action="/assign-student" method="POST">
        @csrf
        <div class="modal-header">
          <h4 class="modal-title">Assign Student A Room</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="student-name" class="text-muted mb-1"><small>Name</small></label>
            <input value="{{old('name')}}" name="name" id="student-name" class="form-control" type="text" placeholder="Type room number" autocomplete="off" />
            @error('name')
            <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
            @enderror
          </div>

          <div class="form-group">
            <label for="student-middle" class="text-muted mb-1"><small>Middle Name</small></label>
            <input value="{{old('middlename')}}" name="middlename" id="student-middle" class="form-control" type="text" placeholder="Type room number" autocomplete="off" />
            @error('middlename')
            <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
            @enderror
          </div>

          <div class="form-group">
            <label for="student-surname" class="text-muted mb-1"><small>Surname</small></label>
            <input value="{{old('surname')}}" name="surname" id="student-surname" class="form-control" type="text" placeholder="Type room number" autocomplete="off" />
            @error('surname')
            <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
            @enderror
          </div>
          
          <div class="form-group">
            <label for="student-gender" class="text-muted mb-1"><small>Gender</small></label>
                <select name="gender_id" id="gender" class="form-control">
                    <option value="">-- Select gender --</option>
                    @foreach ($genders as  $gender)
                        <option value={{ $gender->id }}>{{ $gender->name }}</option>">
                    @endforeach
                </select>
            </label>
          </div>

          <div class="form-group">
            <label for="student-contact" class="text-muted mb-1"><small>Contact No.</small></label>
            <input value="{{old('contactno')}}" name="contactno" id="student-contact" class="form-control" type="text" placeholder="Type room number" autocomplete="off" />
            @error('contactno')
            <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
            @enderror
          </div>

          <div class="form-group">
            <label for="student-number" class="text-muted mb-1"><small>Student No.</small></label>
            <input value="{{old('studentno')}}" name="studentno" id="student-contact" class="form-control" type="text" placeholder="Type room number" autocomplete="off" />
            @error('studentno')
            <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
            @enderror
          </div>

          <div class="form-group">
            <label for="student-email" class="text-muted mb-1"><small>Email Address</small></label>
            <input value="{{old('emailaddress')}}" name="emailaddress" id="student-email" class="form-control" type="text" placeholder="Type room number" autocomplete="off" />
            @error('emailaddress')
            <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
            @enderror
          </div>

          <div class="form-group">
            <label for="student-idno" class="text-muted mb-1"><small>Identity No.</small></label>
            <input value="{{old('idno')}}" name="idno" id="student-idno" class="form-control" type="text" placeholder="Type room number" autocomplete="off" />
            @error('idno')
            <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
            @enderror
          </div>

          <div class="form-group">
            <label for="student-course" class="text-muted mb-1"><small>Course Name</small></label>
            <input value="{{old('course')}}" name="course" id="student-course" class="form-control" type="text" placeholder="Type room number" autocomplete="off" />
            @error('course')
            <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
            @enderror
          </div>

          <div class="form-group">
            <label for="student-date" class="text-muted mb-1"><small>Date In</small></label>
            <input value="{{old('dateofoccupation')}}" name="dateofoccupation" id="student-date" class="form-control" type="date" placeholder="Type room number" autocomplete="off" />
            @error('dateofoccupation')
            <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
            @enderror
          </div>

          <div class="form-group">
            <label for="student-nextofkin" class="text-muted mb-1"><small>Next Of Kin Name and Surname</small></label>
            <input value="{{old('nextofkinname')}}" name="nextofkinname" id="student-nextofkin" class="form-control" type="text" placeholder="Type room number" autocomplete="off" />
            @error('nextofkinname')
            <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
            @enderror
          </div>

          <div class="form-group">
            <label for="student-nextofkincontact" class="text-muted mb-1"><small>Contact No</small></label>
            <input value="{{old('nextofkincontact')}}" name="nextofkincontact" id="student-nextofkincontact" class="form-control" type="text" placeholder="Type room number" autocomplete="off" />
            @error('nextofkincontact')
            <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
            @enderror
          </div>

          <div class="form-group">
            <label for="student-payment" class="text-muted mb-1"><small>Payment Method</small></label>
                <select name="method_id" id="student-payment" class="form-control">
                    <option value="">-- Select method --</option>
                    @foreach ($methods as  $method)
                        <option value={{ $method->id }}>{{ $method->name }}</option>">
                    @endforeach
                </select>
            </label>
          </div>
  
          <div class="form-group">
            <label for="building" class="text-muted mb-1"><small>Building</small></label>
                <select name="building_id" id="building" class="form-control">
                    <option value="">-- Select Building --</option>
                    @foreach ($buildings as  $building)
                        <option value={{ $building->id }}>{{ $building->name }}</option>">
                    @endforeach
                </select>
            </label>
          </div>

          <div class="form-group">
            <label for="title" class="text-muted mb-1"><small>Room No.</small></label>
                <select name="room_id" id="room" class="form-control">
                    
                </select>
            </label>
          </div>
  
          
          <div class="box">
            <div class="input-bx">
              <h2 class="upload-area-title">Upload File</h2> 
              <form action="">
                <input type="file" id="upload" name="documents[]"  multiple="multiple" hidden>
                <label for="upload" class=uploadlabel>
                 <span><i class="fa fa-upload"></i></span>
                 <p>Click To Upload</p>
                </label>
              </form>
            </div>

            <div id="filewrapper">
             <h3 class="uploaded">Uploaded Documents</h3>
             <!--<div class="showfilebox">
               <div class="left">
                 <span class="filetype">pdf</span>
                 <h3>Ravi web.pdf</h3>
               </div>
               <div class="right">
                 <span>&#215;</span>
               </div> -->
             </div>
          </div>
        
        <div class="modal-footer">
          <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
          <input type="submit" class="btn btn-success" value="Add">
        </div> 
      </form>
    </div>
    </div>
    </div>
    <!-- Edit Modal HTML -->
    <div id="editEmployeeModal" class="modal fade">
    <div class="modal-dialog">
    <div class="modal-content">
    <form>
    <div class="modal-header">
    <h4 class="modal-title">Edit Role</h4>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    </div>
    <div class="modal-body">
    <div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control" required>
    </div>
    <div class="form-group">
    <label>Email</label>
    <input type="email" class="form-control" required>
    </div>
    <div class="form-group">
    <label>Address</label>
    <textarea class="form-control" required></textarea>
    </div>
    <div class="form-group">
    <label>Phone</label>
    <input type="text" class="form-control" required>
    </div>
    </div>
    <div class="modal-footer">
    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
    <input type="submit" class="btn btn-info" value="Save">
    </div>
    </form>
    </div>
    </div>
    </div>
    <!-- Delete Modal HTML -->
    <div id="deleteEmployeeModal" class="modal fade">
    <div class="modal-dialog">
    <div class="modal-content">
    <form>
    <div class="modal-header">
    <h4 class="modal-title">Delete Role</h4>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    </div>
    <div class="modal-body">
    <p>Are you sure you want to delete these Records?</p>
    <p class="text-warning"><small>This action cannot be undone.</small></p>
    </div>
    <div class="modal-footer">
    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
    <input type="submit" class="btn btn-danger" value="Delete">
    </div>
    </form>
    </div>
    </div>
    </div>
    <?php
if(!empty($_FILES['file'])){
    $targetDir = 'uploads/';
    $filename = basename($_FILES['file']['name']);
    $targetFilePath = $targetDir.$filename;
    if(move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)){
        echo 'File Uploaded';
    }
}
?>
    <script> 
      
      // Initialize the DataTable 
      $(document).ready(function () { 
        $('#tableID').DataTable({ 
    
          // Set the number of rows to be  
          // displayed per page on the DataTable 
          pageLength: 6 
        }); 
      });  
    </script> 
    <script src="{{ asset('design/jquery.js') }}"></script>
    <script type="text/javascript">
       $('#building').change(function(){
        var building_id = $(this).val();    
        if(building_id){
            $.ajax({
               type:"GET",
               url:"{{url('get-room-list')}}?building_id="+building_id,
               success:function(res){ 
               console.log(res);              
                if(res){
                    $("#room").empty();
                    $("#room").append('<option>Select</option>');
                    $.each(res,function(key){
                        $("#room").append('<option value="'+res[key].id+'">'+res[key].number+'</option>');
                    });
               
                }else{
                   $("#room").empty();
                }
               }
            });
        }else{
            $("#room").empty();
        }      
       });

       $('#gender').change(function(){
        var gender_id = $(this).val();    
        if(gender_id){
            $.ajax({
               type:"GET",
               url:"{{url('get-gender-room-list')}}?gender_id="+gender_id,
               success:function(res){ 
               console.log(res);              
                if(res){
                    $("#room").empty();
                    $("#room").append('<option>Select</option>');
                    $.each(res,function(key){
                        $("#room").append('<option value="'+res[key].id+'">'+res[key].number+'</option>');
                    });
               
                }else{
                   $("#room").empty();
                }
               }
            });
        }else{
            $("#room").empty();
        }      
       });
    </script>

    <script>
      window.addEventListener("load",()=>{
        const input = document.getElementById("upload");
        const filewrapper = document.getElementById("filewrapper");

        input.addEventListener("change", (e)=>{
          let fileName = e.target.files[0].name;
          let filetype = e.target.value.split(".").pop();
          fileshow(fileName, filetype);
        })

        const fileshow = (fileName, filetype)=>{
          const showfileboxElem = document.createElement("div");
          showfileboxElem.classList.add("showfilebox");
          const leftElem = document.createElement("div");
          leftElem.classList.add("left");
          const fileTypeElem = document.createElement("span");
          fileTypeElem.classList.add("filetype");
          fileTypeElem.innerHTML = filetype;
          leftElem.append(fileTypeElem);
          const filetitleElem = document.createElement("h3");
          filetitleElem.innerHTML = fileName;
          leftElem.append(filetitleElem);
          showfileboxElem.append(leftElem);
          const rightElem = document.createElement("div");
          rightElem.classList.add("right");
          showfileboxElem.append(rightElem);
          const crossElem = document.createElement("span");
          crossElem.innerHTML = "&#215;";
          rightElem.append(crossElem);
          filewrapper.append(showfileboxElem);

          crossElem.addEventListener("click",()=>{
            filewrapper.removeChild(showfileboxElem);
          })
        }
      })
    </script>
    </body>
    </html> 
  
  </div>
    </x-layout>
  
    
  
  
  
  
  
  
  