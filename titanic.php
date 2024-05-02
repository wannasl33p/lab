<?php
  $age = $_GET['age'];
  $name =  $_GET['name'];
 print "список пассажиров";
 if ($age != null) {
    print "\t c возрастом \t" . $age . "\t лет \t" ;
}
if ($name != null) {
    print "\t c именем \t" . $name;
}
echo "<br>";
$file = 'titanic.csv';
$row = 1;
$num =8;
if (($handle = fopen("titanic.csv", "r")) !== FALSE) {
    echo "<br>";
    fgetcsv($handle);
    echo "Survived?,Pclass,Name,Sex,Age,Siblings/Spouses Aboard,Parents/Children Aboard,Fare<br><br>";
   while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
    
       if(stripos($data[2], "$name") !== false && $data[4] == $age&&$name != null&&$age != null){
        if ($data[0]==1) {
            echo "Survived \t";     
        }
        else echo "Didnt Survive \t";
        for ($c=1;$c<$num;$c++){
            echo "\t|" . $data[$c] . "\t";
        }
        echo "<br>"."_____________________________________________________"."<br>";
       }
       else if ($name !=null && strpos($data[2], $name) !== false && $age == null) {
        if ($data[0]==1) {
            echo "Survived \t";     
        }
        else echo "Didnt Survive \t";
        for ($c=1;$c<$num;$c++){
            echo "\t|" . $data[$c] . "\t";
        }
        echo "<br>"."_____________________________________________________"."<br>";
       }
       else if ($age !=null&& $data[4] == $age&&$name == null){
        if ($data[0]==1) {
            echo "Survived \t";     
        }
        else echo "Didnt Survive \t";
        for ($c=1;$c<$num;$c++){
            echo "\t|" . $data[$c] . "\t";
        }
        echo "<br>"."_____________________________________________________"."<br>";
       }
       else if ($name ==null &&$age ==null){
       if ($data[0]==1) {
            echo "Survived \t";     
        }
        else echo "Didnt Survive \t";
        for ($c=1;$c<$num;$c++){
            echo "\t|" . $data[$c] . "\t";
        }
        echo "<br>"."_____________________________________________________"."<br>";
       }
   }

}
?>