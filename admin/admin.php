<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
function mamurjor_student_result_menu(){

add_menu_page('Student Info', 'Student Info', 'manage_options','student','get_mamurjor_student_result_list','dashicons-admin-users', 56);   

function get_mamurjor_student_result_list(){
global $wpdb;
  $student_table_name = $wpdb->prefix . 'mamurjor_student_info';

    if (isset($_POST['studentmamurjorsubmit'])) {
    $studentdepartment_id = sanitize_text_field($_POST['department_id']);
	 $studentsection_id = sanitize_text_field($_POST['section_id']);
	 $sgrad_id = sanitize_text_field($_POST['sgrad_id']);
	 $studentedu_id = sanitize_text_field($_POST['studentedu_id']);
	 $name = sanitize_text_field($_POST['name']);
	 $national_id = sanitize_text_field($_POST['national_id']);
	 $cell = sanitize_text_field($_POST['cell']);
	 $email = sanitize_text_field($_POST['email']);
	
    $query=$wpdb->query("INSERT INTO $student_table_name(department_id,designation_id,sgrad_id,edu_id,name,national_id,cell,email) 
	VALUES('$studentdepartment_id','$studentsection_id','$sgrad_id','$studentedu_id','$name','$national_id','$cell','$email')");
    
	echo "<script>alert('Save Done');</script>";
	echo "<script>location.replace('admin.php?page=student');</script>";
  }
  
  
  
 
   //echo "<script>location.replace('admin.php?page=result');</script>";
  
  if (isset($_POST['studentmamurjorupdate'])) {
	   $id = sanitize_text_field($_POST['id']);
	 $studentdepartment_id = sanitize_text_field($_POST['department_id']);
	 $studentsection_id = sanitize_text_field($_POST['section_id']);
	 $sgrad_id = sanitize_text_field($_POST['sgrad_id']);
	 $studentedu_id = sanitize_text_field($_POST['studentedu_id']);
	 $name = sanitize_text_field($_POST['name']);
	 $national_id = sanitize_text_field($_POST['national_id']);
	 $cell = sanitize_text_field($_POST['cell']);
	 $email = sanitize_text_field($_POST['email']);
 
	   global $wpdb;
  $student_table_name = $wpdb->prefix . 'mamurjor_student_info';
	
    $wpdb->query("UPDATE $student_table_name SET name='$name',department_id='$studentdepartment_id',designation_id='$studentsection_id',sgrad_id='$sgrad_id',edu_id='$studentedu_id',cell='$cell',national_id='$national_id',email='$email'  WHERE id='$id'");
    echo "<script>location.replace('admin.php?page=student');</script>";
  }
  if (isset($_GET['studentdel'])) {
	   $studentdel = sanitize_text_field($_GET['studentdel']);
    
    $wpdb->query("DELETE FROM $student_table_name WHERE id='$studentdel'");
    echo "<script>location.replace('admin.php?page=student');</script>";
  }

  ?>
  
   <section id="container">
      <section class="wrapper">
  <div class="wrap">
    
    <h2><?php 
	
	
	
	esc_html_e( 'Add New ', 'mamurjor_student_result' ); ?></h2>
   
        <form class="form-inline" action="" method="post" enctype="multipart/form-data">
          
          <div class="form-group">	
<?php esc_html_e('department', 'mamurjor_student_result' )?>		  
		<select name="department_id" class="browser-default custom-select form-control">
		<?php 
		global $wpdb;
	$mamurjor_student_studentdepartment = $wpdb->prefix.'mamurjor_student_department';
		$result_mamurjor_student_studentdepartment = $wpdb->get_results("SELECT * FROM $mamurjor_student_studentdepartment");
		  
          foreach ($result_mamurjor_student_studentdepartment as $print) {
			?>
			  <option class="form-control" value="<?php esc_html_e($print->name, 'mamurjor_student_result' )?>" ><?php esc_html_e($print->name, 'mamurjor_student_result' )?></option>
		<?php 
		
		  }
		?>
		</select>			
		</div>
		 <div class="form-group">	
 <label> <?php esc_html_e('section', 'mamurjor_student_result' )?> </label>		 
		 <select name="section_id" class="browser-default custom-select form-control">
		<?php 
		global $wpdb;
	$mamurjor_student_section = $wpdb->prefix.'mamurjor_student_section';
		$result_mamurjor_student_section = $wpdb->get_results("SELECT * FROM $mamurjor_student_section");
		  
          foreach ($result_mamurjor_student_section as $print) {
			?>
			  <option class="form-control" value="<?php esc_html_e($print->name, 'mamurjor_student_result' )?>" ><?php esc_html_e($print->name, 'mamurjor_student_result' )?></option>
		<?php 
		
		  }
		?>
		</select>			
		</div>
		 <div class="form-group">
 <label> <?php esc_html_e('class', 'mamurjor_student_result' )?>  </label>		 
		 <select name="sgrad_id" class="browser-default custom-select form-control">
		<?php 
		global $wpdb;
	$mamurjor_student_fees = $wpdb->prefix.'mamurjor_student_fees';
		$result_mamurjor_student_fees = $wpdb->get_results("SELECT * FROM $mamurjor_student_fees");
		  
          foreach ($result_mamurjor_student_fees as $print) {
			?>
			  <option class="form-control" value="<?php esc_html_e($print->name, 'mamurjor_student_result' )?>" ><?php esc_html_e($print->name, 'mamurjor_student_result' )?></option>
		<?php 
		
		  }
		?>
		</select>				
		</div>
		 <div class="form-group">
	   <label> <?php esc_html_e('studentedu.', 'mamurjor_student_result' )?>  </label>
		 <select name="studentedu_id" class="browser-default custom-select form-control">
		<?php 
		global $wpdb;
	$mamurjor_student_studentedu = $wpdb->prefix.'mamurjor_student_education';
		$result_mamurjor_student_studentedu = $wpdb->get_results("SELECT * FROM $mamurjor_student_studentedu");
		  
          foreach ($result_mamurjor_student_studentedu as $print) {
			?>
			  <option class="form-control" value="<?php esc_html_e($print->name, 'mamurjor_student_result' )?>" ><?php esc_html_e($print->name, 'mamurjor_student_result' )?></option>
		<?php 
		
		  }
		?>
		</select>				
		</div> </br>
		 </br>
		<div class="form-group">		
		 <input type="text" name="name" class="form-control"  placeholder="Enter name">		
		</div>
		<div class="form-group">		
		 <input type="text" name="cell" class="form-control"  placeholder="Enter cell">		
		</div>
		<div class="form-group">		
		 <input type="text" name="national_id" class="form-control"  placeholder="Enter national id">		
		</div>
		<div class="form-group">		
		 <input type="text" name="email" class="form-control"  placeholder="Enter Roll">		
		</div>
		
		
		
       <div class="form-group">     
		 <button id="studentmamurjorsubmit" class="btn btn-success" name="studentmamurjorsubmit" type="submit"><?php esc_html_e( 'submit', 'mamurjor_student_result' ); ?></button>
          </div>
        </form>
		
		  
		  <h2><?php esc_html_e( 'All Info', 'mamurjor_student_result' ); ?></h2>
		  <div>
		  </div>
		<section class="wrapper">
        
        <div class="row mb">
          <!-- page start-->
          <div class="content-panel">
            <div class="adv-table">
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                <thead>
                  <tr>
                     <th> <?php esc_html_e( 'Serial No.', 'mamurjor_student_result' ); ?> </th>
                   
                       <th class="hidden-phone"><?php esc_html_e( 'Name', 'mamurjor_student_result' ); ?></th>
                    <th class="hidden-phone"><?php esc_html_e( 'Roll', 'mamurjor_student_result' ); ?></th>
                    <th class="hidden-phone"><?php esc_html_e( 'Dpt name', 'mamurjor_student_result' ); ?></th>
                    <th class="hidden-phone"><?php esc_html_e( 'Section ', 'mamurjor_student_result' ); ?></th>
                    <th class="hidden-phone"><?php esc_html_e( 'Class', 'mamurjor_student_result' ); ?></th>
                    <th class="hidden-phone"><?php esc_html_e( 'Last Edu', 'mamurjor_student_result' ); ?></th>
                    
                    <th class="hidden-phone"><?php esc_html_e( 'N.Id', 'mamurjor_student_result' ); ?></th>
                    <th class="hidden-phone"><?php esc_html_e( 'Cell', 'mamurjor_student_result' ); ?></th>
                  
                    <th class="hidden-phone"><?php esc_html_e( 'Actoins', 'mamurjor_student_result' ); ?></th>
                   
                 
                  </tr>
                </thead>
                <tbody>
		<?php
		//return ob_get_clean();
		//}
		
		?>
        <?php
		global $wpdb;
  $student_table_name = $wpdb->prefix.'mamurjor_student_info';
  $studentdepartment_table_name = $wpdb->prefix.'mamurjor_student_studentdepartment';
  $studentsection_table_name = $wpdb->prefix.'mamurjor_student_section';
  $sgrade_table_name = $wpdb->prefix.'mamurjor_student_fees';
  $emp_studentedu_table_name = $wpdb->prefix.'mamurjor_student_studentedu';
          $result_student = $wpdb->get_results("SELECT $student_table_name.* FROM $student_table_name");
		  $serial=0;
          foreach ($result_student as $print) {
            ?>
			
			
                  
                  <tr class="gradeC">
                    <td> <?php echo $serial+=1;?></td>
                   
                   
                   <td class="center hidden-phone"> <?php esc_html_e( $print->name, 'mamurjor_student_result' ); ?></td>
                   <td class="center hidden-phone"> <?php esc_html_e( $print->email, 'mamurjor_student_result' ); ?></td>
                   <td class="center hidden-phone"> <?php esc_html_e( $print->department_id, 'mamurjor_student_result' ); ?></td>
                   <td class="center hidden-phone"> <?php esc_html_e( $print->designation_id, 'mamurjor_student_result' ); ?></td>
                   <td class="center hidden-phone"> <?php esc_html_e( $print->sgrad_id, 'mamurjor_student_result' ); ?></td>
                   <td class="center hidden-phone"> <?php esc_html_e( $print->edu_id, 'mamurjor_student_result' ); ?></td>
                   
                   <td class="center hidden-phone"> <?php esc_html_e( $print->national_id, 'mamurjor_student_result' ); ?></td>
                   <td class="center hidden-phone"> <?php esc_html_e( $print->cell, 'mamurjor_student_result' ); ?></td>
                  
                    
                   <td ><a href='admin.php?page=student&studentupt=<?php echo $print->id;?>'><button class="btn btn-success" type='button'><?php esc_html_e( 'UPDATE', 'mamurjor_student_result' ); ?></button></a> <a href='admin.php?page=student&studentdel=<?php echo $print->id;?>'><button class="btn btn-danger" type='button'><?php esc_html_e( 'DELETE', 'mamurjor_student_result' ); ?></button></a></td>
                  </tr>
                  	<?php
          }

        ?>
                  
                </tbody>
              </table>
            </div>
          </div>
          <!-- page end-->
        </div>
        <!-- /row -->
      </section>
	
    <?php
      if (isset($_GET['studentupt'])) {
		  $studentupt = sanitize_text_field($_GET['studentupt']);
	global $wpdb;
  $student_table_name = $wpdb->prefix.'mamurjor_student_info';
        $student_table_result = $wpdb->get_results("SELECT * FROM $student_table_name WHERE id='$studentupt'");
        foreach($student_table_result as $student_print) {
          
        
       
		?>
		<form class="" action="" method="post">
          
          <div class="form-group">
		 <input type="hidden" name="id" value="<?php esc_html_e( $print->id, 'mamurjor_student_result' ); ?>" class="form-control"  placeholder="Enter name">
		 
		</div>
		 <div class="form-group">	
<?php esc_html_e('department', 'mamurjor_student_result' )?>		  
		<select name="department_id" class="browser-default custom-select form-control">
		<?php 
		global $wpdb;
	$mamurjor_student_studentdepartment = $wpdb->prefix.'mamurjor_student_department';
		$result_mamurjor_student_studentdepartment = $wpdb->get_results("SELECT * FROM $mamurjor_student_studentdepartment");
		  
          foreach ($result_mamurjor_student_studentdepartment as $print) {
			?>
			  <option class="form-control" value="<?php esc_html_e($print->name, 'mamurjor_student_result' )?>" ><?php esc_html_e($print->name, 'mamurjor_student_result' )?></option>
		<?php 
		
		  }
		?>
		</select>			
		</div>
		 <div class="form-group">	
 <label> <?php esc_html_e('Select studentsection', 'mamurjor_student_result' )?> </label>		 
		 <select name="section_id" class="browser-default custom-select form-control">
		<?php 
		global $wpdb;
	$mamurjor_student_section = $wpdb->prefix.'mamurjor_student_section';
		$result_mamurjor_student_section = $wpdb->get_results("SELECT * FROM $mamurjor_student_section");
		  
          foreach ($result_mamurjor_student_section as $print) {
			?>
			  <option class="form-control" value="<?php esc_html_e($print->name, 'mamurjor_student_result' )?>" ><?php esc_html_e($print->name, 'mamurjor_student_result' )?></option>
		<?php 
		
		  }
		?>
		</select>			
		</div>
		 <div class="form-group">
 <label> <?php esc_html_e('Select studentfees', 'mamurjor_student_result' )?>  </label>		 
		 <select name="sgrad_id" class="browser-default custom-select form-control">
		<?php 
		global $wpdb;
	$mamurjor_student_fees = $wpdb->prefix.'mamurjor_student_fees';
		$result_mamurjor_student_fees = $wpdb->get_results("SELECT * FROM $mamurjor_student_fees");
		  
          foreach ($result_mamurjor_student_fees as $print) {
			?>
			  <option class="form-control" value="<?php esc_html_e($print->name, 'mamurjor_student_result' )?>" ><?php esc_html_e($print->name, 'mamurjor_student_result' )?></option>
		<?php 
		
		  }
		?>
		</select>				
		</div>
		 <div class="form-group">
	   <label> <?php esc_html_e('Select Last studenteducation', 'mamurjor_student_result' )?>  </label>
		 <select name="studentedu_id" class="browser-default custom-select form-control">
		<?php 
		global $wpdb;
	$mamurjor_student_studentedu = $wpdb->prefix.'mamurjor_student_education';
		$result_mamurjor_student_studentedu = $wpdb->get_results("SELECT * FROM $mamurjor_student_studentedu");
		  
          foreach ($result_mamurjor_student_studentedu as $print) {
			?>
			  <option class="form-control" value="<?php esc_html_e($print->name, 'mamurjor_student_result' )?>" ><?php esc_html_e($print->name, 'mamurjor_student_result' )?></option>
		<?php 
		
		  }
		?>
		</select>				
		</div>
		<div class="form-group">		
		 <input type="text" name="name" value="<?php esc_html_e($student_print->name, 'mamurjor_student_result' )?>" class="form-control"  placeholder="Enter name">		
		</div>
		<div class="form-group">		
		 <input type="text" name="cell" value="<?php esc_html_e($student_print->cell, 'mamurjor_student_result' )?>" class="form-control"  placeholder="Enter cell">		
		</div>
		<div class="form-group">		
		 <input type="text" name="national_id" value="<?php esc_html_e($student_print->national_id, 'mamurjor_student_result' )?>" class="form-control"  placeholder="Enter national id">		
		</div>
		<div class="form-group">		
		 <input type="text" name="email" value="<?php esc_html_e($student_print->email, 'mamurjor_student_result' )?>" class="form-control"  placeholder="Enter email">		
		</div>
		
		 <div class="form-group">
		
		 <input type="file" name="photo" class="form-control"  placeholder="Enter roll">
	
		
		</div>
		
       <div class="form-group">     
		 <button id="studentedumamurjorupdate" class="btn btn-success" name="studentmamurjorupdate" type="submit"><?php esc_html_e( 'Update', 'mamurjor_student_result' ); ?></button>
          </div>
        </form>
		  </div>
  
 </section>
      <!-- /wrapper -->
    </section>
		
		<?php 
         }
      }

}



// Start studentdepartment 
add_submenu_page(
    'student',       // parent slug
    'student department',    // page title
    'student department',             // menu title
    'manage_options',           // capability
    'studentdepartment', // slug
    'get_mamurjor_student_info_studentdepartment' // callback
); 




function get_mamurjor_student_info_studentdepartment(){
	global $wpdb;
  $studentdepartment_table_name = $wpdb->prefix . 'mamurjor_student_department';

    if (isset($_POST['dptmamurjorsubmit'])) {
   $name = sanitize_text_field($_POST['name']);
  
    
  
    
    $wpdb->query("INSERT INTO $studentdepartment_table_name(name) VALUES('$name')");
    echo "<script>location.replace('admin.php?page=studentdepartment');</script>";
  }
  
  
  
 
   //echo "<script>location.replace('admin.php?page=result');</script>";
  
  if (isset($_POST['dptmamurjorupdate'])) {
	   $id = sanitize_text_field($_POST['id']);
	   $name = sanitize_text_field($_POST['name']);
	   
	
    $wpdb->query("UPDATE $studentdepartment_table_name SET name='$name'  WHERE id='$id'");
    echo "<script>location.replace('admin.php?page=studentdepartment');</script>";
  }
  if (isset($_GET['del'])) {
	   $del_id = sanitize_text_field($_GET['del']);
    
    $wpdb->query("DELETE FROM $studentdepartment_table_name WHERE id='$del_id'");
    echo "<script>location.replace('admin.php?page=studentdepartment');</script>";
  }

  ?>
  
   <section id="container">
      <section class="wrapper">
  <div class="wrap">
    <h3><?php esc_html_e( 'Easy to Use', 'mamurjor_student_result' ); ?></h3>
    <h2><?php esc_html_e( 'Add New', 'mamurjor_student_result' ); ?></h2>
   
	  <?php
	  
	    
	  
	  //add_shortcode('showresult','calconact' );
//function calconact( ) {
    
		  //ob_start();
	  
	  
	  ?>
        <form class="form-inline" action="" method="post">
          
          <div class="form-group">
		
		 <input type="text" name="name" class="form-control"  placeholder="Enter roll">
	
		
		</div>
               <div class="form-group">     
		 <button id="newsubmit" class="btn btn-success" name="dptmamurjorsubmit" type="submit"><?php esc_html_e( 'Entry', 'mamurjor_student_result' ); ?></button>
          </div>
        </form>
		
		  
		  <h2><?php esc_html_e( 'All Result', 'mamurjor_student_result' ); ?></h2>
		  <div>
		  </div>
		<section class="wrapper">
        
        <div class="row mb">
          <!-- page start-->
          <div class="content-panel">
            <div class="adv-table">
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                <thead>
                  <tr>
                     <th> <?php esc_html_e( 'Serial No.', 'mamurjor_student_result' ); ?> </th>
                   
                    <th class="hidden-phone"><?php esc_html_e( 'Name', 'mamurjor_student_result' ); ?></th>
                    <th class="hidden-phone"><?php esc_html_e( 'Actions', 'mamurjor_student_result' ); ?></th>
                   
                   
                 
                  </tr>
                </thead>
                <tbody>
		<?php
		//return ob_get_clean();
		//}
		
		?>
        <?php
			global $wpdb;
  $studentdepartment_table_name = $wpdb->prefix . 'mamurjor_student_department';
          $result = $wpdb->get_results("SELECT * FROM $studentdepartment_table_name");
		  $serial=0;
          foreach ($result as $print) {
            ?>
			
			
                  
                  <tr class="gradeC">
                    <td> <?php echo $serial+=1;;?></td>
                   
                   
                   <td class="center hidden-phone"> <?php esc_html_e( $print->name, 'mamurjor_student_result' ); ?></td>
                   
                    
                   <td ><a href='admin.php?page=studentdepartment&upt=<?php echo $print->id;?>'><button class="btn btn-success" type='button'><?php esc_html_e( 'UPDATE', 'mamurjor_student_result' ); ?></button></a> <a href='admin.php?page=studentdepartment&del=<?php echo $print->id;?>'><button class="btn btn-danger" type='button'><?php esc_html_e( 'DELETE', 'mamurjor_student_result' ); ?></button></a></td>
                  </tr>
                  	<?php
          }

        ?>
                  
                </tbody>
              </table>
            </div>
          </div>
          <!-- page end-->
        </div>
        <!-- /row -->
      </section>
	
    <?php
      if (isset($_GET['upt'])) {
		  $upt_id = sanitize_text_field($_GET['upt']);
		  
        $result = $wpdb->get_results("SELECT * FROM $studentdepartment_table_name WHERE id='$upt_id'");
        foreach($result as $print) {
          
        
       
		?>
		<form class="form-inline" action="" method="post">
          
          <div class="form-group">
		 <input type="hidden" name="id" value="<?php esc_html_e( $print->id, 'mamurjor_student_result' ); ?>" class="form-control"  placeholder="Enter name">
		 
		 <input type="text" name="name" value="<?php esc_html_e( $print->name, 'mamurjor_student_result' ); ?>" class="form-control"  placeholder="Enter roll">
		 
		
		</div>
		
		
       <div class="form-group">     
		 <button id="newsubmit" class="btn btn-success" name="dptmamurjorupdate" type="submit"><?php esc_html_e( 'Update', 'mamurjor_student_result' ); ?></button>
          </div>
        </form>
		  </div>
  
 </section>
      <!-- /wrapper -->
    </section>
		
		<?php 
         }
      }

}
    ?>


	
<?php


add_submenu_page(
    'student',       // parent slug
    'studentsection',    // page title
    'student section',             // menu title
    'manage_options',           // capability
    'studentsection', // slug
    'get_mamurjor_student_info_studentsection' // callback
); 

  function get_mamurjor_student_info_studentsection(){
global $wpdb;
  $studentsection_table_name = $wpdb->prefix . 'mamurjor_student_section';

    if (isset($_POST['studentsectionmamurjorsubmit'])) {
   $name = sanitize_text_field($_POST['name']);
  
    
  
    
    $wpdb->query("INSERT INTO $studentsection_table_name(name) VALUES('$name')");
    echo "<script>location.replace('admin.php?page=studentsection');</script>";
  }
  
  
  
 
   //echo "<script>location.replace('admin.php?page=result');</script>";
  
  if (isset($_POST['desigmamurjorupdate'])) {
	   $id = sanitize_text_field($_POST['id']);
	   $name = sanitize_text_field($_POST['name']);
	   
	
    $wpdb->query("UPDATE $studentsection_table_name SET name='$name'  WHERE id='$id'");
    echo "<script>location.replace('admin.php?page=studentsection');</script>";
  }
  if (isset($_GET['designdel'])) {
	   $del_id = sanitize_text_field($_GET['designdel']);
    
    $wpdb->query("DELETE FROM $studentsection_table_name WHERE id='$del_id'");
    echo "<script>location.replace('admin.php?page=studentsection');</script>";
  }

  ?>
  
   <section id="container">
      <section class="wrapper">
  <div class="wrap">
    <h3><?php esc_html_e( 'Easy to Use', 'mamurjor_student_result' ); ?></h3>
    <h2><?php esc_html_e( 'Add New', 'mamurjor_student_result' ); ?></h2>
   
	  <?php
	  
	    
	  
	  //add_shortcode('showresult','calconact' );
//function calconact( ) {
    
		  //ob_start();
	  
	  
	  ?>
        <form class="form-inline" action="" method="post">
          
          <div class="form-group">
		
		 <input type="text" name="name" class="form-control"  placeholder="Enter roll">
	
		
		</div>
               <div class="form-group">     
		 <button id="newsubmit" class="btn btn-success" name="studentsectionmamurjorsubmit" type="submit"><?php esc_html_e( 'Entry', 'mamurjor_student_result' ); ?></button>
          </div>
        </form>
		
		  
		  <h2><?php esc_html_e( 'All Result', 'mamurjor_student_result' ); ?></h2>
		  <div>
		  </div>
		<section class="wrapper">
        
        <div class="row mb">
          <!-- page start-->
          <div class="content-panel">
            <div class="adv-table">
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                <thead>
                  <tr>
                     <th> <?php esc_html_e( 'Serial No.', 'mamurjor_student_result' ); ?> </th>
                   
                    <th class="hidden-phone"><?php esc_html_e( 'Name', 'mamurjor_student_result' ); ?></th>
                    <th class="hidden-phone"><?php esc_html_e( 'Actions', 'mamurjor_student_result' ); ?></th>
                   
                   
                 
                  </tr>
                </thead>
                <tbody>
		<?php
		//return ob_get_clean();
		//}
		
		?>
        <?php
		
          $result = $wpdb->get_results("SELECT * FROM $studentsection_table_name");
		  $serial=0;
          foreach ($result as $print) {
            ?>
			
			
                  
                  <tr class="gradeC">
                    <td> <?php echo $serial+=1;;?></td>
                   
                   
                   <td class="center hidden-phone"> <?php esc_html_e( $print->name, 'mamurjor_student_result' ); ?></td>
                   
                    
                   <td ><a href='admin.php?page=studentsection&studentsectionupt=<?php echo $print->id;?>'><button class="btn btn-success" type='button'><?php esc_html_e( 'UPDATE', 'mamurjor_student_result' ); ?></button></a> <a href='admin.php?page=studentsection&designdel=<?php echo $print->id;?>'><button class="btn btn-danger" type='button'><?php esc_html_e( 'DELETE', 'mamurjor_student_result' ); ?></button></a></td>
                  </tr>
                  	<?php
          }

        ?>
                  
                </tbody>
              </table>
            </div>
          </div>
          <!-- page end-->
        </div>
        <!-- /row -->
      </section>
	
    <?php
      if (isset($_GET['studentsectionupt'])) {
		  $upt_id = sanitize_text_field($_GET['studentsectionupt']);
		  
        $result = $wpdb->get_results("SELECT * FROM $studentsection_table_name WHERE id='$upt_id'");
        foreach($result as $print) {
          
        
       
		?>
		<form class="form-inline" action="" method="post">
          
          <div class="form-group">
		 <input type="hidden" name="id" value="<?php esc_html_e( $print->id, 'mamurjor_student_result' ); ?>" class="form-control"  placeholder="Enter name">
		 
		 <input type="text" name="name" value="<?php esc_html_e( $print->name, 'mamurjor_student_result' ); ?>" class="form-control"  placeholder="Enter roll">
		 
		
		</div>
		
		
       <div class="form-group">     
		 <button id="newsubmit" class="btn btn-success" name="desigmamurjorupdate" type="submit"><?php esc_html_e( 'Update', 'mamurjor_student_result' ); ?></button>
          </div>
        </form>
		  </div>
  
 </section>
      <!-- /wrapper -->
    </section>
		
		<?php 
         }
      }

}





add_submenu_page(
    'student',       // parent slug
    'studentfees',    // page title
    'student fees',             // menu title
    'manage_options',           // capability
    'studentfees', // slug
    'get_mamurjor_student_info_fees' // callback
); 

  function get_mamurjor_student_info_fees(){
global $wpdb;
  $sgrade_table_name = $wpdb->prefix . 'mamurjor_student_fees';

    if (isset($_POST['sgrademamurjorsubmit'])) {
   $name = sanitize_text_field($_POST['name']);
   $basic = sanitize_text_field($_POST['basic']);
  
    
  
    
    $wpdb->query("INSERT INTO $sgrade_table_name(name,basic) VALUES('$name','$basic')");
    echo "<script>location.replace('admin.php?page=sgrade');</script>";
  }
  
  
  
 
   //echo "<script>location.replace('admin.php?page=result');</script>";
  
  if (isset($_POST['sgrademamurjorupdate'])) {
	   $id = sanitize_text_field($_POST['id']);
	   $name = sanitize_text_field($_POST['name']);
	   $basic = sanitize_text_field($_POST['basic']);
	   
	
    $wpdb->query("UPDATE $sgrade_table_name SET name='$name',basic='$basic'  WHERE id='$id'");
    echo "<script>location.replace('admin.php?page=sgrade');</script>";
  }
  if (isset($_GET['sgradedel'])) {
	   $del_id = sanitize_text_field($_GET['sgradedel']);
    
    $wpdb->query("DELETE FROM $sgrade_table_name WHERE id='$del_id'");
    echo "<script>location.replace('admin.php?page=sgrade');</script>";
  }

  ?>
  
   <section id="container">
      <section class="wrapper">
  <div class="wrap">
    <h3><?php esc_html_e( 'Easy to Use', 'mamurjor_student_result' ); ?></h3>
    <h2><?php esc_html_e( 'Add New', 'mamurjor_student_result' ); ?></h2>
   
        <form class="form-inline" action="" method="post">
          
          <div class="form-group">
		
		 <input type="text" name="name" class="form-control"  placeholder="Enter Name">
		 <input type="number" name="basic" class="form-control"  placeholder="Enter Basic">
	
		
		</div>
               <div class="form-group">     
		 <button id="newsubmit" class="btn btn-success" name="sgrademamurjorsubmit" type="submit"><?php esc_html_e( 'Entry', 'mamurjor_student_result' ); ?></button>
          </div>
        </form>
		
		  
		  <h2><?php esc_html_e( 'All Info', 'mamurjor_student_result' ); ?></h2>
		  <div>
		  </div>
		<section class="wrapper">
        
        <div class="row mb">
          <!-- page start-->
          <div class="content-panel">
            <div class="adv-table">
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                <thead>
                  <tr>
                     <th> <?php esc_html_e( 'Serial No.', 'mamurjor_student_result' ); ?> </th>
                   
                    <th class="hidden-phone"><?php esc_html_e( 'Name', 'mamurjor_student_result' ); ?></th>
                    <th class="hidden-phone"><?php esc_html_e( 'Basic', 'mamurjor_student_result' ); ?></th>
                    <th class="hidden-phone"><?php esc_html_e( 'Actions', 'mamurjor_student_result' ); ?></th>
                   
                   
                 
                  </tr>
                </thead>
                <tbody>
		<?php
		//return ob_get_clean();
		//}
		
		?>
        <?php
		
          $result = $wpdb->get_results("SELECT * FROM $sgrade_table_name");
		  $serial=0;
          foreach ($result as $print) {
            ?>
			
			
                  
                  <tr class="gradeC">
                    <td> <?php echo $serial+=1;;?></td>
                   
                   
                   <td class="center hidden-phone"> <?php esc_html_e( $print->name, 'mamurjor_student_result' ); ?></td>
                   <td class="center hidden-phone"> <?php esc_html_e( $print->basic, 'mamurjor_student_result' ); ?></td>
                   
                    
                   <td ><a href='admin.php?page=sgrade&sgradeupt=<?php echo $print->id;?>'><button class="btn btn-success" type='button'><?php esc_html_e( 'UPDATE', 'mamurjor_student_result' ); ?></button></a> <a href='admin.php?page=sgrade&sgradedel=<?php echo $print->id;?>'><button class="btn btn-danger" type='button'><?php esc_html_e( 'DELETE', 'mamurjor_student_result' ); ?></button></a></td>
                  </tr>
                  	<?php
          }

        ?>
                  
                </tbody>
              </table>
            </div>
          </div>
          <!-- page end-->
        </div>
        <!-- /row -->
      </section>
	
    <?php
      if (isset($_GET['sgradeupt'])) {
		  $upt_id = sanitize_text_field($_GET['sgradeupt']);
		  
        $result = $wpdb->get_results("SELECT * FROM $sgrade_table_name WHERE id='$upt_id'");
        foreach($result as $print) {
          
        
       
		?>
		<form class="form-inline" action="" method="post">
          
          <div class="form-group">
		 <input type="hidden" name="id" value="<?php esc_html_e( $print->id, 'mamurjor_student_result' ); ?>" class="form-control"  placeholder="Enter name">
		 
		 <input type="text" name="name" value="<?php esc_html_e( $print->name, 'mamurjor_student_result' ); ?>" class="form-control"  placeholder="Enter roll">
		 <input type="number" name="basic" value="<?php esc_html_e( $print->basic, 'mamurjor_student_result' ); ?>" class="form-control"  placeholder="Enter roll">
		 
		
		</div>
		
		
       <div class="form-group">     
		 <button id="newsubmit" class="btn btn-success" name="sgrademamurjorupdate" type="submit"><?php esc_html_e( 'Update', 'mamurjor_student_result' ); ?></button>
          </div>
        </form>
		  </div>
  
 </section>
      <!-- /wrapper -->
    </section>
		
		<?php 
         }
      }

}

// studenteducation Crud 

add_submenu_page(
    'student',       // parent slug
    'Last studenteducation Info',    // page title
    'Last studenteducation Info',             // menu title
    'manage_options',           // capability
    'studentedu', // slug
    'get_mamurjor_student_info_studenteducation_info' // callback
); 

  function get_mamurjor_student_info_studenteducation_info(){
global $wpdb;
  $studentedu_table_name = $wpdb->prefix . 'mamurjor_student_education';

    if (isset($_POST['studentedumamurjorsubmit'])) {
   $name = sanitize_text_field($_POST['name']);
   $result = sanitize_text_field($_POST['result']);
   $studentdepartment = sanitize_text_field($_POST['studentdepartment']);
   $passsingyear = sanitize_text_field($_POST['passsingyear']);
  
    
  
    
    $wpdb->query("INSERT INTO $studentedu_table_name(name,result,department,passsingyear) VALUES('$name','$result','$studentdepartment','$passsingyear')");
    echo "<script>location.replace('admin.php?page=studentedu');</script>";
  }
  
  
  
 
   //echo "<script>location.replace('admin.php?page=result');</script>";
  
  if (isset($_POST['studentedumamurjorupdate'])) {
	   $id = sanitize_text_field($_POST['id']);
	 $name = sanitize_text_field($_POST['name']);
   $result = sanitize_text_field($_POST['result']);
   $studentdepartment = sanitize_text_field($_POST['studentdepartment']);
   $passsingyear = sanitize_text_field($_POST['passsingyear']);
	   
	
    $wpdb->query("UPDATE $studentedu_table_name SET name='$name',result='$result',department='$studentdepartment',passsingyear='$passsingyear'  WHERE id='$id'");
    echo "<script>location.replace('admin.php?page=studentedu');</script>";
  }
  if (isset($_GET['studentedudel'])) {
	   $del_id = sanitize_text_field($_GET['studentedudel']);
    
    $wpdb->query("DELETE FROM $studentedu_table_name WHERE id='$del_id'");
    echo "<script>location.replace('admin.php?page=studentedu');</script>";
  }

  ?>
  
   <section id="container">
      <section class="wrapper">
  <div class="wrap">
    
    <h2><?php 
	
	
	
	esc_html_e( 'Add New ', 'mamurjor_student_result' ); ?></h2>
   
        <form class="form-inline" action="" method="post">
          
          <div class="form-group">
		
		 <input type="text" name="name" class="form-control"  placeholder="Enter Name">
		 <input type="text" name="result" class="form-control"  placeholder="Enter result">
		 <input type="text" name="studentdepartment" class="form-control"  placeholder="Enter studentdepartment">
		 <input type="text" name="passsingyear" class="form-control"  placeholder="Enter passsingyear">
		
	
		
		</div>
               <div class="form-group">     
		 <button id="newsubmit" class="btn btn-success" name="studentedumamurjorsubmit" type="submit"><?php esc_html_e( 'Entry', 'mamurjor_student_result' ); ?></button>
          </div>
        </form>
		
		  
		  <h2><?php esc_html_e( 'All Info', 'mamurjor_student_result' ); ?></h2>
		  <div>
		  </div>
		<section class="wrapper">
        
        <div class="row mb">
          <!-- page start-->
          <div class="content-panel">
            <div class="adv-table">
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                <thead>
                  <tr>
                     <th> <?php esc_html_e( 'Serial No.', 'mamurjor_student_result' ); ?> </th>
                   
                    <th class="hidden-phone"><?php esc_html_e( 'Name', 'mamurjor_student_result' ); ?></th>
                    <th class="hidden-phone"><?php esc_html_e( 'result', 'mamurjor_student_result' ); ?></th>
                    <th class="hidden-phone"><?php esc_html_e( 'department', 'mamurjor_student_result' ); ?></th>
                    <th class="hidden-phone"><?php esc_html_e( 'passsingyear', 'mamurjor_student_result' ); ?></th>
                   
                   
                 
                  </tr>
                </thead>
                <tbody>
		<?php
		//return ob_get_clean();
		//}
		
		?>
        <?php
		
          $result = $wpdb->get_results("SELECT * FROM $studentedu_table_name");
		  $serial=0;
          foreach ($result as $print) {
            ?>
			
			
                  
                  <tr class="gradeC">
                    <td> <?php echo $serial+=1;;?></td>
                   
                   
                   <td class="center hidden-phone"> <?php esc_html_e( $print->name, 'mamurjor_student_result' ); ?></td>
                   <td class="center hidden-phone"> <?php esc_html_e( $print->result, 'mamurjor_student_result' ); ?></td>
                   <td class="center hidden-phone"> <?php esc_html_e( $print->department, 'mamurjor_student_result' ); ?></td>
                   <td class="center hidden-phone"> <?php esc_html_e( $print->passsingyear, 'mamurjor_student_result' ); ?></td>
                   
                    
                   <td ><a href='admin.php?page=studentedu&studenteduupt=<?php echo $print->id;?>'><button class="btn btn-success" type='button'><?php esc_html_e( 'UPDATE', 'mamurjor_student_result' ); ?></button></a> <a href='admin.php?page=studentedu&studentedudel=<?php echo $print->id;?>'><button class="btn btn-danger" type='button'><?php esc_html_e( 'DELETE', 'mamurjor_student_result' ); ?></button></a></td>
                  </tr>
                  	<?php
          }

        ?>
                  
                </tbody>
              </table>
            </div>
          </div>
          <!-- page end-->
        </div>
        <!-- /row -->
      </section>
	
    <?php
      if (isset($_GET['studenteduupt'])) {
		  $upt_id = sanitize_text_field($_GET['studenteduupt']);
		  
        $result = $wpdb->get_results("SELECT * FROM $studentedu_table_name WHERE id='$upt_id'");
        foreach($result as $print) {
          
        
       
		?>
		<form class="form-inline" action="" method="post">
          
          <div class="form-group">
		 <input type="hidden" name="id" value="<?php esc_html_e( $print->id, 'mamurjor_student_result' ); ?>" class="form-control"  placeholder="Enter name">
		 
		 <input type="text" name="name" value="<?php esc_html_e( $print->name, 'mamurjor_student_result' ); ?>" class="form-control"  placeholder="Enter roll">
		 <input type="text" name="result" value="<?php esc_html_e( $print->result, 'mamurjor_student_result' ); ?>" class="form-control"  placeholder="Enter roll">
		 <input type="text" name="studentdepartment" value="<?php esc_html_e( $print->studentdepartment, 'mamurjor_student_result' ); ?>" class="form-control"  placeholder="Enter roll">
		 <input type="text" name="passsingyear" value="<?php esc_html_e( $print->passsingyear, 'mamurjor_student_result' ); ?>" class="form-control"  placeholder="Enter roll">
		 
		
		</div>
		
		
       <div class="form-group">     
		 <button id="studentedumamurjorupdate" class="btn btn-success" name="studentedumamurjorupdate" type="submit"><?php esc_html_e( 'Update', 'mamurjor_student_result' ); ?></button>
          </div>
        </form>
		  </div>
  
 </section>
      <!-- /wrapper -->
    </section>
		
		<?php 
         }
      }

}


add_submenu_page(
    'student',       // parent slug
    'student salary',    // page title
    'student salary',             // menu title
    'manage_options',           // capability
    'studentsalary' // slug
    
);
 

add_submenu_page(
    'student',       // parent slug
    'student salary Print',    // page title
    'student salary Print',             // menu title
    'manage_options',           // capability
    'studentsalaryprint' // slug
    
); 

  
    
}

add_action('admin_menu','mamurjor_student_result_menu'); 
?>