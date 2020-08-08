<?php
								// Initial page num setup
	$restaurant_id=$_GET['restaurant_id'];
	
	if ($page == 0){$page = 1;}
	$prev = $page - 1;	
	$next = $page + 1;							
	$lastpage = ceil($total_pages/$limit);		
	$LastPagem1 = $lastpage - 1;					
	
	
	$paginate = '';
	if($lastpage > 1)
	{	
	

	
	
		$paginate .= "<ul class='pagination'>";
		// Previous
		if ($page > 1){
			$paginate.= "<li><a href='$targetpage?page=$prev&restaurant_id=$restaurant_id' aria-label='Previous'><span aria-hidden='true'>&laquo;</span></a></li>";
		}else{
			$paginate.= "<li><span aria-hidden='true'>&laquo;</span></li>";	}
			

		
		// Pages	
		if ($lastpage < 7 + ($stages * 2))	// Not enough pages to breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page){
					$paginate.= "<li class='active'><span class='active'>$counter</span></li>";
				}else{
					$paginate.= "<li><a href='$targetpage?page=$counter&restaurant_id=$restaurant_id'>$counter</a></li>";}					
			}
		}
		elseif($lastpage > 5 + ($stages * 2))	// Enough pages to hide a few?
		{
			// Beginning only hide later pages
			if($page < 1 + ($stages * 2))		
			{
				for ($counter = 1; $counter < 4 + ($stages * 2); $counter++)
				{
					if ($counter == $page){
						$paginate.= "<li class='active'><span class='active'>$counter</span></li>";
					}else{
						$paginate.= "<li><a href='$targetpage?page=$counter&restaurant_id=$restaurant_id'>$counter</a></li>";}					
				}
				$paginate.= "<li>...</li>";
				$paginate.= "<li><a href='$targetpage?page=$LastPagem1&restaurant_id=$restaurant_id'>$LastPagem1</a></li>";
				$paginate.= "<li><a href='$targetpage?page=$lastpage&restaurant_id=$restaurant_id'>$lastpage</a></li>";		
			}
			// Middle hide some front and some back
			elseif($lastpage - ($stages * 2) > $page && $page > ($stages * 2))
			{
				$paginate.= "<li><a href='$targetpage?page=1&restaurant_id=$restaurant_id'>1</a></li>";
				$paginate.= "<li><a href='$targetpage?page=2&restaurant_id=$restaurant_id'>2</a></li>";
				$paginate.= "<li>...</li>";
				for ($counter = $page - $stages; $counter <= $page + $stages; $counter++)
				{
					if ($counter == $page){
						$paginate.= "<li class='active'><span class='active'>$counter</span></li>";
					}else{
						$paginate.= "<li><a href='$targetpage?page=$counter&restaurant_id=$restaurant_id'>$counter</a></li>";}					
				}
				$paginate.= "<li>...</li>";
				$paginate.= "<li><a href='$targetpage?page=$LastPagem1&restaurant_id=$restaurant_id'>$LastPagem1</a></li>";
				$paginate.= "<li><a href='$targetpage?page=$lastpage&restaurant_id=$restaurant_id'>$lastpage</a></li>";		
			}
			// End only hide early pages
			else
			{
				$paginate.= "<li><a href='$targetpage?page=1&restaurant_id=$restaurant_id'>1</a></li>";
				$paginate.= "<li><a href='$targetpage?page=2&restaurant_id=$restaurant_id'>2</a></li>";
				$paginate.= "<li>...</li>";
				for ($counter = $lastpage - (2 + ($stages * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page){
						$paginate.= "<li class='active'><span class='active'>$counter</span></li>";
					}else{
						$paginate.= "<li><a href='$targetpage?page=$counter&restaurant_id=$restaurant_id'>$counter</a></li>";}					
				}
			}
		}
					
				// Next
		if ($page < $counter - 1){ 
			$paginate.= "<li><a href='$targetpage?page=$next&restaurant_id=$restaurant_id' aria-label='Next'><span aria-hidden='true'>&raquo;</span></a></li>";
		}else{
			$paginate.= "<li><span aria-hidden='true'>&raquo;</span></li>";
			}
			
		$paginate.= "</ul>";		
	
	
}
  
 // pagination
 echo $paginate;
								?>