<div class="card">
    <div class="card-body">
    <form id="agentForm" enctype="multipart/form-data">
        <div class="col-md-12">
            <div class="row">
                

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Name of the Agent<span class="text-red">*</span></label>
                        <input type="text" class="form-control" name="a_name" id="a_name" pattern="^[A-Za-z -]+$" placeholder="Agent Name">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">State</label>
                        <select class="form-control select2 form-select"
                          data-placeholder="Choose one" name="state" id="state">
                    <option label="Choose one"> </option>
                    <?php foreach($state as $row):?>
                     <option value="<?php echo strtolower($row->s_id);?>">   
                    <?php echo ucwords($row->s_name);?> </option>
                        <?php endforeach;?>    
                    </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">District</label>
                        <select class="form-control select2 form-select" data-placeholder="Choose one"
                         name="district" id="dist">
                         <option label="Choose one">Choose </option>
                    </select>
                    </div>
                </div>
            </div>
                <div class="row">
                    <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Taluk</label>
                         <select class="form-control select2 form-select" 
                         data-placeholder="Choose one" name="taluk" id="taluk">
                         <option label="Choose one">Choose </option>
                    </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Gram Panchayath</label>
                         <select class="form-control select2 form-select" 
                         data-placeholder="Choose one"
                          name="gpname" id="gp">
                          <option label="Choose one">Choose </option>
                    </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Village</label>
                         <select class="form-control select2 form-select" data-placeholder="Choose one"
                          name="village" id="village">
                          <option label="Choose one">Choose </option>
                    </select>
                    </div>
                </div>
                
                

                
            </div>
            <div class="row">
               

              
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Pin code</label>
                         <select class="form-control select2 form-select" data-placeholder="Choose one"
                          name="pincode" id="pin">
                          <option label="Choose one">Choose </option>
                    </select>
                    </div>
                </div>
                
                <div class="col-md-4">
                     <div class="form-group">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="enter your email">
                    </div>
                </div>
                    

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Paasword</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                </div>
               
                
            </div>
            <div class="row">
                
            <div class="col-md-4">
                    <div class="form-group">
                    <label class="form-label">CIN</label>
                    <input type="text" class="form-control" name="cin" 
                     placeholder="CIN ">
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Adhar No</label>
                        <input type="text" class="form-control" name="adhar"  placeholder="Adhar No">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">PAN</label>
                        <input type="text" class="form-control" name="pan" placeholder="PAN No">
                    </div>
                </div>

            </div>
            <div class="row">
                
            <div class="col-md-4">
                    <div class="form-group">
                    <label class="form-label">GST NO</label>
                    <input type="text" class="form-control" name="gst" 
                     placeholder="GST No">
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Agreement Date</label>
                        <input class="form-control" type="date" id="start"  name="ag_date">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Validity</label>
                        <select class="form-control select2 form-select" data-placeholder="Choose one" name="validity">
                                                    <option label="Choose one">
                                                    </option>
                            <option value="1 year">1 year</option>
                            <option value="2 year">2 year</option>
                           
                        
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
            <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Contact No</label>
                        <input type="text" class="form-control" name="contact_no" pattern="[0-9]{10}" placeholder="Contact No">
                            
                    </div>
                </div>

            <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Organization Name</label>
                        <input type="text" class="form-control" name="org_name" 
                        pattern="^[A-Za-z -]+$" placeholder="Organization Name">
                    </div>
                </div>
                
              
                <div class="col-md-4">

                    <div class="form-group">
                        <label class="form-label"> Upload Photo</label>
                        <input type="file" class="form-control" 
                        accept=".jpg, .png, .pdf, .doc, image/jpeg, image/png" name="files">
                    </div>
                </div> 
                
            </div>                               
            <div class="row">
                
            <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Credit Period</label>
                        
                             <input type="text" class="form-control" name="credit_period">
                    </div>
                </div>
               

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Credit Limit</label>
                        <input type="number" class="form-control" name="credit_limit">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                    <label class="form-label"> Status</label>
                    
                        <select class="form-control select2 form-select" data-placeholder="Choose one" name="status_">
                                                    <option label="Choose one">
                                                    </option>
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                    </select>
                    </div>
                </div>
            </div>
            
<div class="row">
<div class="col-md-4">
                    <label class="form-label">Address</label>
                        <div class="form-group">
                            <div class="form-floating floating-label1">
                                <textarea class="form-control" id="floatingTextarea2" name="address" 
                                style="height: 90px"></textarea>
                                <label for="floatingTextarea2">Address</label>
                            </div>
                        </div>
                </div>

                    </div>
           
        
            <div class="mt-4 btn-list text-end">
            <input class="btn btn-facebook" type="reset" name="reset"
                 id="agent">Reset</input>
            <input class="btn btn-facebook" type="submit" name="submit" id="submit" value="submit" />
            </div>
        </div>
        
                    <!-- <div class="modal fade" id="select2modal">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content modal-content-demo">
                                <div class="text-end mx-2 mt-2">
                                    <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="col-md-12">
                                        <div class="form-group">

                                            <input type="text" class="form-control" placeholder="Village"
                                                name="village">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Grama Panchayath"
                                                name="gp">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Hobli"
                                                name="hobli">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Taluk"
                                                name="taluk">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="District"
                                                name="district">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="State"
                                                name="state">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="number" class="form-control" placeholder="Pincode"
                                                name="pincode">
                                        </div>
                                    </div>
                                    <div class="mt-4 btn-list text-end">
                                    <input class="btn btn-facebook" type="submit" name="submit" id="submit" value="submit" />
                                 
                                </div>
                            </div>
                        </div>
                    </div> -->
        </form>
    </div>
</div>