<?php
    $id = $_GET['id'];
    
    $query = $this->db->select('id,
    to_org, store, sales_type, b_name, p_no, p_date, customer, phone, 
    payment, date_of, product_name, batch, quantity, selling_price, total_price, 
    expiry_date, sgst_value, 
    cgst_value, cgst_amt, sgst, sgst_amt, igst, igst_amt, tax_value, sales_value,
    status')->from('opsales')->where('id',$id)->get();
    $count = $query->num_rows();    
?>
<div class="card">
    <div class="card-body">
    <form id="opsForm" enctype="multipart/form-data">
    <?php if($count != 0): ?>
            <?php foreach($query->result() as $row): ?>
        <div class="card-header">
            <div class="card-title">New Input Sales</div>
        </div>
        <div class="col-md-12">
            <div class="row">
            <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">To Organization</label>
                        <input type="hidden" name="opsid" id="opsid" value="<?php echo $id ?>">
                        <select class="form-control select2-show-search form-select" 
                        data-placeholder="Choose one" name="edit_to_org"
                        value="<?php echo $row->to_org?>">
                        <option label="Choose one">
                        </option>
                        <option value=""></option>
                        <option value=""></option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Store/Godown</label>
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
                        <label class="form-label">Sales Type</label>
                        <select class="form-control select2 form-select" data-placeholder="Choose one" 
                        name="edit_sales_type" id="stype"
                        value="<?php echo $row->sales_type?>">
                                            
                                           
<option value="Retail/Buyer" <?php echo ('Retail/Buyer' == $row->sales_type) ? 'selected="selected"' : '';?> >Retail/Buyer</option>
 <option value="Wholesale buyer" <?php echo ('Wholesale buyer' == $row->sales_type) ? 'selected="selected"' : '';?> >Wholesale buyer</option>
      
                        </select>
                    </div>
                    <div class="form-group" id="dvptype" style="display: none">
                        <label class="form-label">Buyer Name</label>
                       <input type="text" class="form-control" name="b_name" id="txtbagNumber"> 
                       <label class="form-label">Purchase Order No</label>
                       <input type="number" class="form-control" name="p_no" id="txtbagNumber"> 
                       <label class="form-label">Purchase Order Date</label>
                       <input type="date" class="form-control" name="p_date" id="txtbagNumber"> 
                         
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label">Customer Name</label>
                                                <input type="text" class="form-control" 
                                                name="edit_customer" id="edit_customer"
                                                value="<?php echo $row->customer?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label">Phone no.</label>
                                                <input type="number" class="form-control"
                                                 name="edit_phone"
                                                 value="<?php echo $row->phone?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label">Payment Type</label>
                                                <select class="form-control select2 form-select" 
                                                data-placeholder="Choose one" name="edit_payment"
                                                value="<?php echo $row->payment?>">
                                                                                          
<option value="Credit" <?php echo ('Credit' == $row->payment) ? 'selected="selected"' : '';?> >Credit</option>
 <option value="Cash" <?php echo ('Cash' == $row->payment) ? 'selected="selected"' : '';?> >Cash</option>
 <option value="Cheque" <?php echo ('Cheque' == $row->payment) ? 'selected="selected"' : '';?> >Cheque</option>
 <option value="Online/Digital Payment" <?php echo ('Online/Digital Payment' == $row->payment) ? 'selected="selected"' : '';?> >Online/Digital Payment</option>
 <option value="NEFT/IMPS" <?php echo ('NEFT/IMPS' == $row->payment) ? 'selected="selected"' : '';?> >NEFT/IMPS</option>
 <option value="Partial Credit" <?php echo ('Partial Credit' == $row->payment) ? 'selected="selected"' : '';?> >Partial Credit</option>

        
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label">Date </label>
                                            <input class="form-control" type="date" id="start" 
                                            max="<?php echo date("Y-m-d"); ?>" 
                                            name="edit_date_of"
                                            value="<?php echo $row->date_of?>">
                                        </div>
                                        </div>
            </div>
            <div class="card-header">
            <div class="card-title">Output Sales Items</div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Product Name</label>
                        <select class="form-control select2-show-search form-select" 
                        data-placeholder="Choose one" name="edit_product_name"
                        value="<?php echo $row->product_name?>">
                                                    <option label="Choose one">Choose</option>
                                                    <option value=""></option>
                                                    <option value=""></option>
                                            </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Batch No</label>
                        <input type="text" class="form-control" name="edit_batch"
                        value="<?php echo $row->batch?>"
                         pattern="^[A-Za-z -]+$">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Quantity</label>
                        <input type="number" class="form-control" name="edit_quantity" 
                        value="<?php echo $row->quantity?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Selling Price</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                            <input type="number" class="form-control" name="edit_selling_price"
                            value="<?php echo $row->selling_price?>"> 
                         </div>
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
                        <label class="form-label">Expiry Date </label>
                        <input class="form-control" type="date" id="start" max="<?php echo date("Y-m-d"); ?>" 
                        name="edit_expiry_date"
                        value="<?php echo $row->expiry_date?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">SGST Value</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                            <input type="number" class="form-control" name="edit_sgst_value"
                            value="<?php echo $row->sgst_value?>"> 
                         </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">CGST Value</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                            <input type="number" class="form-control" name="edit_cgst_value"
                            value="<?php echo $row->cgst_value?>"> 
                         </div>
                    </div>
                </div>
            </div>
      
            <div id = "add_lead_area">
                <button type="button" class="btn btn-facebook ms-3"  
                name="button" onclick="appendAddchild()" id="add_lead"> Add New</button>
                    
            </div>             <div class="col-md-12">
                    <div>
                            
                            <div id = "lead_area">
                                <div>
                                    <div class="col-md-12">
                                    <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Product Name</label>
                        <select class="form-control select2-show-search form-select" 
                        data-placeholder="Choose one">
                                                    <option label="Choose one">Choose</option>
                                                    <option value=""></option>
                                                    <option value=""></option>
                                            </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Batch No</label>
                        <input type="text" class="form-control"  pattern="^[A-Za-z -]+$" placeholder="">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Quantity Required</label>
                        <input type="number" class="form-control"   placeholder="">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Selling Price</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                            <input type="number" class="form-control" > 
                         </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Total Price</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                            <input type="number" class="form-control"> 
                         </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Expiry Date </label>
                        <input class="form-control" type="date" id="start" max="<?php echo date("Y-m-d"); ?>" 
                        >
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">SGST Value</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                            <input type="number" class="form-control" > 
                         </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">CGST Value</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                            <input type="number" class="form-control"> 
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
                                                <label class="form-label">Total Sales Value</label>
                                                <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                            <input type="number" class="form-control" name="edit_sales_value"
                            value="<?php echo $row->sales_value?>"> 
                         </div>
                                            </div>
                                        </div>
                    
                
                                     </div>       
       
            
        
            <div class="mt-4 btn-list text-end">
                <input class="btn btn-facebook" type="reset" name="reset"
                 id="ops">Reset</input>
            <input class="btn btn-facebook" type="submit" name="submit" id="submit" value="Submit" />
           
                                        </div>
        </div>
        <?php endforeach; ?> <!-- end foreach -->
        <?php else: ?> No records found <?php endif; ?><!-- end if -->
    </form>
    </div>
</div>