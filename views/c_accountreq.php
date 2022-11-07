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

