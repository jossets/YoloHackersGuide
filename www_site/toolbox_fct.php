<?php 


    function print_entry($exploit) {  
        global $Parsedown;
        global $LANG;
       
        $id = $exploit['id'];
        $title = $exploit['title'];
        $desc = $exploit['desc'];

        if ($LANG!="fr") {
            if (isset($exploit['title_en'])&&(trim($exploit['title_en'])!="")) {
                $title = $exploit['title_en'];
            }
            if (isset($exploit['desc_en'])&&(trim($exploit['desc_en'])!="")) {
                $desc = $exploit['desc_en'];
            }
        }
?>
        <div class="row border-map-normal map-color-back-transparent target-panel" style="margin-left: 15px; margin-right: 15px; margin-bottom: 10px; margin-top: 10px;">
           <div class="col-sm-12 map-color-text font-weight-bold " style="margin-bottom: 10px;">
				<a href="toolbox.php?id=<?php echo $id;?>" ><?php echo $title;?></a>
			</div>
				
				<div class="col-sm-12 map-color-text "><?php                 
                if ($exploit['desc_enc'] != "html") {
                    $desc = $Parsedown->text($desc);
                }
                echo $desc;
            ?></div>
           <?php
           
           /* To Do:  LAB
           if (isset($exploit['chall'])) {
                print_chall_by_id($exploit['chall']);
           }
           if (isset($exploit['chall2'])) {
                print_chall_by_id($exploit['chall2']);
            }
            if (isset($exploit['chall3'])) {
                print_chall_by_id($exploit['chall3']);
            }
			*/
           ?>
        </div>
    
<?php  } 

    function print_entry_hints($exploit) {
        $hint_entries[]="hint";
        $hint_entries[]="hint_0";
        $hint_entries[]="hint_1";
        $hint_entries[]="hint_2";
        $hint_entries[]="hint_3";
        $hint_entries[]="hint_4";
        $hint_entries[]="hint_5";
        $hint_entries[]="hint_6";
		$hint_entries[]="hint_7";
		$hint_entries[]="hint_8";
		$hint_entries[]="hint_9";
		$hint_entries[]="hint_10";
		
              // Hints   
        foreach ($hint_entries as $hint_entry) {
          if ($exploit[$hint_entry]) {
            $desc = $exploit[$hint_entry];
            $id = 'hint_'.$exploit['id'].'_'.$hint_entry;
            print '<div class="row chall-desc bg-light">';
            print '<div class="col-md-auto text-left">  <label for="usr">Indice:</label>  </div>
            <div class="col text-left"><label id="'.$id.'"  style="display: none;" >'.$exploit[$hint_entry].'</label></div>
            <div class="col-2 text-right"><button type="Button" class="btn btn-primary" onclick="$(\'#'.$id.'\').toggle();">Afficher</button></div>';
            print "</div>";
            
          }
        }
        
    }


    function print_content() {
        global $exploit_files;
        global $LANG;
        foreach ($exploit_files as $filename) {
            $to_print=null;
            $exploits = parse_ini_file($filename, true);
            
            //
            // Filter content to print

            foreach($exploits as $exploit) {
                //print_r($exploit);
                // Search : ?id=a,b,c,d
                if ($_GET['id']) {
                    if ($_GET['id']!="") {
                        $ids=explode(",",$_GET['id']);
                        foreach($ids as $id){
                            if (($exploit['id']===$id)) {
                                $to_print[]=$exploit;
                            }
                        }
                    } else {
                        $to_print[]=$exploit;
                    }
                } else if ($_GET['cat']) {
                    if ($_GET['cat']!="") {
                        $ids=explode(",",$_GET['cat']);
                        foreach($ids as $id){
                            if (($exploit['category']===$id)) {
                                $to_print[]=$exploit;
                            }
                        }
                    } else {
                        $to_print[]=$exploit;
                    }
                } else {
                    $to_print[]=$exploit;
                }
            } 




            // Print content

            if ($to_print ) {
                if ($exploits['Intro'] ) {
                    $intro = $exploits['Intro'];
                    $title=$intro['title'];
                    if ($LANG!="fr") {
                        if (isset($intro['title_en'])&&(trim($intro['title_en'])!="")) {
                            $title=$intro['title_en'];
                        }
                    }
                    if ($title) {
                        print('
                        <div class="row no-border  my-4 map-color-bg-normal map-color-text pl-1">
                        <h4 class="my-vertical-centered" id="chapter_'.str_replace(' ', '_', $title).'">'.$title.'
                        </h4>
                        </div>
                        ');
                    }
                }
                
                foreach($to_print as $exploit) {
                    if (($exploit['id']!='intro')&&($exploit['id']!='section')) {
                        print_entry($exploit);
                        print_entry_hints($exploit);
                    }
                    if ($exploit['id']=='section') {
                        $title=$exploit['title'];
                        if ($LANG!="fr") {
                            if (isset($exploit['title_en'])&&(trim($exploit['title_en'])!="")) {
                                $title=$exploit['title_en'];
                            }
                        }
                        print('
                            <div class="my-section row no-border my-4  map-section map-color-text pl-1"><h4 class="my-vertical-centered" id="section_'.str_replace(' ', '_', $title).'">'.$title.'</h4></div>
                            ');
                    }
                } 
            }
        }
    }

    function print_menu_entries() {
        global $exploit_files;
        global $LANG;
        foreach ($exploit_files as $filename) {
            $exploits = parse_ini_file($filename, true);
            if ($exploits['Intro'] ) {
                $intro = $exploits['Intro'];
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
?>