<?php 
foreach ($custmoer_edit as $row): ?>


		<div class="">
			<?php //$attributes = array('class' => 'form-horizontal', 'id' => 'user_form','enctype' => 'multipart/form-data');
			//echo form_open('admin/customer_crud/modify/'.$row->id.'',$attributes); ?>
			
			<form class="form-horizontal " id="user_edit-form" method="post" action="<?php echo base_url();?>index.php/admin/customer_crud/modify/<?php echo $row->id; ?>">
			
			<div class="form-group ">
				<label class="col-sm-3 control-label no-padding-right" for="service_id"> Customer ID : </label>

				<div class="col-sm-9">
					<input type="text" id="service_id" class="form-control" required readonly value="<?php echo $row->id;?>" />
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="join_date"> Join Date : </label>
				<div class="col-sm-9">
					<div class="input-group">
						<input class="form-control date-picker" name="join_date" id="join_date" type="text" data-date-format="dd-mm-yyyy" value="<?php echo $row->join_date; ?>" required />
						<span class="input-group-addon">
							<i class="fa fa-calendar bigger-110"></i>
						</span>
					</div>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="first_name"> First Name : </label>

				<div class="col-sm-9">
					<input type="text" name="first_name" id="first_name" class="form-control"  value="<?php echo $row->first_name; ?>"  autofocus />
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="last_name"> Last Name : </label>

				<div class="col-sm-9">
					<input type="text" name="last_name" id="last_name" class="form-control" value="<?php echo $row->last_name; ?>"  />
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="email"> Email ID : </label>

				<div class="col-sm-9">
					<input type="email" name="email" id="email" class="form-control" value="<?php echo $row->email_id; ?>"   />
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="phone"> Mobile : </label>

				<div class="col-sm-9">
					<input type="text" name="phone" id="phone" class="form-control" value="<?php echo $row->mobile; ?>"  />
				</div>
			</div>
			

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="address"> Address : </label>

				<div class="col-sm-9">
					<textarea class="form-control" name="address" id="address" placeholder="Default Address" ><?php echo $row->address; ?></textarea>
				</div>
			</div>
										
			
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="password"> Password : </label>

				<div class="col-sm-9">
					<input type="text" name="password" id="password" class="form-control" value="<?php echo $row->password; ?>" required />
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="status"> <span style="color:<?php if($row->status=="enable") { echo "#5cb85c!important;"; } else { echo "#D15B47!important;"; } ?>"> Login Status : </span> </label>

				<div class="col-sm-9">
					<select class="form-control" name="status" id="status" required >
						<option value="">-- Select --</option>
						<option value="enable" <?php if($row->status=="enable") { echo "selected"; } ?>> Enable </option>
						<option value="disable" <?php if($row->status=="disable") { echo "selected"; } ?>> Disable </option>
						
					</select>
				
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


	<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo base_url();?>assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->
		<script src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/jquery.dataTables.bootstrap.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/dataTables.buttons.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/buttons.flash.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/buttons.html5.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/buttons.print.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/buttons.colVis.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/dataTables.select.min.js"></script>

		<!-- Form Validation -->
		<script src="<?php echo base_url();?>assets/js/jquery.validate.min.js"></script>	
		<script src="<?php echo base_url();?>assets/js/bootstrap-datepicker.min.js"></script>
		<!-- ace scripts -->
		<script src="<?php echo base_url();?>assets/js/ace-elements.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
				//initiate dataTables plugin
								
				$('#user_edit-form').validate({
					errorElement: 'div',
					errorClass: 'help-block',
					focusInvalid: false,
					ignore: "",
					rules: {
						
						first_name: {
							required: true
						},
						
						last_name: {
							required: true
						},
									
						phone: {
							required: true,
							
						},
						
						address: {
							required: true
						},
						
						password: {
							required: true,
							password: 'required'
						},
						
						
					},
			
					messages: {
						first_name: {
							required: "Please provide a first name.",
							first_name: "Please provide a first name."
						},
						phone: "Please enter phone or mobile.",
						
						phone: "Please enter secure passwortd.",
												
						address: "Please enter default address"
					},
			
			
					highlight: function (e) {
						$(e).closest('.form-group').removeClass('has-info').addClass('has-error');
					},
			
					success: function (e) {
						$(e).closest('.form-group').removeClass('has-error');//.addClass('has-info');
						$(e).remove();
					},
			
					submitHandler: function (form) {
					},
					invalidHandler: function (form) {
					}
				});
				
				$('.date-picker').datepicker({
					autoclose: true,
					todayHighlight: true
				})
				//show datepicker when clicking on the icon
				.next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
				
				
			
			})
		</script>