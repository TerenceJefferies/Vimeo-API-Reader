<!DOCTYPE html>
<html>
    
    <head>
        
        <title>Example usage of the vimeo simple API reader class</title>
        
    </head>
    <body>
    
        <?php

            include 'class/vimeo.php';

            $vimeo = new vimeo('jamesewen');
            
            echo '<h1>Do you like my video?</h1>';
            
            echo ($vimeo -> userLikesVideo(35726901)) ? 'Yes! You do! Thanks!' : 'No, You don&#39;t! Why not?!';

        ?>
        
    </body>
    
</html>