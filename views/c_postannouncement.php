<div class="container p-5">
    <h3>Manage Announcement</h3>

    <div class="panel">
        
<form action=""id="selectedAnnouncementForm">
    <input type="hidden" id="selectedID" name="selectedAnnouncement">
</form>
       <h5 class="mb-3">Announcement Posted List</h5>
       <button class="btn btn-custom-default mb-4" style="width: 20%" data-bs-toggle="modal" data-bs-target="#addAnnouncement">Add Announcement</button>
       <table class="table table-striped" id="myTable">
            <thead class="bg-dark text-white">
                <tr>
                    <td class="text-center">Title</td>
                    <td class="text-center">Description</td>
                    <td class="text-center">Posted By</td>
                    <td class="text-center">Position</td>
                    <td class="text-center">Date Posted</td>
                    <td class="text-center">Action</td>
                </tr>
            </thead>

            <tbody>
                <?php $showAdmin->showAllAnnouncement();?>
            </tbody>
            
       </table>
   
    </div>
</div>


<!-- Send Message Modal -->
<div class="modal fade" id="addAnnouncement" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Post Announcement</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <div class="form-group mb-3">
        <form action="" id="postAnnouncementForm">
        <div class="form-group mt-2 mb-4">
              <label for="exampleInputEmail1" class="form-label"><b>Title</b>&nbsp;<span style="color: red; font-weight: 600;">*</span></label><br>
              <input type="text" class="form-control" name="title">
           </div>
            <div class="form-floating">
                <textarea class="form-control" placeholder="Leave a message here" id="floatingTextarea2" style="height: 150px; resize: none;" name="description"></textarea>
                <label for="floatingTextarea2">Description</label>
            </div>
        </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="padding: 10px; ">Close</button>
        <button id="postBTN" type="button" class="btn btn-custom-default" style="width: 20%;">Post</button>
      </div>
    </div>
  </div>
</div>



<script>
    $("#postBTN").click(function(){
        var data = $("#postAnnouncementForm").serialize()+"&postDataAnnouncement=postDataAnnouncement";
        $.ajax({
            type: "POST",
            url: "../Controller/AdminFunction.php",
            data: data,
            success: function(response){
                if(response == "Failed"){
                    Swal.fire(
                            'Failed',
                            'There\'\ s something wrong.',
                            'error'
                            )
                }
                else if(response == "Required"){
                    Swal.fire(
                            'Failed',
                            'All fields are required!',
                            'error'
                            )
                }
                else{
                    Swal.fire({
                    title: 'Success',
                    text: "Your announcement has been posted!",
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
</script>