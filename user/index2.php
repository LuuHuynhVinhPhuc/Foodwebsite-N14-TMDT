<?php
session_start();
include "header2.php";
include "slider.php";
include "../admin/connections.php";

// unset($_SESSION['uname']);

// check is sign in or not 
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: login.php');
    exit();
}

?>

<!--================Slider Area =================-->
<section class="main_slider_area slider_bg">
    <div id="main_slider" class="rev_slider" data-version="5.3.1.6">
        <ul>
            <li data-index="rs-1587" data-transition="fade" data-slotamount="default" data-hideafterloop="0"
                data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300"
                data-thumb="assets/images/main-slider/slider-item-1.png" data-rotate="0" data-saveperformance="off"
                data-title="Creative" data-param1="01" data-param2="" data-param3="" data-param4="" data-param5=""
                data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                <!-- MAIN IMAGE -->

                <!-- LAYER NR. 1 -->
                <div class="slider_text_box">

                    <div class="tp-caption tp-resizeme sm_text" data-x="['left','left','left','15','15']"
                        data-hoffset="['0','0','0','0']" data-y="['top','top','top','top']"
                        data-voffset="['165','165','165','195','195']" data-fontsize="['30','30','30','25','25']"
                        data-lineheight="['89','89','89','50','45']" data-width="['670','670','670','400','320']"
                        data-height="none" data-whitespace="normal" data-type="text" data-responsive_offset="on"
                        data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:0px;s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                        data-textAlign="['left','left','left','left']">Hot Stuff</div>

                    <div class="tp-caption tp-resizeme first_text" data-x="['left','left','left','15','15']"
                        data-hoffset="['0','0','0','0']" data-y="['top','top','top','top']"
                        data-voffset="['230','230','230','240','240']" data-fontsize="['72','72','72','40','35']"
                        data-lineheight="['89','89','89','50','45']" data-width="['670','670','670','400','320']"
                        data-height="none" data-whitespace="normal" data-type="text" data-responsive_offset="on"
                        data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:0px;s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                        data-textAlign="['left','left','left','left']">Maxican Burger ...</div>
                    <div class="tp-caption tp-resizeme middle_text" data-x="['left','left','left','15','15']"
                        data-hoffset="['0','0','0','0']" data-y="['top','top','top','top']"
                        data-voffset="['310','310','310','295','290']" data-fontsize="['30','30','30','25','25']"
                        data-lineheight="['89','89','89','50','35']" data-width="['670','670','670','600','600','400']"
                        data-height="none" data-whitespace="normal" data-type="text" data-responsive_offset="on"
                        data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:0px;s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                        data-textAlign="['left','left','left','left']">with bacon, tasty ham, pineapple and
                        onion</div>

                    <div class="tp-caption tp-resizeme secand_text" data-x="['left','left','left','15','15']"
                        data-hoffset="['0','0','0','0']" data-y="['top','top','top','top']"
                        data-voffset="['390','390','390','355','345','370']"
                        data-fontsize="['20','20','20','20','20','20']" data-lineheight="['28','28','28','28']"
                        data-width="['600','600','600','550','400','400']" data-height="none" data-whitespace="normal"
                        data-type="text" data-responsive_offset="on" data-transform_idle="o:1;"
                        data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]">
                        Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit quia
                        consequuntur magni dolores eos.
                    </div>

                    <div class="tp-caption tp-resizeme slider_button" data-x="['left','left','left','15','15']"
                        data-hoffset="['0','0','0','0']" data-y="['top','top','top','top']"
                        data-voffset="['480','480','480','440','455','475']" data-fontsize="['14','14','14','14']"
                        data-lineheight="['46','46','46','46']" data-width="['670','670','670','550','400']"
                        data-height="none" data-whitespace="nowrap" data-type="text" data-responsive_offset="on"
                        data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]">
                        <a class="view_all_btn" href="#">Order Now</a>
                    </div>
                    <div class="tp-caption   tp-resizeme" data-x="['right','right','right','left','15','15']"
                        data-hoffset="['-145','-145','0','0']" data-y="['top','top','top','top']"
                        data-voffset="['115','115','170','50','50']" data-width="none" data-height="none"
                        data-whitespace="nowrap" data-type="image" data-responsive_offset="on"
                        data-frames='[{"from":"x:-50px;rY:20deg;sX:0.8;sY:0.8;opacity:0;","speed":3000,"to":"o:1;","delay":2250,"ease":"Power4.easeOut"},{"delay":"wait","speed":1500,"to":"opacity:0;","ease":"Power4.easeIn"}]'
                        data-textAlign="['right','right','right','right']" data-paddingtop="[0,0,0,0]"
                        data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                        style="z-index: -1;border-width:0px;cursor:pointer;"><img
                            src="assets/images/main-slider/slider-item-1.png" alt=""
                            data-ww="['591px','500px','400px','200px','200px']"
                            data-hh="['447px','400px','310px','150px','150px']" data-no-retina />
                    </div>
                </div>
            </li>
            <li data-index="rs-1588" data-transition="fade" data-slotamount="default" data-hideafterloop="0"
                data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300"
                data-thumb="assets/images/main-slider/slider-item-2.png" data-rotate="0" data-saveperformance="off"
                data-title="Creative" data-param1="01" data-param2="" data-param3="" data-param4="" data-param5=""
                data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                <!-- MAIN IMAGE -->

                <!-- LAYER NR. 1 -->
                <div class="slider_text_box">
                    <div class="tp-caption tp-resizeme sm_text" data-x="['left','left','left','15','15']"
                        data-hoffset="['0','0','0','0']" data-y="['top','top','top','top']"
                        data-voffset="['165','165','165','195','195']" data-fontsize="['30','30','30','25','25']"
                        data-lineheight="['89','89','89','50','45']" data-width="['670','670','670','400','320']"
                        data-height="none" data-whitespace="normal" data-type="text" data-responsive_offset="on"
                        data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:0px;s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                        data-textAlign="['left','left','left','left']">Happy hour</div>

                    <div class="tp-caption tp-resizeme first_text" data-x="['left','left','left','15','15']"
                        data-hoffset="['0','0','0','0']" data-y="['top','top','top','top']"
                        data-voffset="['230','230','230','240','240']" data-fontsize="['72','72','72','40','35']"
                        data-lineheight="['89','89','89','50','45']" data-width="['670','670','670','400','320']"
                        data-height="none" data-whitespace="normal" data-type="text" data-responsive_offset="on"
                        data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:0px;s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                        data-textAlign="['left','left','left','left']">Pizza with cheese ...</div>
                    <div class="tp-caption tp-resizeme middle_text" data-x="['left','left','left','15','15']"
                        data-hoffset="['0','0','0','0']" data-y="['top','top','top','top']"
                        data-voffset="['310','310','310','295','290']" data-fontsize="['30','30','30','25','25']"
                        data-lineheight="['89','89','89','50','35']" data-width="['670','670','670','600','600','400']"
                        data-height="none" data-whitespace="normal" data-type="text" data-responsive_offset="on"
                        data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:0px;s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                        data-textAlign="['left','left','left','left']">with bacon, tasty ham, pineapple and
                        onion</div>

                    <div class="tp-caption tp-resizeme secand_text" data-x="['left','left','left','15','15']"
                        data-hoffset="['0','0','0','0']" data-y="['top','top','top','top']"
                        data-voffset="['390','390','390','355','345','370']"
                        data-fontsize="['20','20','20','20','20','20']" data-lineheight="['28','28','28','28']"
                        data-width="['600','600','600','550','400','400']" data-height="none" data-whitespace="normal"
                        data-type="text" data-responsive_offset="on" data-transform_idle="o:1;"
                        data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]">
                        Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit quia
                        consequuntur magni dolores eos.
                    </div>

                    <div class="tp-caption tp-resizeme slider_button" data-x="['left','left','left','15','15']"
                        data-hoffset="['0','0','0','0']" data-y="['top','top','top','top']"
                        data-voffset="['480','480','480','440','455','475']" data-fontsize="['14','14','14','14']"
                        data-lineheight="['46','46','46','46']" data-width="['670','670','670','550','400']"
                        data-height="none" data-whitespace="nowrap" data-type="text" data-responsive_offset="on"
                        data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]">
                        <a class="view_all_btn" href="#">Order Now</a>
                    </div>
                    <div class="tp-caption   tp-resizeme" data-x="['right','right','right','left','15','15']"
                        data-hoffset="['-170','-170','0','0']" data-y="['bottom','center','center','top']"
                        data-voffset="['0','0','0','50','50']" data-width="none" data-height="none"
                        data-whitespace="nowrap" data-type="image" data-responsive_offset="on"
                        data-frames='[{"from":"x:-50px;rY:20deg;sX:0.8;sY:0.8;opacity:0;","speed":3000,"to":"o:1;","delay":2250,"ease":"Power4.easeOut"},{"delay":"wait","speed":1500,"to":"opacity:0;","ease":"Power4.easeIn"}]'
                        data-textAlign="['right','right','right','right']" data-paddingtop="[0,0,0,0]"
                        data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                        style="z-index: -1;border-width:0px;cursor:pointer;"><img
                            src="assets/images/main-slider/slider-item-2.png" alt=""
                            data-ww="['723px','500px','400px','200px','200px']"
                            data-hh="['626px','440px','340px','160px','160px']" data-no-retina />
                    </div>

                </div>
            </li>
            <li data-index="rs-1589" data-transition="fade" data-slotamount="default" data-hideafterloop="0"
                data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300"
                data-thumb="assets/images/main-slider/slider-item-3.png" data-rotate="0" data-saveperformance="off"
                data-title="Creative" data-param1="01" data-param2="" data-param3="" data-param4="" data-param5=""
                data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                <!-- MAIN IMAGE -->

                <!-- LAYER NR. 1 -->
                <div class="slider_text_box">
                    <div class="tp-caption tp-resizeme sm_text" data-x="['left','left','left','15','15']"
                        data-hoffset="['0','0','0','0']" data-y="['top','top','top','top']"
                        data-voffset="['165','165','165','195','195']" data-fontsize="['30','30','30','25','25']"
                        data-lineheight="['89','89','89','50','45']" data-width="['670','670','670','400','320']"
                        data-height="none" data-whitespace="normal" data-type="text" data-responsive_offset="on"
                        data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:0px;s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                        data-textAlign="['left','left','left','left']">Happy hour</div>

                    <div class="tp-caption tp-resizeme first_text" data-x="['left','left','left','15','15']"
                        data-hoffset="['0','0','0','0']" data-y="['top','top','top','top']"
                        data-voffset="['230','230','230','240','240']" data-fontsize="['72','72','72','40','35']"
                        data-lineheight="['89','89','89','50','45']" data-width="['670','670','670','400','320']"
                        data-height="none" data-whitespace="normal" data-type="text" data-responsive_offset="on"
                        data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:0px;s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                        data-textAlign="['left','left','left','left']">Non Veg Burger...</div>
                    <div class="tp-caption tp-resizeme middle_text" data-x="['left','left','left','15','15']"
                        data-hoffset="['0','0','0','0']" data-y="['top','top','top','top']"
                        data-voffset="['310','310','310','295','290']" data-fontsize="['30','30','30','25','25']"
                        data-lineheight="['89','89','89','50','35']" data-width="['670','670','670','600','600','400']"
                        data-height="none" data-whitespace="normal" data-type="text" data-responsive_offset="on"
                        data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:0px;s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                        data-textAlign="['left','left','left','left']">with bacon, tasty ham, pineapple and
                        onion</div>

                    <div class="tp-caption tp-resizeme secand_text" data-x="['left','left','left','15','15']"
                        data-hoffset="['0','0','0','0']" data-y="['top','top','top','top']"
                        data-voffset="['390','390','390','355','345','370']"
                        data-fontsize="['20','20','20','20','20','20']" data-lineheight="['28','28','28','28']"
                        data-width="['600','600','600','550','400','400']" data-height="none" data-whitespace="normal"
                        data-type="text" data-responsive_offset="on" data-transform_idle="o:1;"
                        data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]">
                        Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit quia
                        consequuntur magni dolores eos.
                    </div>

                    <div class="tp-caption tp-resizeme slider_button" data-x="['left','left','left','15','15']"
                        data-hoffset="['0','0','0','0']" data-y="['top','top','top','top']"
                        data-voffset="['480','480','480','440','455','475']" data-fontsize="['14','14','14','14']"
                        data-lineheight="['46','46','46','46']" data-width="['670','670','670','550','400']"
                        data-height="none" data-whitespace="nowrap" data-type="text" data-responsive_offset="on"
                        data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]">
                        <a class="view_all_btn" href="#">Order Now</a>
                    </div>
                    <div class="tp-caption   tp-resizeme" data-x="['right','right','right','left','15','15']"
                        data-hoffset="['-145','-145','0','0']" data-y="['top','top','top','top']"
                        data-voffset="['105','105','240','50','50']" data-width="none" data-height="none"
                        data-whitespace="nowrap" data-type="image" data-responsive_offset="on"
                        data-frames='[{"from":"x:-50px;rY:20deg;sX:0.8;sY:0.8;opacity:0;","speed":3000,"to":"o:1;","delay":2250,"ease":"Power4.easeOut"},{"delay":"wait","speed":1500,"to":"opacity:0;","ease":"Power4.easeIn"}]'
                        data-textAlign="['right','right','right','right']" data-paddingtop="[0,0,0,0]"
                        data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                        style="z-index: -1;border-width:0px;cursor:pointer;"><img
                            src="assets/images/main-slider/slider-item-3.png" alt=""
                            data-ww="['628px','500px','400px','200px','200px']"
                            data-hh="['539px','400px','330px','175px','175px']" data-no-retina />
                    </div>
                </div>
            </li>
        </ul>
    </div>
</section>
<!--================End Slider Area =================-->

<!-- Spicy Section -->

<!-- End Spicy Section -->

<!-- Products Section -->
<section class="products-section">
    <div class="auto-container">

        <!-- Sec Title -->
        <div class="sec-title centered">
            <h2>Our Food</h2>
        </div>

        <!-- MixitUp Galery -->
        <div class="mixitup-gallery">

            <!--Filter-->
            <div class="filters clearfix">
                <ul class="filter-tabs filter-btns clearfix">
                    <li class="active filter" data-role="button" data-filter="all">All</li>
                    <?php
                    $res = mysqli_query($link, "select * from food_categories");
                    while ($row = mysqli_fetch_array($res)) {
                        $data_filter = ".".$row["food_category"];
                        ?>
                        <li class="filter" data-role="button" data-filter="<?php echo $data_filter ?>">
                            <?php echo $row["food_category"]; ?>
                        </li>

                        <?php
                    }
                    ?>

                </ul>
            </div>

            <div class="filter-list row clearfix">

                <!-- Products Block -->
                <?php
                $res = mysqli_query($link, "select * from food");
                while ($row = mysqli_fetch_array($res)) {
                    ?>
                    <div class="product-block all mix <?php echo $row["food_category"]; ?> salad fest wraps fries col-lg-3 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <figure class="image-box">
                                <img src="../admin/<?php echo $row["food_image"] ?>" alt="">
                            </figure>
                            <div class="lower-content">
                                <h4>
                                    <a href="food_description.php?id=<?php echo $row["id"]; ?>">
                                        <?php echo $row["food_name"] ?>
                                    </a>
                                </h4>
                                <div class="text">
                                    <?php echo substr($row["food_description"], 0, 30) ?>...
                                </div>
                                <div class="price">$<?php echo $row["food_discount_price"] ?></div>
                                <div class="lower-box">
                                    <a href="food_description.php?id=<?php echo $row["id"]; ?>"
                                        class="theme-btn btn-style-five"><span class="txt">Order
                                            Now</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>


            </div>

        </div>

    </div>
</section>
<!-- End Products Section -->

<!-- to-do: add pointing system (no need exchange, just point & at certain points, let them have different member (silver member, gold member, etc)) -->

<?php
include "delivery.php";
include "services_section.php";
include "footer.php";
?>