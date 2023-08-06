<?php
class Calendar{
	private $defYear;
	private $defMonth;
	private $defMonthInt;
	private $defMonthAbr;
	private $cusMonth;
	private $cusYear;
	private $year;
	private $x;
	private $monthInt;
	private $month;
	private $defDate;
	private $fDay;
	private $day;
	private $days;
	private $today;
	private $cCount;
	private $dayID;
	private $slots;
	/* Public class methods (functions) */
	/* Constructor */
	public function __construct() {
		$this->defYear =  null;
		$this->defMonth =  null;
		$this->defMonthInt =  null;
		$this->defMonthAbr =  null;
		$this->cusMonth =  null;
		$this->year =  null;
		$this->cusYear =  null;
		$this->x =  null;
		$this->monthInt =  null;
		$this->month =  null;
		$this->defDate =  null;
		$this->fDay =  null;
		$this->day =  null;
		$this->days =  null;
		$this->today =  null;
		$this->cCount =  null;
		$this->dayID =  null;
		$this->slots = $this->slots();
//		$defYear = date("Y");
//		$defMonth = date("F");
//		$defMonthInt = date("n");
//		$defMonthAbr = date("M");
//		$cusMonth = 0;
//		$cusYear = 0;
//		$cusMonth > 0?$year = $defYear+(int)(($defMonthInt-1+$cusMonth)/12):$year = $defYear;
//		$cusMonth+$defMonthInt > 12?$x = ($defMonthInt+$cusMonth)%12:$x = $defMonthInt+$cusMonth;
//		echo date("j",mktime(0,0,0,$x,1,$year));
//		$cusMonth > 0?$monthInt = date("n",mktime(0,0,0,$x,1,$year)):$monthInt = $defMonthInt;
//		$month = date("F",mktime(0,0,0,$monthInt,1,$year));
//		$defDate = date("N",mktime(0,0,0,$monthInt,1,$year));
//		$defDate == 7?$fDay = 0: $fDay = $defDate;
//		$day = date("j");
//		$days = date("t");
//		$today = date("N");
//		$count = 1;
	}
	private function set($s = null, $a = null) {
		$this->defYear = date("Y");
		$this->defMonth = date("F");
		$this->defMonthInt = date("m");
		$this->defMonthAbr = date("M");
		$this->cusMonth = $s;
		$this->cusYear = $a;
		$this->cusMonth > 0?$this->year = $this->cusYear+$this->defYear+(int)(($this->defMonthInt-1+$this->cusMonth)/12):$this->year = $this->defYear+$this->cusYear;
		$this->cusMonth+$this->defMonthInt > 12?$this->x = ($this->defMonthInt+$this->cusMonth)%12:$this->x = $this->defMonthInt+$this->cusMonth;
		$this->cusMonth > 0?$this->monthInt = date("m",mktime(0,0,0,$this->x,1,$this->year)):$this->monthInt = $this->defMonthInt;
		$this->month = date("F",mktime(0,0,0,$this->monthInt,1,$this->year));
		$this->defDate = date("N",mktime(0,0,0,$this->monthInt,1,$this->year));
		$this->defDate == 7?$this->fDay = 0: $this->fDay = $this->defDate;
		$this->day = date("N");
		$this->days = date("t",mktime(0,0,0,$this->monthInt,1,$this->year));
		$this->today = date("j");
		$this->cCount = 1;
		$this->dayID = $this->year.$this->monthInt.$this->today;
	}
	/* Destructor */
	public function __destruct() {
	}
	public function aceCal ($x = null, $y = null){
		$this->set($x,$y);
		$top = '<div id="container-Table"><table>
		<tr id="caption" calPos="'.$this->cusMonth.'"><td class="prev" onClick="requestCal(-1)">&#10094;</td><td colspan="5">'.$this->month.'<br>'.$this->year.'</td><td class="nxt" onClick="requestCal(1)">&#10095;</td></tr>
		<tr class="weekdays">
		<th>Su</th>
		<th>Mo</th>
		<th>Tu</th>
		<th>We</th>
		<th>Th</th>
		<th>Fr</th>
		<th>Sa</th>
		</tr>';
		echo($top);
		for($i = 0; $this->cCount <= $this->days; $i++){
			echo'<tr class="days"> ';
			for($a = 0; $a < 7; $a++){
				if(($i > 0||$a >= $this->fDay) && $this->cCount <= $this->days){
//					echo($this->cCount);
//					echo('<br><br>');
					$zero = 0;
					if($this->cCount > 10)
						$search = $this->year.$this->monthInt.$this->cCount;
					else
						$search = $this->year.$this->monthInt.$zero.$this->cCount;
					$num = $this->brain($search);
					$slots = null;
					$cSlots = 0;
					foreach($num as $x){
						if($x)
							$slots .= '<div ace-status="1" class="slot active"></div>';
						else{
							$slots .= '<div ace-status="0" class="slot inactive"></div>';
							$cSlots++;
						}
					}if($cSlots == 5)
						$sText = 'invDay';
					else
						$sText = '';
					if($this->cCount == $this->today && $this->monthInt == $this->defMonthInt && $this->year == $this->defYear)
						echo '<td class="day calToday"><div><div>'.$this->cCount.'</div></div></td>';
					else if ($this->cCount < $this->today && $this->monthInt == $this->defMonthInt && $this->year == $this->defYear)
						echo '<td class="day invDay"><div><div>'.$this->cCount.'</div></div></td>';
					else
						echo '<td day="'.$search.'" onClick="sideBar(this)" class="day '.$sText.'"><div><div>'.$this->cCount.'</div><div class="container-Slots">'.$slots.'</div></div></td>';
					$this->cCount++;
				}else{
					if ($this->cCount < $this->fDay)
						echo '<td class="day invDay"><div></div></td>';
					else
						echo '<td class="day blnkDay"></td>';
				}
			}
			echo'</tr> ';
		}
		echo'</table></div>';
	}
	
	public function slots($x = null){
		global $conn;
		global $DBname;
		$this->today?:$this->set();
		
		if($x){
			$query = 'SELECT * FROM '.$DBname.'booked WHERE (booked.Day_ID = :c)';
			$values = array(':c' => $x);
		}else{			
			$query = 'SELECT * FROM '.$DBname.'.booked WHERE (booked.Day_ID > :c AND (booked.Paid = 1 OR  TIMESTAMPDIFF(minute, Time_Created, CURRENT_TIMESTAMP)<=5)); DELETE FROM '.$DBname.'.booked WHERE (booked.Paid = 0 AND TIMESTAMPDIFF(minute, Time_Created, CURRENT_TIMESTAMP)>5)';
			$values = array(':c' => $this->dayID);
		}
		
		/* Execute the query */
		try {
			$res = $conn->prepare($query);
			$res->execute($values);
		}
		catch (PDOException $e) {
			/* If there is a PDO exception, throw a standard exception */
			throw new Exception('Database query error');
		}
		$row = $res->fetchAll(PDO::FETCH_ASSOC);
		/* If there is a result, we must check if the password matches using password_verify() */
		if (is_array($row)) {
			return($row);
		}
	}
	
	
	
	private function brain($f = null){
		
		$gSlots = $this->slots;
		$service = $_SESSION['ServiceSlots'];
		$num = [];
		$slots = [];
		
		
//		for($i = 0; $i < count($gSlots); $i++){
//			if(array_key_exists($f,$gSlots['Day_ID'])){}
//		}
			
		if(count($gSlots)==0){
				$slots[$f] = array_fill(0,5,1);
		}else{
			for($i = 0; $i < count($gSlots); $i++){

				if($gSlots[$i]['Day_ID'] == $f){
					foreach($gSlots as $x => $y){
						array_key_exists($gSlots[$x]['Day_ID'],$slots)?:$slots[$gSlots[$x]['Day_ID']] = array_fill(0,5,1);
						//	$s[$y['Slot_ID']-1] = 0;
						$slots[$gSlots[$x]['Day_ID']][$gSlots[$x]['Slot_ID']-1] = 0;
					}
					break;
				}else{
					$slots[$f] = array_fill(0,5,1);

				}
			}
		}
		
//		foreach($slots as $x => $y){
//			for($i = 0; $i < 5; $i++){
//				for($a = 0; $a < $service; $a++){
//					$ia = $i + $a;
//					if(array_key_exists($ia,$slots[$x])){
//						if($slots[$x][$ia] == 1){
//							$num[$i] = 1;
//						}else{
//							$num[$i] = 0;
//							break;
//						}
//					}else{
//						$num[$i] = 0;
//						break;
//					}
//				}
//			}
//		}
//		foreach($slots as $x => $y){
			for($i = 0; $i < 5; $i++){
				for($a = 0; $a < $service; $a++){
					$ia = $i + $a;
					if(array_key_exists($ia,$slots[$f])){
						if($slots[$f][$ia] == 1){
							$num[$i] = 1;
						}else{
							$num[$i] = 0;
							break;
						}
					}else{
						$num[$i] = 0;
						break;
					}
				}
			}
//		}
		return($num);
	}
}

?>