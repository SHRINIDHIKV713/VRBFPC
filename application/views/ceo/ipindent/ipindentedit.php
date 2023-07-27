<?php
    $id = $_GET['id'];
    $query = $this->db->select('id,date_of,supplier_name,store,product_name,
     quantity, measures, rate, app_value,status')->from('ipindent')->where('id',$id)->get();
    $count = $query->num_rows();    
?>
<div class="card">
    <div class="card-body">
    <form id="ipForm" enctype="multipart/form-data">
    <?php if($count != 0): ?>
            <?php foreach($query->result() as $row): ?>
        <div class="card-header">
            <div class="card-title">Indent Information</div>
        </div>
        <div class="col-md-12">
            <div class="row">
                
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Date</label>
                        <input class="form-control" type="date" id="start" 
                       
                        name="edit_date_of"
                        value="<?php echo $row->date_of ?>">

                       
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Supplier Name </label>
                        <input type="hidden" name="ipid" id="ipid" value="<?php echo $id ?>">
                        <input type="text" class="form-control" name="edit_supplier_name" 
                        id="edit_supplier_name"  value="<?php echo $row->supplier_name ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Store/Godown</label>
                    <select class="form-control select2 form-select"  
                    name="edit_store">
                    
<option value="Store" <?php echo ('Store' == $row->store) ? 'selected="selected"' : '';?> >
Store</option>
                            
<option value="Godown" <?php echo ('Godown' == $row->store) ? 'selected="selected"' : '';?> >
Godown</option>
                           
                                                    
                  
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
                             name="edit_product_name">
                                                   
                                                    <option value=""></option>
                                                    <option value=""></option>
                                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">Quantity Required</label>
                            <input type="number" class="form-control" name="edit_quantity"
                            value="<?php echo $row->quantity ?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Select Measures</label>
                        <select class="form-control select2 form-select" 
                         name="edit_measurement">
                        
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
                            <input type="number" class="form-control" name="edit_rate"
                            value="<?php echo $row->rate ?>">
                            
                        </div>
                
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">Total Value</label>
                            <input type="number" class="form-control" name="edit_app_value"
                            value="<?php echo $row->app_value ?>">
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
                                     name="member_id">
                                                   
                                                    <option value=""></option>
                                                    <option value=""></option>
                                            </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-label">Quantity Required</label>
                                    <input type="number" class="form-control" name="license_value">
                                </div>
                            </div>
                            <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Select Measures</label>
                        <select class="form-control select2 form-select"  name="status_">
                        
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
                                <button type="button" class="btn btn-facebook ms-3" 
                                style="margin-top: 0px;" name="button" onclick="removeAddchild(this)"> <i class="fa fa-minus"></i> </button>
                                                                                                
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