	<link href='https://fonts.googleapis.com/css?family=Quicksand:300,400,700' rel='stylesheet' type='text/css'>
	<!--<link href='https://fonts.googleapis.com/css?family=Lato:400,300' rel='stylesheet' type='text/css'>-->

	<style>


header {
  display: block;
  overflow: hidden;
  position: relative;
  padding-bottom: 2em;
  -moz-border-radius-topleft: 8px;
  -webkit-border-top-left-radius: 8px;
  border-top-left-radius: 8px;
  -moz-border-radius-topright: 8px;
  -webkit-border-top-right-radius: 8px;
  border-top-right-radius: 8px; }

.container {
  width: 320px;
  margin: 3em auto 1em auto;
  -webkit-border-radius: 8px;
  -moz-border-radius: 8px;
  -ms-border-radius: 8px;
  -o-border-radius: 8px;
  border-radius: 8px;
  padding-bottom: 1.5em;
  background-color: #dde1e2;
  -webkit-box-shadow: #bdc3c7 0 5px 5px;
  -moz-box-shadow: #bdc3c7 0 5px 5px;
  box-shadow: #bdc3c7 0 5px 5px; }

.bg {
border-bottom: 8px solid #03A9F4;
    width: 100%;
    height: auto;}

.bio:hover > .desc {
  cursor: pointer;
  opacity: 1; }

.avatarcontainer {
  position: absolute;
  bottom: 0;
  right: 0;
  left: 0;
  margin: auto;
  width: 70px;
  height: 70px;
  display: block; }
  .avatarcontainer:hover > .hover {
    opacity: 1; }

.avatar {
width: 100%;
    border: 4px solid #03a9f4;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    -ms-border-radius: 50%;
    -o-border-radius: 50%;
    border-radius: 10px;
    overflow: hidden;
    position: relative;
    margin-top: -28px;
  
  }
  .avatar img {
    width: 65px;
    height: 65px; }
  .avatar:hover + .hover {
    opacity: 1;
    cursor: pointer; }

.hover {
  position: absolute;
  cursor: pointer;
  width: 100%;
  height: 100%;
  background-color: #3498db;
  top: 0;
  font-size: 1.8em;
  text-align: center;
  color: white;
  padding-top: 18%;
  opacity: 0;
  font-family: 'FontAwesome';
  font-weight: 300;
  border: 8px solid #5cc0ff;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  -ms-border-radius: 50%;
  -o-border-radius: 50%;
  border-radius: 50%;
  -webkit-transition-property: all;
  -moz-transition-property: all;
  -o-transition-property: all;
  transition-property: all;
  -webkit-transition-duration: 0.5s;
  -moz-transition-duration: 0.5s;
  -o-transition-duration: 0.5s;
  transition-duration: 0.5s;
  -webkit-transition-timing-function: ease;
  -moz-transition-timing-function: ease;
  -o-transition-timing-function: ease;
  transition-timing-function: ease; }

.data {
  margin-top: .6em;
  color: #81878b; }
  .data li {
    width: 32%;
    text-align: center;
    display: inline-block;
    font-size: 1.5em;
    font-family: 'Lato';
    border-right: solid 1px #bdc3c7; }
    .data li:last-child {
      border: none; }
    .data li span {
      display: block;
      text-transform: uppercase;
      font-family: 'Quicksand';
      font-size: .5em;
      margin-top: .6em;
      font-weight:700;
    }

.desc {
  position: absolute;
  top: 0;
  background-color: rgba(0, 0, 0, 0.6);
  width: 100%;
  height: 171px;
  padding: 1.2em 1em 0 1em;
  color: white;
  text-align: center;
  opacity: 1;
  -webkit-transition-property: all;
  -moz-transition-property: all;
  -o-transition-property: all;
  transition-property: all;
  -webkit-transition-duration: 0.3s;
  -moz-transition-duration: 0.3s;
  -o-transition-duration: 0.3s;
  transition-duration: 0.3s;
  -webkit-transition-timing-function: ease-in;
  -moz-transition-timing-function: ease-in;
  -o-transition-timing-function: ease-in;
  transition-timing-function: ease-in; }
  .desc h3 {
    font-family: "Lato";
    font-size: 1.2em;
    margin-bottom: .5em; }
  .desc p {
    font-size: .9em;
    font-family: 'Quicksand';
    line-height: 1.5em; }

.follow {
  margin: 1.5em auto 0 auto;
  background-color: #2589cc;
  width: 150px;
  color: white;
  font-family: "Lato";
  text-align: center;
  padding: .5em;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  -ms-border-radius: 5px;
  -o-border-radius: 5px;
  border-radius: 5px;
  -webkit-transition-property: all;
  -moz-transition-property: all;
  -o-transition-property: all;
  transition-property: all;
  -webkit-transition-duration: 0.3s;
  -moz-transition-duration: 0.3s;
  -o-transition-duration: 0.3s;
  transition-duration: 0.3s;
  -webkit-transition-timing-function: ease;
  -moz-transition-timing-function: ease;
  -o-transition-timing-function: ease;
  transition-timing-function: ease; }
  .follow:hover {
    background-color: #167abd;
    cursor: pointer; }
	</style>



<div class="card-block">
<div class="row">


   <?php
							  $queryv = mysqli_query($np2con,"SELECT * FROM staff");	
							  $montawd = array();
							  while ($rowc = mysqli_fetch_array($queryv)) { 
							  if($rowc['stf_id'] != 'Ejob-Admin'){
								$mntly_admited = student_count_author($rowc['stf_id'],'admission_this_month');
							  $montawd[''.$rowc['stf_id'].''] = $mntly_admited;  
							  }}
							  arsort($montawd);
							  $cnt =1;
							  foreach ($montawd as $key => $value){
								if($cnt < 5) {
			$xuser_profile = 'images/avatar.jpg';							
	$queryv = mysqli_query($np2con,"SELECT * FROM staff  inner join desiganation on  staff.stf_desiganation = desiganation.d_id where stf_id = '{$key}'");	
	while ($rowc = mysqli_fetch_array($queryv)) { 
	$xstf_name = $rowc['stf_name'];
	$xstf_photo = $rowc['stf_photo'];
	}
	if($xstf_photo !=''){$xuser_profile = 'upload/staff/'.$xstf_photo.'';}													
							
echo '
<div class="col-md-3">
<div class="containerx  card">
		<header >
			<div class="bio card">
        <img src="images/cosmos.png" alt="background" class="bg">
				<div class="desc">
					<h3>'.$xstf_name.'</h3>
					<img src="images/award-'.$cnt.'.png">
				</div>
			</div>

<div class="avatarcontainer">
<img src="'.$xuser_profile.'" alt="avatar" class="avatar">
</div>
</header>

		<div class="content ">
			<div class="data">
				<ul>
					<li class="green">'.$value.'<span>Admission</span></li>
					<li>'.student_count_author($key,'form_this_month').'<span>Form</span></li>
					<li>'.student_count_author($key,'today_admission').'<span>Today</span></li>
				</ul>
			</div>

			<br>
		</div>	</div>	</div>
';						
								
								
								
								} 
								$cnt++; 
							  }
							  
							  ?>















</div>
</div>