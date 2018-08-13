<?php
/**
* get the date difference between two dates
* @param string $firstDate (expected format yyyy-mm-dd)
* @param string $lastDate (expected format yyyy-mm-dd)
* @throws Exception
* @return string
*/
function getDateDifference($firstDate, $lastDate = '')
{
    $datePattern = '/^[0-9]{4}-([0][1-9]|[1][0-2]|[1-9])-([1-9]|[0][1-9]|[1][0-9]|[2][0-9]|[3][0-1])$/';

    if(!preg_match($datePattern, $firstDate)) {
        throw new Exception('First date seems to be incorrect');
    }

     if(!empty($lastDate) && (($lastDate <= $firstDate)
               || !preg_match($datePattern, $firstDate))) {
        throw new Exception('last date seems to be incorrect');
    }

    $firstDate = new DateTime($firstDate);
    $lastDate = new DateTime($lastDate);
    $dateDiff = $lastDate->diff($firstDate);
    
    return $dateDiff;
}

//use the function
try {
    $firstDate = '2012-05-08';
    $date = getDateDifference($firstDate);
    echo $date->y . " year(s) ". $date->m . " month(s) " . $date->d ." day(s) ". $date->h ." hour(s) " . $date->i . " min(s) " . $date->s ." sec(s)";
}catch(Exception $e) {
    echo $e->getMessage();
}
