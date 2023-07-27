<div class="card">
    <div class="card-body">
    <form id="iptransferForm" enctype="multipart/form-data">
        <div class="card-header">
            <div class="card-title">Input Items Transfer</div>
        </div>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Date </label>
                        <input class="form-control" type="date" id="start" 
                         
                        name="date_of">
                    </div>
                </div>


                <div class="col-md-4">
  <div class="form-group">
    <label class="form-label">From Store/Godown</label>
    <select class="form-control select2 form-select" data-placeholder="Choose one" 
    name="from_store" id="from_store">
      <option label="Choose one"></option>
      <option value="Store">Store</option>
      <option value="Godown">Godown</option>
    </select>
  </div>
</div>






               
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">To Store/Godown</label>
                        <select class="form-control select2 form-select" data-placeholder="Choose one" 
                        name="to_store">
                        <option label="Choose one">
                        </option>
                        <option value="Store">Store</option>
                        <option value="Godown">Godown</option>
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="card-header">
            <div class="card-title">Input Transfer Items</div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Product Name</label>
                        <select class="form-control select2-show-search form-select" 
                        data-placeholder="Choose one" name="product_name" id="product_name">
                                                    <option label="Choose one">Choose</option>
                                                    <option value=""></option>
                                                    <option value=""></option>
                                            </select>
                    </div>
                </div>
                <div class="col-md-3" id="store_stock">
  <div class="form-group">
    <label class="form-label">Store Stock</label>
    <input type="text" class="form-control" name="store" id="store" pattern="^[A-Za-z -]+$" placeholder="">
  </div>
</div>

<div class="col-md-3" id="godown_stock">
  <div class="form-group">
    <label class="form-label">Godown Stock</label>
    <input type="text" class="form-control" name="store" id="store" pattern="^[A-Za-z -]+$" placeholder="">
  </div>
</div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Quantity Trasferred</label>
                        <input type="number" class="form-control" name="quantity"  placeholder="">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Select Measures</label>
                        <select class="form-control select2 form-select" 
                        data-placeholder="Choose one" name="measures">
                        <option label="Choose one">
                        </option>
                        <option value="In Grams">In Grams</option>
                        <option value=" In KG">In Kg</option>
                        <option value="In Numbers">In Numbers</option>
                        <option value="In Quintals">In Quintals</option>
                        <option value="In Ton">In ToN</option>
                   
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
                            <input type="number" class="form-control" name="total_price"> 
                         </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">GST</label>
                        <input type="number" class="form-control" name="gst" placeholder="">
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
                        <select class="form-control select2-show-search form-select" data-placeholder="Choose one" name="member_id">
                                                    <option label="Choose one">Choose</option>
                                                    <option value=""></option>
                                                    <option value=""></option>
                                            </select>
                    </div>
                </div>

 <div class="col-md-3" id="store_stock1">
  <div class="form-group">
    <label class="form-label">Store Stock</label>
    <input type="text" class="form-control" name="stor" id="store" pattern="^[A-Za-z -]+$" placeholder="">
  </div>
</div>

<div class="col-md-3" id="godown_stock1">
  <div class="form-group">
    <label class="form-label">Godown Stock</label>
    <input type="text" class="form-control" name="stor" id="store" pattern="^[A-Za-z -]+$" placeholder="">
  </div>
</div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Godown Stock</label>
                        <input type="text" class="form-control" name="ip_name"
                        id="store" pattern="^[A-Za-z -]+$" placeholder="">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Quantity Trasferred</label>
                        <input type="number" class="form-control" name="ip_name"  placeholder="">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Select Measures</label>
                        <select class="form-control select2 form-select" data-placeholder="Choose one" name="status_">
                        <option label="Choose one">
                        </option>
                        <option value="In Grams">In Grams</option>
                        <option value=" In KG">In Kg</option>
                        <option value="In Numbers">In Numbers</option>
                        <option value="In Quintals">In Quintals</option>
                        <option value="In Ton">In ToN</option>
                   
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
                            <input type="number" class="form-control" name="cgst_amt"> 
                         </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">GST Percentage</label>
                        <input type="number" class="form-control" name="ip_name" placeholder="">
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
                        <input type="text" class="form-control" name="cgst"> 
                    </div>
                </div>
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
                            <label class="form-label">Total Transfer Value</label>
                            <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                            <input type="number" class="form-control" name="total_value"> 
                         </div>
                        </div>
                    </div>
                    
                    
                
                </div>
         
       
            
        
            <div class="mt-4 btn-list text-end">
                <input class="btn btn-facebook" type="reset" name="reset"
                 id="ipt">Reset</input>
            <input class="btn btn-facebook" type="submit" name="submit" id="submit" value="Submit" />
            
            
                                        </div>
        </div>
    </form>
    </div>
</div>