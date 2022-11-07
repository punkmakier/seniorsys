<div class="container p-5">
    <h3>My Account</h3>

    <div class="panel">
        <button id="updatemyaccount" class="btn-custom-default mb-4" style="width: 100px;">Edit &nbsp;<i class="fa-solid fa-pen-to-square"></i></button>
        <form action="" id="updateAdminAccount">
        <div class="row">
            <div class="col">
                <div class="mb-2">
                    <label for="exampleInputEmail1" class="form-label"><b>Last Name</b> &nbsp;<span style="color: red; font-weight: 600;">*</span></label>
                    <input type="text" class="form-control" id="lname" value="<?php $showAdmin->showAdminLastName($empID); ?>" name="lname" readonly >
                </div>
            </div>
            <div class="col">
                <div class="mb-2">
                    <label for="exampleInputEmail1" class="form-label"><b>First Name</b> &nbsp;<span style="color: red; font-weight: 600;">*</span></label>
                    <input type="text" class="form-control" id="fname" value="<?php $showAdmin->showAdminFirstName($empID); ?>" name="fname" readonly>
                </div>
            </div>
            <div class="col">
                <div class="mb-2">
                    <label for="exampleInputEmail1" class="form-label"><b>Middle Name</b> &nbsp;<span style="color: red; font-weight: 600;">*</span></label>
                    <input type="text" class="form-control" id="mname" value="<?php $showAdmin->showAdminMiddleName($empID); ?>" name="mname" readonly>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="mb-2">
                    <label for="exampleInputEmail1" class="form-label"><b>Employee ID</b> &nbsp;<span style="color: red; font-weight: 600;">*</span></label>
                    <input type="text" class="form-control" id="empid" value="<?php $showAdmin->showAdminEmpID($empID); ?>" name="empid" readonly>
                </div>
            </div>
            <div class="col">
                <div class="mb-2">
                    <label for="exampleInputEmail1" class="form-label"><b>Phone No.</b> &nbsp;<span style="color: red; font-weight: 600;">*</span></label>
                    <input type="text" class="form-control" id="phoneNo" value="<?php $showAdmin->showAdminPhoneNo($empID); ?>" name="phoneNo" readonly>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-7">
                <div class="mb-2">
                    <label for="exampleInputEmail1" class="form-label"><b>Email</b> &nbsp;<span style="color: red; font-weight: 600;">*</span></label>
                    <input type="email" class="form-control" id="email" value="<?php $showAdmin->showAdminEmail($empID); ?>" name="email" readonly>
                </div>
            </div>
            <div class="col-5">
                <div class="mb-2">
                    <label for="exampleInputEmail1" class="form-label"><b>Position</b> &nbsp;<span style="color: red; font-weight: 600;">*</span></label>
                    <input type="text" class="form-control" id="position" value="<?php $showAdmin->showAdminPosition($empID); ?>" name="position" readonly>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col">
                <div class="mb-2">
                    <label for="exampleInputEmail1" class="form-label"><b>Username</b> &nbsp;<span style="color: red; font-weight: 600;">*</span></label>
                    <input type="text" class="form-control" id="uname" value="<?php $showAdmin->showAdminUsername($empID); ?>" name="uname" readonly>
                </div>
            </div>
            <div class="col">
                <div class="mb-2">
                    <label for="exampleInputEmail1" class="form-label"><b>Password</b> &nbsp;<span style="color: red; font-weight: 600;">*</span></label>
                    <input type="password" class="form-control" id="pass" value="" name="pass" readonly>
                </div>
            </div>
            <div class="col">
                <div class="mb-2">
                    <label for="exampleInputEmail1" class="form-label"><b>Confirm Password</b> &nbsp;<span style="color: red; font-weight: 600;">*</span></label>
                    <input type="password" class="form-control" id="conpass" value="" name="conpass" readonly>
                </div>
            </div>
        </div>
        <div id="updateBTNAdminaccount" style="width: 100%; text-align: end; display: none;" class="mt-3">
            <button id="updateBtnAdminAccount" class="btn-custom-default" style="width: 150px; ">Update</button>
        </div>
        </form>
    </div>
</div>


<script>

    $("#updateBtnAdminAccount").click(function(){
    
        var data = $("#updateAdminAccount").serialize()+"&updateAccountAdminC=updateAccountAdminC";
        $.ajax({
                type: "POST",
                url: "../Controller/AdminFunction.php",
                data: data,
                success: function(response){
                    alert(response);
                    Swal.fire({
                    title: 'Success',
                    text: "Your account is updated!",
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
        })





    var count = 1;
    $("#updatemyaccount").click(function(){
        count+=1;
        if(count == 2){
            $("#lname").prop('readonly', false);
            $("#fname").prop('readonly', false);
            $("#mname").prop('readonly', false);
            $("#empid").prop('readonly', false);
            $("#phoneNo").prop('readonly', false);
            $("#email").prop('readonly', false);
            $("#uname").prop('readonly', false);
            $("#pass").prop('readonly', false);
            $("#conpass").prop('readonly', false);
            $("#updateBTNAdminaccount").css('display', "block");
            $("#position").prop('readonly', false);

            

            count = 0;
        }
        else{
            $("#lname").prop('readonly', true);
            $("#fname").prop('readonly', true);
            $("#mname").prop('readonly', true);
            $("#empid").prop('readonly', true);
            $("#phoneNo").prop('readonly', true);
            $("#email").prop('readonly', true);
            $("#uname").prop('readonly', true);
            $("#pass").prop('readonly', true);
            $("#position").prop('readonly', true);
            $("#conpass").prop('readonly', true);
            $("#updateBTNAdminaccount").css('display', "none");

        }
  
    })
</script>