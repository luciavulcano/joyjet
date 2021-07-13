<?php
/**
*
* 404 pages (not found)
*
*/

get_header();
global $post;
$page_ID = 136;
// get page ID
?>

<?php
if(wp_is_mobile()):
                    $featured_img_url = get_the_post_thumbnail_url(get_the_ID($page_ID),'full'); 
                else:
                    $featured_img_url = get_the_post_thumbnail_url(get_the_ID($page_ID),'large'); 
                endif;
                ?>
              
                <?php $title = get_the_title(); ?>
                
                <section class="main post" style="background-image: url('http://multimedwp.open/wp-content/uploads/2020/07/contact.jpg');">
                    <div class="container h-100">
                        <div class="row h-100 align-items-center justify-content-center">
                            <div class="col-md-12 text-center">
                                <h1>404 - Página não encontrada</h1>
                            </div>
                        </div>
                    </div>
                </section><!-- /.main -->
                <section class="content py-3">
                    <div class="container h-100">
                        <div class="row align-items-center justify-content-center h-100">
                            <div class="col-md-12 text-center">
                                
                            </div>
                            <div class="col-md-12 text-center my-4">
                                <p>Navegue também por:</p>
                            </div>
                        </div>
                    </div>
                </section><!--/.content-->
                <?php get_template_part( 'templates/global/template-part', 'list-posts' ); ?>


<?php get_footer(); ?>




             