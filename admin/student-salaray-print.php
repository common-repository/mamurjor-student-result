<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

		
add_action('admin_menu', 'mamurjor_student_salaray_print');
if(!function_exists('mamurjor_student_salaray_print')){
function mamurjor_student_salaray_print() {
add_menu_page('studentprint', 'Student salary Print', 'manage_options', 'studentprint','mamurjor_stidemtmonthly_salary_print', 'dashicons-calendar-alt');

}}
if(!function_exists('mamurjor_stidemtmonthly_salary_print')){
function mamurjor_stidemtmonthly_salary_print() {
	
	if (isset($_POST['getsalarysheet'])) {
						  
				  	 $year=date("Y");
$monthname = sanitize_text_field($_POST['monthname']);
global $wpdb;
$monthly_salary_table_name=$wpdb->prefix.'student_monthly_salary';

$monthly_salary_invoice = $wpdb->get_results("SELECT * FROM $monthly_salary_table_name WHERE monthname='$monthname' and year='$year'");
$serial=0;
		 ?>
		 <section class="wrapper">
        
        <div class="row mb"  id="printmamurjorinvoice">
          <!-- page start-->
          <div class="content-panel">
            <div class="adv-table">
			 <div class="form-group">
			 <h1> <?php esc_html_e( $monthname.' '.$year.' Salary Sheet', 'mamurjor_student_result' ); ?></h1>
		 <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                <thead>
                  <tr>
                     <th><?php esc_html_e( ' Sl.No.', 'mamurjor_student_result' ); ?> </th>
                  
                   
                   
                    <th class="hidden-phone"><?php esc_html_e( 'Basic', 'mamurjor_student_result' ); ?></th>
                    <th class="hidden-phone"><?php esc_html_e( 'Additional', 'mamurjor_student_result' ); ?></th>
                    <th class="hidden-phone"><?php esc_html_e( 'Subtraction', 'mamurjor_student_result' ); ?></th>
                    <th class="hidden-phone"><?php esc_html_e( 'Net Salary', 'mamurjor_student_result' ); ?></th>
                    
                    <th class="hidden-phone"> <?php esc_html_e( 'Name', 'mamurjor_student_result' ); ?></th>
                    <th class="hidden-phone"><?php esc_html_e( 'Roll', 'mamurjor_student_result' ); ?></th>
                    <th class="hidden-phone"><?php esc_html_e( 'Dpt name', 'mamurjor_student_result' ); ?></th>
                    <th class="hidden-phone"><?php esc_html_e( 'Desi. name', 'mamurjor_student_result' ); ?></th>
                    <th class="hidden-phone"><?php esc_html_e( 'Salary grade', 'mamurjor_student_result' ); ?></th>
                    <th class="hidden-phone"><?php esc_html_e( 'N.ID', 'mamurjor_student_result' ); ?></th>
                   
                   
                 
                  </tr>
				  
				  <?php 
				  

foreach ($monthly_salary_invoice as $print) {

$serial+=1;

				  
				  ?>
				  <tr>
				   <td class="center "> <?php esc_html_e( $serial, 'mamurjor_student_result' ); ?> </td>
				   <td class="center "> <?php esc_html_e( $print->basic, 'mamurjor_student_result' ); ?> </td>
                   <td class="center "> <?php esc_html_e( $print->additional, 'mamurjor_student_result' ); ?>    </td>
                   <td class="center "> <?php esc_html_e( $print->subtraction, 'mamurjor_student_result' ); ?> </td>
                   <td class="center "> <?php esc_html_e( ($print->basic+$print->additional)-$print->subtraction, 'mamurjor_student_result' ); ?> </td>
                   <td class="center "> <?php esc_html_e( $print->name, 'mamurjor_student_result' ); ?> </td>
                   <td class="center "> <?php esc_html_e( $print->email, 'mamurjor_student_result' ); ?> </td>
                   <td class="center "> <?php esc_html_e( $print->department_id, 'mamurjor_student_result' ); ?></td>
                   <td class="center "> <?php esc_html_e( $print->designation_id, 'mamurjor_student_result' ); ?>  </td>
                   <td class="center "> <?php esc_html_e( $print->sgrad_id, 'mamurjor_student_result' ); ?>  </td>
                   <td class="center "> <?php esc_html_e( $print->national_id, 'mamurjor_student_result' ); ?>  </td>
                    
				  </tr>
				  <?php 
				  
}
				  ?>
                </thead>
                <tbody>
				</table>
				
				</div>
				</div>
				</div>
				</div>
				<input class="btn btn-success" value="Mamurjor Invoice Print" name="getsalarysheet" onclick="printmamurjorinvoice('printmamurjorinvoice')" /> 
  
				</section>
		 
		 <?php 
		 
	

      }
	
	
	
	
	
	
	?>
	
	<h2><?php esc_html_e( 'Get Salary Sheet', 'mamurjor_student_result' ); ?></h2>
		  <div>
		  </div>
		  
		  <form action="" method="post">
		<section class="wrapper">
        
        <div class="row mb">
          <!-- page start-->
          <div class="content-panel">
            <div class="adv-table">
			 <div class="form-group">
	   <label> <?php esc_html_e('Select Salary Month', 'mamurjor_student_result' )?>  </label>
		 <select name="monthname" class="browser-default custom-select form-control">
		
	
			  <option class="form-control" value="<?php esc_html_e('January', 'mamurjor_student_result' )?>" ><?php esc_html_e('January', 'mamurjor_student_result' )?></option>
			  <option class="form-control" value="<?php esc_html_e('February', 'mamurjor_student_result' )?>" ><?php esc_html_e('February', 'mamurjor_student_result' )?></option>
			  <option class="form-control" value="<?php esc_html_e('March', 'mamurjor_student_result' )?>" ><?php esc_html_e('March', 'mamurjor_student_result' )?></option>
			  <option class="form-control" value="<?php esc_html_e('April', 'mamurjor_student_result' )?>" ><?php esc_html_e('April', 'mamurjor_student_result' )?></option>
			  <option class="form-control" value="<?php esc_html_e('May', 'mamurjor_student_result' )?>" ><?php esc_html_e('May', 'mamurjor_student_result' )?></option>
			  <option class="form-control" value="<?php esc_html_e('June', 'mamurjor_student_result' )?>" ><?php esc_html_e('June', 'mamurjor_student_result' )?></option>
			  <option class="form-control" value="<?php esc_html_e('July', 'mamurjor_student_result' )?>" ><?php esc_html_e('July', 'mamurjor_student_result' )?></option>
			  <option class="form-control" value="<?php esc_html_e('August', 'mamurjor_student_result' )?>" ><?php esc_html_e('August', 'mamurjor_student_result' )?></option>
			  <option class="form-control" value="<?php esc_html_e('September', 'mamurjor_student_result' )?>" ><?php esc_html_e('September', 'mamurjor_student_result' )?></option>
			  <option class="form-control" value="<?php esc_html_e('October', 'mamurjor_student_result' )?>" ><?php esc_html_e('October', 'mamurjor_student_result' )?></option>
			  <option class="form-control" value="<?php esc_html_e('November', 'mamurjor_student_result' )?>" ><?php esc_html_e('November', 'mamurjor_student_result' )?></option>
			  <option class="form-control" value="<?php esc_html_e('December', 'mamurjor_student_result' )?>" ><?php esc_html_e('December', 'mamurjor_student_result' )?></option>
		
		</select>	
		<br/>
<input type="submit" class="btn btn-success" name="getsalarysheet" value="<?php esc_html_e('Get Salary Sheet', 'mamurjor_student_result' ); ?>" /> 
       </div>
       </div>
       </div>
       </div>
	   </section>
	   
	   
	   </form>
	<script>
function printmamurjorinvoice(divName) {
     
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
	
}
</script>
	<?php
}}
 