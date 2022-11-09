<div class="container p-5">
    <h3>Messages</h3>

    <form action="" id="messageSelectedForm">
        <input type="hidden" id="selectedIDmessageTodelete" name="selectedIDmessageTodelete">
    </form>

    <form action="" id="messageSelectedFormUpdate">
        <input type="hidden" id="selectedIDmessageToupdate" name="selectedIDmessageToupdate">
    </form>
    <div class="panel">
       <h5 class="mb-5">Message/s from Senior Citizen User</h5>
       <table class="table table-striped" id="myTable">
            <thead class="bg-dark text-white">
                <tr>
                <td class="text-center d-none">ID</td>

                    <td class="text-center">Complete Name</td>
                    <td class="text-center">Subject</td>
                    <td class="text-center">Message</td>
                    <td class="text-center">Status</td>
                    <td class="text-center">Date Created</td>
                    <td class="text-center">Action</td>
                </tr>
            </thead>

            <tbody>
                <?php $showMessage->showAllMessage(); ?>
            </tbody>
            
       </table>
   
       
    </div>
</div>



<script>
    
    $(".deleteMessage").on('click',function(){
        $tr = $(this).closest('tr');



            var row = $tr.children("td").map(function(){
                return $(this).text();

            }).get();


        $("#selectedIDmessageTodelete").val(row[0]);

        var formData = $("#messageSelectedForm").serialize()+"&deleteSelectedMes=deleteSelectedMes";
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
                    text: "Selected message has been deleted!",
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



    
    $(".readMessage").on('click',function(){
        $tr = $(this).closest('tr');



            var row = $tr.children("td").map(function(){
                return $(this).text();

            }).get();


        $("#selectedIDmessageToupdate").val(row[0]);

        var formData = $("#messageSelectedFormUpdate").serialize()+"&updateSelectedMes=updateSelectedMes";
            $.ajax({
                type: "POST",
                url: "../Controller/AdminFunction.php",
                data: formData,
                success: function(response){
                   window.location.reload();
                }
        })
    })



</script>