<?php foreach ($cloths_edit as $row): ?>

		<div class="">
			<?php $attributes = array('class' => 'form-horizontal', 'id' => 'cloth_form','enctype' => 'multipart/form-data');
			echo form_open('admin/cloth_crud/modify/'.$row->id.'',$attributes); ?>
			
			<div class="form-group ">
				<label class="col-sm-3 control-label no-padding-right" for="cloth_id"> Cloth ID : </label>

				<div class="col-sm-9">
					<input type="text" id="cloth_id" class="form-control" required readonly value="<?php echo $row->id ;?>" />
				</div>
			</div>
			
			<div class="space-4"></div>
			
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="cloth_name"> Cloth Name : </label>

				<div class="col-sm-9">
					<input type="text" name="cloth_name" class="form-control" value="<?php echo $row->cloth_type ;?>" required  autofocus />
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="cloth_code"> Cloth Code : </label>

				<div class="col-sm-9">
					<input type="text" name="cloth_code" class="form-control" value="<?php echo $row->cloth_code ;?>" />
				</div>
			</div>


			<div class="clearfix form-actions">
				<div class="col-md-offset-3 col-md-9">
					<input class="btn btn-success" type="submit" value=" &nbsp;&nbsp; Update &nbsp;&nbsp;">
						
						&nbsp; &nbsp; &nbsp;														
						&nbsp; &nbsp; &nbsp;
					<input class="btn" type="reset" value="&nbsp;&nbsp; Reset &nbsp;&nbsp; ">
						
					
				</div>
			</div>
			
			</form>
		</div>
		
		<?php endforeach; ?>