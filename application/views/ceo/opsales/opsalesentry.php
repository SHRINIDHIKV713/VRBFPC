<div class="card">
    <div class="card-body">
    <form id="opsForm" enctype="multipart/form-data">
        <div class="card-header">
            <div class="card-title">New Input Sales</div>
        </div>
        <div class="col-md-12">
            <div class="row">
            <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">To Organization</label>
                        <select class="form-control select2-show-search form-select" 
                        data-placeholder="Choose one" name="to_org">
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
                         name="store">
                        <option label="Choose one">
                        </option>
                        <option value="Store">Store</option>
                        <option value="Godown">Godown</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Sales Type</label>
                        <select class="form-control select2 form-select" data-placeholder="Choose one" 
                        name="sales_type" id="stype">
                        <option label="Choose one">
                        </option>
                        <option value="Retail/Buyer">Retail/Buyer</option>
                        <option value="Wholesale buyer">Wholesale buyer</option>
                
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
                                                name="customer" id="customer">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label">Phone no.</label>
                                                <input type="number" class="form-control"
                                                 name="phone">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label">Payment Type</label>
                                                <select class="form-control select2 form-select" 
                                                data-placeholder="Choose one" name="payment">
                                                <option label="Choose one">
                                                </option>
                                                <option value="Credit">Credit</option>
                                                <option value="Cash">Cash</option>
                                                <option value="Cheque">Cheque</option>
                                                <option value="Online/Digital Payment">Online/Digital Payment</option>
                                                <option value="NEFT/IMPS">NEFT/IMPS</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label">Date </label>
                                            <input class="form-control" type="date" id="start" 
                                            max="<?php echo date("Y-m-d"); ?>" 
                                            name="date_of">
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
                        data-placeholder="Choose one" name="product_name">
                                                    <option label="Choose one">Choose</option>
                                                    <option value=""></option>
                                                    <option value=""></option>
                                            </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Batch No</label>
                        <input type="text" class="form-control" name="batch" pattern="^[A-Za-z -]+$" placeholder="">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Quantity</label>
                        <input type="number" class="form-control" name="quantity"  placeholder="">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Selling Price</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                            <input type="number" class="form-control" name="selling_price"> 
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
                            <input type="number" class="form-control" name="total_price"> 
                         </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Expiry Date </label>
                        <input class="form-control" type="date" id="start" max="<?php echo date("Y-m-d"); ?>" 
                        name="expiry_date">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">SGST Value</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                            <input type="number" class="form-control" name="sgst_value"> 
                         </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">CGST Value</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                            <input type="number" class="form-control" name="cgst_value"> 
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
                            <input type="number" class="form-control" name="cgst_amt"> 
                         </div>
                    </div>
                </div>
                <div class="col-md-3">
                    
                    <div class="form-group">
                        <label class="form-label">SGST Percentage</label>
                        <input type="text" class="form-control" name="sgst"> 
                    </div>
                   
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">SGST Amount</label>
                       
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                            <input type="number" class="form-control" name="sgst_amt"> 
                         </div>
                    </div>
                </div>
                <div class="col-md-3">
                    
                    <div class="form-group">
                        <label class="form-label">IGST Percentage</label>
                        <input type="text" class="form-control" name="igst"> 
                    </div>
                   
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">IGST Amount</label>
                       
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                            <input type="number" class="form-control" name="igst_amt"> 
                         </div>
                    </div>
                </div>
                                        
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-label">Total Tax Value</label>
                                                <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                            <input type="number" class="form-control" name="tax_value"> 
                         </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-label">Total Sales Value</label>
                                                <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                            <input type="number" class="form-control" name="sales_value"> 
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
    </form>
    </div>
</div>