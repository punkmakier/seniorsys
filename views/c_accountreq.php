<div class="container p-5">
    <h3>Account Requested</h3>

    <div class="panel">
       <h5 class="mb-5">Account requested list</h5>
       <table class="table table-striped" id="myTable">
            <thead class="bg-dark text-white">
                <tr>
                    <td class="text-center">Complete Name</td>
                    <td class="text-center">Address</td>
                    <td class="text-center">Age</td>
                    <td class="text-center">Gender</td>
                    <td class="text-center">Phone No.</td>
                    <td class="text-center">Action</td>
                </tr>
            </thead>

            <tbody>
                <?php $showDataSeniorRequest->showSeniorAccountRequested();?>
            </tbody>
            
       </table>
   
    </div>
</div>


<script>
    $(".btnRequestApprove").click(function(){
        data_item = $(this).attr("id");
        $.ajax({
            type: "POST",
            url: "../Controller/SeniorCitizenFunction.php",
            data: {request_selected:data_item, action: "trigger_account_request"},
            success: function(response){
                if(response == "Success"){
                    Swal.fire({
                            title: 'Success',
                            text: "Requested account has been approved!",
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
                            
                }else{
                    Swal.fire(
                            'Failed',
                            'There\'\ s something wrong!',
                            'error'
                            )
                }
            }
        })
    })
</script>