# resp_gallery_with_lightbox
My own support of decommissioned WordPress plugin previously released by Weblizar - https://weblizar.com/plugins/responsive-photo-gallery-pro/
Last update was in August 2020, but I have a lot galleries (other similar plugins don't pick them up from DB without complex update) and still want to add new.
The main issue to me was that after update of Wordpress in December 2020 I could see only a black screen when I clicked an image.
It was related to incremented version of jquery.
The required changes are described here: https://github.com/brutaldesign/swipebox/issues/383

As a bonus: mouse swipe (left and right) and mouse scrolling events handled. That's my own improvement in Swipebox library.
