<?php
    $id = $_GET['id'];
    
    $query = $this->db->select('id,
    store, date_of, supplier_name, product_name, stocks, quantity, measures, 
    total_price, gst, gst_value, cgst, cgst_amt, sgst,
    sgst_amt, igst, igst_amt, tax_value, transfer_value, 
    status')->from('opreturn')->where('id',$id)->get();
    $count = $query->num_rows();    
?>
 <div class="card">
    <div class="card-body">
    <form id="oprForm" enctype="multipart/form-data">
    <?php if($count != 0): ?>
            <?php foreach($query->result() as $row): ?>
    <div class="col-md-12">
        <div class="card-header">
            <div class="card-title">Output Items Return</div>
        </div>
        
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Date </label>
                        <input type="hidden" name="oprid" id="oprid" value="<?php echo $id ?>">
                        <input class="form-control" type="date" id="start" max="<?php echo date("Y-m-d"); ?>" 
                        name="edit_date_of"
                        value="<?php echo $row->date_of?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">From Store/Godown</label>
                        <select class="form-control select2 form-select" data-placeholder="Choose one"
                         name="edit_store"
                         value="<?php echo $row->store?>">
                                                                 
<option value="Store" <?php echo ('Store' == $row->store) ? 'selected="selected"' : '';?> >Store</option>
 <option value="Godown" <?php echo ('Godown' == $row->store) ? 'selected="selected"' : '';?> >Godown</option>
      
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">To Supplier/ Supplier's name</label>
                        <select class="form-control select2-show-search form-select" 
                        data-placeholder="Choose one" name="edit_supplier_name"
                        value="<?php echo $row->supplier_name?>">
                        <option label="Choose one">
                        </option>
                        
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="card-header">
            <div class="card-title">Output Return Items</div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Product Name</label>
                        <select class="form-control select2-show-search form-select" 
                        data-placeholder="Choose one" name="edit_product_name"
                        value="<?php echo $row->product_name?>"
                        >
                                                    <option label="Choose one">Choose</option>
                                                   
                                            </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Store Stock</label>
                        <input type="text" class="form-control" name="edit_stocks" 
                        id="edit_stocks" pattern="^[A-Za-z -]+$"
                        value="<?php echo $row->stocks?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Quantity Required</label>
                        <input type="number" class="form-control" name="edit_quantity"
                        value="<?php echo $row->quantity?>"  >
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Select Measures</label>
                        <select class="form-control select2 form-select" 
                        data-placeholder="Choose one" name="edit_measures"
                        value="<?php echo $row->measures?>">
                                                                                                            
<option value="In Grams" <?php echo ('In Grams' == $row->measures) ? 'selected="selected"' : '';?> >In Grams</option>
 <option value="In Kg" <?php echo ('In Kg' == $row->measures) ? 'selected="selected"' : '';?> >In Kg</option>
 <option value="In Numbers" <?php echo ('In Numbers' == $row->measures) ? 'selected="selected"' : '';?> >In Numbers</option>
 <option value="In Quintals" <?php echo ('In Quintals' == $row->measures) ? 'selected="selected"' : '';?> >In Quintals</option>
 <option value="In ToN" <?php echo ('In ToN' == $row->measures) ? 'selected="selected"' : '';?> >In ToN</option>
       
                        </select>
                    </div>
                </div>
                
            </div>
            
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Total Price</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                            <input type="number" class="form-control" name="edit_total_price"
                            value="<?php echo $row->total_price?>"> 
                         </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">GST Percentage</label>
                        <input type="number" class="form-control" name="edit_gst" 
                        value="<?php echo $row->gst?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">GST Value</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                            <input type="number" class="form-control" name="edit_gst_value"
                            value="<?php echo $row->gst_value?>"> 
                         </div>
                    </div>
                </div>
                
            </div>
            <div id = "add_lead_area">
                <button type="button" class="btn btn-facebook ms-3"  
                name="button" onclick="appendAddchild()" id="add_lead"> Add New</button>
                    
            </div>             
            <div class="col-md-12">
                <div>
                        
                        <div id = "lead_area">
                            <div>
                                <div class="col-md-12">
                                <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Product Name</label>
                        <select class="form-control select2-show-search form-select" 
                        data-placeholder="Choose one" name="">
                                                    <option label="Choose one">Choose</option>
                                                    <option value=""></option>
                                                    <option value=""></option>
                                            </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Store Stock</label>
                        <input type="text" class="form-control" name="" pattern="^[A-Za-z -]+$" >
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Quantity Required</label>
                        <input type="number" class="form-control" name=""  >
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Select Measures</label>
                        <select class="form-control select2 form-select" 
                        data-placeholder="Choose one" name="">
            
                        </select>
                    </div>
                </div>
                
            </div>
            
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Total Price</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                            <input type="number" class="form-control" name=""> 
                         </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">GST Percentage</label>
                        <input type="number" class="form-control" name="" >
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">GST Value</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                            <input type="number" class="form-control" name=""> 
                         </div>
                    </div>
                </div>
                
            </div>
                                
                                  
             </div>
        <div class="">
            <button type="button" class="btn btn-facebook ms-3" style="margin-top: 0px;" name="button" onclick="removeAddchild(this)"> <i class="fa fa-minus"></i> </button>
                                                                            
        </div>
    </div>
</div>        
</div>
</div>
<div class="row">
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
                    
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">Total Tax Value</label>
                            <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                            <input type="number" class="form-control" name="edit_tax_value"
                            value="<?php echo $row->tax_value?>"> 
                         </div>
                            
                        </div>
                
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">Total Transfer Value</label>
                            <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                            <input type="number" class="form-control" name="edit_transfer_value"
                            value="<?php echo $row->transfer_value?>"> 
                         </div>
                        </div>
                    </div>
                    
                    
                
                </div>
         
       
            
        
            <div class="mt-4 btn-list text-end">
                <input class="btn btn-facebook" type="reset" name="reset"
                 id="opr">Reset</input>
            <input class="btn btn-facebook" type="submit" name="submit" id="submit" value="Submit" />
         
            
                                        </div>
        </div>
        <?php endforeach; ?> <!-- end foreach -->
        <?php else: ?> No records found <?php endif; ?><!-- end if -->
    </form>
    </div>
</div>