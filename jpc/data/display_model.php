<?php
/*****************************************************
This Model is  for pulling out the data from Database.
******************************************************/

require_once('database_model.php');


class display_model extends database_model{	

	protected $feedback; 
	protected $question; 
	protected $review;   
	protected $reviewer;

	
	public function __construct(){
		global $wpdb;

		$this->feedback = "`".$wpdb->prefix."private_feedback`";
		$this->question = "`".$wpdb->prefix."question`";
		$this->review  = "`".$wpdb->prefix."review`";
		$this->reviewer = "`".$wpdb->prefix."reviewer`";

	}
	public function getFeedbackViaID($id){
		
		$db = $this->db_connect();
		
		$sql="SELECT b.Question,a.QuestionID,a.Answer,a.ReviewerID 
				FROM ".$this->feedback." as a
				JOIN ".$this->question." as b
					ON b.QuestionID = a.QuestionID
				JOIN ".$this->reviewer." as c
					ON c.ReviewerID = a.ReviewerID
				WHERE b.Status = 1 AND c.ReviewerID = '".$id."'
				";
		$result = $db->query($sql);

		if($result){
			return $result;
		}else{
			die("MYSQL Error : ".mysqli_error($db));
		}		
	}
	public function get_feed_back_name(){
		
		$db = $this->db_connect();
		
		$sql="SELECT b.FeedbackID,a.ReviewerID,a.LastName,a.FirstName FROM ".$this->reviewer." as a
				JOIN ".$this->feedback." as b
					ON a.ReviewerID = b.ReviewerID 

				GROUP BY a.ReviewerID
				";
		$result = $db->query($sql);

		if($result){
			return $result;
		}else{
			die("MYSQL Error : ".mysqli_error($db));
		}
	}
	public function get_rating_table(){
		
		$db = $this->db_connect();
		
		$sql="
			SELECT a.ReviewerID,a.City,a.State,a.FirstName,a.LastName,
				b.DateSubmitted,b.Status,b.ReviewID,b.Service,b.TotalExperience,
				b.WillRecommend,b.ReviewSummary,b.Review 
			FROM ".$this->reviewer." as a
			JOIN ".$this->review." as b
			ON a.ReviewerID = b.ReviewerID
			WHERE b.Status = 1
			
			";
		$result = $db->query($sql);

		if($result){
			return $result;
		}else{
			die("MYSQL Error : ".mysqli_error($db));
		}
	}
	public function get_pending_table(){
		
		$db = $this->db_connect();
		
		$sql="
			SELECT a.ReviewerID,a.City,a.State,a.FirstName,a.LastName,
				b.DateSubmitted,b.Status,b.ReviewID,b.Service,b.TotalExperience,
				b.WillRecommend,b.ReviewSummary,b.Review 
			FROM ".$this->reviewer." as a
			JOIN ".$this->review." as b
			ON a.ReviewerID = b.ReviewerID
			WHERE b.Status = 2
			
			";
		$result = $db->query($sql);

		if($result){
			return $result;
		}else{
			die("MYSQL Error : ".mysqli_error($db));
		}
	}
	public function get_trash_rating_table(){
		
		$db = $this->db_connect();
		
		$sql="
			SELECT a.ReviewerID,a.City,a.State,a.FirstName,a.LastName,
				b.DateSubmitted,b.Status,b.ReviewID,b.Service,b.TotalExperience,
				b.WillRecommend,b.ReviewSummary,b.Review 
			FROM ".$this->reviewer." as a
			JOIN ".$this->review." as b
			ON a.ReviewerID = b.ReviewerID
			WHERE b.Status = 0
			
			";
		$result = $db->query($sql);

		if($result){
			return $result;
		}else{
			die("MYSQL Error : ".mysqli_error($db));
		}
	}
	public function getAllQuestions(){
		
		$db = $this->db_connect();
		
		$sql="SELECT * FROM ".$this->question." WHERE Status = 1";

		$result = $db->query($sql);

		if($result){
			return $result;
		}else{
			die("MYSQL Error : ".mysqli_error($db));
		}
	}
	public function getLastreviewerID(){
		
		$db = $this->db_connect();
		
		$sql="SELECT ReviewerID FROM ".$this->reviewer." ORDER BY ReviewerID DESC LIMIT 1";

		$result = $db->query($sql);

		if($result){
			$row = $result->fetch_assoc();
			return $row['ReviewerID'];
		}else{
			die("MYSQL Error : ".mysqli_error($db));
		}
	}
	public function getAllReviews(){
		
		$db = $this->db_connect();
		
		$sql="SELECT a.City,a.State,a.FirstName,a.LastName,b.Service,b.WillRecommend,b.TotalExperience,b.ReviewSummary,b.Review,b.DateSubmitted FROM ".$this->reviewer." as a
				JOIN ".$this->review." as b
					ON a.ReviewerID = b.ReviewerID
				WHERE b.Status = 1";

		$result = $db->query($sql);

		if($result){
			return $result;
			
		}else{
			die("MYSQL Error : ".mysqli_error($db));
		}
	}	

}