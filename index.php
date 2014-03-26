<?
// USER OPTIONS DEDFINED HERE

$single_gallery = "no"; // if its just 1 folder put "yes" if you want multiple folders put "no" 
$dir = "img/"; 			//folder with images
$height ="196px"; 		//image height on page its displayed in full in lightbox must in in pixels
$width ="320px";		//image width on page its displayed in full in lightbox must in in pixels
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head> 
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> 
	<title>Gallery</title> 
    <link href="css/css.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="js/prototype.js"></script>
    <script type="text/javascript" src="js/scriptaculous.js?load=effects,builder"></script>
    <script type="text/javascript" src="js/lightbox.js"></script>
    </head>

<?

if ($single_gallery == "yes")
{

	//open directory
	if ($opendir = opendir($dir));
	{
		
	//Show images dir
		while (FALSE !== ($file = readdir($opendir)))
		{   
			if ($file!="."&&$file!="..") 
			{
				echo "<div class='imgwraper'>";
				echo"<a href='$dir$file' rel='lightbox[gallery]' title='$filename'>";
				echo "<img src='$dir$file' alt='' width='$width' height='$height'/>";
				echo"</a>";
				echo "<div class='name_box'>";
				echo current(explode('.', $file));
				echo "</div>";
				echo "</div>";
			}
		}
		closedir($opendir);	
	}
}

else
	{
		if ($_GET["gallery"] == "")
		//show gallery list
		{
			//open directory
					if ($opendir = opendir($dir));
					
					{
						
					//Show gallery list
					echo "<div class='imgwraper'>";
					echo "Galleries";
					echo "</div>";
					echo "<br /><br />";
						while (FALSE !== ($file = readdir($opendir)))
						{   
							if ($file!="."&&$file!="..") 
							{
								echo "<div class='imgwraper'>";
								echo "<a href='?gallery=$file'>";
								echo current(explode('.', $file));
								echo "</a>";
								echo "</div>";
							}
						}
						closedir($opendir);
					}
		}
		else
			{
				$gallery = $_GET["gallery"];
					$dir = $dir.$gallery."/";
				//open directory
					if ($opendir = opendir($dir));
					
					{
						
					//Show images dir
						while (FALSE !== ($file = readdir($opendir)))
						{   
							if ($file!="."&&$file!="..") 
							{
								echo "<div class='imgwraper'>";
								echo"<a href='$dir$file' rel='lightbox[gallery]' title='$filename'>";
								echo "<img src='$dir$file' alt='' width='$width' height='$height'/>";
								echo"</a>";
								echo "<div class='name_box'>";
								echo current(explode('.', $file));
								echo "</div>";
								echo "</div>";
							}
						}
						closedir($opendir);	
					}
			}
	}
?>