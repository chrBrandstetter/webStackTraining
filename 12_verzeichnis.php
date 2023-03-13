<?php
require("includes/common.inc.php"); //enthält die Funktion um Arrys anzuzeigen

function readDirectory(string $dir): void
{
    $content = scandir($dir); 
    //ta($content);
    echo("<ul>");
        foreach($content as $d)
        {
            if($d != "." && $d != ".."){
                if(is_dir($dir . $d)){
                    echo('<li class="dir">' . $d);
                   
                    //----------Recursion--------- Damit auch in ordnern nach ordern und files gesucht wird
                    readDirectory($dir . $d . "/");
                    //----------------------------
                    
                    echo('</li>');
                }
                else {   
                    if(is_file($dir . $d)){
                        echo('<li class="file">' . $d . '</li>');
				    }
				    else {
					    echo('<li class="link">' . $d . '</li>');
				    }
                }
            }
        }
    echo("</ul>"); 
}
?>

<!doctype html>
<html lang=de>
    <head>
        <title>Verzeichnis (anzeige durch Rekursion)</title>
	    <meta charset="utf-8">
		<link rel="stylesheet" href="css/common.css">
        <style>
		.dir {
			font-weight:bold;
		}
		.file {
			font-weight:normal;
			font-style:italic;
		}
		.link {
			color:green;
		}
		</style>
    </head>
    <body>
        <?php
            readDirectory("./"); 
        ?>
    </body>
</html>