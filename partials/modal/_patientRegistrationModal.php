<div class="modal" id="patientRegistrationModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Patient Regis</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="partials/modal/_handlePatientRegistrationModal.php" method="POST">
                            <div class="mb-3">
                                <label for="Name" class="form-label">Name*</label>
                                <input type="text" class="form-control" id="pname" name="pname"
                                    aria-describedby="emailHelp" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address*</label>
                                <input type="email" class="form-control" id="pemail" name="pemail"
                                    aria-describedby="emailHelp" required>

                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address*</label>
                                <input type="text" class="form-control" id="paddress" name="paddress"
                                    aria-describedby="emailHelp" required>

                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Phone Number*</label>
                                <input type="number" class="form-control" id="pnumber" name="pnumber"
                                    aria-describedby="emailHelp" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Blood Group*</label><br>
                                <select name="pBloodGroup" id="pBloodGroup" require>
                                   <option value="A+">A+</option>
                                   <option value="A-">A-</option>
                                   <option value="AB+">AB+</option>
                                   <option value="AB-">AB-</option>
                                   <option value="B+">B+</option>
                                   <option value="B-">B-</option>
                                   <option value="O+">O+</option>
                                   <option value="O-">O-</option>
                               </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">pCity*</label><br>
                                <select name="pCity" id="pCity" require>
                                   <option value="Dhaka">Dhaka</option>
                                   <option value="Jhenaidah">Jhenaidah</option>
                                   <!-- <option value="AB+">AB+</option>
                                   <option value="AB-">AB-</option>
                                   <option value="B+">B+</option>
                                   <option value="B-">B-</option>
                                   <option value="O+">O+</option>
                                   <option value="O-">O-</option> -->
                               </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Password*</label>
                                <input type="password" class="form-control" id="p_Password" name="p_Password"
                                    aria-describedby="emailHelp" required>
                               
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Confirm Password*</label>
                                <input type="password" class="form-control" id="cp_Password" name="cp_Password"
                                    aria-describedby="emailHelp" required>

                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>