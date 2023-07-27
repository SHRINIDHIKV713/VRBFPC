<?php
    $id = $_GET['id'];
    $query = $this->db->select('id,files, a_name,  address, status_, cin, adhar,
    pan,gst,ag_date,validity, contact_no, org_name, email, credit_period, credit_limit, 
    village, 
    gpname, taluk, district, state, pincode,status')->from('agent')->where('id',$id)->get();
    $count = $query->num_rows();    
?>
<div class="card">
    <div class="card-body">
    <form id="agentForm" enctype="multipart/form-data">
        <?php if($count != 0): ?>
            <?php foreach($query->result() as $row): ?>
        <div class="col-md-12">
            <div class="row">
                

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Name<span class="text-red">*</span></label>
                        <input type="hidden" name="aid" id="aid" value="<?php echo $id ?>">
                        <input type="text" class="form-control" name="edit_a_name" id="edit_a_name" 
                        pattern="^[A-Za-z -]+$" value="<?php echo $row->a_name ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">State</label>
                        <select class="form-control select2 form-select" data-placeholder="Choose one" 
                        name="edit_state">
                                                    <option label="Choose one">
                                                    </option>
                    <option value="Karnataka">Karnataka</option>
                    <option value=""></option>
                    </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">District</label>
                        <select class="form-control select2 form-select" data-placeholder="Choose one" 
                        name="edit_district">
                                                    <option label="Choose one">
                                                    </option>
                    <option value=""></option>
                    <option value=""></option>
                    </select>
                    </div>
                </div>
            </div>
            <div class="row">
                    <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Taluk</label>
                         <select class="form-control select2 form-select" data-placeholder="Choose one"
                          name="edit_taluk">
                                                    <option label="Choose one">
                                                    </option>
                    <option value=""></option>
                    <option value=""></option>
                    </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Gram Panchayath</label>
                         <select class="form-control select2 form-select" data-placeholder="Choose one" 
                         name="edit_gpname">
                                                    <option label="Choose one">
                                                    </option>
                    <option value=""></option>
                    <option value=""></option>
                    </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Village</label>
                         <select class="form-control select2 form-select" data-placeholder="Choose one" 
                         name="edit_village">
                                                    <option label="Choose one">
                                                    </option>
                    <option value=""></option>
                    <option value=""></option>
                    </select>
                    </div>
                </div>
                
                

                
            </div>
            <div class="row">
            <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Pin code</label>
                         <select class="form-control select2 form-select" data-placeholder="Choose one" 
                         name="edit_pincode">
                                                    <option label="Choose one">
                                                    </option>
                    <option value=""></option>
                    <option value=""></option>
                    </select>
                    </div>
                </div>
                
                
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Organization Name</label>
                        <input type="text" class="form-control" name="edit_org_name" 
                        pattern="^[A-Za-z -]+$" placeholder="Organization Name"
                        value="<?php echo $row->org_name?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                    <label class="form-label">CIN</label>
                    <input type="text" class="form-control" name="edit_cin" 
                    pattern="^\d{6}\s\d{3}\s\d{3}\s\d{4}\s\d{2}$" placeholder="CIN "
                    value="<?php echo $row->cin?>">
                    </div>
                </div>
                
                
            </div>
            <div class="row">
                
                
                
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Adhar No</label>
                        <input type="text" class="form-control" name="edit_adhar" 
                        pattern="^\d{4}\s\d{4}\s\d{4}$" placeholder="Adhar No"
                        value="<?php echo $row->adhar?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">PAN</label>
                        <input type="text"
                         class="form-control" 
                         name="edit_pan" 
                         pattern="^[A-Z]{5}\d{4}[A-Z]{1}$"
                         placeholder="PAN No"
                         value="<?php echo $row->pan?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                    <label class="form-label">GST NO</label>
                    <input type="text" class="form-control" name="edit_gst" 
                    pattern="^\d{6}\s\d{3}\s\d{3}\s\d{4}\s\d{2}$" placeholder="GST No"
                    value="<?php echo $row->gst?>">
                    </div>
                </div>
            </div>
            <div class="row">
                
                
                
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Agreement Date</label>
                        <input class="form-control" type="date" id="start" name="edit_ag_date" 
                        value="<?php echo $row->ag_date?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Validity</label>
                        <select class="form-control select2 form-select" data-placeholder="Choose one" 
                        name="edit_validity">
                                                    <option label="Choose one">
                                                    </option>
                            <option value="1 year" <?php echo ('1 year' == $row->validity) ? 'selected="selected"' : '';?> >1 year</option>
                            
                            <option value="2 year" <?php echo ('2 year' == $row->validity) ? 'selected="selected"' : '';?> >2 year</option>
                            
                        
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Contact No</label>
                        <input type="text" class="form-control" name="edit_contact_no" maxlength="10" pattern="[0-9]{10}" value="<?php echo $row->contact_no ?>">
                            
                    </div>
                </div>
            </div>
            <div class="row">
                

                
                <div class="col-md-4">
                     <div class="form-group">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="edit_email" value="<?php echo $row->email ?>">
                    </div>
                </div>
                <div class="col-md-4">

                        <div class="col-md-12">
                            <div class="form-group">
                                    
                                    <label class="form-label">Upload Photo</label>
                                    
                                
                                    <input type="file" id="edit_files" class="form-control" accept=".jpg, .png, .pdf, .doc, image/jpeg, image/png"
                                    name="edit_files" value="<?php echo set_value('edit_files', $row->files);?>" >
                            </div>
                        </div>
                            <div class="col-md-6">
                                
                                
                                <div class="row justify-content-center align-items-center m-1" style="border: 1px solid #e6e6e6;border-radius: 0.5rem;padding: 0.5rem 0;">
                                    <div class="col-md-4">
                                        <img src="<?php echo 'uploads/fpo/'.$row->files;?>" style="width: 50px;">
                                    </div>
                                   
                                    <div class="col-md-8">
                                        <input type="hidden" name="oldimg" id="oldimg" value="<?php echo $row->files;?>" />
                                        <span name="old" value="<?php echo $row->files;?>"><?php echo $row->files;?></span> 
                                    </div>                                    
                                </div>
                            </div>
                    
                </div>
                 <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Credit Period</label>
                        
                             <input type="text" class="form-control" name="edit_credit_period"  value="<?php echo $row->credit_period ?>">
                    </div>
                </div>
                
            </div> 
                                      
          
            <div class="row">
            
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Credit Limit</label>
                        <input type="number" class="form-control" name="edit_credit_limit"
                         value="<?php echo $row->credit_limit ?>">
                    </div>
                </div>
           
            
                <div class="col-md-4">
                    <div class="form-group">
                    <label class="form-label"> Status</label>
                    
                        <select class="form-control select2 form-select" data-placeholder="Choose one" 
                        name="edit_status_">
                                                    <option label="Choose one">
                                                    </option>

<option value="Active" <?php echo ('Active' == $row->status_) ? 'selected="selected"' : '';?> >Active</option>
                            
<option value="Inactive" <?php echo ('Inactive' == $row->status_) ? 'selected="selected"' : '';?> >Inactive</option>
                            
                        
                   
                    </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Address</label>
                    <div class="form-group">
                            <div class="form-floating floating-label1">
                                <textarea class="form-control" id="floatingTextarea2" name="edit_address" 
                                style="height: 90px">
                                <?= $row->address ?> 
                            </textarea>
                                <label for="floatingTextarea2">Address</label>
                            </div>
                        </div>
                </div>
            
        
            <div class="mt-4 btn-list text-end">
                <input class="btn btn-facebook" type="submit" name="submit" id="submit" value="Save" />
            
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
                                                name="edit_village">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Grama Panchayath"
                                                name="edit_gp">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Hobli"
                                                name="edit_hobli">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Taluk"
                                                name="edit_taluk">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="District"
                                                name="edit_district">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="State"
                                                name="edit_state">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="number" class="form-control" placeholder="Pincode"
                                                name="edit_pincode">
                                        </div>
                                    </div>
                                    <div class="mt-4 btn-list text-end">
                                    <input class="btn btn-facebook" type="submit" name="submit" id="submit" value="Save" />
                                 
                                </div>
                            </div>
                        </div>
                        </div> -->
<?php endforeach; ?> <!-- end foreach -->
        <?php else: ?> No records found <?php endif; ?><!-- end if -->
        </form>
    </div>
</div>