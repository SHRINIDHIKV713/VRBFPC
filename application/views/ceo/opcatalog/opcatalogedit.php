
<?php
    $id = $_GET['id'];
    
    $query = $this->db->select('id,
    product_name, product_type, p_photo, status_, type_p, units,
     measures, selling_units, size, grade, selling_price, gst, 
    selling_price_before, gst_amount, cgst, cgst_amt, sgst, sgst_amt, igst, igst_amt,
    status')->from('opcatalog')->where('id',$id)->get();
    $count = $query->num_rows();    
?>
<div class="card">
    <div class="card-body">
    <form id="opcForm" enctype="multipart/form-data">
    <?php if($count != 0): ?>
            <?php foreach($query->result() as $row): ?>
        <div class="card-header">
            <div class="card-title">Catalog Information</div>
        </div>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Output Product Name<span class="text-red">*</span></label>
                        <input type="hidden" name="opcid" id="opcid" value="<?php echo $id ?>">
                        <input type="text" class="form-control" name="edit_product_name" id="edit_product_name"
                         pattern="^[A-Za-z -]+$" value="<?php echo $row->product_name?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Product Type</label>
                        <select id="sname" class="form-control select2-show-search form-select" 
                        data-placeholder="Choose one" type="text" name="edit_product_type"
                        value="<?php echo $row->product_type?>">
                            <option label="Choose one">
                        </option>
                       
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Product Photo<span class="text-red">*</span></label>
                        <input type="file" id="certificate" class="form-control" 
                        value="<?php echo $row->p_photo?>"
                        accept=".jpg, .png, image/jpeg, image/png" name="edit_p_photo">
                    </div>
                </div>
                
            </div>

            <div class="row">
            <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Status</label>
                        <select class="form-control select2 form-select" 
                         name="edit_status_"
                        value="<?php echo $row->status_?>">
<option value="Available" <?php echo ('Available' == $row->status_) ? 'selected="selected"' : '';?> >Available</option>
 <option value="Out Of Stock" <?php echo ('Out Of Stock' == $row->status_) ? 'selected="selected"' : '';?> >Out Of Stock</option>
    
                        
                        </select>
                    </div>
                </div>
                
                
            </div>
            </div>
            <div class="card-header">
            <div class="card-title">Unit,Pack And Other Attributes</div>
            </div>
            <div class="row">
                 <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Type Of Packaging</label>
                        <select class="form-control select2 form-select" data-placeholder="Choose one" 
                        name="edit_type_p" id="type_p" value="<?php echo $row->type_p?>">
<option value="Units" <?php echo ('Units' == $row->type_p) ? 'selected="selected"' : '';?> >Units</option>
 <option value="Bags" <?php echo ('Bags' == $row->type_p) ? 'selected="selected"' : '';?> >Bags</option>
    
                       
                        </select>
                    </div>
                    
                    <div class="form-group" id="dvptype" style="display: none">
                        <label class="form-label">Number Of Units In Each Bag</label>
                       <input type="number" class="form-control" name="edit_units" id="txtbagNumber"
                       value="<?php echo $row->units?>"> 
                         
                    </div>
                
                </div>
  
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Select Measures</label>
                        <select class="form-control select2 form-select" 
                        data-placeholder="Choose one" name="edit_measures" value="<?php echo $row->measures?>">
                                               
<option value="In Grams" <?php echo ('In Grams' == $row->measures) ? 'selected="selected"' : '';?> >In Grams</option>
 <option value="In Kg" <?php echo ('In Kg' == $row->measures) ? 'selected="selected"' : '';?> >In Kg</option>
 <option value="In Numbers" <?php echo ('In Numbers' == $row->measures) ? 'selected="selected"' : '';?> >In Numbers</option>
 <option value="In Quintals" <?php echo ('In Quintals' == $row->measures) ? 'selected="selected"' : '';?> >In Quintals</option>
 <option value="In ToN" <?php echo ('In ToN' == $row->measures) ? 'selected="selected"' : '';?> >In ToN</option>
       
             
                   
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Selling Units</label>
                       <input type="number" class="form-control" name="edit_selling_units"
                       value="<?php echo $row->selling_units?>"> 
                         
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Select Size</label>
                        <select class="form-control select2 form-select" 
                        data-placeholder="Choose one" name="edit_size" 
                        value="<?php echo $row->size?>">
                                               
<option value="Small" <?php echo ('Small' == $row->size) ? 'selected="selected"' : '';?> >Small</option>
 <option value="Medium" <?php echo ('Medium' == $row->size) ? 'selected="selected"' : '';?> >Medium</option>
 <option value="Big" <?php echo ('Big' == $row->size) ? 'selected="selected"' : '';?> >Big</option>
 <option value="Large" <?php echo ('Large' == $row->size) ? 'selected="selected"' : '';?> >Large</option>

       
             
                  
                   
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Specify Grade</label>
                        <select class="form-control select2 form-select" 
                        data-placeholder="Choose one" name="edit_grade"
                        value="<?php echo $row->grade?>">
                                              
<option value="Grade 1" <?php echo ('Grade 1' == $row->grade) ? 'selected="selected"' : '';?> >Grade 1</option>
 <option value="Grade 2" <?php echo ('Grade 2' == $row->grade) ? 'selected="selected"' : '';?> >Grade 2</option>
 <option value="Grade 3" <?php echo ('Grade 3' == $row->grade) ? 'selected="selected"' : '';?> >Grade 3</option>
               
                  
                   
                        </select>
                    </div>
                </div>
            </div>
            <div class="card-header">
            <div class="card-title">Pricing</div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Selling Price(Including Tax)</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                            <input type="number" class="form-control" name="edit_selling_price"
                            value="<?php echo $row->selling_price?>"> 
                         </div>
                    </div>
                </div>
                <div class="col-md-4">
                    
                        <div class="form-group">
                            <label class="form-label">GST Percentage</label>
                            <select class="form-control select2 form-select" 
                            data-placeholder="Choose one" name="edit_gst"
                            value="<?php echo $row->gst?>">
                                                 
                        
<option value="18.00" <?php echo ('18.00' == $row->gst) ? 'selected="selected"' : '';?> >18.00</option>
 <option value="12.00" <?php echo ('12.00' == $row->gst) ? 'selected="selected"' : '';?> >12.00</option>
 <option value="5.00" <?php echo ('5.00' == $row->gst) ? 'selected="selected"' : '';?> >5.00</option>
 <option value="0.00" <?php echo ('0.00' == $row->gst) ? 'selected="selected"' : '';?> >0.00</option>
                
                            </select>
                        </div>
                
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Selling Price(Before Tax)</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                            <input type="number" class="form-control" name="edit_selling_price_before"
                            value="<?php echo $row->selling_price_before?>"> 
                         </div>
                    </div>
                </div>
                
            </div>
            <div class="card-header">
                <div class="card-title">GST Calculation</div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">GST Amount</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                            <input type="number" class="form-control" name="edit_gst_amount"
                            value="<?php echo $row->gst_amount?>"> 
                         </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">CGST Percentage</label>
                        <input type="text" class="form-control" name="edit_cgst"
                        value="<?php echo $row->cgst?>"> 
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">CGST Amount</label>
                       
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                            <input type="number" class="form-control" name="edit_cgst_amt"
                            value="<?php echo $row->cgst_amt?>"> 
                         </div>
                    </div>
                </div>
                <div class="col-md-3">
                    
                    <div class="form-group">
                        <label class="form-label">SGST Percentage</label>
                        <input type="text" class="form-control" name="edit_sgst"
                        value="<?php echo $row->sgst?>"> 
                    </div>
                   
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">SGST Amount</label>
                       
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                            <input type="number" class="form-control" name="edit_sgst_amt"
                            value="<?php echo $row->sgst_amt?>"> 
                         </div>
                    </div>
                </div>
                <div class="col-md-3">
                    
                    <div class="form-group">
                        <label class="form-label">IGST Percentage</label>
                        <input type="text" class="form-control" name="edit_igst"
                        value="<?php echo $row->igst?>"> 
                    </div>
                   
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">IGST Amount</label>
                       
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                            <input type="number" class="form-control" name="edit_igst_amt"
                            value="<?php echo $row->igst_amt?>"> 
                         </div>
                    </div>
                </div>
            </div>
        
            <div class="mt-4 btn-list text-end">
                <input class="btn btn-facebook" type="reset" name="reset"
                 id="opc">Reset</input>
            <input class="btn btn-facebook" type="submit" name="submit" id="submit" value="Submit" />
            
            
                                        </div>
        </div>
        <?php endforeach; ?> <!-- end foreach -->
        <?php else: ?> No records found <?php endif; ?><!-- end if -->
    </form>
    </div>
</div>