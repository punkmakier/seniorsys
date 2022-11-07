<div class="container p-5">
    <h3>Manage Admin/s</h3>

    <div class="panel">
        
<form action=""id="selectedAccountTodelet">
    <input type="hidden" id="selectedID" name="selectedDataToDelete">
</form>
       <h5 class="mb-3">Admin/s List</h5>
       <button class="btn btn-custom-default mb-4" style="width: 150px;" data-bs-toggle="modal" data-bs-target="#addAdminAccount">Add User</button>
       <table class="table table-striped" id="myTable">
            <thead class="bg-dark text-white">
                <tr>
                    <td class="text-center">Complete Name</td>
                    <td class="text-center">Username</td>
                    <td class="text-center">Employee ID</td>
                    <td class="text-center">Email</td>
                    <td class="text-center">Phone No.</td>
                    <td class="text-center">Position</td>
                    <td class="text-center">Action</td>
                </tr>
            </thead>

            <tbody>
                <?php $showAdmin->showAllAdmin();?>
            </tbody>
            
       </table>
   
    </div>
</div>


<!-- Send Message Modal -->
<div class="modal fade" id="addAdminAccount" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Admin Account</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" id="addAdminAccountForm">
            <div class="row">
                    <div class="col">
                        <div class="mb-2">
                            <label for="exampleInputEmail1" class="form-label"><b>Last Name</b> &nbsp;<span style="color: red; font-weight: 600;">*</span></label>
                            <input type="text" class="form-control" name="lname">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-2">
                            <label for="exampleInputEmail1" class="form-label"><b>First Name</b> &nbsp;<span style="color: red; font-weight: 600;">*</span></label>
                            <input type="text" class="form-control" name="fname">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-2">
                            <label for="exampleInputEmail1" class="form-label"><b>Middle Name</b> &nbsp;<span style="color: red; font-weight: 600;">*</span></label>
                            <input type="text" class="form-control" name="mname">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-2">
                            <label for="exampleInputEmail1" class="form-label"><b>Employee ID</b> &nbsp;<span style="color: red; font-weight: 600;">*</span></label>
                            <input type="text" class="form-control" name="empid">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-2">
                            <label for="exampleInputEmail1" class="form-label"><b>Phone No.</b> &nbsp;<span style="color: red; font-weight: 600;">*</span></label>
                            <input type="text" class="form-control" name="phoneNo">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-7">
                        <div class="mb-2">
                            <label for="exampleInputEmail1" class="form-label"><b>Email</b> &nbsp;<span style="color: red; font-weight: 600;">*</span></label>
                            <input type="email" class="form-control" name="email">
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="mb-2">
                            <label for="exampleInputEmail1" class="form-label"><b>Position</b> &nbsp;<span style="color: red; font-weight: 600;">*</span></label>
                            <input type="text" class="form-control" name="position">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col">
                        <div class="mb-2">
                            <label for="exampleInputEmail1" class="form-label"><b>Username</b> &nbsp;<span style="color: red; font-weight: 600;">*</span></label>
                            <input type="text" class="form-control" name="uname">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-2">
                            <label for="exampleInputEmail1" class="form-label"><b>Password</b> &nbsp;<span style="color: red; font-weight: 600;">*</span></label>
                            <input type="password" class="form-control" name="pass">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-2">
                            <label for="exampleInputEmail1" class="form-label"><b>Confirm Password</b> &nbsp;<span style="color: red; font-weight: 600;">*</span></label>
                            <input type="password" class="form-control" name="conpass">
                        </div>
                    </div>
                </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="padding: 10px; ">Close</button>
        <button id="addAdminBtn" type="button" class="btn btn-custom-default" style="width: 20%;">Submit</button>
      </div>
    </div>
  </div>
</div>


<script>
    $("#addAdminBtn").on('click',function(){
        var data = $("#addAdminAccountForm").serialize()+"&addAdminAccount=addAdminAccount";
        $.ajax({
            type: "POST",
            url: "../Controller/AdminFunction.php",
            data: data,
            success: function(response){
                if(response == "Required"){
                    Swal.fire(
                            'Failed',
                            'All fields must not empty.',
                            'error'
                            )
                }else if(response == "NotMatch"){
                    Swal.fire(
                            'Failed',
                            'Password and confirm password does not match.',
                            'error'
                            )
                }
                else if(response == "Failed"){
                    Swal.fire(
                            'Failed',
                            'There\'\ s something wrong.',
                            'error'
                            )
                }
                else{
                    Swal.fire({
                            title: 'Success',
                            text: "New admin account added!",
                            icon: 'success',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Okay'
                            }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.reload();
                            }
                            })
                }
            }
        })
    })

    $(".deleteAdmin").on('click',function(){
        $tr = $(this).closest('tr');



            var row = $tr.children("td").map(function(){
                return $(this).text();

            }).get();


        $("#selectedID").val(row[1]);
        let DataToDelete =  $("#selectedID").val();

        var formData = $("#selectedAccountTodelet").serialize()+"&deleteAdminAccount=deleteAdminAccount";
        Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                url: "../Controller/AdminFunction.php",
                data: formData,
                success: function(response){
                    Swal.fire({
                    title: 'Success',
                    text: "Account has been deleted!",
                    icon: 'success',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Okay'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.reload();
                    }
                    })
                }
            })
        }
        })

        



        


    })
</script>