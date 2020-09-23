<?php foreach ($expenses_edit as $row): ?>
									
									<div> 
										<form class="form-horizontal" id="user-form" method="post" action="<?php echo base_url();?>index.php/admin/expense_crud/modify/<?php echo $row->exp_id; ?>">
									
										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="expense_id"> Expese ID : </label>

											<div class="col-sm-9">
												<input type="text" id="expense_id" name="expense_id" class="form-control" readonly value="<?php echo $row->exp_id; ?>" />
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="exp_date"> Expenses Date : </label>

											<div class="col-sm-9">
												<div class="input-group">
													<input class="form-control date-picker" name="exp_date" id="exp_date" type="text" data-date-format="dd-mm-yyyy" value="<?php echo $row->exps_date; ?>" />
													<span class="input-group-addon">
														<i class="fa fa-calendar bigger-110"></i>
													</span>
												</div>
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="exp_type"> Expense Type : </label>

											<div class="col-sm-9">
												<select class="select form-control" name="exp_type" id="exp_type" data-placeholder="Choose a Expense Type...">
													<option value="">-- Select --</option>
													
													<?php foreach ($expensetype->result() as $exptyperow): 
														
														if($exptyperow->exps_type==$row->exp_type)
															{ echo "<option value='$exptyperow->exps_type' selected>". $exptyperow->exps_type ."</option>"; }
														else
															{ echo "<option value='$exptyperow->exps_type'>". $exptyperow->exps_type ."</option>"; }	
													 
													endforeach; 
													?>
						
													
												</select>
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="payee_name"> Payee Name : </label>

											<div class="col-sm-9">
												<input type="text" name="payee_name" id="payee_name" class="form-control" value="<?php echo $row->exp_payee_name; ?>" />
											</div>
										</div>
										
										
										
										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="exp_amt"> Expenses Amount : </label>

											<div class="col-sm-9">
												<input type="text" name="exp_amt" id="exp_amt" class="form-control" value="<?php echo $row->exp_amt; ?>" />
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="exp_amt_paid_by"> Amt Paid By : </label>

											<div class="col-sm-9">
												<select class="form-control" name="exp_amt_paid_by" id="exp_amt_paid_by">
													<option value="">-- Select --</option>
													<option value="bycash" <?php if($row->exp_paidby=='bycash') { echo "selected";} ?> > By Cash</option>
													<option value="bycheque" <?php if($row->exp_paidby=='bycheque') { echo "selected";} ?> >By Cheque</option>
													
												</select>
											
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="exp_cheque_no"> Cheque No : </label>

											<div class="col-sm-9">
												<input type="text" name="exp_cheque_no" id="exp_cheque_no" class="form-control" value="<?php echo $row->exp_chequeno; ?>" />
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="exp_cheque_date"> Cheque Date : </label>

											<div class="col-sm-9">
												<div class="input-group">
													<input class="form-control date-picker" name="exp_cheque_date" id="exp_cheque_date" type="text" data-date-format="dd-mm-yyyy" value="<?php echo $row->exp_cheque_date; ?>" />
													<span class="input-group-addon">
														<i class="fa fa-calendar bigger-110"></i>
													</span>
												</div>
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="exp_remark"> Remarks : </label>

											<div class="col-sm-9">
												<input type="text" name="exp_remark" id="exp_remark" class="form-control" value="<?php echo $row->exp_remarks; ?>"  />
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
		<script src="<?php echo base_url();?>assets/js/jquery-ui.custom.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/jquery.dataTables.bootstrap.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/dataTables.buttons.min.js"></script>
		
		<script src="<?php echo base_url();?>assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/chosen.jquery.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/spinbox.min.js"></script>
		
		<script src="<?php echo base_url();?>assets/js/buttons.flash.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/buttons.html5.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/buttons.print.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/buttons.colVis.min.js"></script>
		

		<!-- Form Validation -->
		<script src="<?php echo base_url();?>assets/js/jquery.validate.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/bootstrap-datepicker.min.js"></script>
			
			
		<script src="<?php echo base_url();?>assets/js/jquery.knob.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/autosize.min.js"></script>
		
		<!-- ace scripts -->
		<script src="<?php echo base_url();?>assets/js/ace-elements.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
				//initiate dataTables plugin
								
				if(!ace.vars['touch']) {
					$('.chosen-select1').chosen({allow_single_deselect:true}); 
					//resize the chosen on window resize
			
					$(window)
					.off('resize.chosen')
					.on('resize.chosen', function() {
						$('.chosen-select').each(function() {
							 var $this = $(this);
							 $this.next().css({'width': $this.parent().width()});
						})
					}).trigger('resize.chosen');
					//resize chosen on sidebar collapse/expand
					$(document).on('settings.ace.chosen', function(e, event_name, event_val) {
						if(event_name != 'sidebar_collapsed') return;
						$('.chosen-select').each(function() {
							 var $this = $(this);
							 $this.next().css({'width': $this.parent().width()});
						})
					});
			
			
					
				}
				
				
				$('#user-form').validate({
					errorElement: 'div',
					errorClass: 'help-block',
					focusInvalid: false,
					ignore: "",
					rules: {
						
						payee_name: {
							required: true
						},
						
						exp_type: {
							required: true
						},
						
						exp_amt: {
							required: true,
							price: 'required'
						}
											
					},
			
					messages: {
						payee_name: {
							required: "Please enter payee name .",
							exp_type: "Please select expese type."
						},
						exp_amt: "Please enter amount."
						
						
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
		
	</body>
</html>