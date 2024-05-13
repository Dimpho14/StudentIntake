


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
      <h2>Manage <b>Gender</b></h2>
      </div>
      <div class="col-sm-6">
      <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Gender</span></a>
      <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>
      </div>
      </div>
      </div>
    <table id="tableID" class="display nowrap table  table-hover"> 
      <thead> 
        <tr> 
          <th>Gender</th>
          <th>Actions</th>
        </tr> 
      </thead> 
      <tbody>
        
      </tbody> 
    </table> 
      </div>
    </div>
    
    
    <!-- Add Modal HTML -->
    <div id="addEmployeeModal" class="modal fade">
    <div class="modal-dialog">
    <div class="modal-content">
      <form action="/create-doc" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-header">
          <h4 class="modal-title">Add Gender</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">

          <div class="form-group">
            <label for="student" class="text-muted mb-1"><small>Building</small></label>
                <select name="student_id" id="student" class="form-control">
                    <option value="">-- Select student --</option>
                    @foreach ($students as  $student)
                        <option value={{ $student->id }}>{{ $student->name}}</option>">
                    @endforeach
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
              <input type="submit" class="btn btn-success" value="Save">
            </div>
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
    <h4 class="modal-title">Edit Rez Type</h4>
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
    <h4 class="modal-title">Delete Rez Type</h4>
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
    </x-layout>
    
  