<?php header( "Content-type: text/css" );
require_once( '../../../wp-load.php' );

$style = cuisine_get_theme_style( true );

global $wpdb; 
$article_meta = $wpdb->get_results("SELECT * FROM $wpdb->postmeta WHERE meta_key = 'article_styling'" );

$gfonts = cuisine_get_google_font_url();
$article_fonts = false;

ob_start();

if( !empty( $article_meta ) )
    $article_fonts = chef_article_get_font_import( $article_meta );

?>
/**
*  We do our stylesheets in a php file to account for custom (article) stying.
*/

@import url('style.css');
<?php
    
    if( $gfonts )
        echo "@import url('".$gfonts."');\n";

    if( $article_fonts )
        echo "@import url('".$article_fonts."');";


?>

    body{
        background:<?php _s('body-background-color');?>
        background-image:url( <?php echo $style['body-background-image'];?> );
        background-repeat:<?php _s('body-background-repeat');?>
        font-family: <?php _s('p-font-family');?>
        font-size: <?php _s('p-font-size');?>
        line-height:130%;
    }



    /* Typo   ================================= */

    h1,h2,h3,h4,h5,h6,p{line-height:150%;}

    h1{
        font-family:<?php _s('h1-font-family');?>;
        font-size:<?php _s('h1-font-size');?>;
        color:<?php _s('h1-font-color');?>
    }

    h2{
        font-family:<?php _s('h2-font-family');?>;
        font-size:<?php _s('h2-font-size');?>;
        color:<?php _s('h2-font-color');?>
    }

    h3{
        font-family:<?php _s('h3-font-family');?>;
        font-size:<?php _s('h3-font-size');?>;
        color:<?php _s('h3-font-color');?>
    }

    p, a{
        font-family:<?php _s('p-font-family');?>;
        font-size:<?php _s('p-font-size');?>;
        color:<?php _s('p-font-color');?>
    }

    a, a:active{color:<?php _s('a-color');?>;}
    a:hover{color:<?php _s('a-hover-color');?> !important;}
    a:visited{color:<?php _s('a-visited-color');?>;}
    a, li, input, textarea, a strong, a img, div{<?php transition();?>}



    /* =========================================================== */
    /*                         Header                             
    /* =========================================================== */


    /* MENU's */
    .topbar{background:<?php _s('topmenu-background-color');?>height:auto;}

    .mainmenu{background:<?php _s('mainmenu-background-color');?>height:auto;}
    .mainmenu li{float:left;position:relative;list-style:none;}
    .mainmenu li a{color:<?php _s('mainmenu-font-color');?>font-family:<?php _s('mainmenu-font-family');?>;font-size:<?php _s('mainmenu-font-size');?>;}
    .mainmenu li a:hover, .mainmenu li.current-menu-item a{background:<?php _s('mainmenu-background-hover-color');?>}

    .logo{}
    .logo img{}
    .logo h1{color:<?php _s('logo-h1-color');?>}

    <?php if( $style['logo-label'] ):?>
        .logo{ background:<?php _s('logo-h1-background-color');?>}
    <?php endif;?>


    /* =========================================================== */
    /*                         GENERAL                             
    /* =========================================================== */

    #container{background:<?php _s('container-background-color');?>border-radius:<?php _s('border-radius');?>}

    /* footer */
    .footer-container{background:<?php _s('footer-background-color');?>}
    .copyright-container{background:<?php _s('copyright-background-color');?>}

    /* Sidebar */
    .sidebar{background:<?php _s('sidebar-background-color');?>color:<?php _s('sidebar-color');?>height:100%;}
    

    /* Button: */
    .button {display: inline-block; padding: 4px;font-family:<?php echo $style['p-font-family'];?>; font-size: <?php echo $style['p-font-size'];?>; color: <?php echo $style['button-color']?>; background-color:<?php echo $style['button-background-color'];?>; white-space: nowrap; overflow: visible; cursor: pointer; text-decoration: none; outline: none; position: relative; zoom: 1; }
    .button:hover { color: <?php echo $style['button-hover-color']?>; text-decoration: none; background-color: <?php echo $style['button-hover-background-color'];?>; }
    .button:active { top: 1px }
    .button.pill { -webkit-border-radius: 19px; -moz-border-radius: 19px; border-radius: 19px; }
    .button.big {font-size:<?php set_font_size( $style['p-font-size'], +2);?>;padding-left: 8px; }
    .button.small {font-size:<?php set_font_size( $style['p-font-size'], -2);?>;padding-left: 16px; }


    /* =========================================================== */
    /*                         PAGINA's                             
    /* =========================================================== */




    /* =========================================================== */
    /*                         WIDGETS                             
    /* =========================================================== */

   
    /* =========================================================== */
    /*                         PLUGINS                             
    /* =========================================================== */

    .social_follow, .social_share{display:inline-block;margin:0 20px 20px 0}
    .social_follow:hover, .social_share:hover{opacity:.7}
    .social_follow img, .social_share img{max-width:50px}
   

    <?php if( cuisine_has_plugin('chef-blog' ) ):?>

        /**
        *   BLOG:
        */

        /* POST CONTENT + TITLE */
        .post{padding:0 0 40px 0;margin:0 0 40px 0;}
        .single-post .post{margin:0;}
        .blog.with-sidebar .pagetitle{padding-top:0;}

        .post-footer{border-bottom:2px solid rgba(0,0,0,.2);padding:20px 0 20px 0;}
        .post-footer .comments-link{margin-left:10px;}

        .post .post-title h2, .post .post-title h2 a{font-size:<?php _s('h2-font-size');?>font-family:<?php _s('h2-font-family');?>color:<?php _s('h2-font-color');?>text-decoration:none;margin-bottom:20px;}
        .post .post-body{min-height:150px;}
        .post .post-body p, .post .post-body ul, .post .post-body ol,.post .post-body h1, .post .post-body h2, .post .post-body h3{padding-bottom:20px;}
        .post .post-body li{margin-bottom:10px;}

        .post .post-body input[type='password']{padding:5px;border:1px solid rgba(0,0,0,.3);}
        .post .post-body input[type="submit"]{margin:0 0 0 10px;padding:7px 10px 7px 10px;background:<?php _s('button-background-color');?>color:<?php _s('button-color');?>border:0;border-bottom:2px solid rgba(0,0,0,.4);}
        .post .post-body input[type="submit"]:hover{background:<?php _s('button-hover-background-color');?>color:<?php _s('button-hover-color');?>}

        .post .post_thumb{width:98%;height:auto !important;margin-bottom:20px;border:4px solid rgba(0,0,0,.1);}
        .post .post_thumb_link:hover img{opacity:.7;}

        .post .read-more{margin:20px 0 20px 0;}

        /* POST META & DATE */
        .post .meta .post-author{margin:20px 0 20px 0;padding-left:4px;}
        .post .date{margin:20px 0 20px -20px;text-align:center;}
        .post .date .day{width:100%;display:inline-block;position:relative;color:<?php _s('mainmenu-font-color');?>text-align:center;background:<?php _s('mainmenu-background-color');?>border:4px solid <?php _s('topmenu-background-color');?>width:40px;height:40px;font-size:24px;border-radius:300px;line-height:155%;}
        .post .date .day:after{content:'';position:absolute;bottom:-16px;left:30%;display:block;width:0;height:0;border:0.3em solid <?php _s('topmenu-background-color');?>border-color: <?php echo $style['topmenu-background-color'];?> transparent transparent transparent;}
        .post .date .month{color:#aaa;font-size:20px;text-transform:uppercase;padding:7px 0 0 0;width:100%;text-align:center;}
        .post .date .year{color:#aaa;font-size:14px;padding:0;width:100%;text-align:center;}

        .post .meta .post-commets a{text-decoration:none;padding:4px;background:rgba(0,0,0,.3);border-radius:<?php _s('border-radius');?>}
        .post .meta .post-commets a{padding:4px 6px 4px 4px;background:rgba(0,0,0,.04);text-decoration:none;}
        .post .meta .post-commets a:hover{background:<?php _s('body-background-color');?>color:<?php _s('container-background-color');?>text-shadow:1px 1px 1px rgba(0,0,0,.3);}

        /* POST AUTHOR */
        .post .author-info{background:rgba(0,0,0,.03);padding:20px;<?php borderbox();?>;}
        .post .author-avatar{position:relative;border:4px solid <?php _s('topmenu-background-color');?>border-radius:60px;width:100px;height:100px;}
        .post .author-avatar img{border-radius:60px;}
        .post .author-avatar:after{content:'';position:absolute;bottom:30%;left:100px;display:block;width:0;height:0;border:1.3em solid <?php _s('topmenu-background-color');?>border-color:transparent transparent transparent <?php _s('topmenu-background-color');?>}
        .post .author-description h2{color:<?php _s('topmenu-background-color');?>padding-bottom:10px;}
        .post .author-description{line-height:170%;}

        .with-sidebar .post .author-avatar{margin-left:0;}

        .post .post-tags{padding:20px 0 20px 0;}

        /* COMMENT FORM */
        .comment_count{padding:0 0 40px 0;}
        .comment-form{padding:0 0 40px 0;border-bottom:2px solid rgba(0,0,0,.2);margin:0 0 40px 0;}
        .comment-form #comments-title{margin-left:-18px !important;float:left;display:block;width:100%;}
        .comment-creator{margin-left:-15px !important;}
        .comment-creator .comment-notes{padding-bottom:40px;}
        .comment-creator label{display:inline-block;width:140px;margin:0 0 20px 0;}
        .comment-creator input, .comment-creator textarea{padding:4px;border:1px solid rgba(0,0,0,.3);}
        .comment-creator textarea{width:70%;margin-left:4px;}
        .comment-creator .required{float:right;margin-right:4px;}
        .comment-creator #submit{padding:7px;margin:20px 0 0 495px;background:<?php _s('button-background-color');?>color:<?php _s('button-color');?>border:0;border-bottom:3px solid rgba(0,0,0,.3);}
        .comment-creator #submit:hover{background:<?php _s('button-hover-background-color');?>color:<?php _s('button-hover-color');?>}

        .with-sidebar .comment-creator{width:100% !important;}
        .comment-creator #submit{margin-left:0;float:right;margin-right:50px;}

       
        /* COMMENTS */
        .commentlist{list-style:none;}

        .comment .author-avatar{position:relative;border-radius:100px;border:4px solid <?php _s('topmenu-background-color');?>width:100px;height:100px;}
        .comment .author-avatar:after{content:'';position:absolute;bottom:35%;left:100px;display:block;width:0;height:0;border:.9em solid <?php _s('topmenu-background-color');?>border-color:transparent transparent transparent <?php _s('topmenu-background-color');?>}
        .comment .author-avatar img{border-radius:100px;}
        .comment .comment-content p, .comment .comment-content ul, .comment .comment-content ol, .comment .comment-content h1,.comment .comment-content h2,.comment .comment-content h3{padding-bottom:20px;}

        .comment .children{list-style:none;}
        .comment .children .author-avatar{margin-left:-20px;}
        .comment .children .children .author-avatar{margin-left:-60px;}
        .comment .children .author-avatar{width:80px;height:80px;border:4px solid <?php _s('body-background-color');?>}
        .comment .children .author-avatar:after{left:80px;border-size:.5em;bottom:32%;border-color:transparent transparent transparent <?php _s('body-background-color');?>}

        .with-sidebar .author-avatar{margin-left:-30px;}
        .with-sidebar .children .author-avatar{margin-left:-50px;}
        .with-sidebar .children .children .author-avatar{margin-left:-90px;}

        .comment{margin:0 0 60px 0;}
        .comment strong.fn{font-size:<?php set_font_size( $style['p-font-size'], '+2');?>;width:100%;display:block;padding-bottom:10px;}
        .comment strong.fn a{padding:4px;background:rgba(0,0,0,.04);text-decoration:none;border-radius:<?php _s('border-radius');?>}
        .comment strong.fn a:hover{background:<?php _s('body-background-color');?>color:<?php _s('container-background-color');?>text-shadow:1px 1px 1px rgba(0,0,0,.3);}

        .comment .comment_date{padding-bottom:20px;display:block;font-style:italic;}
        .comment .comment-content{<?php borderbox();?>background:#fff;padding:20px;margin:-5px;border:1px solid rgba(0,0,0,.2);box-shadow:0 0 4px rgba(0,0,0,.3);<?php transition();?>}

        .comment-content:hover{box-shadow:none;}
        .logged-in-as{padding:20px 0 20px 0;}
        .logged-in-as a{padding:4px;background:rgba(0,0,0,.04);text-decoration:none;border-radius:<?php _s('border-radius');?>}
        .logged-in-as a:hover{background:<?php _s('body-background-color');?>color:<?php _s('container-background-color');?>text-shadow:1px 1px 1px rgba(0,0,0,.3);}

        .tag-links a{padding:4px;background:rgba(0,0,0,.04);text-decoration:none;border-radius:<?php _s('border-radius');?>}
        .tag-links a:hover{background:<?php _s('body-background-color');?>color:<?php _s('container-background-color');?>text-shadow:1px 1px 1px rgba(0,0,0,.3);}

        .comment .edit-link{float:right;margin:-10px 0 0 0;}
        .comment .edit-link a{padding:4px;background:rgba(0,0,0,.04);text-decoration:none;border-radius:<?php _s('border-radius');?>}
        .comment .edit-link a:hover{background:<?php _s('body-background-color');?>color:<?php _s('container-background-color');?>text-shadow:1px 1px 1px rgba(0,0,0,.3);}

        .comment .reply{width:100%;margin:20px 0 0 0;}
        .comment .reply a{display:block;text-decoration:none;width:100%;text-align:center;padding:4px 0 4px 0;background:rgba(0,0,0,.05);border-radius:<?php _s('border-radius');?>}
        .comment .reply a:hover{background:<?php _s('body-background-color');?>color:<?php _s('container-background-color');?>text-shadow:1px 1px 1px rgba(0,0,0,.3);}

    <?php endif;?>


    <?php if( cuisine_has_plugin('chef-navigation' ) ):?>

        .chef_navigation{list-style:none;text-align:center;padding-left:40px;margin-top:-40px;}
        .chef_navigation li{display:inline-block;margin:0 10px 0 10px;}
        .chef_navigation li span, .chef_navigation li a{padding:5px 10px 5px 10px;display:block;}
        .chef_navigation li a{background:rgba(0,0,0,.04);text-decoration:none;}
        .chef_navigation li a:hover{background:<?php _s('body-background-color');?>color:<?php _s('container-background-color');?>text-shadow:1px 1px 1px rgba(0,0,0,.3);}


    <?php endif;?>


    <?php if( cuisine_has_plugin( 'chef-gallery' ) ):?>

        .gallery-row{margin-bottom:30px;}

        .gallery-thumb{position:relative;cursor:hand;cursor:pointer;background:#fff;}
        .gallery-thumb .gallery-title{font-size:24px;color:#fff;text-shadow:1px 1px 2px #111;position:absolute;bottom:10%;width:100%;text-align:center;font-weight:bold;}
        .gallery-thumb .gallery-icon{font-size:15em;color:#fff;text-shadow:0 0 10px rgba(0,0,0,.6);position:absolute;top:25%;width:100%;text-align:center;font-weight:normal;opacity:0;text-decoration:none;}

        .gallery-thumb img{box-shadow:0 0 3px rgba(0,0,0,.3);width:96%;padding:2%;background:#fff;}
        .gallery-thumb, .gallery-thumb img, .gallery-thumb .gallery-icon{<?php transition();?>}
        .gallery-thumb:hover img{box-shadow:0 0 7px rgba(0,0,0,.6);background:#fff;}
        .gallery-thumb:hover .gallery-icon{opacity:1;}
        .gallery-thumb:hover{
            transform: scale(1.07) rotate(2deg);
            -ms-transform: scale(1.07) rotate(2deg);
            -webkit-transform: scale(1.07) rotate(2deg);
            -o-transform: scale(1.07) rotate(2deg);
            -moz-transform: scale(1.07) rotate(2deg);
        }


    <?php endif;?>

    <?php if( cuisine_has_plugin('chef-call-to-action' ) ):?>

        /* call-to-action: */
        .chef-call-to-action{width:100%;padding:20px;position:relative;margin-bottom:40px;<?php borderbox();?>;}
        .chef-call-to-action p, .chef-call-to-action a{display:inline;}
        .chef-call-to-action p strong{padding-right:10px;}
        .chef-call-to-action p{display:inline-block;vertical-align:center;margin:7.5px 0 0 0;}
        .chef-call-to-action .button{text-decoration:none;display:inline-block;vertical-align:center;float:right;}
            /* variables: */
            .chef-call-to-action{
                background-color:<?php echo $style['call-to-action-background-color'];?>;
                background-image:url("<?php echo $style['call-to-action-background-image'];?>");
                background-repeat:<?php echo $style['call-to-action-background-repeat'];?>;
                color:<?php echo $style['call-to-action-color'];?> !important;
                border-radius:<?php echo $style['border-radius'];?>;
            }
            .chef-call-to-action p, .chef-call-to-action a, .chef-call-to-action strong, .chef-cta-text{
                font-family:<?php echo $style['call-to-action-font-family'];?> !important;
                font-size:<?php echo $style['call-to-action-font-size'];?> !important;
                color:<?php echo $style['call-to-action-color'];?> !important;
            }
            .chef-call-to-action .button{
                background-color:<?php echo $style['call-to-action-button-background'];?>;
                color:<?php echo $style['call-to-action-button-color'];?> !important;
                border-radius:<?php echo $style['border-radius'];?>;
            }
            .chef-call-to-action .button:hover{
                background-color:<?php echo $style['call-to-action-button-hover-background'];?>;
                color:<?php echo $style['call-to-action-button-hover-color'];?> !important;
            }


    <?php endif;?>


    <?php if( cuisine_has_plugin('chef-slider' ) ):?>

        .row-fluid.slider{max-height:420px;position:absolute;z-index:-1;}
        .chefslider{width:100%;position:relative;display:block;}
        .chefslider .slides{position:absolute;top:0px;left:0;z-index:1;margin:0;padding:0;width:100%;display:block;list-style:none;}
        .chefslider .flex-control-nav{position:absolute;bottom:20px;left:0;z-index:2;margin:0;padding:0;list-style:none;}
        .chefslider .flex-control-nav li{float:left;}
        .chefslider .flex-direction-nav{position:absolute;display:block;top:40px;left:0;z-index:3;margin:0;padding:0;list-style:none;}

        .chefslider .slides li{width:100%;margin:0;}
        .chefslider .chef-slider-image{max-width:100%;width:100%;display:block;;}
        .chefslider .slide{position:relative;}
        .chefslider .slide .slide-content{width:auto;position:absolute;bottom:103px;left:50%;margin-left:30%;background:rgba(0,0,0,.6);padding:20px;<?php borderbox();?>;border-bottom:3px solid <?php _s('topmenu-background-color');?>}
        .chefslider .slide .slide-content h2{color:#fff;}

    <?php endif;?>


    <?php if( cuisine_has_plugin( 'chef-breadcrumbs' ) ):?>

        .breadcrumbs{background:<?php _s('topmenu-background-color');?>padding:20px;<?php borderbox();?>;border-top-left-radius:<?php _s('border-radius');?>border-top-right-radius:<?php _s('border-radius');?>}
        .breadcrumbs a, .breadcrumbs p{font-size:<?php set_font_size( $style['p-font-size'], '+2');?>;display:inline-block;padding:6px;border-radius:<?php _s('border-radius');?>}
        .breadcrumbs a{color:#f7f7f7;text-decoration:none;}
        .breadcrumbs a:hover{color:#111;background:#e28e7a;border-radius:<?php echo (int) $style['border-radius'] + 10;?>;}
        .breadcrumbs p{color:#aaa;}
        .breadcrumbs .breadcrumb-seperator{color:#bbb;}

    <?php endif;?>


    /**
    *   Custom:;
    */
    
    <?php do_action( 'cuisine_current_stylesheet' );?>

<?php

    /**
    *   CSS INLINE FUNCTIONS:
    */

    function _s( $type ){

        global $style;
        echo $style[$type].';';

    }


    function borderbox(){
        echo '-moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box;';
    }

    function box_shadow($string, $trailinglinebreak = false){
        $css =  '-webkit-box-shadow:'.$string.';';
        $css .= '-moz-box-shadow:'.$string.';';
        $css .= 'box-shadow:'.$string.';';
        if($trailinglinebreak)
            $css .= "\n";
        echo $css;
    }


    function transition(){
        echo '-webkit-transition: all .3s ease; -moz-transition: all .3s ease; -ms-transition: all .3s ease; -o-transition: all .3s ease; transition: all .3s ease;';
    }

    function transitionnone(){
        echo '-webkit-transition:none; -moz-transition:none; -ms-transition:none; -o-transition:none; transition:none;';
    }

    function set_font_size( $size, $minmax = 0 ){

        $t = '+';

        $size = str_replace( 'px', '', $size );

        if($minmax != 0){
            $t = substr($minmax, 0, 1);
            $minmax = str_replace('+', '', str_replace('-', '', str_replace('*', '', str_replace('%', '', $minmax))));
        }

        if($t == '+'){
            $num = $size + $minmax;
        }else if($t == '-'){
            $num = $size - $minmax;
        }else if($t == '*'){
            $num = $size * $minmax; 
        }else if($t == '%'){
            $num = $size / $minmax;
        }       

        echo $num.'px';
    }

    function trimCss( $css ){
        return str_replace('; ',';',str_replace(' }','}',str_replace('{ ','{',str_replace(array("\r\n","\r","\n","\t",'  ','    ','    '),"",preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!','',$css)))));

    }

    $css = ob_get_clean();
    if( $cuisine->production_mode )
        $css = trimCss( $css );
    
    echo $css;?>