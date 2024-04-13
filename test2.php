
<div class="row">
  <div class="col-md-12">

      <label class="col-md-2 control-label" for="adv_num">Advertisement Number *</label>    
      <div class="col-md-4">

      <select id="adv_num" name="adv_num" class="form-control input-md" required="">

          <option value="">Select</option>
          <option selected='selected' value="IITI/FACREC-CHE/2023/JULY/02">IITI/FACREC-CHE/2023/JULY/02</option>
      </select>
        
      </div>

      <label class="col-md-2 control-label" for="doa">Date of Application </label>  
      <div class="col-md-4">
      <input id="doa" name="doa" type="text" readonly="readonly" value="<?php $date_today=date('d/m/Y'); echo $date_today;?>" placeholder="" class="form-control input-md" required="">
     </div>

      <label class="col-md-2 control-label" for="ref_num">Application Number</label>  
      <div class="col-md-4">

      <input id="ref_num" name="ref_num" type="text" readonly="readonly" value="1698348185" placeholder="" class="form-control input-md" required="">
     </div>

      <label class="col-md-2 control-label" for="post">Post Applied for *</label>  
      <div class="col-md-4">
      <select id="post" name="post" class="form-control input-md" required="">
          <option value="">Select</option>
          <option   value="Professor">Professor</option>
          <option   value="Associate Professor">Associate Professor</option>
          <option   value="Assistant Professor Grade I">Assistant Professor Grade I</option>
          <option  selected='selected' value="Assistant Professor Grade II">Assistant Professor Grade II</option>
      </select>
      </div>

      <label class="col-md-2 control-label" for="dept">Department/School *</label>  
      <div class="col-md-4">
      <select id="dept" name="dept" class="form-control input-md" required="">
          <option value="">Select</option>
          <option selected='selected' value="Chemical Engineering">Chemical Engineering</option>
      </select>
        
      </div>
</div>
</div>
<hr>
