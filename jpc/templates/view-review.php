<?php
require_once(plugin_dir_path( __FILE__ ).'../data/display_model.php'); 

$get = new display_model();
$reviews = $get->getAllReviews();
$return = 
'
	<div class="rating-main-form">
		<div class="pv-body">
			<div class="pv-site-info">
				
			</div>
			<div class="pv-separator"><h4>Reviews</h4></div>
			<div id="pv-review ">
				<div class="view-review">';
				if($reviews!=null){
				while($row = $reviews->fetch_assoc()){
					$star = "";
					$fields = array( $row['Service'],$row['WillRecommend'],$row['TotalExperience'] ); 
					$rating = ((array_sum($fields)) / 3);
					if ($rating == 5){
						$star = "<i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i>";
					}else if ($rating == 4){
						$star = "<i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i>";
					}else if ($rating == 3){
						$star = "<i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i>";
					}else if ($rating == 2){
						$star = "<i class='fa fa-star'></i><i class='fa fa-star'></i>";
					}else if ($rating == 1){
						$star = "<i class='fa fa-star'></i>";
					}
					$return .='<div class="wrap grid">
									<div style="border:0px;" class="unit p20">
										<div class="pv-review-image"><img src="'.plugin_dir_url(__FILE__).'../../admin/img/default-medium.png" title="" alt="" /></div>
										<span class="pv-reviewer">'.$row['FirstName'].' '.$row['LastName'].'</span>
										<span class="pv-address">'.$row['City'].', '.$row['State'].'</span>
										<span class="pv-date">'.date('m/d/Y',strtotime($row['DateSubmitted'])).'</span>
									</div>
									<div class="unit p80">
										<div class="pv-star-rating">'.$star.'</div>
										<div class="pv-review-summary">'.$row['ReviewSummary'].'</div>
										<div class="pv-review">
											'.$row['Review'].'
											
										</div>
									</div>
								</div>';
						}
					}
				$return .='</div>
			</div>
		</div>
	</div>
';

return $return;