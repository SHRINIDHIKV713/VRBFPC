
<div class="card">
    <div class="card-body">
    <form id="ipForm" enctype="multipart/form-data">
        <div class="card-header">
            <div class="card-title">Indent Information</div>
        </div>
        <div class="col-md-12">
            <div class="row">
                
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Date</label>
                        <input class="form-control" type="date" id="start"  
                        name="date_of">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Supplier Name </label>
                        <input type="text" class="form-control" name="supplier_name" id="supplier_name"  placeholder="">
                    </div>
                </div>
                <div class="col-md-4">
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

          
           
            <div class="card-header">
                <div class="card-title">Input Indent Information</div>
            </div>
           
                       
                         
                           
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">Input Product Name</label>
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
        <label class="form-label">Quantity Required</label>
        <input type="number" class="form-control" name="quantity" id="quantity">
    </div>
  </div>
   <div class="col-md-3">
    <div class="form-group">
        <label class="form-label">Select Measures</label>
        <select class="form-control select2 form-select" data-placeholder="Choose one"
         name="measures" id="measures">
            <option label="Choose one"></option>
            <option value="In Grams">In Grams</option>
            <option value="In KG">In Kg</option>
            <option value="In Numbers">In Numbers</option>
            <option value="In Quintals">In Quintals</option>
            <option value="In Ton">In ToN</option>
        </select>
     </div>
 </div>
 <div class="col-md-3">
    <div class="form-group">
        <label class="form-label">Rate</label>
        <input type="number" class="form-control" name="rate" id="rate">
    </div>
 </div>
 <div class="col-md-3">
    <div class="form-group">
        <label class="form-label">Total Value</label>
        <input type="number" class="form-control" name="app_value" id="app_value">
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
                                    <label class="form-label">Input Product Name</label>
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
                                    <label class="form-label">Quantity Required</label>
                                    <input type="number" class="form-control" name="">
                                </div>
                            </div>
                            <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Select Measures</label>
                        <select class="form-control select2 form-select" data-placeholder="Choose one" 
                        name="">
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
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">Rate</label>
                            <input type="number" class="form-control" name="">
                            
                        </div>
                
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">Approximate Value</label>
                            <input type="number" class="form-control" name="">
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
        
            <div class="mt-4 btn-list text-end">
                <input class="btn btn-facebook" type="reset" name="reset"
                 id="ip">Reset</input>
            <input class="btn btn-facebook" type="submit" name="submit" id="submit" value="Submit" />
            <!-- <button class="btn btn-facebook" onClick="window.print()"><i class="fa fa-print m-1" aria-hidden="true"></i>Print</button> -->
            
                                        </div>
        </div>
    </form>
    </div>
    
</div>

