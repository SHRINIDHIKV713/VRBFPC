<?php
    $id = $_GET['id'];
    $query = $this->db->select('id,ip_name ,sel_name ,p_type,status_,p_photo ,mrp ,
    offer_name,offer_amount,total_price,offer_amount_before,selling_price,
    sp ,bsp ,gst ,sp_a ,
    cgst_p,cgst_amt ,sgst_p ,sgst_amt,igst_p,igst_amt,status')->from('ipcatalog')->where('id',$id)->get();
    $count = $query->num_rows();    
?>
<div class="card">
    <div class="card-body">
    <form id="ipcForm" enctype="multipart/form-data">
    <?php if($count != 0): ?>
            <?php foreach($query->result() as $row): ?>
        <div class="card-header">
            <div class="card-title">Catalog Information</div>
        </div>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Input Product Name<span class="text-red">*</span></label>
                        <input type="hidden" name="ipcid" id="ipcid" value="<?php echo $id ?>">
                        <input type="text" class="form-control" 
                        name="edit_ip_name" id="edit_ip_name" pattern="^[A-Za-z -]+$"
                         placeholder="Input Product Name" value="<?php echo $row->ip_name ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Seller Name</label>
                        <input type="text" class="form-control" name="edit_sel_name"
                         pattern="^[A-Za-z -]+$" value="<?php echo $row->sel_name ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Product Type</label>
                        <select class="form-control select2 form-select"  
                        name="edit_p_type">
                       
                        <option value=""></option>
                        <option value=""></option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
           
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Product Photo<span class="text-red">*</span></label>
                        <input type="file" id="edit_p_photo" class="form-control" 
                        accept=".jpg, .png, image/jpeg, image/png" name="edit_p_photo"
                        value="<?php echo set_value('edit_p_photo', $row->p_photo);?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Status</label>
                        <select class="form-control select2 form-select"  name="edit_status_">
                       
                        <option value="Active" <?php echo ('Active' == $row->status_) ? 'selected="selected"' : '';?> >Active</option>
                            
                        <option value="Inactive" <?php echo ('Inactive' == $row->status_) ? 'selected="selected"' : '';?> >Inactive</option>
                        </select>
                    </div>
                </div>
            </div>
            </div>
            <div class="card-header">
            <div class="card-title">Pricing Information</div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">MRP</label>
                       
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="edit_mrp" 
                            value="<?php echo $row->mrp ?>"> 
                         </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Offer Name</label>
                        <input type="text" class="form-control" name="edit_offer_name" 
                        pattern="^[A-Za-z -]+$" value="<?php echo $row->offer_name ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Offer Amount</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                            <input type="number" class="form-control" name="edit_offer_amount"
                            value="<?php echo $row->offer_amount ?>"> 
                         </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Total Selling Price (after offer)</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                            <input type="number" class="form-control" name="edit_selling_price"
                            value="<?php echo $row->selling_price ?>"> 
                         </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Selling Price(Excluding Tax)</label>
                       
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="edit_sp" 
                            value="<?php echo $row->sp ?>"> 
                         </div>
                    </div>
                </div>
                
                 <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">GST %</label>
                        <select class="form-control select2 form-select"  
                        name="edit_gst">
                       
                       
                        <option value="18.00" <?php echo ('18.00' == $row->gst) ? 'selected="selected"' : '';?> >18.00</option>
                            
                        <option value="12.00" <?php echo ('12.00' == $row->gst) ? 'selected="selected"' : '';?> >12.00</option>
                        <option value="5.00" <?php echo ('5.00' == $row->gst) ? 'selected="selected"' : '';?> >5.00</option>
                        <option value="0.00" <?php echo ('0.00' == $row->gst) ? 'selected="selected"' : '';?> >0.00</option>
                            
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
           
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Selling Price(Including Tax)</label>
                       
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="edit_sp_a" 
                            value="<?php echo $row->sp_a ?>"> 
                         </div>
                    </div>
                </div>
            </div>
            <div class="card-header">
            <div class="card-title">GST Breakdown</div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">CGST Percentage</label>
                       
                   
                    
                            <input type="text" class="form-control" name="edit_cgst_p" 
                            value="<?php echo $row->cgst_p ?>"> 
                  
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">CGST Amount</label>
                       
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="edit_cgst_amt" 
                            value="<?php echo $row->cgst_amt ?>"> 
                         </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">SGST Percentage</label>
                       
                 
                          
                            <input type="text" class="form-control" name="edit_sgst_p" 
                            value="<?php echo $row->sgst_p ?>"> 
                        
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">SCGST Amount</label>
                       
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="edit_sgst_amt" 
                            value="<?php echo $row->sgst_amt ?>"> 
                         </div>
                    </div>
                </div>
                </div>
<div class="row">
                <div class="col-md-3">
                    
                    <div class="form-group">
                        <label class="form-label">IGST Percentage</label>
                        <input type="text" class="form-control" name="edit_igst_p"
                        value="<?php echo $row->igst_p ?>"> 
                    </div>
                   
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">IGST Amount</label>
                       
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                            <input type="number" class="form-control" name="edit_igst_amt"
                            value="<?php echo $row->igst_amt ?>"> 
                         </div>
                    </div>
                </div>
            </div>
       
            
        
                <div class="mt-4 btn-list text-end">
                <input class="btn btn-facebook" type="submit" name="submit" id="submit" value="Save" />
            
            </div>
        </div>
        <?php endforeach; ?> <!-- end foreach -->
        <?php else: ?> No records found <?php endif; ?>
    </form>
    </div>
</div>