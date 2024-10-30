<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly



	
add_shortcode('getresult','get_mamurjor_student_result' );
function get_mamurjor_student_result( ) {    
		  ob_start();	
  global $wpdb;
 
  $table_name = $wpdb->prefix . 'result';
  ?>
  <div class="wrap">
    <h2> <?php esc_html_e( 'search Operations', 'mamurjor_student_result' ); ?> </h2>
   
	  <?php
	  
	    
	  
	  //add_shortcode('showsearch','calconact' );
//function calconact( ) {
    
		  //ob_start();
	  
	  
	  ?>
      
		
		  <form class="form-inline" action="" method="post">
		   <div class="form-group">
		 
		 <input type="text" name="roll" class="form-control"  placeholder="Enter roll">
		 
		</div>
		  
		    <div class="form-group">     
		 <button id="newsubmit" class=" btn-lg btn btn-success " name="search" type="submit"><?php esc_html_e( 'Search', 'mamurjor_student_result' ); ?></button>
          </div>
		    </form>
		<br/>
		<?php
		//return ob_get_clean();
		//}
		
		?>
        
	
    <?php
      if (isset($_POST['search'])) {
		  $upt_id = sanitize_text_field($_POST['roll']);
        
        $search = $wpdb->get_results("SELECT * FROM $table_name WHERE roll='$upt_id'");
        foreach($search as $print) {
         
        
       
		?>
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
                 
                  </tr>
                </thead>
                <tbody>
		
			
                  
                  <tr class="gradeC">
                    <td> <?php echo $serial+=1;;?></td>
                   
                   
                    <td class="center hidden-phone"> <?php esc_html_e( $print->roll, 'mamurjor_student_result' ); ?></td>
                   
                    <td class="center hidden-phone"><?php esc_html_e( $print->result, 'mamurjor_student_result' ); ?></td>
                    <td class="center hidden-phone"><?php esc_html_e( $print->year, 'mamurjor_student_result' ); ?></td>
                   
                  </tr>
                  	<?php
          

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
         }
      }
    ?>
  </div>
  <?php
  return ob_get_clean();
		
}