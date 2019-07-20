<?php
	include_once('admin/server.php');
	$query = "SELECT * FROM place";
	$result = mysqli_query($db, $query);
?>

<!DOCTYPE html>
<html>
<head>
					<title>Place</title>
					<link rel="stylesheet" type="text/css" href="css/style1.css">
					<link rel="stylesheet" type="text/css" href="css/style.css">

		<style type="text/css">
    body{
        font-family: Arail, sans-serif;
    }
    /* Formatting search box */
    .search-box{
        width: 300px;
        position: relative;
        display: inline-block;
        font-size: 14px;
    }
    .search-box input[type="text"]{
        height: 32px;
        padding: 5px 10px;
        border: 1px solid #CCCCCC;
        font-size: 14px;
    }
    .result{
        position: absolute;        
        z-index: 999;
        top: 100%;
        left: 0;
    }
    .search-box input[type="text"], .result{
        width: 100%;
        box-sizing: border-box;
    }
    /* Formatting result items */
    .result p{
        margin: 0;
        padding: 7px 10px;
        border: 1px solid #CCCCCC;
        border-top: none;
        cursor: pointer;
    }
    .result p:hover{
        background: #f2f2f2;
    }
</style>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("backend-search.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
</script>
</head>
<body>
	
	

<table>	
	<thead>
		<tr>
			<th>Name</th>
			<th>Number</th>
			<th>Type</th>
			<th>Description</th>
			<th>Adress</th>
		</tr>
	</thead>
	<div class="search-box">
        <input type="text" autocomplete="off" placeholder="Search Title" />
        <div class="result"></div>
    </div>

	<?php 
		while($rows=mysqli_fetch_assoc($result))
		{
	?>
			<tr>
				<td><?php echo $rows['placeName']; ?></td>
				<td><?php echo $rows['placeNumber']; ?></td>
				<td><?php echo $rows['placeType']; ?></td>
				<td><?php echo $rows['placeDesc']; ?></td>
				<td><?php echo $rows['placeAdress']; ?></td>
			</tr>
	<?php
		}

	?>

		<a class="btn" href="index.php">Go Back</a>

	

</body>
</html>