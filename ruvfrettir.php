<?php
date_default_timezone_set("GMT");
$year = date("Y");
$month = date("m");
$day = date("d");

if ($day < 0) { if ($month < 0){ $year = $year -1; } else { $month = $month - 1; }}else { $day = $day - 1;}

$daybefore = $year.$month.$day;

        function getRuvFrettirLink($date) {

                $file = "http://ruv.is/sarpurinn/ruv/frettir/".$date; 
                header('Content-Type: text/plain');
                $contents = file_get_contents($file);
                $pattern = "/(\w+\.mp[34])/";
                if(preg_match_all($pattern, $contents, $matches)){
                   $fullurl = "http://smooth.ruv.cache.is/opid/".$matches[0][0];
                  return $fullurl;
                }
                        else{
                           echo "No matches found";
                        }

                                }
echo getRuvFrettirLink($daybefore);

?>
