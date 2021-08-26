<?php 

print ("Parsing 'Articles/*.md'<br/>");


function msg_error($msg) {
	print ("<div style='color: red;'>ERROR: $msg</div>");
}

function is_field($txt, $field) {
	return (str_starts_with($txt, "<!--- $field:"));
}

function extract_field($txt, $field) {
	$val="";
	if (str_starts_with($txt, "<!--- $field:")) {		
		if (preg_match("<!--- $field\: (.+) --->", $txt, $m )) {
			$val = $m[1];
		}
		//print("field found: [$category]<br/>"); 
		if (strlen($val)==0) {
			msg_error("Field '$field' null");
		}			
	}
	return $val;		
}

function process_file_md($exploits, $file) {	
	print("<b>Process: $file</b><br/>"); 
	$contents = file_get_contents("$file");
	$lines = preg_split("/((\r?\n)|(\r\n?))/", $contents);
	
	// Process each line
	$category="";
	$id="";
	$content="";
	foreach($lines as $line){
		$l = trim($line);
		if (str_starts_with($l, "<!---")) {
			
			// Comment after content ?
			if (strlen($content)>0) {
				print ("Adding: $category - $id<br/>");
				if (isset($exploits[$category."-".$id])) {
					msg_error("Id duplicate: ".$category."-".$id);
				} else {			
					//print($id."<br/>"); 
					$exploit = array();					
					$exploit["category"]=	$category;	
					$exploit["id"]=	$id;	
					$exploit["title"]=	$title;	
					$exploit["desc"]=	$content;	
					
					$exploits[$category."-".$id] = $exploit;
				}
				
				$category="";
				$id="";
				$title="";
				$content="";
			} 
			
			// Comment: category, id
			if (is_field($l, "id")) {				
				$id=extract_field($l, "id");
			} 
			if (is_field($l, "category")) {				
				$category=extract_field($l, "category");
			} 
			if (is_field($l, "title")) {				
				$title=extract_field($l, "title");
			} 
		} else {
			$content .= $l."\n";
		}
	}
	// Last entry ?
	if (strlen($content)>0) {
		print ("Adding: $category - $id<br/>");
		if (isset($exploits[$category."-".$id])) {
			msg_error("Id duplicate: ".$category."-".$id);
		} else {			
			//print($id."<br/>"); 
			$exploit = array();
			$exploit["category"]=	$category;	
			$exploit["id"]=	$id;	
			$exploit["title"]=	$title;	
			$exploit["desc"]=	$content;	
			$exploits[$category."-".$id] = $exploit;		
		}
		$content="";
	} 
	print("<br/>"); 	
	return $exploits;
}



function process_articles_dir_md($exploits, $dir, $lang) {
	$files = glob("$dir/$lang/*.md");
	foreach($files as $file) {
	  $exploits = process_file_md($exploits, $file);
	}
	return $exploits;
}

function add_translated_content($exploits, $exploits_lang, $lang)
{
	foreach($exploits_lang as $entry) {
		$index = $entry['category']."-".$entry['id'];
		if (isset($exploits[$index])) {
			$exploits[$index]["title_$lang"] = $entry['title'];
			if (isset($entry['desc'])) $exploits[$index]["desc_$lang"] = $entry['desc'];
		} else {
			msg_error("Merge index not found: $index");
		}
	}
	return $exploits;
}


function process_articles_md() {
	$exploits_fr = null;
	$exploits_fr = process_articles_dir_md($exploits_fr, "articles", "fr");
	$phpcode_fr = var_export($exploits_fr, true);
	file_put_contents("articles/fr/articles_fr.php", "<?php\n".'$exploits_fr='."n".$phpcode_fr.";\n?>");	
	
	$exploits_en = null;
	$exploits_en = process_articles_dir_md($exploits_en, "articles", "en");
	$phpcode_en = var_export($exploits_en, true);
	file_put_contents("articles/en/articles_en.php", "<?php\n".'$exploits_en='."\n".$phpcode_en.";\n?>");
	
	
	$exploits=  add_translated_content($exploits_fr, $exploits_en, "en");
	$phpcode = var_export($exploits, true);
	file_put_contents("articles/articles_all.php", "<?php\n".'$exploits_all='."\n".$phpcode.";\n?>");
	
	return $exploits;
}

function print_menu_entries($exploits, $LANG) {
	foreach ($exploits as $exploit) {
		if (($exploit['id'])=="intro") {
			//var_dump($exploit);
			$intro = $exploit;
			$title=$intro['title'];
			if ($LANG!="fr") {
				if (isset($intro['title_en'])&&(trim($intro['title_en'])!="")) {
					$title=$intro['title_en'];
				}
			}
			if ($title) {
				print('
				<li class="nav-item !active">
					<a class="nav-link" href="?cat='.$intro['category'].'">'.$title.'</a>
				</li>
				');
			}
		}
	}
}
	
	
$exploits = process_articles_md();
print_menu_entries($exploits, "fr");
print_menu_entries($exploits, "en");
?>