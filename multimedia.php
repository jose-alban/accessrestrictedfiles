<?php

//External Load of Wordpress
//Validate Session - Cookie
//Access to restricted files
//Play videos from restricted folder

if(isset($_COOKIE["_gid"])){
    define( 'WP_USE_THEMES', false );
    define( 'COOKIE_DOMAIN', false );
    define( 'DISABLE_WP_CRON', true );
    
    //require ('./wp-blog-header.php');
    require('../wp-load.php');

    get_header();

    if ( is_user_logged_in() ){
        $user =  wp_get_current_user();
        //print_r($user);
        //echo $user->user_nicename.'<br>';
        //echo $user->user_email.'<br>';
    }else{
        header("Location: /login/");
        die();
    }

    ?>

        <style>
            h1 {
                text-align: center; 
                font-size: 36pt; 
                color: #1b4379;
            }
            h1 span {
                color: #1b4379;
            }
            h2 {
                margin: 0px 0px 20px 0px;
                text-align: left; 
                text-transform: uppercase; 
                color: #808080; font-weight: 
                bold; font-size: 14pt;
            }
            h3 {
                font-size: 18pt; 
                color: #1b4379;
                text-transform: uppercase;
            }
            ul {
                margin: 0px 0px 40px 0px;
                padding: 0px;
                list-style: none;
            }
            input,
            input[type="submit"] {
                margin: 0px 0px 5px 0px;
                padding: 0px;
                background: none;
                color: #777;
                text-transform: none;
                white-space: normal;
                text-align: left;
            }
            input:hover,
            input[type="submit"]:hover {
                background: none;
                text-decoration: underline;
                color: #777;
                text-transform: none;
                white-space: normal;
                text-align: left;
            }
            video {
                margin: 0px 0px 30px 0px; 
            }

        </style>
        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12" id="content-col">
                                <h2>Bienvenido <?php echo $user->user_nicename ?></h2>
                                <h1><span>MULTIMEDIA DOWNLOAD</span></h1>
                                <h1><span>ONLINE EVENT 2020</span></h1>
                                <?php
                                        if (!empty($_POST)){
                                            if ( is_user_logged_in() ){
                                                $fileTitle='';
                                                $fileSource='';
                                                $videos = 11; //QTY of items +1
                                                for ($i=1; $i <$videos ; $i++) { 
                                                    if( isset($_POST['v'.$i]) ){
                                                        $fileTitle=htmlspecialchars($_POST['v'.$i], ENT_QUOTES);
                                                        $fileSource=htmlspecialchars($_POST['s'.$i], ENT_QUOTES);
                                                    }
                                                }
                                            }
                                            echo '<h3>'.$fileTitle.'</h3>';
                                            echo '<video controls autoplay>';
                                            echo '<source src="access.php?source='.$fileSource.'" type="video/mp4">';
                                            echo '</video>';
                                        }
                                ?>

                                <form method="post" action="multimedia.php">
                                    <div class="dia19">
                                        <h3>Videos del día 19</h3>
                                        <ul>
                                            <li><input type="submit" name="v1" value="1. Conference: ABC"><input type="hidden" name="s1" value="conference-abc"></li>
                                            <li><input type="submit" name="v2" value="2. Conference: DEF"><input type="hidden" name="s2" value="conference-def"></li>
                                            <li><input type="submit" name="v3" value="3. Conference: HIJ"><input type="hidden" name="s3" value="conference-hij"></li>
                                            <li><input type="submit" name="v4" value="4. Conference: 123"><input type="hidden" name="s4" value="conference-123"></li>
                                            <li><input type="submit" name="v5" value="5. Conference: 456"><input type="hidden" name="s5" value="conference-456"></li>
                                        </ul>
                                    </div>
                                    <div class="dia20">
                                        <h3>Videos del día 20</h3>
                                        <ul>
                                            <li><input type="submit" name="v6" value="1. Conference: AB12"><input type="hidden" name="s6" value="conference-ab12"></li>
                                            <li><input type="submit" name="v7" value="2. Conference: 9912"><input type="hidden" name="s7" value="conference-9912"></li>
                                            <li><input type="submit" name="v8" value="3. Conference: CD12"><input type="hidden" name="s8" value="conference-cd12"></li>
                                            <li><input type="submit" name="v9" value="4. Conference: EF99"><input type="hidden" name="s9" value="conference-ef99"></li>
                                            <li><input type="submit" name="v10" value="5. Conference: 1100"><input type="hidden" name="s10" value="conference-1100"></li>
                                        </ul>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </main><!-- #main -->
        </div><!-- #primary -->
    <?php

    get_footer();

}else{
    header("Location: /login/");
    die();
}