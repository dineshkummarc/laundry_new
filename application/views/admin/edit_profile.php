 <!-- http://snehakinkar.blogspot.in/2013/05/cascading-list-of-country-state-city.html -->
 
 
	<?php foreach ($admindata->result() as $adminrow): ?>
							
							
	<div class="">
		<?php $attributes = array('class' => 'form-horizontal', 'id' => 'admin_form','enctype' => 'multipart/form-data');
		echo form_open('admin/update_profile/1',$attributes); ?>
			
			
						
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="adm_id"> Admin ID : </label>

						<div class="col-sm-9">
							<input type="text" id="adm_id" name="adm_id" class="form-control" readonly value="<?php echo $adminrow->id; ?>" />
						</div>
					</div>
										
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="full_name"> Full Name : </label>

						<div class="col-sm-9">
							<input type="text" id="full_name" name="full_name" class="form-control" value="<?php echo $adminrow->admin_name; ?>"  required/>
						</div>
					</div>
										
			
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="mobile"> Mobile : </label>

						<div class="col-sm-9">
							<input type="text" id="mobile" name="mobile" class="form-control"  value="<?php echo $adminrow->mobile; ?>" required />
						</div>
					</div>
										
			
			
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="email"> Email : </label>

						<div class="col-sm-9">
							<input type="email" id="email" name="email" class="form-control"  value="<?php echo $adminrow->email_id; ?>" required />
						</div>
					</div>
										
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="username"> username : </label>

						<div class="col-sm-9">
							<input type="text" id="username" name="username" class="form-control"  value="<?php echo $adminrow->username; ?>" required />
						</div>
					</div>
										
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="new_passwd"> New Password : </label>

						<div class="col-sm-9">
							<input type="password" id="new_passwd" name="new_passwd" class="form-control"  placeholder="if blank no password change" />
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
			
			<?php endforeach; ?>	
			
			
		</form>
	</div>
		
		