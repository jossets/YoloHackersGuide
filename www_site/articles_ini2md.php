<?php 

print ("Parsing 'Articles'");
include 'articles/articles.php';


function format_md($txt)
{
	$ret = $txt;
	$ret = str_replace("<pre><code>", "```\n", $ret);
	$ret = str_replace("</code></pre>", "```\n", $ret);
	return $ret;
}

function get_entry_with_lang($exploit, $entry, $lang, $defaultlang="fr") {
	if (isset($exploit[$entry."_".$lang])) {
		return $exploit[$entry."_".$lang];
	}
	if (isset($exploit["$entry$lang"])) {
		return $exploit["$entry$lang"];
	}
	//if ($lang===$defaultlang) {
		if (isset($exploit["$entry"])) {
			return $exploit["$entry"];
		}
	//}
	return "";
}

/*		
[Intro]
id=intro
category=Forensic
title=Forensic
title_en="Forensic"
desc="
"
*/
/*
function process_intro($exploit, $lang)
{
	$content="";
	$content = $content."<!--- id: ".get_entry_with_lang($exploit, 'id', $lang)." --->\n";
	$content = $content."<!--- category: ".get_entry_with_lang($exploit, 'category', $lang)." --->\n";
	$content .= "# ".get_entry_with_lang($exploit, "title", $lang)."\n";
	$content .= "".format_md(get_entry_with_lang($exploit, "desc", $lang))."\n";
	return $content;
}
*/
/*

[zip]
id=zip
category=Forensic
keywords=
title=Zip chiffré
title_en="Encrypted Zip"
desc="xxxxx"
desc_en="xxxxx"
*/
function process_entry($exploit, $lang)
{
	$content="";
	$content = $content."\n\n<!--- category: ".get_entry_with_lang($exploit, 'category', "")." --->\n";
	$content = $content."<!--- id: ".get_entry_with_lang($exploit, 'id', "")." --->\n";
	$content = $content."<!--- title: ".get_entry_with_lang($exploit, 'title', $lang)." --->\n";
	$content = $content."<!--- keywords: ".get_entry_with_lang($exploit, 'keywords', "")." --->\n";
	$content .= "## ".get_entry_with_lang($exploit, "title", $lang)."\n";
	$content .= "".format_md(get_entry_with_lang($exploit, "desc", $lang))."\n";
	return $content;
}

function process_entry_generic($exploit, $lang)
{
	$content="";
	foreach($exploit as $entry => $val) {
		// Generic field
		$line= ("<!--- $entry: $val --->");
		print($line."\n");
		$content = $content."$line\n";
		// Entry
	}
	return $content;
}
function process_files_ini($lang="") {
	global $exploit_files;	
	
	
	// Parse ini files
	foreach ($exploit_files as $filename) {
		print ("Ini File: $filename<br/>");		
		$exploits = parse_ini_file($filename, true);
		$content="";
		foreach($exploits as $exploit) {
			//if ($exploit['id']==="intro") {
			//	$content = $content.process_intro($exploit, $lang);				
			//} else {
				$content = $content.process_entry($exploit, $lang);	
			//}			
		}
		$filename_md = str_replace(".txt",".md", $filename);
		
		if (strlen($lang)==0) $lang="fr";
		$filename_md = str_replace("articles","articles/$lang", $filename_md);
		file_put_contents($filename_md, $content);	
	}
}



function process_articles() {
	if (!file_exists('articles/fr/')) {
		print('Create dir: articles/fr<br/>');
		mkdir('articles/fr/');
	}
	process_files_ini(""); // fr 
	
	if (!file_exists('articles/en/')) {
		print('Create dir: articles/en<br/>');
		mkdir('articles/en/');
	}
	process_files_ini("en");
}

process_articles();

?>