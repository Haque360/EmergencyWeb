 mysqli_query( $connect, "INSERT INTO `report` (`Report_ID`, `Report_type`, `R_status`, `Report_Content`, `DOR`, `Location_of_Event`, `Customer_ID`, `PS_ID`, `FS_ID`, `AComp_ID`, `Admin_ID`) VALUES ('$reply_id', 'PS_reply', '1', '$reply_content', '$date', 'adabor', '$Customer_ID', '$psid', NULL, NULL, '$Admin_ID'); " )

                or die("Can not execute query");