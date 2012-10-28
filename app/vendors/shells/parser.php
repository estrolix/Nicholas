<?php

define(FILES, 'c:/projects/nikolaos/csvlists/');

class ParserShell extends Shell
{
    var $uses = array('Street', 'Child');
    
    function main(){

        Configure::write('debug', 0);

        $children = file(FILES . '5.txt');
        foreach($children as $child_str){
            $child_arr = explode(';', $child_str);

            foreach($child_arr as &$val) {
                $val = trim($val);
            }

            $child['first_name'] = $child_arr[2];
            $child['last_name'] = $child_arr[1];
            $child['third_name'] = $child_arr[3];
            $child_arr[5] = empty($child_arr[5]) ? '01' : $child_arr[5];
            $child['notes'] = '';
            if(empty($child_arr[4])){
                $child_arr[4] = '01';
                if(empty($child['notes']))
                    $child['notes'] .= "Дата народження не вказана. \n";
            }
            if(empty($child_arr[5])){
                $child_arr[5] = '01';
                if(empty($child['notes']))
                    $child['notes'] .= "Дата народження не вказана. \n";
            }
            if(empty($child_arr[6])){
                $child_arr[6] = '2011';
                if(empty($child['notes']))
                    $child['notes'] .= "Дата народження не вказана. \n";
            }
            $child['birthday'] = $child_arr[6] . '-' . $child_arr[5] . '-' . $child_arr[4];
            $street = explode('.', $child_arr[7]);
            $street = $street[count($street) - 1];
            $street = explode(' ', trim($street));
            $street = $street[count($street) - 1];
            $caught = $this->Street->find('first', array('conditions' => array('title LIKE' => '%' . trim($street) . '%')));
            if(!empty($caught)){
                unset($child_arr[7]);
                $child['street_id'] = $caught['Street']['id'];
            }
            else{
                $child['street_id'] = 555; //not found
                $child['street'] = $child_arr[7];
            }
            $child['house'] = !empty($child_arr[8]) ? $child_arr[8] : null;
            $child['flat'] = !empty($child_arr[9]) ? $child_arr[9] : null;
            if(empty($child_arr[9]))
                $child['private_house'] = 1;
            $child['phone'] = $child_arr[10];
            $child['edu_place'] = $child_arr[11];
            $child['category_id'] = 1;
            $child['source_id'] = 1;
            $child['category'] = $child_arr[12];
            $child['notes'] .= $child_arr[13];
            $child['gender'] = trim($child_arr[14]) == 'хлопчик' ? 'm' : 'f';
            $new_child = array();
            foreach($child as $key => $fields){
                $new_child[$key] = str_replace('#', ',', $fields);
            }
            $this->Child->create();
            if($this->Child->save(array('Child' => $new_child), false))
                echo "save (".$child_arr[0].")\n";
            else
            {

                echo "not save (".$child_arr[0].")\n";
                //debug($new_child);
            }
            unset($new_child);
            unset($child);
        }
    }    
}

?>