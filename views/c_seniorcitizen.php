<div class="container p-5">
    <h3>Manage Senior Citizen</h3>


    <form action="" id="selectedUserSrCitizenForm">
        <input type="hidden" id="selectedUserSrCitizen" name="selectedUserSrCitizen">
    </form>

    <div class="panel">
       <h5 class="mb-3">Senior Citizen List</h5>
       <table class="table table-striped" id="myTable">
            <thead class="bg-dark text-white">
                <tr>
                    <td class="text-center">Complete Name</td>
                    <td class="text-center">Address</td>
                    <td class="text-center">Age</td>
                    <td class="text-center">Gender</td>
                    <td class="text-center">Status</td>
                    <td class="text-center">Action</td>
                </tr>
            </thead>

            <tbody>
             <?php $showDataSeniorRequest->showAllSeniorAccount();?>
                
            </tbody>
            
       </table>
   
    </div>
</div>

<script>
    $(".deleteThisSrCitizenAcct").on('click',function(){
        $tr = $(this).closest('tr');



            var row = $tr.children("td").map(function(){
                return $(this).text();

            }).get();


        $("#selectedUserSrCitizen").val(row[1]);

        var formData = $("#selectedUserSrCitizenForm").serialize()+"&deleteSrSelected=deleteSrSelected";
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


