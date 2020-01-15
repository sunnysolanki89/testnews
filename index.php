<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<?php 
	$API_key    = '94b64e7645434a8d9e9bab4382a8e442';
	$selected = $_POST['newsType'];	
	if($selected==''){
	$selected='everything';		
	}
	//$maxResults = 10;

	//$url = 'https://newsapi.org/v2/everything?q=bitcoin&from=2019-12-13&sortBy=publishedAt&apiKey=94b64e7645434a8d9e9bab4382a8e442';

	//create a new cURL resource
	//$ch = curl_init($url);





	//$newsList = json_decode(file_get_contents($url), true);

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_URL, 'https://newsapi.org/v2/'.$selected.'?q=bitcoin&apiKey='.$API_key.'');
	$result = curl_exec($ch);
	curl_close($ch);
	$obj = json_decode($result);
	//echo $obj->title;	

	?>
	<div id="output"></div>

	<form action="http://localhost/news/" method="post"> 
	    <div id="select">
	    <select name="newsType" >
	    		<option value="top-headlines">Top Headlines</option>
	    		<option value="everything">Everything</option>
	    </select>
	    <button>Submit</button>	   
	    </div>
	    </form>

	

	<?php

foreach($obj->articles as $key=>$item){
    //Embed video
    if(isset($item)){    	
    	echo '<a href="detail.php?id='. $key .'">' . $key . $item->author . '</a>';    	
    ?>
    <pre>	
    <?php
       
    print_r($key);
    //print_r($item );
     ?>
    </pre>
    <?php	
          
    }
}



	 ?>
	


	
</body>
</html>