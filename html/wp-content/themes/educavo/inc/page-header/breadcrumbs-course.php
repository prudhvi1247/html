<div class="rs-breadcrumbs  porfolio-details">
    <?php
      global $educavo_option;     
      if(!empty($educavo_option['course_banner']['url'])){ 
         $course_banner = $educavo_option['course_banner']['url'];?>
        <div class="breadcrumbs-single" style="background-image: url('<?php echo esc_url( $course_banner );?>')">   
            <div class="container">
              <div class="row">
                <div class="col-md-12 text-center">
                    <div class="breadcrumbs-inner"> 
                    <?php 
                    if (!is_singular('sfwd-lessons') && !is_singular('sfwd-topic') && !is_singular('sfwd-quiz')):
                    if(is_single()){ ?>
                        <h1 class="page-title"><?php the_title(); ?></h1>
                    <?php } else{ ?>
                       <h1 class="page-title"><?php the_archive_title();?></h1>
                       <?php
                    } if(!empty($educavo_option['off_breadcrumb'])){
                        $rs_breadcrumbs = get_post_meta(get_the_ID(), 'select-bread', true);
                        if($rs_breadcrumbs != 'hide'):        
                            if(function_exists('bcn_display')){?>
                                <div class="breadcrumbs-title"> <?php  bcn_display();?></div>
                            <?php } 
                        endif;
                    }
                    endif;
                    ?>
                    </div>
                </div>
              </div>
            </div>
        </div>
      <?php }
      else{
        ?>
        <div class="rs-breadcrumbs-inner">
          <div class="container">
            <div class="row">
              <div class="col-md-12 text-center">
                <div class="breadcrumbs-inner">
                 <?php 
                 if (!is_singular('sfwd-lessons') && !is_singular('sfwd-topic') && !is_singular('sfwd-quiz')):
                 if(is_single()){ ?>
                       <h1 class="page-title"><?php the_title(); ?></h1>
                    <?php } else{ ?>
                       <h1 class="page-title"><?php the_archive_title();?></h1>
                       <?php
                    }         
                    if(!empty($educavo_option['off_breadcrumb'])){
                        $rs_breadcrumbs = get_post_meta(get_the_ID(), 'select-bread', true);
                        if($rs_breadcrumbs != 'hide'):        
                            if(function_exists('bcn_display')){?>
                                <div class="breadcrumbs-title"> <?php  bcn_display();?></div>
                            <?php } 
                        endif;
                    }
                    endif;
                    ?>                 
                </div>
              </div>
            </div>
          </div>
      </div>
        <?php
      }
  ?>
</div>