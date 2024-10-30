<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

	
global $wpdb;
$charset_collate = $wpdb->get_charset_collate();
$table_name=$wpdb->prefix.'result';
$sql = "CREATE TABLE $table_name (
  id mediumint(9) NOT NULL AUTO_INCREMENT,
  roll Text DEFAULT '' NOT NULL,
  result Text DEFAULT '' NOT NULL,
  year Text DEFAULT '' NOT NULL,
  PRIMARY KEY  (id)
) $charset_collate;";

if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
  }
  

add_action('admin_menu', 'mamurjor_student_result_admin');
function mamurjor_student_result_admin() {
add_menu_page('result', 'result', 'manage_options', 'result','mamurjor_student_result_admin_page', '
dashicons-admin-users');
}


function mamurjor_student_result_admin_page() {
	
	
  global $wpdb;
  $table_name = $wpdb->prefix . 'result';

    if (isset($_POST['newsubmit'])) {
   $roll = sanitize_text_field($_POST['roll']);
   $result = sanitize_text_field($_POST['result']);
   $year = sanitize_text_field($_POST['year']);
    
  
    
    $wpdb->query("INSERT INTO $table_name(roll,result,year) VALUES('$roll','$result','$year')");
    echo "<script>location.replace('admin.php?page=result');</script>";
  }
  
  
  
 
   //echo "<script>location.replace('admin.php?page=result');</script>";
  
  if (isset($_POST['update'])) {
	   $id = sanitize_text_field($_POST['id']);
	   $roll = sanitize_text_field($_POST['roll']);
	   $result = sanitize_text_field($_POST['result']);
	   $year = sanitize_text_field($_POST['year']);
  
	
    $wpdb->query("UPDATE $table_name SET roll='$roll',result='$result',year='$year'  WHERE id='$id'");
    echo "<script>location.replace('admin.php?page=result');</script>";
  }
  if (isset($_GET['del'])) {
	   $del_id = sanitize_text_field($_GET['del']);
    
    $wpdb->query("DELETE FROM $table_name WHERE id='$del_id'");
    echo "<script>location.replace('admin.php?page=result');</script>";
  }
  ?>
  
   <section id="container">
      <section class="wrapper">
  <div class="wrap">
    <h3><?php esc_html_e( 'get single result Search for general user just copy and paste this shortcode [getresult]', 'mamurjor_student_result' ); ?></h3>
    <h2><?php esc_html_e( 'result Operations', 'mamurjor_student_result' ); ?></h2>
   
	  <?php
	  
	    
	  
	  //add_shortcode('showresult','calconact' );
//function calconact( ) {
    
		  //ob_start();
	  
	  
	  ?>
        <form class="form-inline" action="" method="post">
          
          <div class="form-group">
		
		 <input type="text" name="roll" class="form-control"  placeholder="Enter roll">
	
		 <input type="text" name="result" class="form-control"  placeholder="Enter result">
		 <input type="text" name="year" class="form-control"  placeholder="Enter year">
		</div>
               <div class="form-group">     
		 <button id="newsubmit" class="btn btn-success" name="newsubmit" type="submit"><?php esc_html_e( 'Entry', 'mamurjor_student_result' ); ?></button>
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
                   
                    <th class="hidden-phone"><?php esc_html_e( 'Roll', 'mamurjor_student_result' ); ?></th>
                   
                    <th class="hidden-phone"><?php esc_html_e( 'Result', 'mamurjor_student_result' ); ?></th>
                    <th class="hidden-phone"><?php esc_html_e( 'Passing Year', 'mamurjor_student_result' ); ?></th>
                    <th class="hidden-phone"><?php esc_html_e( 'Actions', 'mamurjor_student_result' ); ?></th>
                 
                 
                  </tr>
                </thead>
                <tbody>
		<?php
		//return ob_get_clean();
		//}
		
		?>
        <?php
          $result = $wpdb->get_results("SELECT * FROM $table_name");
		  $serial=0;
          foreach ($result as $print) {
            ?>
			
			
                  
                  <tr class="gradeC">
                    <td> <?php echo $serial+=1;;?></td>
                   
                   
                   <td class="center hidden-phone"> <?php esc_html_e( $print->roll, 'mamurjor_student_result' ); ?></td>
                   
                    <td class="center hidden-phone"><?php esc_html_e( $print->result, 'mamurjor_student_result' ); ?></td>
                    <td class="center hidden-phone"><?php esc_html_e( $print->year, 'mamurjor_student_result' ); ?></td>
                   
                   <td width='10%'><a href='admin.php?page=result&upt=<?php echo $print->id;?>'><button class="btn btn-success" type='button'><?php esc_html_e( 'UPDATE', 'mamurjor_student_result' ); ?></button></a> <a href='admin.php?page=result&del=<?php echo $print->id;?>'><button class="btn btn-danger" type='button'><?php esc_html_e( 'DELETE', 'mamurjor_student_result' ); ?></button></a></td>
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
		  
        $result = $wpdb->get_results("SELECT * FROM $table_name WHERE id='$upt_id'");
        foreach($result as $print) {
          
        
       
		?>
		<form class="form-inline" action="" method="post">
          
          <div class="form-group">
		 <input type="hidden" name="id" value="<?php esc_html_e( $print->id, 'mamurjor_student_result' ); ?>" class="form-control"  placeholder="Enter name">
		 
		 <input type="text" name="roll" value="<?php esc_html_e( $print->roll, 'mamurjor_student_result' ); ?>" class="form-control"  placeholder="Enter roll">
		 
		
		</div>
		
		 <div class="form-group">
		 
		 <input type="text" name="result" value="<?php esc_html_e( $print->result, 'mamurjor_student_result' ); ?>" class="form-control"  placeholder="Enter result">
		 <input type="text" name="year" value="<?php esc_html_e( $print->year, 'mamurjor_student_result' ); ?>" class="form-control"  placeholder="Enter year">
		</div>
               <div class="form-group">     
		 <button id="newsubmit" class="btn btn-success" name="update" type="submit"><?php esc_html_e( 'Update', 'mamurjor_student_result' ); ?></button>
          </div>
        </form>
		
		<?php 
         }
      }
    ?>
  </div>
  
 </section>
      <!-- /wrapper -->
    </section>
	
<?php }?>