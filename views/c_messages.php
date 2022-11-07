<div class="container p-5">
    <h3>Messages</h3>

    <div class="panel">
       <h5 class="mb-5">Message/s from Senior Citizen User</h5>
       <table class="table table-striped" id="myTable">
            <thead class="bg-dark text-white">
                <tr>
                    <td class="text-center">Complete Name</td>
                    <td class="text-center">Age</td>
                    <td class="text-center">Gender</td>
                    <td class="text-center">Status</td>
                    <td class="text-center">Message</td>
                    <td class="text-center">Action</td>
                </tr>
            </thead>

            <tbody>
                <?php $showMessage->showAllMessage(); ?>
  
            </tbody>
            
       </table>
   
    </div>
</div>

