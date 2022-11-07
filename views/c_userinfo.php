


<div class="container-fluid ps-lg-3 pe-lg-3 pt-4" >
    <h4>User Account Info</h4>
    <!-- Emergency Contact -->
    <form action="" id="accountInfoForm">
        <div class="container-fluid mt-lg-4" style="background-color: #fff; padding: 20px; border-radius: 10px;" id="emergencyContact">
            <h5>Account &nbsp;&nbsp;<i class="fa-solid fa-pen-to-square" style="cursor: pointer;" id="toupdate"></i></h5>
            <hr>
            
            <div class="mb-2">
                <label for="exampleInputEmail1" class="form-label"><b>Username</b>&nbsp;<span style="color: red; font-weight: 600;">*</span></label>
                <input type="text" class="form-control" name="ac_uname" value="<?php $snrAccountDetails->SnrUsername($sessionID); ?>">
            </div>
            <div class="mb-2">
                <label for="exampleInputEmail1" class="form-label"><b>Email</b>&nbsp;<span style="color: red; font-weight: 600;">*</span></label>
                <input type="email" class="form-control" name="ac_email" value="<?php $snrAccountDetails->SnrEmail($sessionID); ?>">
            </div>
            <div class="mb-2">
                <label for="exampleInputEmail1" class="form-label"><b>New password</b>&nbsp;<span style="color: red; font-weight: 600;">*</span></label>
                <input type="password" class="form-control" name="ac_newpass" required>
            </div>
            <div class="mb-2">
                <label for="exampleInputEmail1" class="form-label"><b>Confirm new password</b>&nbsp;<span style="color: red; font-weight: 600;">*</span></label>
                <input type="password" id="conPass" class="form-control" name="ac_connewpass" readonly required>
            </div>
            <div class="mt-5 mb-4">
                <label for="exampleInputEmail1" class="form-label"><b>Please confirm (Old Password)&nbsp;<span style="color: red; font-weight: 600;">*</span></b></label>
                <input type="password" class="form-control" name="ac_oldnewpass"  id="oldPass" readonly required>
            </div>

            <input type="submit" class="btn btn-custom-default text-center" value="Update" style="width: 20%;" disabled id="updateBtnAccount">
            <input type="hidden" name="updateUserAccountInfo">
        </div>
    </form>
</div>

<script>

    $(document).ready(function(){
        $("#accountInfoForm").submit(function(e){
            e.preventDefault();
            var formData = new FormData(this);
      
            $.ajax({
                type: "POST",
                url: "../Controller/SeniorCitizenFunction.php",
                data: formData,
                success: function(data){
                    if(data == "NotMatch"){
                            Swal.fire(
                            'Failed!',
                            'Old password does not match.',
                            'error'
                            )
                    }
                    else if(data == "NewPassNotMatch"){
                        Swal.fire(
                            'Failed!',
                            'New password and confirm password does not match.',
                            'error'
                            )
                    }
                    else{
                            Swal.fire({
                            title: 'Success',
                            text: "Your account\'\ s information is updated!",
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
                },
                cache: false,
                contentType: false,
                processData: false
            })
        })





        var count = 1;
    $("#toupdate").click(function(){
        count+=1;
        if(count == 2){
            $("#conPass").prop('readonly', false);
            $("#oldPass").prop('readonly', false);
            $("#updateBtnAccount").prop('disabled', false);
            
            count = 0;
        }
        else{
            $("#conPass").prop('readonly', true);
            $("#oldPass").prop('readonly', true);
            $("#updateBtnAccount").prop('disabled', true);

        }
  
    })
    })



   
</script>