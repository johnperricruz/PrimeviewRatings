<?php
require_once(plugin_dir_path( __FILE__ ).'../data/display_model.php'); 

$get = new display_model();
$questions = $get->getAllQuestions();
$return = 
'
	<div class="rating-main-form">';
	if(isset($_GET['msg']) && ($_GET['msg'] == 'success') ) {$return .='<div class="pv-success"><h4>Thanks! Your Response has been submitted!</h4></div>';}
		$return .='
		<div class="pv-body">
			<div class="pv-site-info">
				
			</div>
			<div class="pv-title"><h4>Write a Review</h4></div>
			<div id="pv-review">
				<form action="'.plugins_url().'/primeview-plugin/jpc/data/post.php'.'" method="POST" >
				<input type="hidden" name="redirect" value="'.$_SERVER['REQUEST_URI'].'"/>
				<div class="wrap grid first-part">

					<div class="review-forms-third-party unit w-1-1">
						<!--h5>Write a Review Using</h5-->';
						if(get_option('google_review')){ $return .='<a href="'.get_option('google_review').'" target="_blank"><img src="'.plugins_url().'/primeview-plugin/admin/img/google_review.png" alt="Google review" title="Google Review" /></a>'; }
						if(get_option('yelp_review')){ $return .='<a href="'.get_option('yelp_review').'" target="_blank"><img src="'.plugins_url().'/primeview-plugin/admin/img/yelp_button.png" alt="Google review" title="Yelp Review" /></a>'; }
						if(get_option('angies_review')){ $return .='<a href="'.get_option('angies_review').'" target="_blank"><img src="'.plugins_url().'/primeview-plugin/admin/img/angies_review.png" alt="Google review" title="Angies List Review" /></a>'; }
						if(get_option('facebook_review')){ $return .='<a href="'.get_option('facebook_review').'" target="_blank"><img src="'.plugins_url().'/primeview-plugin/admin/img/facebook_review.png" alt="Google review" title="Facebook Review" /></a>'; }
					$return .='</div>
					
					<div class="pv-b unit w-1-1">
						<h5>Click on the Stars to Rate</h5>
						<div class="review-form wrap grid">
							<div class="unit w-1-3 star-rating-1">
								<label class="pv-label">Service</label>
								<fieldset class="rating service-rating">
									<input required type="radio" id="star5"		name="pv_service_rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
									<input type="radio" id="star4"				name="pv_service_rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
									<input type="radio" id="star3"				name="pv_service_rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
									<input type="radio" id="star2"				name="pv_service_rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
									<input type="radio" id="star1"				name="pv_service_rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
								</fieldset>
							</div>
							<div class="unit w-1-3 star-rating-2">
								<label class="pv-label">Will Recommend</label>
								<fieldset class="rating recommend-rating">
									<input required type="radio" id="2star5"	name="pv_recommend_rating" value="5" /><label class = "full" for="2star5" title="Awesome - 5 stars"></label>						
									<input type="radio" id="2star4"				name="pv_recommend_rating" value="4" /><label class = "full" for="2star4" title="Pretty good - 4 stars"></label>
									<input type="radio" id="2star3"				name="pv_recommend_rating" value="3" /><label class = "full" for="2star3" title="Meh - 3 stars"></label>
									<input type="radio" id="2star2"				name="pv_recommend_rating" value="2" /><label class = "full" for="2star2" title="Kinda bad - 2 stars"></label>
									<input type="radio" id="2star1"				name="pv_recommend_rating" value="1" /><label class = "full" for="2star1" title="Sucks big time - 1 star"></label>
								</fieldset>
							</div>
							<div class="unit w-1-3 star-rating-3">
								<label class="pv-label">Total Experience</label>
								<fieldset class="rating total-exp-rating">
									<input required type="radio" id="3star5"	name="pv_total_exp_rating" value="5" /><label class = "full" for="3star5" title="Awesome - 5 stars"></label>
									<input type="radio" id="3star4"				name="pv_total_exp_rating" value="4" /><label class = "full" for="3star4" title="Pretty good - 4 stars"></label>
									<input type="radio" id="3star3"				name="pv_total_exp_rating" value="3" /><label class = "full" for="3star3" title="Meh - 3 stars"></label>
									<input type="radio" id="3star2"				name="pv_total_exp_rating" value="2" /><label class = "full" for="3star2" title="Kinda bad - 2 stars"></label>
									<input type="radio" id="3star1"				name="pv_total_exp_rating" value="1" /><label class = "full" for="3star1" title="Sucks big time - 1 stars"></label>
								</fieldset>
							</div>
						</div>
						<div class="review-summary-container">
							<label class="pv-label">Review Summary<sup>*</sup></label>
							<input type="text" name="pvReviewSummary" required />
						</div>
						<div class="review-container">
							<label class="pv-label">Review<sup>*</sup></label>
							<textarea rows="5" name="pvReviewReview" required></textarea>
						</div>
					</div>

				</div>
				<div class="pv-title"><h4>Your Info</h4></div>
				<div class="wrap grid second-part">
					<div class="unit w-1-2">	
						<label class="pv-label">First Name<sup>*</sup></label>
						<input type="text" name="pv_first_name" required/>
					</div>
					<div class="unit w-1-2">	
						<label class="pv-label">Last Name<sup>*</sup></label>
						<input type="text" name="pv_last_name" required/>

					</div>
					<div class="unit w-1-2">
									<label class="pv-label">City<sup>*</sup></label>
						<input type="text" name="pv_city" required />			
					</div>	
					<div class="unit w-1-2">
						<label class="pv-label">State<sup>*</sup></label>
						<input type="text" name="pv_state" required />							
					</div>	
				</div>
				<div class="pv-separator"><h4>Private Feedback<span class="pv-optional">(Optional)</span></h4></div>
					<div class="pv-private-feedback">
					';
						while($row = $questions->fetch_assoc()){
							$return .='
								<label>'.$row['Question'].'</label>
								<input type="text" name="question[1]['.$row['QuestionID'].']" />
							';
						}
						$return.='
					</div>
					<button name="pv_submit" class="pv_submit">Submit Review</button>
				</form>
				</div>
			</div>
		</div>
';

return $return;