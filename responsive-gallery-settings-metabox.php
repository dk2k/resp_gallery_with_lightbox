<?php
/**
 * Load Saved Responsive Photo Gallery Settings
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
$PostId                = $post->ID;
$WRGF_Gallery_Settings = "WRGF_Gallery_Settings_" . $PostId;
$WRGF_Gallery_Settings = unserialize( get_post_meta( $PostId, $WRGF_Gallery_Settings, true ) );

if ( $WRGF_Gallery_Settings['WL_Show_Gallery_Title'] && $WRGF_Gallery_Settings['WL_Hover_Color'] ) {
	$WL_Show_Gallery_Title   = $WRGF_Gallery_Settings['WL_Show_Gallery_Title'];
	$WL_Show_Image_Label     = $WRGF_Gallery_Settings['WL_Show_Image_Label'];
	$WL_Image_Label_Position = $WRGF_Gallery_Settings['WL_Image_Label_Position'];
	$WL_Hover_Animation      = $WRGF_Gallery_Settings['WL_Hover_Animation'];
	$WL_Gallery_Layout       = $WRGF_Gallery_Settings['WL_Gallery_Layout'];
	$WL_Thumbnail_Layout     = $WRGF_Gallery_Settings['WL_Thumbnail_Layout'];
	$WL_Hover_Color          = $WRGF_Gallery_Settings['WL_Hover_Color'];
	$WL_Hover_Text_Color     = $WRGF_Gallery_Settings['WL_Hover_Text_Color'];
	$WL_Footer_Text_Color    = $WRGF_Gallery_Settings['WL_Footer_Text_Color'];
	$WL_Hover_Color_Opacity  = $WRGF_Gallery_Settings['WL_Hover_Color_Opacity'];
	$WL_Font_Style           = $WRGF_Gallery_Settings['WL_Font_Style'];
	$WL_Custom_Css           = $WRGF_Gallery_Settings['WL_Custom_Css'];
} else {
	$WL_Show_Gallery_Title   = "yes";
	$WL_Show_Image_Label     = "yes";
	$WL_Image_Label_Position = "hover";
	$WL_Hover_Animation      = "stroke";
	$WL_Gallery_Layout       = "col-md-6";
	$WL_Thumbnail_Layout     = "same-size";
	$WL_Hover_Color          = "#0AC2D2";
	$WL_Hover_Text_Color     = "#FFFFFF";
	$WL_Footer_Text_Color    = "#000000";
	$WL_Hover_Color_Opacity  = "yes";
	$WL_Font_Style           = "Arial";
	$WL_Custom_Css           = "";
}
?>

<script>
    jQuery(document).ready(function () {
        var editor = CodeMirror.fromTextArea(document.getElementById("wl-custom-css"), {
            lineNumbers: true,
            styleActiveLine: true,
            matchBrackets: true,
            hint: true,
            theme: 'blackboard',
            lineWrapping: true,
            extraKeys: {"Ctrl-Space": "autocomplete"},
        });
    });
    (function( $ ) {
 
    // Add Color Picker to all inputs that have 'color-field' class
    $(function() {
        $('.color-field').wpColorPicker();
    });
     
})( jQuery );
</script>

<input type="hidden" id="wl_wrgf_action" name="wl_wrgf_action" value="wl-wrgf-save-settings">
<?php $nonce = wp_create_nonce( 'nonce_wrgf_save_settings_option' ); ?>
<input type="hidden" name="security" value="<?php echo esc_attr( $nonce ); ?>">
<table class="form-table">
    <tbody>

    <tr>
        <th scope="row"><label><?php esc_html_e( 'Show Gallery Title', WRGF_TEXT_DOMAIN ); ?></label></th>
        <td>
			<?php if ( ! isset( $WL_Show_Gallery_Title ) ) {
				$WL_Show_Gallery_Title = "yes";
			} ?>
            <input type="radio" name="wl-show-gallery-title" id="wl-show-gallery-title"
                   value="yes" <?php if ( $WL_Show_Gallery_Title == 'yes' ) {
				echo "checked";
			} ?>> <i class="fa fa-check fa-2x"></i>
            <input type="radio" name="wl-show-gallery-title" id="wl-show-gallery-title"
                   value="no" <?php if ( $WL_Show_Gallery_Title == 'no' ) {
				echo "checked";
			} ?>> <i class="fa fa-times fa-2x"></i>
            <p class="description"><?php esc_html_e( 'Select Yes', WRGF_TEXT_DOMAIN ); ?>
                /<?php esc_html_e( 'No option to hide or show gallery title', WRGF_TEXT_DOMAIN ); ?>.</p>
        </td>
    </tr>

    <tr>
        <th scope="row"><label><?php esc_html_e( 'Show Image Label', WRGF_TEXT_DOMAIN ); ?></label></th>
        <td>
			<?php if ( ! isset( $WL_Show_Image_Label ) ) {
				$WL_Show_Image_Label = "yes";
			} ?>
            <input type="radio" name="wl-show-image-label" id="wl-show-image-label"
                   value="yes" <?php if ( $WL_Show_Image_Label == 'yes' ) {
				echo "checked";
			} ?>> <i class="fa fa-check fa-2x"></i>
            <input type="radio" name="wl-show-image-label" id="wl-show-image-label"
                   value="no" <?php if ( $WL_Show_Image_Label == 'no' ) {
				echo "checked";
			} ?>> <i class="fa fa-times fa-2x"></i>
            <p class="description"><?php esc_html_e( 'Select Yes', WRGF_TEXT_DOMAIN ); ?>
                /<?php esc_html_e( 'No option to hide or show label on image', WRGF_TEXT_DOMAIN ); ?>.</p>
        </td>
    </tr>

    <tr>
        <th scope="row"><label><?php esc_html_e( 'Image Label Position', WRGF_TEXT_DOMAIN ); ?></label></th>
        <td>
			<?php if ( ! isset( $WL_Image_Label_Position ) ) {
				$WL_Image_Label_Position = "hover";
			} ?>
            <input type="radio" name="wl-image-label-position" id="wl-image-label-position"
                   value="hover" <?php if ( $WL_Image_Label_Position == 'hover' ) {
				echo "checked";
			} ?>> <?php esc_html_e( 'On Hover', WRGF_TEXT_DOMAIN ); ?> &nbsp;&nbsp;
            <input type="radio" name="wl-image-label-position" id="wl-image-label-position"
                   value="footer" <?php if ( $WL_Image_Label_Position == 'footer' ) {
				echo "checked";
			} ?>> <?php esc_html_e( 'On Footer', WRGF_TEXT_DOMAIN ); ?>
            <p class="description"><?php esc_html_e( 'Select option to show image label on Hover or Footer', WRGF_TEXT_DOMAIN ); ?>
                .</p>
        </td>
    </tr>

    <tr>
        <th scope="row"><label><?php esc_html_e( 'Image Hover Animation', WRGF_TEXT_DOMAIN ); ?></label></th>
        <td>
			<?php if ( ! isset( $WL_Hover_Animation ) ) {
				$WL_Hover_Animation = "stroke";
			} ?>
            <select name="wl-hover-animation" id="wl-hover-animation">
                <optgroup label="Select Animation">
                    <option value="stroke" <?php if ( $WL_Hover_Animation == 'stroke' ) {
						echo "selected=selected";
					} ?>><?php esc_html_e( 'Stroke', WRGF_TEXT_DOMAIN ); ?></option>
                </optgroup>
            </select>
            <p class="description"><?php esc_html_e( 'Choose an animation effect apply on images after mouse hover', WRGF_TEXT_DOMAIN ); ?>
                .</p>
        </td>
    </tr>

    <tr>
        <th scope="row"><label><?php esc_html_e( 'Gallery Layout', WRGF_TEXT_DOMAIN ); ?></label></th>
        <td>
			<?php if ( ! isset( $WL_Gallery_Layout ) ) {
				$WL_Gallery_Layout = "col-md-6";
			} ?>
            <select name="wl-gallery-layout" id="wl-gallery-layout">
                <optgroup label="Select Gallery Layout">
                    <option value="col-md-6" <?php if ( $WL_Gallery_Layout == 'col-md-6' ) {
						echo "selected=selected";
					} ?>><?php esc_html_e( 'Two Column', WRGF_TEXT_DOMAIN ); ?></option>
                    <option value="col-md-4" <?php if ( $WL_Gallery_Layout == 'col-md-4' ) {
						echo "selected=selected";
					} ?>><?php esc_html_e( 'Three Column', WRGF_TEXT_DOMAIN ); ?></option>
                    <option value="col-md-3" <?php if ( $WL_Gallery_Layout == 'col-md-3' ) {
						echo "selected=selected";
					} ?>><?php esc_html_e( 'Four Column', WRGF_TEXT_DOMAIN ); ?></option>
                </optgroup>
            </select>
            <p class="description"><?php esc_html_e( 'Choose a column layout for image gallery.', WRGF_TEXT_DOMAIN ); ?></p>
        </td>
    </tr>

    <tr>
        <th scope="row"><label><?php esc_html_e( 'Thumbnail Layout', WRGF_TEXT_DOMAIN ); ?></label></th>
        <td>
			<?php if ( ! isset( $WL_Thumbnail_Layout ) ) {
				$WL_Thumbnail_Layout = "same-size";
			} ?>
            <input type="radio" name="wl-thumbnail-layout" id="wl-thumbnail-layout"
                   value="same-size" <?php if ( $WL_Thumbnail_Layout == 'same-size' ) {
				echo "checked";
			} ?>> <?php esc_html_e( 'Show Same Size Thumbnails', WRGF_TEXT_DOMAIN ); ?>
            <input type="radio" name="wl-thumbnail-layout" id="wl-thumbnail-layout"
                   value="masonry" <?php if ( $WL_Thumbnail_Layout == 'masonry' ) {
				echo "checked";
			} ?>> <?php esc_html_e( 'Show Masonry Style Thumbnails', WRGF_TEXT_DOMAIN ); ?>
            <input type="radio" name="wl-thumbnail-layout" id="wl-thumbnail-layout"
                   value="original" <?php if ( $WL_Thumbnail_Layout == 'original' ) {
				echo "checked";
			} ?>> <?php esc_html_e( 'Show Original Image As Thumbnails', WRGF_TEXT_DOMAIN ); ?>
            <p class="description"><?php esc_html_e( 'Select an option for thumbnail layout setting', WRGF_TEXT_DOMAIN ); ?>
                .</p>
            <p class="description"><?php esc_html_e( 'If Same Size Thumbnail option selected than minimum image size required in following layouts', WRGF_TEXT_DOMAIN ); ?>
                :</p>
            <p class="description"><?php esc_html_e( 'Minimum image size required in 2 Column Gallery Layout', WRGF_TEXT_DOMAIN ); ?>
                <?php esc_html_e( ': 500x500px', WRGF_TEXT_DOMAIN ); ?></p>
            <p class="description"><?php esc_html_e( 'Minimum image size required in 3 Column Gallery Layout', WRGF_TEXT_DOMAIN ); ?>
                <?php esc_html_e( ': 400x400px', WRGF_TEXT_DOMAIN ); ?></p>
        </td>
    </tr>

    <tr>
        <th scope="row"><label><?php esc_html_e( 'Hover Color', WRGF_TEXT_DOMAIN ); ?></label></th>
        <td class="image_color">
			<?php if ( ! isset( $WL_Hover_Color ) ) {
				$WL_Hover_Color = "#0AC2D2";
			} ?>
            <input class="color-field" type="text" name="wl-hover-color" id="wl-hover-color"
                   value='<?php echo $WL_Hover_Color; ?>'>
            <p class="description"><?php esc_html_e( 'Choose a Image Hover Color', WRGF_TEXT_DOMAIN ); ?>.</p>
        </td>
    </tr>

    <tr>
        <th scope="row"><label><?php esc_html_e( 'Hover Text Color', WRGF_TEXT_DOMAIN ); ?></label></th>
        <td class="image_color">
			<?php if ( ! isset( $WL_Hover_Text_Color ) ) {
				$WL_Hover_Text_Color = "#FFFFFF";
			} ?>
            <input class="color-field" type="text" name="wl-hover-text-color" id="wl-hover-text-color"
                   value="<?php echo $WL_Hover_Text_Color  ?>" >
            <p class="description"><?php esc_html_e( 'Choose a Image Hover Text Color', WRGF_TEXT_DOMAIN ); ?>.</p>
        </td>
    </tr>

    <tr>
        <th scope="row"><label><?php esc_html_e( 'Footer Text Color', WRGF_TEXT_DOMAIN ); ?></label></th>
        <td class="image_color">
			<?php if ( ! isset( $WL_Footer_Text_Color ) ) {
				$WL_Footer_Text_Color = "#000000";
			} ?>
            <input class="color-field" type="text" name="wl-footer-text-color" id="wl-footer-text-color"
                   value="<?php echo $WL_Footer_Text_Color ?>" >
            <p class="description"><?php esc_html_e( 'Choose a Color for Footer Text', WRGF_TEXT_DOMAIN ); ?>.</p>
        </td>
    </tr>

    <tr>
        <th scope="row"><label><?php esc_html_e( 'Hover Color Opacity', WRGF_TEXT_DOMAIN ); ?></label></th>
        <td>
			<?php if ( ! isset( $WL_Hover_Color_Opacity ) ) {
				$WL_Hover_Color_Opacity = "yes";
			} ?>
            <input type="radio" name="wl-hover-color-opacity" id="wl-hover-color-opacity"
                   value="yes" <?php if ( $WL_Hover_Color_Opacity == 'yes' ) {
				echo "checked";
			} ?>> <i class="fa fa-check fa-2x"></i>
            <input type="radio" name="wl-hover-color-opacity" id="wl-hover-color-opacity"
                   value="no" <?php if ( $WL_Hover_Color_Opacity == 'no' ) {
				echo "checked";
			} ?>> <i class="fa fa-times fa-2x"></i>
            <p class="description"><?php esc_html_e( 'Select Yes', WRGF_TEXT_DOMAIN ); ?>
                /<?php esc_html_e( 'No option for hover color opacity on images', WRGF_TEXT_DOMAIN ); ?>.</p>
        </td>
    </tr>

    <tr>
        <th scope="row"><label><?php esc_html_e( 'Caption Font Style', WRGF_TEXT_DOMAIN ); ?></label></th>
        <td>
            <select name="wl-font-style" class="standard-dropdown" id="wl-font-style">
                <optgroup label="Default Fonts">
                    <option value="Arial" <?php selected( $WL_Font_Style, 'Arial' ); ?>><?php esc_html_e( 'Arial', WRGF_TEXT_DOMAIN ); ?></option>
                    <option value="Arial Black" <?php selected( $WL_Font_Style, 'Arial Black' ); ?>><?php esc_html_e( 'Arial Black', WRGF_TEXT_DOMAIN ); ?></option>
                    <option value="Courier New" <?php selected( $WL_Font_Style, 'Courier New' ); ?>><?php esc_html_e( 'Courier New', WRGF_TEXT_DOMAIN ); ?></option>
                    <option value="cursive" <?php selected( $WL_Font_Style, 'cursive' ); ?>><?php esc_html_e( 'Cursive', WRGF_TEXT_DOMAIN ); ?></option>
                    <option value="fantasy" <?php selected( $WL_Font_Style, 'fantasy' ); ?>><?php esc_html_e( 'Fantasy', WRGF_TEXT_DOMAIN ); ?></option>
                    <option value="Georgia" <?php selected( $WL_Font_Style, 'Georgia' ); ?>><?php esc_html_e( 'Georgia', WRGF_TEXT_DOMAIN ); ?></option>
                    <option value="Grande"<?php selected( $WL_Font_Style, 'Grande' ); ?>><?php esc_html_e( 'Grande', WRGF_TEXT_DOMAIN ); ?></option>
                    <option value="Helvetica Neue" <?php selected( $WL_Font_Style,'Helvetica Neue'); ?>><?php esc_html_e( 'Helvetica Neue', WRGF_TEXT_DOMAIN ); ?></option>
                    <option value="Impact" <?php selected( $WL_Font_Style, 'Impact' ); ?>><?php esc_html_e( 'Impact', WRGF_TEXT_DOMAIN ); ?></option>
                    <option value="Lucida" <?php selected( $WL_Font_Style, 'Lucida' ); ?>><?php esc_html_e( 'Lucida', WRGF_TEXT_DOMAIN ); ?></option>
                    <option value="Lucida Console"<?php selected( $WL_Font_Style, 'Lucida Console' ); ?>><?php esc_html_e( 'Lucida Console', WRGF_TEXT_DOMAIN ); ?>
                    </option>
                    <option value="monospace" <?php selected( $WL_Font_Style, 'monospace' ); ?>><?php esc_html_e( 'Monospace', WRGF_TEXT_DOMAIN ); ?></option>
                    <option value="Open Sans" <?php selected( $WL_Font_Style, 'Open Sans' ); ?>><?php esc_html_e( 'Open Sans', WRGF_TEXT_DOMAIN ); ?></option>
                    <option value="Palatino" <?php selected( $WL_Font_Style, 'Palatino' ); ?>><?php esc_html_e( 'Palatino', WRGF_TEXT_DOMAIN ); ?></option>
                    <option value="sans" <?php selected( $WL_Font_Style, 'sans' ); ?>><?php esc_html_e( 'Sans', WRGF_TEXT_DOMAIN ); ?></option>
                    <option value="sans-serif" <?php selected( $WL_Font_Style, 'sans-serif' ); ?>><?php esc_html_e( 'Sans-Serif', WRGF_TEXT_DOMAIN ); ?></option>
                    <option value="Tahoma" <?php selected( $WL_Font_Style, 'Tahoma' ); ?>><?php esc_html_e( 'Tahoma', WRGF_TEXT_DOMAIN ); ?></option>
                    <option value="Times New Roman"<?php selected( $WL_Font_Style, 'Times New Roman' ); ?>><?php esc_html_e( 'Times New Roman', WRGF_TEXT_DOMAIN ); ?>
                    </option>
                    <option value="Trebuchet MS" <?php selected( $WL_Font_Style, 'Trebuchet MS' ); ?>><?php esc_html_e( 'Trebuchet MS', WRGF_TEXT_DOMAIN ); ?>
                    </option>
                    <option value="Verdana" <?php selected( $WL_Font_Style, 'Verdana' ); ?>><?php esc_html_e( 'Verdana', WRGF_TEXT_DOMAIN ); ?></option>
                </optgroup>
            </select>
            <p class="description"><?php esc_html_e( 'Choose a caption font style', WRGF_TEXT_DOMAIN ); ?>.</p>
        </td>
    </tr>

    <tr>
        <th scope="row"><label><?php esc_html_e( 'Custom CSS', WRGF_TEXT_DOMAIN ) ?></label></th>
        <td>
			<?php if ( ! isset( $WL_Custom_Css ) ) {
				$WL_Custom_Css = "";
			} ?>
            <textarea id="wl-custom-css" name="wl-custom-css" type="text" class=""
                      style="width:80%"><?php echo esc_html($WL_Custom_Css); ?></textarea>
            <p class="description">
				<?php esc_html_e( 'Enter any custom css you want to apply on this gallery.', WRGF_TEXT_DOMAIN ) ?>
            </p>
            <p class="custnote"><?php esc_html_e( 'Note', WRGF_TEXT_DOMAIN ); ?>
                : <?php esc_html_e( 'Please Do Not Use', WRGF_TEXT_DOMAIN ); ?>
                <b><?php esc_html_e( 'Style', WRGF_TEXT_DOMAIN ); ?></b> <?php esc_html_e( 'Tag With Custom CSS', WRGF_TEXT_DOMAIN ); ?>
            </p>
        </td>
    </tr>
    </tbody>
</table>