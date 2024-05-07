<?php 
    include('./dbconn.php');
    session_start();
    $email = $_SESSION['email'];
    if($_SESSION['login']==0){
        header("Location: /DBMSform/login.php");
      }
    else{
    echo "<script type='text/javascript'>
            window.history.forward();
        </script>";
    }

    $checkUSer = $conn->prepare("
        select * from `users` where `email` = '$email'
        ");

        $checkUSer->execute();
        $data = $checkUSer->fetchAll();
        if($data){

            $_SESSION['fname'] = $data[0]['firstname'];

            if(!empty($data[0]['middlename'])){
                $_SESSION['mname'] = $data[0]['middlename'];
            }

            $_SESSION['lname'] = $data[0]['lastname'];
            
        }


        $page1 = $conn->prepare("
        select * from `page1` where `email` = '$email'
        ");

        $page1->execute();
        $data1 = $page1->fetchAll();

        if($data1){

            $_SESSION['dob'] = $data1[0]['dob'];
            $_SESSION['gender'] = $data1[0]['gender'];
            $_SESSION['nationality'] = $data1[0]['nationality'];
            $_SESSION['mstatus'] = $data1[0]['mstatus'];
            $_SESSION['category'] = $data1[0]['category'];
            $_SESSION['identity'] = $data1[0]['id_proof'];
            
        }

?>

<html><head>
	<title></title>
	<style type="text/css">
	@page { margin:0.5in 0.5in 0.5in 0.5in; }

	    .receipt {
	        margin:0 auto 1in auto;
	        /*font-family:"verdana",monospace;*/
	        border:solid #000;
	        padding:0 0.25in;
	        width:10in;
	        min-height:2.5in;
	        height: auto;
	        /*page-break-inside:avoid;
	        page-break-before:auto;
	        page-break-after:auto;*/
	        /*word-wrap: break-word;*/
	    }
	    .receipt div, .receipt p, .receipt span {
	        /*page-break-before:avoid;
	        page-break-after:avoid;*/
	    }

	    .receipt div {
	        margin:0;
	        margin-bottom:0.1in;
	        padding:0;
	        /*word-wrap: break-word;*/
	    	/*background-color: green;*/


	    }

	    .receipt span {
	        display:inline-block;
	        line-height:2;
	    }

	    .receipt p, .receipt span {
	        margin:0; padding:0;


	    }

	    .title {
	        font-family:Arial,sans-serif;
	        font-size:1.5em;
	        color: #a40a0b;
	        font-weight:bold;
	        width:100%;
	    }

	    .label {
	        font-weight:bold;
	        color: #a40a0b;
	        background-color: #f1f1d1;
	        margin-bottom: 10px!important;
	        padding-left: 5px!important;
	        padding-right: 5px!important;
	        border-radius: 5px;
	        font-size: 1.1em;
	    }

	    .date, .payee, .phone, .signature {
	        border-bottom:solid thin #444;
	    }

	    .payee, .signature { width:2in; }

	    .phone, .date  { width:1.25in; }

	    .amount, .payer {
	        font-style:italic;
	        text-decoration:underline;
	    }
	    .tab{
	    	border-collapse: collapse;
	    	width: 100%;
	    	/*word-break: break-all;
	    	word-wrap: break-word;*/

	    	/*background-color: green;*/
	    	/*word-wrap: break-word!important;*/

	    	/*white-space: pre-line!important;*/
	    	/*overflow:auto!important;*/
	    }
	    .tab td{
	    	border:1px solid #CCC !important;
	    	padding-left: 10px;
	    	/*background-color:#DDFFFF;*/

	    	word-wrap: break-word!important;
	    	/*white-space: pre-line!important;*/
	    	/*overflow:auto!important;*/
	    	/*background-color: red;*/

	    }
	    .receipt_left{
	    	float: left;
	    	width:5.5in;
	    	/*word-wrap: break-word;*/
	    }
	    .receipt_right{
	    	float: right;
	    	width:1.5in;
	    	/*word-wrap: break-word;*/
	    }

	    .receipt_left1{
	    	float: left;
	    	width:4.5in;
	    	/*word-wrap: break-word;*/
	    }
	    .receipt_right1{
	    	float: right;
	    	width:4.5in;
	    	/*word-wrap: break-word;*/
	    }

	    .receipt_right img
	    {
	    	height: 1in;
	    	width: 0.8in;
	    	padding: 2px;
	    	border: 1px solid #CCC;
	    }

	    .receipt_center{
	    	/*float: left;*/
	    	width:auto;
	    	height: 120px;
	    	/*word-wrap: break-word;*/
	    }

		th
		{
			text-align: left;
		}

		.tr_title
		{
			color: #0a5398;
		}
	</style>
</head>
      
<body style="font-family:Arial,sans-serif;">
	
	<div class="receipt">
		<div class="receipt_center">
		<img src="https://ofa.iiti.ac.in/facrec_che_2023_july_02/images/IITIndorelogo.png" style="height: 85px; float: left;">
		<p style="text-align: center; font-size: 1.7em;">भारतीय प्रौद्योगिकी संस्थान पटना <br>Indian Institute of Technology Patna</p>
		<p style="text-align: center; margin-top: 10px; background-color: #175395; line-height: 25px; color: #FFF; font-weight: bold;">Application for the Faculty Position</p>
		</div>
		<hr>
			<div class="title"><?php echo $_SESSION['fname']?> <?php if (!empty($_SESSION['mname']))echo $_SESSION['mname']?> <?php echo $_SESSION['lname']?></div>
	<div class="receipt_left">
		<p style="width:10in;">Advertisement Number : IITI/FACREC-CHE/2023/JULY/02</p>
		<p>Date of Application : 01/04/2024</p>
		<p>Post Applied for : Associate Professor</p>
		<p>Department : Chemical Engineering</p>
		<p>Application Number : 1698348185</p>
		
	</div>
	<div class="receipt_right" style="margin-top: -30px;">
				<img src="https://ofa.iiti.ac.in/facrec_che_2023_july_02/attach/711_Ma_Agarwal_1698348165/711_1712608506756533.png">
	</div>
	<div style="clear:both"></div>
	<div>
	<span class="label">1. Personal Details</span>

	<table class="tab">
		<tbody><tr style="background-color:#f1f1f1;">
			<td><strong class="tr_title">First Name</strong></td>
			<td><strong class="tr_title">Middle Name</strong></td>
			<td><strong class="tr_title">Last Name</strong></td>
		</tr>
				<tr>
			<td><?php echo $_SESSION['fname']?></td>
			<td><?php if (!empty($_SESSION['mname']))echo $_SESSION['mname']?></td>
			<td><?php echo $_SESSION['lname']?></td>
		</tr>
	</tbody></table>
	<br>
	

	<table class="tab">
		<tbody><tr style="background-color:#f1f1f1;">
			<td><strong class="tr_title">Date of Birth</strong></td>
			<!-- <td><strong class="tr_title">Age</strong></td> -->
			<td><strong class="tr_title">Gender</strong></td>
			<td><strong class="tr_title">Marital Status</strong></td>
			<td><strong class="tr_title">Category</strong></td>
			<td><strong class="tr_title">Nationality</strong></td>
			<td><strong class="tr_title">ID Proof</strong></td>

		</tr>
				<tr>
			<td><?php echo $_SESSION['dob']?></td>
			<!-- <td></td> -->
			<td><?php echo $_SESSION['gender']?></td>
			<td><?php echo $_SESSION['mstatus']?></td>
			<td><?php echo $_SESSION['category']?></td>
			<td><?php echo $_SESSION['nationality']?></td>
			<td><?php echo $_SESSION['identity']?></td>
		</tr>
		<tr>
			<td><strong>Father's Name</strong></td>
			<td colspan="6">Esperanza.Daugherty</td>

		</tr>
	</tbody></table>
	<br>

	<table class="tab">
		<tbody><tr style="background-color:#f1f1f1;">
			<td width="50%"><strong class="tr_title">Current Address </strong></td>
			<td width="50%"><strong class="tr_title">Permanent Address </strong></td>
			
		</tr>
		
		<tr>
			<td>476 Alex Mall</td>
			<td>150 Heidenreich Center</td>
			
		</tr>
		<tr>
			<td>Jupiter</td>
			<td>Independence</td>
			
		</tr>
		<tr>
			<td>New Jersey</td>
			<td>Oregon</td>
			
		</tr>
		<tr>
			<td>Equatorial Guinea</td>
			<td>Aland Islands</td>
			
		</tr>
		<tr>
			<td>88067</td>
			<td>58187</td>
			
		</tr>
	</tbody></table>
	<br>
	
	<span class="label"></span>
	<table class="tab">
		<!-- <tr>
			<td colspan="2"><strong>Mobile & Email</strong></td>
			
		</tr> -->
				<tbody><tr>
			<td style="background-color:#f1f1f1;"><strong class="tr_title">Mobile</strong></td>
			<td>Lead Applications Ad</td>
		</tr>

		<tr>
			<td style="background-color:#f1f1f1;"><strong class="tr_title">Alternate Mobile</strong></td>
			<td>Central Applications</td>
		</tr>

		<tr>
			<td style="background-color:#f1f1f1;"><strong class="tr_title">Landline Phone No.</strong></td>
			<td>657</td>
		</tr>

		<tr>
			<td style="background-color:#f1f1f1;"><strong class="tr_title">E-mail</strong></td>
			<td>gulidy@clout.wiki</td>
		</tr>

		<tr>
			<td style="background-color:#f1f1f1;"><strong class="tr_title">Alternate E-mail</strong></td>
			<td>your.email+fakedata13950@gmail.com</td>
		</tr>

		
		
		
		
		
	</tbody></table>
	<br>

	<span class="label">2. Educational Qualifications</span>
	<table class="tab">

		<tbody><tr style="background-color:#f1f1f1;">
			<td colspan="6" class="tr_title"><strong>(A) Ph. D. Details</strong></td>
		</tr>
		
		<tr>
			<td width="30%"><strong>University/<br>Institute</strong></td>
			<td width="12%"><strong>Department</strong></td>
			<td width="17%"><strong>Name of Ph. D. <br>Supervisor</strong></td>
			<td width="10%"><strong>Year of <br>Joining</strong></td>
			<td width="15%"><strong>Date of <br>successful <br>thesis Defence</strong></td>
			<td width="15%"><strong>Date of <br>Award</strong></td>
		</tr>
		
				<tr>
			<td>252-839-7224</td>
			<td>92507 Tatum Point</td>
			<td>Repellat porro ut.</td>
			<td>365-612-6023</td>
			<td>01/01/1970</td>
			<td>01/01/1970</td>


		</tr>

		<tr>
			<td><strong>Title of Ph. D. Thesis</strong></td>
			<td colspan="5">Dynamic Research Developer</td>
		</tr>
		
			</tbody></table>
	<br>

	<table class="tab">

		<tbody><tr style="background-color:#f1f1f1;">
			<td colspan="8" class="tr_title"><strong>(B) Academic Details - PG</strong></td>
		</tr>
		

		<tr>
			<td width="10%"><strong>Degree</strong></td>
			<td width="25%"><strong>University/<br>Institute</strong></td>
			<td width="20%"><strong>Subjects</strong></td>
			<td width="10%"><strong>Year of <br>Joining</strong></td>
			<td width="12%"><strong>Year of <br>Graduation</strong></td>
			<td width="10%"><strong>Duration <br>(in years)</strong></td>
			<td width="30%"><strong>Percentage/CGPA </strong></td>
			<td width="30%"><strong>Division/Class </strong></td>
			

			
		</tr>
				<tr>
			<td>2024-06-02 05:14:35</td>
			<td>Consequuntur laudantium voluptatem quibusdam blanditiis minima ut.</td>
			<td>Veritatis molestiae nisi veniam labore.</td>
			<td>Vitae illum autem dicta facilis ab suscipit minus voluptatem.</td>
			<td>Expedita vero suscipit explicabo.</td>
			<td>2024</td>
			<td>1802 Bogan Cape</td>
			<td>Vitae tenetur dicta aperiam provident sunt molestiae deleniti. Voluptates suscipit illo eum animi reprehenderit saepe. Deserunt fugiat necessitatibus.</td>


		</tr>
			</tbody></table>
	<br>

	<table class="tab">

		<tbody><tr style="background-color:#f1f1f1;">
			<td colspan="8" class="tr_title"><strong>(C) Academic Details - UG</strong></td>
		</tr>

		<tr>
			<td width="10%"><strong>Degree</strong></td>
			<td width="25%"><strong>University/<br>Institute</strong></td>
			<td width="20%"><strong>Subjects</strong></td>
			<td width="10%"><strong>Year of <br>Joining</strong></td>
			<td width="12%"><strong>Year of <br>Graduation</strong></td>
			<td width="10%"><strong>Duration <br>(in years)</strong></td>
			<td width="30%"><strong>Percentage/CGPA </strong></td>
			<td width="30%"><strong>Division/Class </strong></td>
			

			
		</tr>
				<tr>
			<td>2025-03-30 02:23:01</td>
			<td>Asperiores sed nam ullam iste blanditiis tenetur.</td>
			<td>Provident cum facere saepe iste ut occaecati maxime.</td>
			<td>+Ipsam et delectus ea dolorum dignissimos nobis.</td>
			<td>Autem aut nisi sint natus eius voluptatibus veritatis eaque.</td>
			<td>2023</td>
			<td>1891 Emerald Springs</td>
			<td>Illum quisquam dicta rem sapiente sed.</td>


		</tr>
			</tbody></table>
	<br>

	<table class="tab">

		<tbody><tr style="background-color:#f1f1f1;">
			<td colspan="8" class="tr_title"><strong>(D) Academic Details - School</strong></td>
		</tr>

		<tr>
			<td width="20%"><strong>10th/12th/HSC/Diploma</strong></td>
			<td width="20%"><strong>School</strong></td>
			<td width="15%"><strong>Year of Passing</strong></td>
			<td width="15%"><strong>Percentage/CGPA</strong></td>
			<td width="15%"><strong>Division/Class</strong></td>
			

			
		</tr>
				<tr>
			<td>12th/HSC/Diploma</td>
			<td>Repellat iure nam cum.</td>
			<td>epGyR</td>
			<!-- <td></td> -->
			<td>89602</td>
			<td>Autem</td>
			
		</tr>
				<tr>
			<td>10th</td>
			<td>Expedita ex fugiat excepturi quidem laudantium.</td>
			<td>hfKp9</td>
			<!-- <td></td> -->
			<td>248 J</td>
			<td>Hic m</td>
			
		</tr>
			</tbody></table>
	<br>
	<table class="tab">
		<tbody><tr style="background-color:#f1f1f1;">
			<td colspan="8" class="tr_title"><strong>(E) Additional Educational Qualifications (If any) </strong></td>
		</tr>
		
		<tr>
			<td width="10%"><strong>Degree</strong></td>
			<td width="25%"><strong>University/<br>Institute</strong></td>
			<td width="20%"><strong>Subjects</strong></td>
			<td width="10%"><strong>Year of <br>Joining</strong></td>
			<td width="12%"><strong>Year of <br>Graduation</strong></td>
			<td width="10%"><strong>Duration <br>(in years)</strong></td>
			<td width="30%"><strong>Percentage/CGPA </strong></td>
			<td width="30%"><strong>Division/Class </strong></td>
		</tr>
				<tr>
			<td>45211 Hage</td>
			<td>64534 Marks Canyon</td>
			<td>104 Gladyce Ridge</td>
			<td>9745 </td>
			<td>181 M</td>
			<td>5578</td>
			<td>2794 </td>
			<td>Expli</td>
		</tr>
				<tr>
			<td>501 Abdul </td>
			<td>461 Alexys Unions</td>
			<td>5755 Von Wall</td>
			<td>44516</td>
			<td>6202 </td>
			<td>1117</td>
			<td>2094 </td>
			<td>Assum</td>
		</tr>
				<tr>
			<td>56352 Nich</td>
			<td>7657 Laurence Crest</td>
			<td>90128 Stanton Stravenue</td>
			<td>631 N</td>
			<td>169 S</td>
			<td>8301</td>
			<td>920 S</td>
			<td>Eum i</td>
		</tr>
				<tr>
			<td>8016 Brady</td>
			<td>4333 Terrance Lake</td>
			<td>993 Fay Corners</td>
			<td>1218 </td>
			<td>675 J</td>
			<td>7639</td>
			<td>566 G</td>
			<td>Conse</td>
		</tr>
				<tr>
			<td>56596 Chey</td>
			<td>3297 Stokes Rue</td>
			<td>28337 Predovic Roads</td>
			<td>862 R</td>
			<td>688 B</td>
			<td>474</td>
			<td>5237 </td>
			<td>Quo o</td>
		</tr>
				<tr>
			<td>43400 Elen</td>
			<td>907 Nedra Meadows</td>
			<td>27990 Kunde Glen</td>
			<td>25324</td>
			<td>84498</td>
			<td>607</td>
			<td>31998</td>
			<td>Dolor</td>
		</tr>
				<tr>
			<td>2925 Adah </td>
			<td>945 Samson Wells</td>
			<td>66758 Collins Common</td>
			<td>17094</td>
			<td>806 B</td>
			<td>4521</td>
			<td>555 B</td>
			<td>Accus</td>
		</tr>
				<tr>
			<td>96322 Vict</td>
			<td>366 Napoleon Centers</td>
			<td>8953 Parisian Locks</td>
			<td>719 B</td>
			<td>3525 </td>
			<td>3158</td>
			<td>718 F</td>
			<td>Labor</td>
		</tr>
				<tr>
			<td>104 Maya S</td>
			<td>1689 Marcelino Cape</td>
			<td>665 Houston Key</td>
			<td>4625 </td>
			<td>72630</td>
			<td>506</td>
			<td>1404 </td>
			<td>Exped</td>
		</tr>
				<tr>
			<td>36345 Beth</td>
			<td>5054 Marvin-Hane Well</td>
			<td>28619 Vada Neck</td>
			<td>782 N</td>
			<td>8219 </td>
			<td>2245</td>
			<td>942 H</td>
			<td>Dolor</td>
		</tr>
			</tbody></table>
	<br>

	<span class="label">3. Employment Details </span>

	<table class="tab">

		<tbody><tr style="background-color:#f1f1f1;">
			<td colspan="5" class="tr_title"><strong>(A) Present Employment</strong></td>
		</tr>
		

		<tr>
			<td width="20"><strong>Position </strong></td>
			<td width="30"><strong>Organization/Institution</strong></td>
			<td width="15"><strong>Date of <br>Joining</strong></td>
			<td width="15"><strong>Date of <br>Leaving </strong></td>
			<td width="15"><strong>Duration <br>(in years)</strong></td>
		</tr>
				<tr>
			<td>hbdfhj</td>
			<td>48197 Moises Knoll</td>
			<td>3664 Lowe Harbors</td>
			<td>372 Darrick Ridge</td>
			<td>8084 Klein Creek</td>
		</tr>
			</tbody></table>
	<br>

	<span class="label"> </span>
	<table class="tab">
		<tbody><tr style="background-color:#f1f1f1;">
			<td colspan="5" class="tr_title"><strong>(B) Employment History (After PhD )</strong></td>
		</tr>
		
		<tr>
			<td width="20"><strong>Position </strong></td>
			<td width="30"><strong>Organization/Institution</strong></td>
			<td width="15"><strong>Date of <br>Joining</strong></td>
			<td width="15"><strong>Date of <br>Leaving </strong></td>
			<td width="15"><strong>Duration <br>(in years)</strong></td>
		</tr>
				<tr>
			<td>Mollitia eveniet optio suscipit quibusdam.</td>
			<td>Perspiciatis ex officia itaque adipisci quasi harum qui modi.</td>
			<td>Quos deserunt animi explicabo.</td>
			<td>Necessitatibus repudiandae ea vel eligendi exercitationem impedit.</td>
			<!-- <td>Necessitatibus repudiandae ea vel eligendi exercitationem impedit.</td> -->
			<td>2024-03-06 21:01:52</td>
		</tr>
				<tr>
			<td>Fugit nemo expedita eius.</td>
			<td>Ducimus deserunt beatae similique.</td>
			<td>Velit reiciendis repellat iste harum optio.</td>
			<td>Repellat eaque libero rerum.</td>
			<!-- <td>Repellat eaque libero rerum.</td> -->
			<td>2024-03-15 05:29:33</td>
		</tr>
		
		<tr>
						</tr><tr>
				<td colspan="5">Experience : Minimum 6 years’ experience of which at least 3 years should be at the level of Assistant Professor Grade I/Senior Scientific Officer/Senior Design Engineer. <strong style="color:red;">Yes</strong></td>
			</tr>


					
	</tbody></table>
	<br>

	<table class="tab">
		<tbody><tr style="background-color:#f1f1f1;">
			<td colspan="8" class="tr_title"><strong>(C) Teaching Experience (After PhD)</strong></td>
		</tr>
		
		<tr>
			<!-- <td><strong>S. No.</strong></td> -->
			<td width="25%"><strong>Position</strong></td>
			<td width="30%"><strong>Employer</strong></td>
			<td width="30%"><strong>Course Taught</strong></td>
			<td width="30%"><strong>UG/PG</strong></td>
			<td width="30%"><strong>No. of Students</strong></td>
			<td width="10%"><strong>Date of <br>Joining</strong></td>
			<td width="10%"><strong>Date of <br>Leaving</strong></td>
			<td width="10%"><strong>Duration</strong></td>
		</tr>
				<tr>
			<!-- <td></td> -->
			<td>Molestiae aliquam ducimus ullam incidunt accusamus recusandae. Placeat qui saepe commodi at eligendi sapiente ipsam beatae. Sint occaecati dolores adipisci.Eos exercitationem velit quisquam sequi laborum eos. Tenetur optio reiciendis repudiandae tempore e</td>
			<td>Nam laboriosam labore tenetur rem dolorem. Quas quis accusamus cum autem nemo odio numquam. Atque cumque ut assumenda.Ipsam deleniti distinctio voluptatum. Quis possimus nostrum. Explicabo quis tempora nihil maiores error.Nihil necessitatibus architecto s</td>
			<td>Bahrain</td>
			<td>Quae sit officia deserunt vero explicabo ipsam sunt quisquam omnis. Quaerat assumenda sapiente perspiciatis doloribus. Vel necessitatibus eligendi aliquam.Quo illo accusantium distinctio sapiente saepe. Doloremque numquam recusandae ex quos cumque. Facere</td>
			<td>619</td>
			<td>Ratione incidunt totam eius sed est nostrum consequuntur cumque. Animi pariatur accusantium corporis provident quo nemo. Illum officia alias aut iste ab quasi.Officiis deleniti impedit illo error pariatur. Id quidem placeat nobis inventore consequuntur re</td>
			<td>Error quod cum nobis perspiciatis rem vel eaque dolores iste. Voluptas autem perspiciatis. Doloribus dignissimos eligendi nemo aut.Cupiditate rerum dolore voluptate commodi perferendis nam itaque. Facilis beatae eligendi. Quo recusandae exercitationem ver</td>
			<td>Ea soluta perspiciatis beatae possimus. Reiciendis corrupti quaerat magni. Cupiditate voluptatem alias mollitia eius consequatur inventore blanditiis consequuntur error.Quidem similique quae aspernatur placeat odit cum doloremque natus magnam. Explicabo e</td>
		</tr>
				<tr>
			<!-- <td></td> -->
			<td>Atque in vel quisquam. Consectetur in saepe. Dignissimos itaque occaecati quasi facilis sunt eius mollitia.Et hic dolorum veritatis rerum labore error inventore maiores. Quod fuga ratione maxime magnam laudantium aspernatur cupiditate. Sapiente neque opti</td>
			<td>Vel iste modi. Voluptates commodi corporis consequuntur illum nobis qui saepe optio. Laboriosam ullam deleniti.Asperiores optio unde corporis quasi. Quasi ipsa adipisci vitae facilis ipsam. Odio corrupti saepe occaecati inventore doloribus neque cumque sa</td>
			<td>China</td>
			<td>Dignissimos molestiae illo cum quo consectetur. Commodi voluptatum voluptate. Mollitia reprehenderit a vel ratione aliquam.Quo repellat fugiat. Facilis ut autem quas dolor cumque voluptate nobis. Officia consectetur aspernatur impedit nulla quod totam mag</td>
			<td>574</td>
			<td>Natus ad delectus laboriosam omnis autem libero culpa libero delectus. Dolorem commodi nobis dolorum cum eaque quidem facilis ducimus iusto. Molestiae officia laboriosam dolor voluptatibus autem.Voluptate itaque ut exercitationem esse. Soluta eos laborum </td>
			<td>Mollitia nihil repudiandae reprehenderit id dolorem repellat ipsa. Tempore velit similique repellendus perferendis velit veritatis reiciendis dolorem accusantium. Vel vero a earum nulla illo fugiat aut.Quas voluptatem ex quia in accusamus deleniti id assu</td>
			<td>Dolores velit illum rem asperiores enim cumque corrupti dolore. Ab maxime culpa consequatur. Similique dolores adipisci.Reprehenderit atque repellendus suscipit reprehenderit consequuntur voluptate aspernatur distinctio. Consequuntur vero tenetur ad tempo</td>
		</tr>
				<tr>
			<!-- <td></td> -->
			<td>Adipisci dolor aperiam excepturi sequi aliquid facilis laudantium quibusdam sequi. Deserunt sint omnis fugiat modi. Laborum dolore expedita est cupiditate qui aut rerum.Pariatur quasi minus cum eligendi quos soluta. Provident itaque expedita. Iure accusan</td>
			<td>Suscipit culpa labore cum nostrum cumque quisquam. Soluta cupiditate cum a nobis illum. Sapiente quibusdam rerum animi earum.Unde vel eligendi itaque autem quis aut dolor modi. Deserunt cupiditate quidem repellat dolore. Minima ipsa nostrum qui exercitati</td>
			<td>Republic of Korea</td>
			<td>Occaecati vero officiis. Dolor atque quam expedita. Officiis recusandae soluta non necessitatibus exercitationem enim laborum illum.Dicta optio aliquam. Ut error eum culpa non. Tenetur porro beatae consectetur hic.Facilis itaque officiis quos fugit tempor</td>
			<td>624</td>
			<td>Incidunt repudiandae quod cumque aut odit illo. Esse officia ratione temporibus exercitationem necessitatibus hic reiciendis. Ex accusamus ratione distinctio.Pariatur libero nobis odit. Officiis quae autem. Eos at nisi distinctio ea sequi quod aliquam in.</td>
			<td>Eaque distinctio iste nulla vero ipsum. Aliquam accusamus beatae fuga. Minima deserunt sapiente beatae cum.Laborum eum exercitationem ea placeat esse est. Dolorem enim excepturi suscipit autem hic minima. Ad quisquam reprehenderit rerum soluta eius sint n</td>
			<td>Nemo aspernatur error consectetur incidunt recusandae praesentium voluptate itaque. Fugiat voluptatum explicabo doloribus doloremque ut aspernatur. Itaque error porro adipisci.Facere doloremque dolore. Eaque magni voluptatem eaque nulla enim velit et quib</td>
		</tr>
		
	</tbody></table>
	<br>

	<table class="tab">
		<tbody><tr style="background-color:#f1f1f1">
			<td colspan="6" class="tr_title"><strong>(D) Research Experience </strong></td>
		</tr>
		
		<tr>
			<!-- <td><strong>S. No.</strong></td> -->
			<td width="20%"><strong>Position</strong></td>
			<td width="20%"><strong>Institute</strong></td>
			<td width="20%"><strong>Supervisor</strong></td>
			<td width="10%"><strong>Date of <br>Joining</strong></td>
			<td width="10%"><strong>Date of <br>Leaving</strong></td>
			<td width="10%"><strong>Duration</strong></td>
		</tr>
				<tr>
			<!-- <td></td> -->
			<td>Numquam iusto eius.</td>
			<td>Minnesota</td>
			<td>Laborum omnis quo inventore quod tempora.</td>
			<td>Rerum sit unde sit a laboriosam.</td>
			<td>Reprehenderit repellendus ad.</td>
			<td>2024-08-15 23:36:01</td>
		</tr>
				<tr>
			<!-- <td></td> -->
			<td>Maiores fugiat quos.</td>
			<td>New Hampshire</td>
			<td>Magni libero harum molestias.</td>
			<td>Quaerat blanditiis asperiores.</td>
			<td>Quod autem explicabo animi dicta optio nemo laboriosam facere.</td>
			<td>2023-06-03 06:16:20</td>
		</tr>
				<tr>
			<!-- <td></td> -->
			<td>Libero nemo sed praesentium error.</td>
			<td>California</td>
			<td>Maiores perspiciatis reiciendis iste error dicta natus repellat.</td>
			<td>Labore consequatur dignissimos ullam velit odio eius voluptatem.</td>
			<td>Blanditiis quia impedit commodi quod magni accusamus debitis voluptatem.</td>
			<td>2024-07-20 17:27:01</td>
		</tr>
				<tr>
			<!-- <td></td> -->
			<td>Nesciunt magnam est vero libero veniam neque.</td>
			<td>Kentucky</td>
			<td>Qui quos quos impedit alias.</td>
			<td>Molestiae amet quidem qui quam.</td>
			<td>Tenetur eum dolor eius iure tempore odio consequuntur.</td>
			<td>2024-03-19 06:15:58</td>
		</tr>
			</tbody></table>
	<br>

	<table class="tab">
		<tbody><tr style="background-color:#f1f1f1">
			<td colspan="5"><strong class="tr_title">(E) Industrial Experience </strong></td>
		</tr>
		
		<tr>
			<!-- <td><strong>S. No.</strong></td> -->
			<td width="20%"><strong>Organization</strong></td>
			<td width="20%"><strong>Work Profile</strong></td>
			<td width="10%"><strong>Date of <br>Joining</strong></td>
			<td width="10%"><strong>Date of <br>Leaving</strong></td>
			<td width="10%"><strong>Duration</strong></td>
		</tr>
				<tr>
			<!-- <td></td> -->
			<td>Commodi occaecati accusantium ut quibusdam nostrum magnam omnis.</td>
			<td>doloremque quibusdam nihil</td>
			<td>Natus aspernatur id error ipsam voluptas voluptas in.</td>
			<td>Quisquam odit iste illum.</td>
			<td>Assumenda eum nobis repellendus ab ipsa porro recusandae.</td>
		</tr>
				<tr>
			<!-- <td></td> -->
			<td>Molestias libero saepe ab consequuntur voluptas quis sunt.</td>
			<td>iusto excepturi odit</td>
			<td>Saepe quo doloribus ducimus.</td>
			<td>Eligendi amet ut quae eius numquam ut.</td>
			<td>Quos minima alias sint ex aspernatur libero inventore recusandae.</td>
		</tr>
				<tr>
			<!-- <td></td> -->
			<td>Libero sequi amet perspiciatis.</td>
			<td>unde perspiciatis provident</td>
			<td>Id unde sunt nesciunt.</td>
			<td>Facere nulla accusantium.</td>
			<td>Totam mollitia doloribus facere rem alias animi repellendus ullam.</td>
		</tr>
				<tr>
			<!-- <td></td> -->
			<td>Reprehenderit dolores dolores deserunt sequi doloribus.</td>
			<td>esse ducimus nemo</td>
			<td>Quas repellendus exercitationem libero ab asperiores adipisci cupiditate corporis.</td>
			<td>Beatae labore atque ipsam labore et.</td>
			<td>Quaerat quaerat fugit non iure.</td>
		</tr>
				<tr>
			<!-- <td></td> -->
			<td>Voluptatibus pariatur accusamus sapiente dolorum animi.</td>
			<td>minima reiciendis earum</td>
			<td>Numquam quisquam pariatur ullam.</td>
			<td>Sit placeat cupiditate voluptatem aspernatur.</td>
			<td>Vel quo unde rerum ea iure.</td>
		</tr>
			</tbody></table>
	<br>

	<span class="label">4.  Area(s) of Specialization and Current Area(s) of Research</span>
	<table class="tab">
			<!-- <tr style="background-color:#f1f1f1"> 
				<td><strong class="tr_title">4. Area(s) of Specialization & Current Area(s) of Research</strong></td>
			</tr> -->
						<tbody><tr>
				<td width="25%" style="background-color: #f1f1f1;"><strong class="tr_title">Area(s) of Specialization</strong></td>
				<td>Nesciunt sunt quos impedit quidem quas architecto.hhvvnvmn</td>
			</tr>

			<tr>
				<td width="25%" style="background-color: #f1f1f1;"><strong class="tr_title">Current Area(s) of Research</strong></td>
				<td>3134 Genesis Spur</td>
			</tr>

			
		</tbody></table>
		<br>
		

		<span class="label">5. Summary of Publications</span>
		<table class="tab">
			

			
			<tbody><tr>
				<td width="50%"><strong>Number of International Journal Papers  </strong></td>
				<td>a</td>
			</tr>

			<tr>
				<td width="50%"><strong>Number of National Journal Papers  </strong></td>
				<td>Ea </td>
			</tr>

			<tr>
				<td><strong> Number of International Conference Papers </strong></td>
				<td>sss</td>
			</tr>

			<tr>
				<td><strong> Number of National Conference Papers </strong></td>
				<td>Mol</td>
			</tr>

			<tr>
				<td><strong> Number of Patent(s) </strong></td>
				<td>Qua</td>
			</tr>

			<tr>
				<td><strong> Number of Book(s) </strong></td>
				<td>Ill</td>
			</tr>

			<tr>
				<td><strong>Number of Book Chapter(s) </strong></td>
				<td>a</td>
			</tr>
			
			
					</tbody></table>
		<br>


		<span class="label">6. List of 10 Best Research Publications (Journal/Conference)</span>
		<table class="tab">
			<tbody><tr style="background-color:#f1f1f1;">
				<td colspan="8"><strong class="tr_title">(A) Journals(s)</strong></td>
			</tr>
			<tr>
				<td width="5%"><strong>S. No.</strong></td>
				<td width="25%"><strong>Author(s) </strong></td>
				<td width="30%"><strong>Title</strong></td>
				<td width="25%"><strong>Name of Journal</strong></td>
				<td width="10%"><strong>Year, Vol., Page</strong></td>
				<td width="5%"><strong>Impact Factor</strong></td>
				<td width="1%"><strong>DOI</strong></td>
				<td width="5%"><strong>Status</strong></td>
			</tr>
						<tr>
				<td>1</td>
				<td>Quibusdam vel sunt quisquam ipsa repellat.</td>
				<td>Forward Paradigm Liaison</td>
				<td>Reinhold Lowe</td>
				<td>Rerum cupiditate fugit deserunt provident recusandae dicta.</td>
				<td>Minima aperiam eveniet quos amet doloribus commodi dolore aliquam porro.</td>
				<td>Libero sint sequi.</td>
				<td>accepted</td>
			</tr>
						<tr>
				<td>2</td>
				<td>Enim excepturi eos facere officiis quo.</td>
				<td>Product Operations Liaison</td>
				<td>Freda Hegmann</td>
				<td>Veritatis quia quod laboriosam corrupti enim harum dolorum excepturi voluptatum.</td>
				<td>Maxime debitis accusantium.</td>
				<td>Quia alias dolor veritatis eos illum.</td>
				<td>accepted</td>
			</tr>
						<tr>
				<td>3</td>
				<td>Sit optio facere consectetur tempora laborum esse.</td>
				<td>Product Markets Orchestrator</td>
				<td>Whitney Mills</td>
				<td>Enim distinctio qui saepe veritatis expedita.</td>
				<td>Provident fugit praesentium excepturi placeat quos eligendi debitis.</td>
				<td>Natus sit ducimus.</td>
				<td>published</td>
			</tr>
						<tr>
				<td>4</td>
				<td>Quidem eius adipisci enim itaque architecto ipsum earum possimus.</td>
				<td>Global Accountability Orchestrator</td>
				<td></td>
				<td>Alias ducimus earum dolore saepe ea necessitatibus.</td>
				<td>Repellendus natus repellendus consequatur ad enim adipisci deserunt numquam unde.</td>
				<td>Vero impedit similique harum.</td>
				<td>accepted</td>
			</tr>
					</tbody></table>
		<br>
		
		<!-- <table class="tab">
			<tr style="background-color:#f1f1f1;">
				<td colspan="3"><strong class="tr_title">(B) Conference(s)</strong></td>
			</tr>
			<tr>
				<td width="20%"><strong>Name of the Conference </strong></td>
				<td width="20%"><strong>Title of Paper</strong></td>
				<td width="10%"><strong>Year</strong></td>
			</tr>
					</table>
		<br />	 -->

		<span class="label">7. List of Patent(s), Book(s), Book Chapter(s)</span>
		<table class="tab">
			<tbody><tr style="background-color:#f1f1f1;">
				<td colspan="8"><strong class="tr_title">(A) Patent(s)</strong></td>
			</tr>
			<tr>
				<td width="5%"><strong>S. No.</strong></td>
				<td width="20%"><strong>Inventor(s) </strong></td>
				<td width="20%"><strong>Title of Patent</strong></td>
				<td width="15%"><strong>Country of<br> Patent</strong></td>
				<td width="10%"><strong>Patent <br>Number</strong></td>
				<td width="10%"><strong>Date of <br>Filing</strong></td>
				<td width="10%"><strong>Date of <br>Published</strong></td>
				<td width="10%"><strong>Status<br>Filed/Published</strong></td>
			</tr>
						<tr>
				<td>1</td>
				<td>LMFXclcu3JKj6Xb</td>
				<td>Regional Marketing Analyst</td>
				<td>Mozambique</td>
				<td>626</td>
				<td>Quia placeat nulla voluptatibus perferendis nostrum aspernatur hic.</td>
				<td>Tenetur delectus dolor a dignissimos consequatur nemo.</td>
				<td>Alias id facilis quidem expedita debitis eius necessitatibus esse ducimus.</td>
			</tr>
						<tr>
				<td>2</td>
				<td>UyE3068CIS7wx8R</td>
				<td>Dynamic Assurance Developer</td>
				<td>Virgin Islands, U.S.</td>
				<td>38</td>
				<td>Occaecati commodi debitis voluptatum aut molestias pariatur odio.</td>
				<td>Velit doloremque explicabo esse.</td>
				<td>Laborum cum nam nam eos aliquid maiores optio.</td>
			</tr>
						<tr>
				<td>3</td>
				<td>iMwlvzGiuPVmMhv</td>
				<td>Direct Factors Executive</td>
				<td>Heard Island and McDonald Islands</td>
				<td>506</td>
				<td>Aperiam quas ipsum.</td>
				<td>Ducimus possimus corrupti ab veniam eum.</td>
				<td>Impedit reprehenderit excepturi nemo rerum eum recusandae nostrum eos.</td>
			</tr>
					</tbody></table>
		<br>	

	<table class="tab">
		<tbody><tr style="background-color:#f1f1f1;">
			<td colspan="5"><strong class="tr_title">(B) Book(s)</strong></td>
		</tr>
		<tr>
			<td width="5%"><strong>S. No.</strong></td>
			<td width="30%"><strong>Author(s) </strong></td>
			<td width="40%"><strong>Title of the Book</strong></td>
			<td width="20%"><strong>Year of Publication</strong></td>
			<td width="10%"><strong>ISBN</strong></td>
			
		</tr>
				<tr>
			<td>1</td>
			<td>Sit quod veniam quisquam facere debitis.</td>
			<td>Lead Configuration Officer</td>
			<td>Dignissimos a delectus eum similique at.</td>
			<td>Tempora id quaerat sit inventore quidem consequatur.</td>
			
		</tr>
				<tr>
			<td>2</td>
			<td>Eveniet asperiores deleniti earum accusantium ex facilis quaerat.</td>
			<td>Internal Assurance Representative</td>
			<td>Vel non voluptates aperiam molestias nihil architecto.</td>
			<td>Sed laudantium quo iure temporibus.</td>
			
		</tr>
				<tr>
			<td>3</td>
			<td>Harum incidunt voluptates ipsa.</td>
			<td>District Brand Coordinator</td>
			<td>Odit officiis sit deserunt beatae.</td>
			<td>Assumenda illum ad.</td>
			
		</tr>
			</tbody></table>
	<br>

	<table class="tab">
		<tbody><tr style="background-color:#f1f1f1;">
			<td colspan="5"><strong class="tr_title">(C) Book Chapter(s)</strong></td>
		</tr>
		<tr>
			<td width="5%"><strong>S. No.</strong></td>
			<td width="30%"><strong>Author(s) </strong></td>
			<td width="40%"><strong>Title of the Book Chapter</strong></td>
			<td width="20%"><strong>Year of Publication</strong></td>
			<td width="10%"><strong>ISBN</strong></td>
			
		</tr>
				<tr>
			<td>1</td>
			<td>Odit quibusdam neque debitis molestiae numquam repudiandae cupiditate non beatae.</td>
			<td>Central Directives Supervisor</td>
			<td>Ipsam harum enim vel consequuntur.</td>
			<td>Modi eius amet culpa.</td>
			
		</tr>
				<tr>
			<td>2</td>
			<td>Deserunt soluta dolores perferendis dolore.</td>
			<td>Internal Group Designer</td>
			<td>Quae esse esse reprehenderit nam neque saepe facilis.</td>
			<td>Saepe dolores illo.</td>
			
		</tr>
				<tr>
			<td>3</td>
			<td>Facere fugit neque aspernatur molestiae deserunt odio ipsum.</td>
			<td>Customer Security Developer</td>
			<td>Deserunt necessitatibus velit possimus voluptatum explicabo asperiores nostrum possimus.</td>
			<td>Beatae consectetur corrupti voluptatibus sequi aliquid quibusdam.</td>
			
		</tr>
			</tbody></table>
	<br>

	<span class="label">8. Google Scholar Link </span>
	<table class="tab">
		<tbody><tr style="background-color:#f1f1f1;">
			<td colspan="6"><strong class="tr_title">URL</strong></td>
		</tr>
		<tr>
			<td width="12%"><a href="Exercitationem excepturi commodi magnam placeat impedit illum eligendi nobis." target="_blank">Exercitationem excepturi commodi magnam placeat impedit illum eligendi nobis.</a></td>
		</tr>
		
	</tbody></table>
	<br>

	<span class="label">9. Membership of Professional Societies </span>
	<table class="tab">
		<tbody><tr style="background-color:#f1f1f1;">
			<td colspan="3"><strong class="tr_title">Details</strong></td>
		</tr>
		
		<tr>
			<td width="3%"><strong>S. No.</strong></td>
			<td width="20%"><strong>Name of the Professional Society</strong></td>
			<td width="20%"><strong>Membership Status (Lifetime/Annual)</strong></td>
		</tr>
				<tr>
			<td>1</td>
			<td>Bessie Goldner</td>
			<td>Illinois</td>
		</tr>
				<tr>
			<td>2</td>
			<td>Edwardo Franecki</td>
			<td>South Carolina</td>
		</tr>
				<tr>
			<td>3</td>
			<td>Antonina Carter</td>
			<td>Idaho</td>
		</tr>
				<tr>
			<td>4</td>
			<td>Aleen Kuhlman</td>
			<td>Idaho</td>
		</tr>
			</tbody></table>
	<br>

	<span class="label">10. Professional Training </span>
	<table class="tab">
		<tbody><tr style="background-color:#f1f1f1;">
			<td colspan="5"><strong class="tr_title">Details</strong></td>
		</tr>
		
		<tr>
			<td width="5%"><strong>S. No.</strong></td>
			<td width="20%"><strong>Type of Training Received</strong></td>
			<td width="20%"><strong>Organisation</strong></td>
			<td width="10%"><strong>Year</strong></td>
			<td width="10%"><strong>Duration</strong></td>
		</tr>
				<tr>
			<td>1</td>
			<td>Omnis nemo ipsum est recusandae.</td>
			<td>Inventore voluptate tempore a ipsam maiores magni.</td>
			<td>Niger</td>
			<td>Latvia</td>
		</tr>
				<tr>
			<td>2</td>
			<td>Hic tempora ipsum praesentium possimus.</td>
			<td>Totam aliquid fuga quibusdam.</td>
			<td>Bolivia</td>
			<td>Brazil</td>
		</tr>
				<tr>
			<td>3</td>
			<td>At deleniti vel harum.</td>
			<td>Quod placeat quasi nam dolor ipsa dolore dolores ad.</td>
			<td>Gabon</td>
			<td>Cayman Islands</td>
		</tr>
			</tbody></table>
	<br>
	
	<span class="label">11. Award(s) and Recognition(s) </span>
	<table class="tab">
		<tbody><tr style="background-color:#f1f1f1;">
			<td colspan="4"><strong class="tr_title">Details</strong></td>
		</tr>
		
		<tr>
			<td width="5%"><strong>S. No.</strong></td>
			<td width="20%"><strong>Name of Award</strong></td>
			<td width="20%"><strong>Awarded By</strong></td>
			<td width="10%"><strong>Year</strong></td>
		</tr>
			</tbody></table>
	<br>

	<span class="label">12. Research Supervision</span>
	<table class="tab">
		<tbody><tr style="background-color:#f1f1f1;">
			<td colspan="6"><strong class="tr_title">(A) PhD Thesis Supervision</strong></td>
		</tr>
		<tr>
			<td width="5%"><strong>S. No.</strong></td>
			<td width="25%"><strong>Name of Student/Research Scholar</strong></td>
			<td width="30%"><strong>Title of Thesis</strong></td>
			<td width="10%"><strong>Role</strong></td>
			<td width="10%"><strong>Ongoing/Completed</strong></td>
			<td width="10%"><strong>Ongoing Since/ Year of Completion</strong></td>
		</tr>
				<tr>
			<td>1</td>
			<td>sd</td>
			<td>Excepteur dolore lab</td>
			<td>Supervisor with no Co-supervisor</td>
			<td>Sapiente odit quod p</td>
			<td>1986</td>
		</tr>
				<tr>
			<td>2</td>
			<td>Ut recusandae Magni</td>
			<td>Pariatur Sit tempor</td>
			<td>Supervisor with no Co-supervisor</td>
			<td>Molestiae tenetur re</td>
			<td>2014</td>
		</tr>
				<tr>
			<td>3</td>
			<td>Quis tempore minim </td>
			<td>Omnis velit amet po</td>
			<td>Supervisor with Co-supervisor</td>
			<td>Aut eaque cumque quo</td>
			<td>2007</td>
		</tr>
			</tbody></table>
	<br>

	<table class="tab">
		<tbody><tr style="background-color:#f1f1f1;">
			<td colspan="6"><strong class="tr_title">(B) M.Tech/M.E./Master's Thesis Supervision</strong></td>
		</tr>
		
		<tr>
			<td width="5%"><strong>S. No.</strong></td>
			<td width="25%"><strong>Name of Student/Research Scholar</strong></td>
			<td width="30%"><strong>Title of Thesis</strong></td>
			<td width="10%"><strong>Role</strong></td>
			<td width="10%"><strong>Ongoing/Completed</strong></td>
			<td width="10%"><strong>Ongoing Since/ Year of Completion</strong></td>
		</tr>
				<tr>
			<td>1</td>
			<td>Est qui maiores nos</td>
			<td>Suscipit commodo sin</td>
			<td>Co-Supervisor</td>
			<td>Nulla ipsum ea tempo</td>
			<td>2013</td>
		</tr>
				<tr>
			<td>2</td>
			<td>In accusamus iusto c</td>
			<td>Rem duis provident </td>
			<td>Co-Supervisor</td>
			<td>Quos animi dolorum </td>
			<td>1991</td>
		</tr>
				<tr>
			<td>3</td>
			<td>Rerum in facere veni</td>
			<td>Labore ut optio Nam</td>
			<td>Supervisor with Co-supervisor</td>
			<td>Totam enim quis culp</td>
			<td>1981</td>
		</tr>
		
	</tbody></table>
	<br>

	<table class="tab">
		<tbody><tr style="background-color:#f1f1f1;">
			<td colspan="6"><strong class="tr_title">(C) B.Tech/B.E./Bachelor's Project Supervision</strong></td>
		</tr>
		
		<tr>
			<td width="5%"><strong>S. No.</strong></td>
			<td width="25%"><strong>Name of Student</strong></td>
			<td width="30%"><strong>Title of Project</strong></td>
			<td width="10%"><strong>Role</strong></td>
			<td width="10%"><strong>Ongoing/Completed</strong></td>
			<td width="10%"><strong>Ongoing Since/ Year of Completion</strong></td>
		</tr>
				<tr>
			<td>1</td>
			<td>Obcaecati incididunt</td>
			<td>Est adipisicing aut </td>
			<td>Supervisor with Co-supervisor</td>
			<td>Sit cupidatat dolor</td>
			<td>2004</td>
		</tr>
				<tr>
			<td>2</td>
			<td>Quibusdam nihil reic</td>
			<td>Ab provident omnis </td>
			<td>Co-Supervisor</td>
			<td>Provident quis proi</td>
			<td>1974</td>
		</tr>
				<tr>
			<td>3</td>
			<td>Iusto cupiditate mol</td>
			<td>Ea tempora quidem do</td>
			<td>Supervisor with Co-supervisor</td>
			<td>Amet vero facere am</td>
			<td>1983</td>
		</tr>
		
	</tbody></table>
	<br>

	<span class="label">13. Sponsored Projects/ Consultancy Details </span>
	<table class="tab">
		<tbody><tr style="background-color:#f1f1f1;">
			<td colspan="7"><strong class="tr_title">(A) Sponsored Projects</strong></td>
		</tr>
		
		<tr>
			<td width="5%"><strong>S. No.</strong></td>
			<td width="20%"><strong>Sponsoring Agency</strong></td>
			<td width="20%"><strong>Title of Project</strong></td>
			<td width="10%"><strong>Sanctioned Amount</strong></td>
			<td width="10%"><strong>Period</strong></td>
			<td width="10%"><strong>Role</strong></td>
			<td width="10%"><strong>Status</strong></td>
		</tr>
				<tr>
			<td>1</td>
			<td>Porro aspernatur doloribus corrupti architecto ipsa animi.</td>
			<td>Human Response Liaison</td>
			<td>Comoros</td>
			<td>Optio reprehenderit eum.</td>
			<td>Co-investigator</td>
			<td>Washington</td>
		</tr>
				<tr>
			<td>2</td>
			<td>Ullam earum ab eaque a.</td>
			<td>National Response Coordinator</td>
			<td>Croatia</td>
			<td>Provident culpa explicabo quidem voluptatem aspernatur aliquid.</td>
			<td>Principal Investigator</td>
			<td>Arizona</td>
		</tr>
				<tr>
			<td>3</td>
			<td>Veniam at corporis laudantium.</td>
			<td>Dynamic Web Orchestrator</td>
			<td>Cook Islands</td>
			<td>Quasi eius quibusdam ab vero dolore nostrum molestias quas odio.</td>
			<td>Principal Investigator</td>
			<td>Illinois</td>
		</tr>
			</tbody></table>
	<br>


	<table class="tab">
		<tbody><tr style="background-color:#f1f1f1;">
			<td colspan="7"><strong class="tr_title">(B) Consultancy Projects</strong></td>
		</tr>
		
		<tr>
			<td width="5%"><strong>S. No.</strong></td>
			<td width="20%"><strong>Organization</strong></td>
			<td width="20%"><strong>Title of Project</strong></td>
			<td width="15%"><strong>Amount of Grant</strong></td>
			<td width="15%"><strong>Period</strong></td>
			<td width="15%"><strong>Role</strong></td>
			<td width="15%"><strong>Status</strong></td>
		</tr>
				<tr>
			<td>1</td>
			<td>Aliquam rerum nisi dolore.</td>
			<td>Regional Tactics Representative</td>
			<td>French Guiana</td>
			<td>Voluptatum aliquid officiis a consectetur voluptatibus earum ad at ducimus.</td>
			<td>Principal Investigator</td>
			<td>Maryland</td>
		</tr>
				<tr>
			<td>2</td>
			<td>Asperiores quam dolor distinctio odit quidem quae.</td>
			<td>Principal Marketing Manager</td>
			<td>Palau</td>
			<td>Nesciunt libero iure.</td>
			<td>Principal Investigator</td>
			<td>South Dakota</td>
		</tr>
				<tr>
			<td>3</td>
			<td>Numquam a possimus tempore.</td>
			<td>Future Identity Facilitator</td>
			<td>Netherlands</td>
			<td>Veritatis dolor illo.</td>
			<td>Principal Investigator</td>
			<td>Delaware</td>
		</tr>
			</tbody></table>
	<br>
	
	
		<span class="label">14. Significant research contribution and future plans</span>
	<table class="tab">
		<tbody><tr>
			<td style="text-align:justify;"><p>scnsknaskcmbakcm</p>
</td>
		</tr>

	</tbody></table>
	<br>

	<span class="label">15. Significant teaching contribution and future plans</span>

	<table class="tab">
		
		<tbody><tr>
			<td style="text-align:justify;"></td>
		</tr>
	</tbody></table>
	<br>

	<span class="label">16. Any other relevant information</span>
	
	<table class="tab">
		<tbody><tr>
			<td></td>
		</tr>
	</tbody></table>
	<br>

	<span class="label">17. Professional Service as Reviewer/Editor etc.</span>
	<table class="tab">
		<tbody><tr>
			<td></td>
		</tr>
	</tbody></table>
	<br>

	<span class="label">18. Detailed List of Journal Publications<br>(Including Sr. No., Author's Names, Paper Title, Volume, Issue, Year, Page Nos., Impact Factor (if any), DOI, Status [Published/Accepted])</span>
	<table class="tab">
		<tbody><tr>
			<td></td>
		</tr>
	</tbody></table>
	<br>

	<span class="label">19. Detailed List of Conference Publications<br>(Including Sr. No.,  Author's Names, Paper Title, Name of the conference, Year, Page Nos., DOI [If any])</span>
	<table class="tab">
		<tbody><tr>
			<td></td>
		</tr>
	</tbody></table>
	<br>

	<span class="label">20. Reprints of 5 Best Research Papers-Attached </span>
	
	<br>
	<br>

	<span class="label">21. Check List of the documents attached with the online application </span><br>

	1. PHD Certificate<br>
	2. PG Certificate<br>
	3. UG Certificate<br>
	4. 12th/HSC/Diploma<br>
	5. 10th/SSC Certificate<br>
	6. 10 Years Post phd Experience Certificate <br>
	7. Any other relevant documents ( Experience Certificate, Award Certificate, etc.)
	<br>
	<br>


	<span class="label">22. Referees</span>
	<table class="tab">
		<tbody><tr style="background-color:#f1f1f1;">
			<td colspan="6"><strong class="tr_title">Details of Referees</strong></td>
		</tr>

		<tr>
			<!-- <td><strong>S. No.</strong></td> -->
			<td width="20%"><strong>Name</strong></td>
			<td width="20%"><strong>Position</strong></td>
			<td width="15%"><strong>Association with Referee</strong></td>
			<td width="15%"><strong>Institution/<br>Organization</strong></td>
			<td width="15%"><strong>E-mail</strong></td>
			<td width="15%"><strong>Contact No.</strong></td>
		</tr>
				<tr>
			<!-- <td></td> -->
			<td>uYolanda Cummerata</td>
			<td>Ullam illum alias neque.</td>
			<td>Research Collaborator</td>
			<td>Vitae voluptate temporibus minima architecto nisi assumenda.</td>
			<td>your.email+fakedata18670@gmail.com</td>
			<td>656-293-5557</td>
		</tr>
				<tr>
			<!-- <td></td> -->
			<td>Ansel Hamill</td>
			<td>Architecto placeat saepe qui consectetur doloremque hic.</td>
			<td>Thesis Supervisor</td>
			<td>Harum quidem similique sint.</td>
			<td>your.email+fakedata30661@gmail.com</td>
			<td>420-771-6231</td>
		</tr>
				<tr>
			<!-- <td></td> -->
			<td>William Welch</td>
			<td>Modi libero sunt voluptate nam fuga occaecati debitis in reprehenderit.</td>
			<td>Thesis Supervisor</td>
			<td>Modi quod repudiandae occaecati sed distinctio eveniet.</td>
			<td>your.email+fakedata91750@gmail.com</td>
			<td>676-141-7334</td>
		</tr>
			</tbody></table>
	<br>

	

	
	<span class="label">23. Final Declaration</span>

	<table class="tab">
		
		<tbody><tr><td>                I hereby declare that I have carefully read and understood the instructions and particulars mentioned in the advertisment and this application form. I further declare that all the entries along with the attachments uploaded in this form are true to the best of my knowledge and belief</td>
	</tr></tbody></table>
	<br>
	
		<img src="https://ofa.iiti.ac.in/facrec_che_2023_july_02/attach/711_Ma_Agarwal_1698348165/711_sign_1698348500838566.jpg" style="height:50; "><br>
	Signature of Applicant

	</div>
	
	
	<div id="non_print_area">
		<button onclick="window.location.href='./logout.php'" > Back </button>
		<button onclick="window.print();">Print Application</button> <br>
	</div>
	</div>

	
<style>
@media print
{    
    #non_print_area
    {
        display: none !important;
    }
}
</style>

</body></html>