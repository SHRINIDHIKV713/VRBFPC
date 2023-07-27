<div class="card">
     <div class="card-body">
     <form id="bdForm" enctype="multipart/form-data">
        <div class="col-md-12">
            <div class="row">
            <div class="col-md-4">
                                                
                                         <div class="form-group">
                                            <label class="form-label"> Share No</label>
                                            <select class="form-control select2-show-search form-select"
                                             data-placeholder="Choose one" name="share_no">
                                             <option value="0">Select </option>
                            <?php foreach($shareno as $row):?>
                            <option value="<?php echo strtolower($row->share_no);?>"> 
                            <?php echo ucwords($row->share_no);?>
                         </option>
                        <?php endforeach;?>        
                                            </select>
</div>
                                            </div>

                      <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">First Name</label>
                                                    <input type="text" class="form-control" id="f_name" 
                                                    name="f_name" 
                                                    placeholder="First Name">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Middle Name</label>
                                                    <input type="text" class="form-control" 
                                                    id="m_name" name="m_name" pattern="^[A-Za-z -]+$" placeholder="Middle Name">
                                                </div>
                                            </div>
                                            </div>
                                            <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Last Name</label>
                                                    <input type="text" class="form-control" 
                                                    id="l_name" name="l_name" placeholder="Last Name">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Designation</label>
                                                    <select class="form-control select2 form-select" 
                                                    data-placeholder="Choose one"
                                             name="designation">
                                                    <option label="Choose one"></option>
                                                    <option value="President">President</option>
                                                    <option value="President">Vice President</option>
                                                    <option value="Director">Director</option>
                                            </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Date Of Birth</label>
                                                    <input class="form-control" type="date" id="start" 
                                                    name="dob"  min="1900-01-01" max="2005-12-12"
                                                        value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Education</label>
                                                    <input type="text" class="form-control" 
                                                    name="education" placeholder="Education">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Contact No</label>
                                                    <input type="text" class="form-control" 
                                                    name="contact"  pattern="[0-9]{10}" 
                                                    placeholder="Contact No">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">State</label>
                                                    <select class="form-control select2 form-select" 
                                                    data-placeholder="Choose one" name="state" id="state">
                                                    <option value="0">Select </option>
                         <?php foreach($state as $row):?>
                     <option value="<?php echo strtolower($row->s_id);?>">   
                    <?php echo ucwords($row->s_name);?> </option>
                        <?php endforeach;?>     
                                               
                                                </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            
                                        <div class="col-md-4">
                                        <div class="form-group">
                                         <label class="form-label">District</label>
                                        <select class="form-control form-select select2" 
                                        data-bs-placeholder="Select" name="district" id="dist">
                                                    <option value="0">Select </option>
                                                    
                                        </select>
                                    </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label">Taluk</label>
                                                <select class="form-control select2 form-select" 
                                                data-placeholder="Choose one" name="taluk" id="taluk">
                                                <option value="0">Select </option>
                                            </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label">Gram Panchayath</label>
                                                <select class="form-control select2-show-search form-select" 
                                                data-placeholder="Choose one" name="gpname" id="gp">
                                                <option value="0">Select </option>
                                            </select>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="row">
                                            
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label">Village</label>
                                                <select class="form-control select2-show-search form-select" 
                                                data-placeholder="Choose one" name="village" id="village">
                                                <option value="0">Select </option>
                                            </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label">Pin Code</label>
                                                <select class="form-control select2 form-select" 
                                                data-placeholder="Choose one" name="pincode" id="pin">
                                                <option value="0">Select </option>
                                            </select>
                                            </div>
                                        </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Director Identification No</label>
                                                    <input type="text" class="form-control" name="directorno" placeholder="Director Identification No">
                                                </div>
                                            </div>
                                           
                                        </div>

                                        <div class="row">
                                        <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Adhar No</label>
                                                    <input type="text" class="form-control" name="adhar"
                                                      placeholder="Adhar No">
                                                    
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">PAN </label>
                                                    <input type="text" class="form-control" name="pan" 
                                                     placeholder="PAN No">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Voter ID</label>
                                                    <input type="text" class="form-control" 
                                                    name="voter"  placeholder="Voter ID">
                                                </div>
                                            </div>
                                            
                                        </div>

                                        <div class="row">
                                        <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Driver Licence No</label>
                                                    <input type="text"  class="form-control" name="dl" 
                                                     placeholder="Driver Licence No">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Ration Card No</label>
                                                    <input type="text" class="form-control"
                                                     name="rationcard"  placeholder="Ration Card No">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Passport No</label>
                                                    <input type="text" class="form-control" 
                                                    name="passportno" placeholder="Passport No">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label">Director Identification certificate Upload</label>
                                                <input type="file" id="files" class="form-control" 
                                                accept=".jpg, .png, .pdf, .doc, image/jpeg, image/png" name="files">
                                            </div>
                                          </div>
                                    </div>

                                       
                                        <div class="mt-4 btn-list text-end">
                                        <input class="btn btn-facebook" type="reset" name="reset"
                                        id="bd">Reset</input>
                                        <input class="btn btn-facebook" type="submit" name="submit" 
                                        id="submit" value="Submit" />
                                           
                                    </div>




</div>
</form>
</div>
</div>