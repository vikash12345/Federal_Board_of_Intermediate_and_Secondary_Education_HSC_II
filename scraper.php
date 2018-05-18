<?
// This is a template for a PHP scraper on morph.io (https://morph.io)
// including some code snippets below that you should find helpful
//  Roll No Start   - >	300001 
//  Roll No End	    - >	300001 
//  PDF Link	    - > https://www.fbise.edu.pk/notifications/hssc/HSSC-I-A%202017%20Gazette.pdf
//  search url    - > https://www.fbise.edu.pk/res-hssc-II.php
/*
Created by 		Vikash 
Date of Creation 	4/28/2018
Email 			vikashbaria4@gmail.com
skype			vikashharjeewan2@Hotmail.com
Expert in web Scraping,Web automation,Investigation research and databases,
*/
require 'scraperwiki.php';
require 'scraperwiki/simple_html_dom.php';
for($page = 568671;$page <= 597006; $page++)
	{
		$link	=	'https://www.fbise.edu.pk/linkrollno-hssc-11.php?roll_no='.$page;
		echo 	"$page\n";
		$browser	=	file_get_html($link);
		if($browser)
		{
			$nameofresult		=	$browser->find("//*[@id='item']/table[1]/tbody/tr/td/font/b",0)->plaintext;
			$rollno 		=	$browser->find("//*[@id='item']/table[2]/tbody/tr[1]/td[2]",0)->plaintext;
			$name			=	$browser->find("//*[@id='item']/table[2]/tbody/tr[2]/td[2]",0)->plaintext;
			$fname 			=	$browser->find("//*[@id='item']/table[2]/tbody/tr[3]/td[2]",0)->plaintext;
			$result			=	$browser->find("//*[@id='item']/table[2]/tbody/tr[4]/td[2]",0)->plaintext;
			$remarks		=	$browser->find("//*[@id='item']/table[2]/tbody/tr[5]/td[2]",0)->plaintext;
      
      
      $record = array( 'rollno' =>$rollno, 
		   'nameofresult' => $nameofresult,
		   'name' => $name, 
		   'fname' => $fname, 
		   'result' => $result, 
		   'remarks' => $remarks, 
		    'link' => $link);
						
						
           scraperwiki::save(array('rollno','nameofresult','name','fname','result','remarks','link'), $record);
				
      
		}
		
	}
?>
