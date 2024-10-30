<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

		
add_action('admin_menu', 'get_mamurjor_student_info_salary');
if(!function_exists('get_mamurjor_student_info_salary')){
function get_mamurjor_student_info_salary() {
add_menu_page('studentsalary', 'Monthly student salary', 'manage_options', 'studentsalary','mamurjor_student_monthly_salary', 'dashicons-calendar-alt');


if(!function_exists('mamurjor_student_monthly_salary')){
function mamurjor_student_monthly_salary() {
	
	
	   if (isset($_POST['salaryemployee'])) {
$year=date("Y");
$monthname = sanitize_text_field($_POST['monthname']);
global $wpdb;
$monthly_studentsalary_table_name=$wpdb->prefix.'student_monthly_salary';

$result = $wpdb->get_results("SELECT * FROM $monthly_studentsalary_table_name WHERE monthname='$monthname' and year='$year'");
	$numberofrow=$wpdb->num_rows;
	//var_dump($result);
	//exit();
	if($numberofrow>0)
	 {
		    echo "<script> alert('$monthname Payment Alread Done')</script>";
			echo "<script>  location.replace('admin.php?page=studentsalary');</script>";
	   }
	   else
	{	   
   
   
   
$basic = array_map( 'sanitize_text_field', $_POST['basic'] );


$additional = array_map( 'sanitize_text_field', $_POST['additional'] );


$subtraction = array_map( 'sanitize_text_field', $_POST['subtraction'] );


$name = array_map( 'sanitize_text_field', $_POST['name'] );



$email = array_map( 'sanitize_text_field', $_POST['email'] );


$department_id = array_map( 'sanitize_text_field', $_POST['department_id'] );


$designation_id = array_map( 'sanitize_text_field', $_POST['designation_id'] );


$sgrad_id = array_map( 'sanitize_text_field', $_POST['sgrad_id'] );


$national_id = array_map( 'sanitize_text_field', $_POST['national_id'] );


  
$check = array_map( 'sanitize_text_field', $_POST['check'] );


 for($si=0; $si<count($check); $si++){
	  $basic[$si];
	 
	$sql= $wpdb->query("INSERT INTO $monthly_studentsalary_table_name(monthname, basic, additional, subtraction, name, email, department_id, designation_id, sgrad_id, national_id,year) 
	VALUES('$monthname','$basic[$si]','$additional[$si]','$subtraction[$si]','$name[$si]','$email[$si]','$department_id[$si]','$designation_id[$si]','$sgrad_id[$si]','$national_id[$si]','$year')");
  
 }

echo $monthname."<script> alert('$monthname Payment Done')</script>";
    echo "<script>  location.replace('admin.php?page=studentsalary');</script>";
   
	   }
	  
	   }
	   
	
?>

<h2><?php esc_html_e( 'All Info', 'mamurjor_student_result' ); ?></h2>
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
		</div>
		
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                <thead>
                  <tr>
                     <th> <input type="checkbox" onClick="toggle(this)" /><?php esc_html_e( 'All', 'mamurjor_student_result' ); ?><br/> </th>
                  
                   
                   
                    <th class="hidden-phone"><?php esc_html_e( 'Basic', 'mamurjor_student_result' ); ?></th>
                    <th class="hidden-phone"><?php esc_html_e( 'Additional', 'mamurjor_student_result' ); ?></th>
                    <th class="hidden-phone"><?php esc_html_e( 'Subtraction', 'mamurjor_student_result' ); ?></th>
                    
                    <th class="hidden-phone"> <?php esc_html_e( 'Name', 'mamurjor_student_result' ); ?></th>
                    <th class="hidden-phone"><?php esc_html_e( 'Roll', 'mamurjor_student_result' ); ?></th>
                    <th class="hidden-phone"><?php esc_html_e( 'Dpt name', 'mamurjor_student_result' ); ?></th>
                    <th class="hidden-phone"><?php esc_html_e( 'Desi. name', 'mamurjor_student_result' ); ?></th>
                    <th class="hidden-phone"><?php esc_html_e( 'Salary grade', 'mamurjor_student_result' ); ?></th>
                    <th class="hidden-phone"><?php esc_html_e( 'N.ID', 'mamurjor_student_result' ); ?></th>
                   
                   
                 
                  </tr>
                </thead>
                <tbody>
		<?php
		//return ob_get_clean();
		//}
		
		?>
        <?php
		global $wpdb;
  $employee_table_name = $wpdb->prefix.'mamurjor_student_info';
  $mamurjor_sgrade = $wpdb->prefix.'mamurjor_student_fees';

          $result_employee = $wpdb->get_results("SELECT $mamurjor_sgrade.*,$employee_table_name.* FROM $employee_table_name join $mamurjor_sgrade on $employee_table_name.sgrad_id=$mamurjor_sgrade.name ");
		  $serial=0;
          foreach ($result_employee as $print) {
            ?>
			
			
                  
                  <tr class="gradeC">
                    <td> 
					

					
					<input type="checkbox" name="check[]" value="1"><br/>
					
					</td>
                   
                   
                   
                  
                   <td class="center hidden-phone"> <input type="text" name="basic[]" value="<?php esc_html_e( $print->basic, 'mamurjor_student_result' ); ?>" /> </td>
                   <td class="center hidden-phone"> <input type="text" name="additional[]" value="0"  /> </td>
                   <td class="center hidden-phone"> <input type="text" name="subtraction[]" value="0"   /> </td>
                   <td class="center hidden-phone"> <input type="text" name="name[]" value="<?php esc_html_e( $print->name, 'mamurjor_student_result' ); ?>" /> </td>
                   <td class="center hidden-phone"> <input type="text" name="email[]" value="<?php esc_html_e( $print->email, 'mamurjor_student_result' ); ?>" /> </td>
                   <td class="center hidden-phone"> <input type="text" name="department_id[]" value="<?php esc_html_e( $print->department_id, 'mamurjor_student_result' ); ?>" /></td>
                   <td class="center hidden-phone"> <input type="text" name="designation_id[]" value="<?php esc_html_e( $print->designation_id, 'mamurjor_student_result' ); ?>" /> </td>
                   <td class="center hidden-phone"> <input type="text" name="sgrad_id[]" value="<?php esc_html_e( $print->sgrad_id, 'mamurjor_student_result' ); ?>" /> </td>
                   <td class="center hidden-phone"> <input type="text" name="national_id[]" value="<?php esc_html_e( $print->national_id, 'mamurjor_student_result' ); ?>" /> </td>
                    
                  
				  </tr>
                  	<?php
          }

        ?>
               <tr>  
			<td ><input type="submit" class="btn btn-success" name="salaryemployee" value="<?php esc_html_e('Salary Payment', 'mamurjor_student_result' ); ?>" /> </td>
                  			   
               </tr>   
                </tbody>
              </table>
            </div>
          </div>
          <!-- page end-->
        </div>
        <!-- /row -->
      </section>
	  </form>
	  
	  
	<script language="JavaScript">
function toggle(source) {
  checkboxes = document.getElementsByName('check[]');
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.checked;
  }
}
</script>
<?php
}
	
}
}
	
}


  
		
		  
	
