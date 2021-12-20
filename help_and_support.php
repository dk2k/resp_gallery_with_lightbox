<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}?>
<div class="plug-rgwl">
    <h2 class="head_title"><span><?php esc_html_e( 'Responsive Gallery With Lightbox', WRGF_TEXT_DOMAIN ); ?></span></h2> 
    
        <h3 class="head_desc"><?php esc_html_e( 'Responsive Gallery allow you to add unlimited images galleries integrated with light box', WRGF_TEXT_DOMAIN ); ?>,<?php esc_html_e( 'animation hover effects', WRGF_TEXT_DOMAIN ); ?>,<?php esc_html_e( 'font styles', WRGF_TEXT_DOMAIN ); ?>,<?php esc_html_e( 'colors', WRGF_TEXT_DOMAIN ); ?>
            .</h3> 
</div>

<p class="well"><?php esc_html_e( 'Rate Us', WRGF_TEXT_DOMAIN ); ?></p>
<h4 class="para"><?php esc_html_e( 'If you are enjoying using our', WRGF_TEXT_DOMAIN ); ?><b><?php esc_html_e( 'Responsive Gallery', WRGF_TEXT_DOMAIN ); ?>
    </b> <?php esc_html_e( 'plugin and find it useful', WRGF_TEXT_DOMAIN ); ?>
    , <?php esc_html_e( 'then please consider writing a positive feedback', WRGF_TEXT_DOMAIN ); ?>
    . <?php esc_html_e( 'Your feedback will help us to encourage and support the plugin continued development and better user support', WRGF_TEXT_DOMAIN ); ?>
    .</h4>
<div  class="star-rate">
    <a class="acl-rate-us" style="text-align:center; text-decoration: none;font:normal 30px;"
       href="https://wordpress.org/plugins/responsive-photo-gallery/#reviews" target="_blank">
        <span class="dashicons dashicons-star-filled"></span>
        <span class="dashicons dashicons-star-filled"></span>
        <span class="dashicons dashicons-star-filled"></span>
        <span class="dashicons dashicons-star-filled"></span>
        <span class="dashicons dashicons-star-filled"></span>
    </a>
</div>
<p class="well"><?php esc_html_e( 'Share Us Your Suggestion', WRGF_TEXT_DOMAIN ); ?></p>
<h4 class="para"><?php esc_html_e( 'If you have any suggestion or features in your mind then please share us', WRGF_TEXT_DOMAIN ); ?>
    . <?php esc_html_e( 'We will try our best to add them in this plugin', WRGF_TEXT_DOMAIN ); ?>.</h4>

<p class="well"><?php esc_html_e( 'Language Contribution', WRGF_TEXT_DOMAIN ); ?></p>
<h4 class="para"><?php esc_html_e( 'Translate this plugin into your language', WRGF_TEXT_DOMAIN ); ?></h4>
<h4 class="para"><span class="list_point"><?php esc_html_e( 'Question', WRGF_TEXT_DOMAIN ); ?></span>
    : <?php esc_html_e( 'How to convert Plguin into My Language ', WRGF_TEXT_DOMAIN ); ?>?</h4>
<h4 class="para"><span class="list_point"><?php esc_html_e( 'Answer', WRGF_TEXT_DOMAIN ); ?></span>
    : <?php esc_html_e( 'Contact as to', WRGF_TEXT_DOMAIN ); ?><?php esc_html_e( 'lizarweb@gmail.com', WRGF_TEXT_DOMAIN ); ?>
     <?php esc_html_e( 'for translate this plugin into your language', WRGF_TEXT_DOMAIN ); ?>.</h4>

<div class="rgwl">
    <h2><?php esc_html_e( 'Change Old Server Image URL', WRGF_TEXT_DOMAIN ); ?></h2>
    <form action="" method="post">
        <?php $nonce = wp_create_nonce( 'nonce_wrgf_gallery_option' ); ?>
        <input type="hidden" name="security" value="<?php echo esc_attr( $nonce ); ?>">
        <input type="submit" value="Change image URL" name="wrgfchangeurl" class="btn btn-primary btn-lg">
        <h6><b><?php esc_html_e( 'Note', WRGF_TEXT_DOMAIN ); ?>&nbsp;:&nbsp;</b><?php esc_html_e( 'Use this option after import', WRGF_TEXT_DOMAIN ); ?><b><?php esc_html_e( 'Responsive Gallery', WRGF_TEXT_DOMAIN ); ?></b> <?php esc_html_e( 'to change old server image url to new server image url', WRGF_TEXT_DOMAIN ); ?>.
        </h6>
    </form>
</div>

<?php
if ( isset( $_REQUEST['wrgfchangeurl'] ) && isset( $_POST['security'] ) ) {
    if ( ! wp_verify_nonce( $_POST['security'], 'nonce_wrgf_gallery_option' ) ) {
        die();}
    $all_posts = wp_count_posts( 'wrgf_gallery' )->publish;
    $args      = array( 'post_type' => 'wrgf_gallery', 'posts_per_page' => $all_posts );
    global $wrgf_galleries;
    $wrgf_galleries = new WP_Query( $args );

    while ( $wrgf_galleries->have_posts() ) : $wrgf_galleries->the_post();

        $WRGF_Id               = get_the_ID();
        $WRGF_AllPhotosDetails = unserialize( base64_decode( get_post_meta( $WRGF_Id, 'wrgf_all_photos_details', true ) ) );

        $TotalImages = get_post_meta( $WRGF_Id, 'wrgf_total_images_count', true );

        if ( $TotalImages ) {

            $ImagesArray = array();

            foreach ( $WRGF_AllPhotosDetails as $WRGF_SinglePhotoDetails ) {
                $name = $WRGF_SinglePhotoDetails['wrgf_image_label'];
                $url  = $WRGF_SinglePhotoDetails['wrgf_image_url'];
                $url1 = $WRGF_SinglePhotoDetails['wrgf_12_thumb'];
                $url2 = $WRGF_SinglePhotoDetails['wrgf_346_thumb'];
                $url3 = $WRGF_SinglePhotoDetails['wrgf_12_same_size_thumb'];
                $url4 = $WRGF_SinglePhotoDetails['wrgf_346_same_size_thumb'];

                $upload_dir = wp_upload_dir();
                $data       = $url;
                if ( strpos( $data, 'uploads' ) !== false ) {
                    list( $oteher_path, $image_path ) = explode( "uploads", $data );
                    $url = $upload_dir['baseurl'] . $image_path;
                }

                $data = $url1;
                if ( strpos( $data, 'uploads' ) !== false ) {
                    list( $oteher_path, $image_path ) = explode( "uploads", $data );
                    $url1 = $upload_dir['baseurl'] . $image_path;
                }

                $data = $url2;
                if ( strpos( $data, 'uploads' ) !== false ) {
                    list( $oteher_path, $image_path ) = explode( "uploads", $data );
                    $url2 = $upload_dir['baseurl'] . $image_path;
                }

                $data = $url3;
                if ( strpos( $data, 'uploads' ) !== false ) {
                    list( $oteher_path, $image_path ) = explode( "uploads", $data );
                    $url3 = $upload_dir['baseurl'] . $image_path;
                }

                $data = $url4;
                if ( strpos( $data, 'uploads' ) !== false ) {
                    list( $oteher_path, $image_path ) = explode( "uploads", $data );
                    $url4 = $upload_dir['baseurl'] . $image_path;
                }

                

                $data = array(
                    'wrgf_image_label'         => $name,
                    'wrgf_image_url'           => $url,
                    'wrgf_12_thumb'            => $url1,
                    'wrgf_346_thumb'           => $url2,
                    'wrgf_12_same_size_thumb'  => $url3,
                    'wrgf_346_same_size_thumb' => $url4
                );

               
                   array_push( $ImagesArray, $data );

            }
            update_post_meta( $WRGF_Id, 'wrgf_all_photos_details', base64_encode( serialize( $ImagesArray ) ) );
            $ImagesArray = "";
        }
    endwhile;
}
?>
