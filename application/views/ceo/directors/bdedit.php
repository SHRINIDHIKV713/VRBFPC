<?php
    $id = $_GET['id'];
    
    $query = $this->db->select('id, share_no,f_name,m_name,l_name,designation,dob,education,contact,state,district,taluk,
    gpname,village,pincode,adhar,pan,directorno,voter,dl,rationcard,passportno,files,status')->from('directors')->where('id',$id)->get();
    $count = $query->num_rows();    
?>
<div class="card">
     <div class="card-body">
     <form id="bdForm" enctype="multipart/form-data">
     <?php if($count != 0): ?>
            <?php foreach($query->result() as $row): ?>
        <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-4">
                                               
                                            <div class="form-group">
                                                <label class="form-label"> Share No</label>
                                                
                                                <select class="form-control select2-show-search form-select"
                                                name="edit_share_no" >
                                                        <option label="Choose one">Choose</option>
                                                    
                                                        <option value="D1" <?php echo ('D1' == $row->share_no) ? 'selected="selected"' : '';?> >001</option>
                                                        <option value="D2" <?php echo ('D2' == $row->share_no) ? 'selected="selected"' : '';?> >002</option>
                                    
                                                </select>
                                            </div>
                                        </div>

                                        
<!-- <div class="col-md-4">
  <div class="form-group">
    <label class="form-label">Share No</label>
    <div class="input-group">
        <input type="text" class="form-control" id="shareInput" name="edit_share_no"
        value="<?php echo $row->share_no ?>">
        <select class="form-control select2-show-search form-select" 
          data-placeholder="Choose one" id="shareDropdown">
          <option label="Choose one">Choose</option>
          <option value="001" <?php echo ('001' == $row->share_no) ? 'selected="selected"' : '';?> >001</option>
         <option value="002" <?php echo ('D2' == $row->share_no) ? 'selected="selected"' : '';?> >002</option>
            
        </select>
      </div>
  </div>
</div> -->

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">First Name</label>
                                                    <input type="hidden" name="bid" id="bid" value="<?php echo $id ?>">
                                                    <input type="text" class="form-control" id="edit_f_name" name="edit_f_name" pattern="^[A-Za-z -]+$" value="<?php echo $row->f_name?>">
                                            
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Middle Name</label>
                                                    <input type="text" class="form-control" 
                                                    id="edit_m_name" name="edit_m_name" pattern="^[A-Za-z -]+$" placeholder="Middle Name" value="<?php echo $row->m_name?>">
                                                </div>
                                            </div>
                                    </div>
                                    <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Last Name</label>
                                                    <input type="text" class="form-control" 
                                                    id="edit_l_name" name="edit_l_name" pattern="^[A-Za-z -]+$" 
                                                    placeholder="Last Name" value="<?php echo $row->l_name?>">
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Designation</label>
                                                    <select class="form-control select2 form-select" data-placeholder="Choose one"
                                                        name="edit_designation">
                                                    <option label="Choose one"></option>
                                                    <option value="President" <?php echo ('President' == $row->designation) ? 'selected="selected"' : '';?> >President</option>
                                                    <option value="Vice President" <?php echo ('Vice President' == $row->designation) ? 'selected="selected"' : '';?> >Vice President</option>
                                                 
                                                    <option value="Director" <?php echo ('Director' == $row->designation) ? 'selected="selected"' : '';?> >Director</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Date Of Birth</label>
                                                    <input class="form-control" type="date" id="start" name="edit_dob" min="1900-01-01" max="2005-12-12"
                                                    value="<?php echo $row->dob?>">
                                                </div>
                                            </div>
                                    </div>
                                        <div class="row">
                                            
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Education</label>
                                                    <input type="text" class="form-control" name="edit_education" value="<?php echo $row->education?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Contact No</label>
                                                    <input type="text" class="form-control" 
                                                    name="edit_contact"  pattern="[0-9]{10}" value="<?php echo $row->contact?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">State</label>
                                                    <select class="form-control select2 form-select" data-placeholder="Choose one" name="state">
                                                                                <option label="Choose one">
                                                                                </option>
                                                <option value="Karnataka">Karnataka</option>
                                                <option value=""></option>
                                                </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label">District</label>
                                                <select class="form-control select2 form-select" data-placeholder="Choose one" name="district">
                                                                            <option label="Choose one">
                                                                            </option>
                                            <option value=""></option>
                                            <option value=""></option>
                                            </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label">Taluk</label>
                                                <select class="form-control select2 form-select" data-placeholder="Choose one" name="taluk">
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
                                                    <select class="form-control select2 form-select" data-placeholder="Choose one" name="gpname">
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
                                                    <label class="form-label">Village</label>
                                                    <select class="form-control select2 form-select" data-placeholder="Choose one" name="village">
                                                                                <option label="Choose one">
                                                                                </option>
                                                <option value=""></option>
                                                <option value=""></option>
                                                </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Pin Code</label>
                                                    <select class="form-control select2 form-select" data-placeholder="Choose one" name="pincode">
                                                                                <option label="Choose one">
                                                                                </option>
                                                <option value=""></option>
                                                <option value=""></option>
                                                </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Director Identification No</label>
                                                    <input type="text" class="form-control" name="edit_directorno" value="<?php echo $row->directorno?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Adhar No</label>
                                                    <input type="text" class="form-control" name="edit_adhar" pattern="^\d{4}\s\d{4}\s\d{4}$" value="<?php echo $row->adhar?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">PAN No</label>
                                                    <input type="text" class="form-control" name="edit_pan" pattern="^[A-Z]{5}\d{4}[A-Z]{1}$" value="<?php echo $row->pan?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Voter ID</label>
                                                    <input type="text" class="form-control" name="edit_voter" pattern="^[A-Z]{3}[0-9]{7}$" value="<?php echo $row->voter?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                        
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Driver Licence No</label>
                                                    <input type="text" class="form-control" name="edit_dl" pattern="^[A-Z]{2}[0-9]{2}[A-Z]{1,2}[0-9]{4}$"
                                                     value="<?php echo $row->dl?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Ration Card No</label>
                                                    <input type="text" class="form-control" name="edit_rationcard" pattern="^[A-Z]{3}[0-9]{8}$" value="<?php echo $row->rationcard?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Passport No</label>
                                                    <input type="text" class="form-control" name="edit_passportno" pattern="^[A-Z]{1}[0-9]{7}$"  value="<?php echo $row->passportno?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                          
                                        <div class="col-md-4">

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                        
                                                        <label class="form-label">Director Identification Upload</label>
                                                        
                                                    
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
                                                        <input type="hidden" name="newimg" id="newimg" value="<?php echo $row->files;?>" />
                                                        <span name="new" value="<?php echo $row->files;?>"><?php echo $row->files;?></span> 
                                                    </div>                                    
                                                </div>
                                            </div>

                                        </div>
                                        </div>

                                        <div class="mt-4 btn-list text-end">
                                        <input class="btn btn-facebook" type="submit" name="submit" id="submit" value="Save" />
                                        
                                           
                                    </div>




</div>
<?php endforeach; ?> <!-- end foreach -->
        <?php else: ?> No records found <?php endif; ?><!-- end if -->
            </form>
</div>
</div>