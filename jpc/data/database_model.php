<?php
/******************************************************************
This Model is the parent model class that returns database object
*******************************************************************/

//require_once($_SERVER['DOCUMENT_ROOT'].'/wp-config.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/wordpress/wp-config.php');


class database_model{	

	
	
	public function db_connect(){
		$localhost	= DB_HOST;
		$user		= DB_USER;
		$pw			= DB_PASSWORD;
		$database	= DB_NAME;
		$db = new mysqli($localhost, $user, $pw, $database);
		if($db){
			return $db;
		}else{
			 die("Connection failed: " . $conn->connect_error);
		}
	}
	public function create_tables(){
	
		global $wpdb;
		
		$db = $this->db_connect();
		$sql1="CREATE TABLE IF NOT EXISTS `".$wpdb->prefix."private_feedback` (
				 `FeedbackID` int(11) NOT NULL AUTO_INCREMENT,
				 `ReviewerID` int(11) NOT NULL,
				 `QuestionID` int(11) NOT NULL,
				 `Answer` varchar(250) NOT NULL,
				 `DateAnswered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
				 PRIMARY KEY (`FeedbackID`)
				) ENGINE=InnoDB DEFAULT CHARSET=latin1";
				
		$sql2="CREATE TABLE IF NOT EXISTS `".$wpdb->prefix."question`(
			 `QuestionID` int(10) NOT NULL AUTO_INCREMENT,
			 `Question` varchar(250) NOT NULL,
			 `Status` int(1) NOT NULL DEFAULT '1',
			 PRIMARY KEY (`QuestionID`)
			) ENGINE=InnoDB DEFAULT CHARSET=latin1";
			
		$sql3="CREATE TABLE IF NOT EXISTS `".$wpdb->prefix."review` (
			 `ReviewID` int(10) NOT NULL AUTO_INCREMENT,
			 `ReviewerID` int(10) NOT NULL,
			 `Service` int(5) NOT NULL,
			 `WillRecommend` int(5) NOT NULL,
			 `TotalExperience` int(5) NOT NULL,
			 `ReviewSummary` varchar(250) NOT NULL,
			 `Review` varchar(250) NOT NULL,
			 `Status` int(1) NOT NULL DEFAULT '2',
			 `DateSubmitted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
			 PRIMARY KEY (`ReviewID`)
			) ENGINE=InnoDB DEFAULT CHARSET=latin1";

		$sql4="CREATE TABLE IF NOT EXISTS `".$wpdb->prefix."reviewer` (
			 `ReviewerID` int(11) NOT NULL AUTO_INCREMENT,
			 `FirstName` varchar(50) NOT NULL,
			 `LastName` varchar(50) NOT NULL,
			 `City` varchar(50) NOT NULL,
			 `State` varchar(50) NOT NULL,
			 PRIMARY KEY (`ReviewerID`)
			) ENGINE=InnoDB DEFAULT CHARSET=latin1";
			
		$sql5="INSERT INTO `".$wpdb->prefix."question` (`QuestionID`, `Question`, `Status`) VALUES
				(1, 'How did you first hear about them?', 1),
				(2, 'How can they improve?', 1),
				(3, 'Will you use them again?', 1);
		";
			
		$rs1 = $db->query($sql1);
		$rs2 = $db->query($sql2);
		$rs3 = $db->query($sql3);
		$rs4 = $db->query($sql4); 
		$rs5 = $db->query($sql5);

		if($rs1 && $rs2 && $rs3 && $rs4 && $rs5 && $rs6 ){
			return true;
		}else{
			return false;
		}

	}
}