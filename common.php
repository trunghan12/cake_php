<?php
    function addNew($table,$data){
        global $conn;
        if(is_array($data)){
            $field="";
            $val="";
            $i = 0;
            foreach($data as $key=>$value){
                if($key!="addNew"){
                    $i++;
                    if($i==1){
                        $field .= $key;
                        $val .= "'".$value."'";
                    }else{
                        $field .=",".$key;
                        $val .= ",'".$value."'";
                    }
                }
            }
        }
        $sqlInsert = "INSERT INTO $table($field)";
        $sqlInsert .= "values($val)";
        mysqli_query($conn, $sqlInsert) or die("Lỗi câu lệnh thêm mới");
    }
?>