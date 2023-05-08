<?php 
   include ('header.php');
    $cmp_author_id = $_SESSION['snm_ejob_cmp_id'];
?>
</head>
<body>
   <div class="container-scroller">
      <?php include ('nav.php');?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
         <div class="main-panel">
            <div class="content-wrapper">
               <div class="row">
                  <?php
                     // include ('part1.php');
                     ?>
               </div>
               <!-- eBazar Left Side profile and menu -->
               <div class="row">
                  <div class="col-md-12 mt-2 grid-margin m-auto">
                    <?php
                    
                    if(isset($_POST['submit'])){
                       $ac_cmp_name = htmlspecialchars($_POST['ac_cmp_name']);
                       $ac_cmp_name_bangla = $_POST['ac_cmp_name_bangla'];
                       $ac_cmp_establish = $_POST['ac_cmp_establish'];
                       $ac_cmp_size = $_POST['ac_cmp_size'];
                       $ac_cmp_country = htmlspecialchars($_POST['ac_cmp_country']);
                       $ac_cmp_district = htmlspecialchars($_POST['ac_cmp_district']);
                       $ac_cmp_thana = htmlspecialchars($_POST['ac_cmp_thana']);
                       $ac_cmp_address = htmlspecialchars($_POST['ac_cmp_address']);
                       $ac_cmp_address_bangla = htmlspecialchars($_POST['ac_cmp_address_bangla']);
                       $ac_cmp_category = htmlspecialchars($_POST['ac_cmp_category']);
                       $ac_cmp_type = htmlspecialchars($_POST['ac_cmp_type']);
                       $ac_cmp_discription = $_POST['ac_cmp_discription'];
                       $ac_cmp_trade_license = $_POST['ac_cmp_trade_license'];
                       $ac_cmp_rl_agency = $_POST['ac_cmp_rl_agency'];
                       $ac_cmp_website_url = $_POST['ac_cmp_website_url'];
                       $ac_cmp_person_name = $_POST['ac_cmp_person_name'];
                       $ac_cmp_person_desig = $_POST['ac_cmp_person_desig'];
                       $ac_cmp_person_email = $_POST['ac_cmp_person_email'];
                       return $ac_cmp_phone = $_POST['ac_cmp_phone'];
                     //   $ac_cmp_other_facility = $_POST['ac_cmp_other_facility'];
                   
                       if($_FILES['ac_cmp_logo']['name']){
                         $user_image_name = $_FILES['ac_cmp_logo']['name'];
                         $after_explode = explode(".", $user_image_name);
                         $image_extension = end($after_explode);
                         $accepted_extension = ['jpg', 'JPG', 'png', 'PNG', 'jpeg', 'JPEG', 'webp', 'WEBP', 'GIF', 'gif'];
                         
                         if(!in_array($image_extension, $accepted_extension)){
                             $_SESSION['image_extention_missing'] = "This image formate is not accepted!";
                             header("location: add-new-company.php");
                             die();
                         } 
                         if($_FILES['ac_cmp_logo']['size'] > 1000000){
                             $_SESSION['ac_cmp_logo'] = "This file size greater than 1 MB!";
                             header("location: add-new-company.php");
                             die();
                         }
                         $user_image_query = "SELECT all_company FROM ac_cmp_logo WHERE ac_author_id = '$cmp_author_id'";
                         $old_image_name = mysqli_fetch_assoc(mysqli_query($np2con, $user_image_query))['ac_cmp_logo'];
                   
                         if($old_image_name != "default.png"){
                             unlink("images/company-img/" . $old_image_name);
                         }
                         // image uploade start
                         $image_new_name = random_int(123123, 2345234) . "EJOBS" . "." . $image_extension;
                   
                         $user_temp_location = $_FILES['ac_cmp_logo']['tmp_name'];    
                         $new_location = "images/company-img/" . $image_new_name;
                         move_uploaded_file($user_temp_location, $new_location);
                         // image uploade End
                       }
                   
                       $insert_query = "INSERT INTO `all_company`(`ac_author_id`, `ac_cmp_name`, `ac_cmp_name_bangla`, `ac_cmp_establish`, `ac_cmp_size`, `ac_cmp_country`, `ac_cmp_district`, `ac_cmp_thana`, `ac_cmp_address`, `ac_cmp_address_bangla`, `ac_cmp_category`, `ac_cmp_type`, `ac_cmp_discription`, `ac_cmp_trade_license`, `ac_cmp_rl_agency`, `ac_cmp_website_url`, `ac_cmp_person_name`, `ac_cmp_person_desig`, `ac_cmp_person_email`, `ac_cmp_phone`, `ac_cmp_logo`) VALUES ('$cmp_author_id', '$ac_cmp_name', '$ac_cmp_name_bangla', '$ac_cmp_establish', '$ac_cmp_size', '$ac_cmp_country', '$ac_cmp_district', '$ac_cmp_thana', '$ac_cmp_address', '$ac_cmp_address_bangla', '$ac_cmp_category', '$ac_cmp_type', '$ac_cmp_discription', '$ac_cmp_trade_license', '$ac_cmp_rl_agency', '$ac_cmp_website_url', '$ac_cmp_person_name', '$ac_cmp_person_desig', '$ac_cmp_person_email', '$ac_cmp_phone', '$image_new_name')";
                       if(mysqli_query($np2con, $insert_query)){
                            echo gen_notification('Successfully Company Added.','success');
                            echo reloader('company/',3500);
                        }
                        else {
                            echo gen_notification('This Company added failed, Send valid information & tray again.','danger'); 
                        }
                     }
                    
                    ?>
                     <div style="border: 3px solid #e0e0e0;" class="bg-white p-3">
                        <div class="job-board emp-reg-form">
                           <h3 class="page-title">Company Registration Form</h3>
                           <form action="" method="POST" enctype="multipart/form-data">
                              <section>
                                 <div class="row">
                                    <div class="col-sm-6">
                                       <div class="form-group" id="companyname">
                                          <label for="txtCompanyName">Company Name*</label>
                                          <input type="text" class="form-control companyname" maxlength="120" placeholder="Type Company Name" name="ac_cmp_name" required>
                                          <p class="company-error-msg"></p>
                                       </div>
                                    </div>
                                    <div class="col-sm-6">
                                       <div class="form-group">
                                          <label for="txtCompanyBangla" class="bn">কোম্পানির নাম (বাংলায়)</label>
                                          <input type="text" class="form-control" maxlength="120" placeholder="কোম্পানির নাম বাংলায় লিখুন" name="ac_cmp_name_bangla">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-sm-6">
                                       <div class="form-group" id="CompanyEstablished">
                                          <label for="txtCompanyEstablished">Year of Establishment</label>
                                          <input type="text" class="form-control" maxlength="4" placeholder="Type Company's Establishment Year, e.g. 2003" name="ac_cmp_establish" required>
                                          <p class="company-error-msg"></p>
                                       </div>
                                    </div>
                                    <div class="col-sm-6">
                                       <div class="form-group">
                                          <label for="ComSize">Company Size</label>
                                          <select class="form-control"  id="ComSize" name="ac_cmp_size" required>
                                             <option value="-1">Select Company Size</option>
                                             <option value="1-15">1-15 employees</option>
                                             <option value="16-30">16-30 employees</option>
                                             <option value="31-50">31-50 employees</option>
                                             <option value="51-120">51-120 employees</option>
                                             <option value="121-300">121-300 employees</option>
                                             <option value="301-500">301-500 employees</option>
                                             <option value="501-1000">501-1000 employees</option>
                                             <option value="1001-5000">1001-5000 employees</option>
                                             <option value="5001-10000">5001-10000 employees</option>
                                             <option value="10000-0">10000+ employees</option>
                                          </select>
                                       </div>
                                    </div>
                                 </div>
                                 <h4 class="company-address">Company Address*</h4>
                                 <div class="address-wrap">
                                    <div class="row">
                                       <div class="col-sm-12">
                                          <div class="form-group">
                                             <label for="Country" class="visuallyhidden">Select Country</label>
                                             <select class="form-control" id="Country" name="ac_cmp_country" required>
                                                <option value="-1">Select Country</option>
                                                <option value="Afghanistan">Afghanistan</option>
                                                <option value="Albania">Albania</option>
                                                <option value="Algeria">Algeria</option>
                                                <option value="American Samoa">American Samoa</option>
                                                <option value="Andorra">Andorra</option>
                                                <option value="Angola">Angola</option>
                                                <option value="Anguilla">Anguilla</option>
                                                <option value="Antarctica">Antarctica</option>
                                                <option value="Antigua">Antigua</option>
                                                <option value="Argentina">Argentina</option>
                                                <option value="Armenia">Armenia</option>
                                                <option value="Aruba">Aruba</option>
                                                <option value="Australia">Australia</option>
                                                <option value="Austria">Austria</option>
                                                <option value="Azerbaijan">Azerbaijan</option>
                                                <option value="Bahamas">Bahamas</option>
                                                <option value="Bahrain">Bahrain</option>
                                                <option value="Bangladesh" selected="selected">Bangladesh</option>
                                                <option value="Barbados">Barbados</option>
                                                <option value="Belarus">Belarus</option>
                                                <option value="Belgium">Belgium</option>
                                                <option value="Belize">Belize</option>
                                                <option value="Benin">Benin</option>
                                                <option value="Bermuda">Bermuda</option>
                                                <option value="Bhutan">Bhutan</option>
                                                <option value="Bolivia">Bolivia</option>
                                                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                                <option value="Botswana">Botswana</option>
                                                <option value="Brazil">Brazil</option>
                                                <option value="British Virgin Islands">British Virgin Islands</option>
                                                <option value="Brunei">Brunei</option>
                                                <option value="Bulgaria">Bulgaria</option>
                                                <option value="Burkina Faso">Burkina Faso</option>
                                                <option value="Burundi">Burundi</option>
                                                <option value="Cambodia">Cambodia</option>
                                                <option value="Cameroon">Cameroon</option>
                                                <option value="Canada">Canada</option>
                                                <option value="Cape Verde">Cape Verde</option>
                                                <option value="Central African Republic">Central African Republic</option>
                                                <option value="Chad">Chad</option>
                                                <option value="Chile">Chile</option>
                                                <option value="China">China</option>
                                                <option value="Colombia">Colombia</option>
                                                <option value="Comoros">Comoros</option>
                                                <option value="Congo">Congo</option>
                                                <option value="Congo (Zaire)">Congo (Zaire)</option>
                                                <option value="Cook Islands">Cook Islands</option>
                                                <option value="Costa Rica">Costa Rica</option>
                                                <option value="Cote d'Ivoire (Ivory Coast)">Cote d'Ivoire (Ivory Coast)</option>
                                                <option value="Croatia">Croatia</option>
                                                <option value="Cuba">Cuba</option>
                                                <option value="Cyprus">Cyprus</option>
                                                <option value="Czech Republic">Czech Republic</option>
                                                <option value="Denmark">Denmark</option>
                                                <option value="Djibouti">Djibouti</option>
                                                <option value="Dominica">Dominica</option>
                                                <option value="Dominican Republic">Dominican Republic</option>
                                                <option value="East Timor">East Timor</option>
                                                <option value="Ecuador">Ecuador</option>
                                                <option value="Egypt">Egypt</option>
                                                <option value="El Salvador">El Salvador</option>
                                                <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                <option value="Eritrea">Eritrea</option>
                                                <option value="Estonia">Estonia</option>
                                                <option value="Ethiopia">Ethiopia</option>
                                                <option value="Falkland Islands">Falkland Islands</option>
                                                <option value="Federated States of Micronesia">Federated States of Micronesia</option>
                                                <option value="Fiji">Fiji</option>
                                                <option value="Finland">Finland</option>
                                                <option value="France">France</option>
                                                <option value="French Guiana">French Guiana</option>
                                                <option value="French Polynesia">French Polynesia</option>
                                                <option value="Gabon">Gabon</option>
                                                <option value="Gaza Strip and West Bank">Gaza Strip and West Bank</option>
                                                <option value="Georgia">Georgia</option>
                                                <option value="Germany">Germany</option>
                                                <option value="Ghana">Ghana</option>
                                                <option value="Gibraltar">Gibraltar</option>
                                                <option value="Greece">Greece</option>
                                                <option value="Greenland">Greenland</option>
                                                <option value="Grenada">Grenada</option>
                                                <option value="Guadeloupe">Guadeloupe</option>
                                                <option value="Guam">Guam</option>
                                                <option value="Guatemala">Guatemala</option>
                                                <option value="Guinea">Guinea</option>
                                                <option value="Guinea-Bissau">Guinea-Bissau</option>
                                                <option value="Guyana">Guyana</option>
                                                <option value="Haiti">Haiti</option>
                                                <option value="Honduras">Honduras</option>
                                                <option value="Hong Kong">Hong Kong</option>
                                                <option value="Hungary">Hungary</option>
                                                <option value="Iceland">Iceland</option>
                                                <option value="India">India</option>
                                                <option value="Indonesia">Indonesia</option>
                                                <option value="Iran">Iran</option>
                                                <option value="Iraq">Iraq</option>
                                                <option value="Ireland">Ireland</option>
                                                <option value="Israel">Israel</option>
                                                <option value="Italy">Italy</option>
                                                <option value="Jamaica">Jamaica</option>
                                                <option value="Japan">Japan</option>
                                                <option value="Jordan">Jordan</option>
                                                <option value="Kazakhstan">Kazakhstan</option>
                                                <option value="Kenya">Kenya</option>
                                                <option value="Kiribati">Kiribati</option>
                                                <option value="Kuwait">Kuwait</option>
                                                <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                <option value="Laos">Laos</option>
                                                <option value="Latvia">Latvia</option>
                                                <option value="Lebanon">Lebanon</option>
                                                <option value="Lesotho">Lesotho</option>
                                                <option value="Liberia">Liberia</option>
                                                <option value="Libya">Libya</option>
                                                <option value="Liechtenstein">Liechtenstein</option>
                                                <option value="Lithuania">Lithuania</option>
                                                <option value="Luxembourg">Luxembourg</option>
                                                <option value="Macau">Macau</option>
                                                <option value="Macedonia">Macedonia</option>
                                                <option value="Madagascar">Madagascar</option>
                                                <option value="Malawi">Malawi</option>
                                                <option value="Malaysia">Malaysia</option>
                                                <option value="Maldives">Maldives</option>
                                                <option value="Mali">Mali</option>
                                                <option value="Malta">Malta</option>
                                                <option value="Marshall Islands">Marshall Islands</option>
                                                <option value="Martinique">Martinique</option>
                                                <option value="Mauritania">Mauritania</option>
                                                <option value="Mauritius">Mauritius</option>
                                                <option value="Mayotte">Mayotte</option>
                                                <option value="Mexico">Mexico</option>
                                                <option value="Moldova">Moldova</option>
                                                <option value="Monaco">Monaco</option>
                                                <option value="Mongolia">Mongolia</option>
                                                <option value="Montenegro">Montenegro</option>
                                                <option value="Montserrat">Montserrat</option>
                                                <option value="Morocco">Morocco</option>
                                                <option value="Mozambique">Mozambique</option>
                                                <option value="Myanmar">Myanmar</option>
                                                <option value="Namibia">Namibia</option>
                                                <option value="Nauru">Nauru</option>
                                                <option value="Nepal">Nepal</option>
                                                <option value="Netherlands">Netherlands</option>
                                                <option value="Netherlands Antilles">Netherlands Antilles</option>
                                                <option value="New Caledonia">New Caledonia</option>
                                                <option value="New Zealand">New Zealand</option>
                                                <option value="Nicaragua">Nicaragua</option>
                                                <option value="Niger">Niger</option>
                                                <option value="Nigeria">Nigeria</option>
                                                <option value="North Korea">North Korea</option>
                                                <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                                <option value="Norway">Norway</option>
                                                <option value="Oman">Oman</option>
                                                <option value="Pakistan">Pakistan</option>
                                                <option value="Palau">Palau</option>
                                                <option value="Panama">Panama</option>
                                                <option value="Papua New Guinea">Papua New Guinea</option>
                                                <option value="Paraguay">Paraguay</option>
                                                <option value="Peru">Peru</option>
                                                <option value="Philippines">Philippines</option>
                                                <option value="Pitcairn Islands">Pitcairn Islands</option>
                                                <option value="Poland">Poland</option>
                                                <option value="Portugal">Portugal</option>
                                                <option value="Puerto Rico">Puerto Rico</option>
                                                <option value="Qatar">Qatar</option>
                                                <option value="Reunion">Reunion</option>
                                                <option value="Romania">Romania</option>
                                                <option value="Russia">Russia</option>
                                                <option value="Rwanda">Rwanda</option>
                                                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                                <option value="Saint Lucia">Saint Lucia</option>
                                                <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                                <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                                                <option value="Samoa">Samoa</option>
                                                <option value="San Marino">San Marino</option>
                                                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                                <option value="Saudi Arabia">Saudi Arabia</option>
                                                <option value="Senegal">Senegal</option>
                                                <option value="Serbia and Montenegro (Yugoslavia)">Serbia and Montenegro (Yugoslavia)</option>
                                                <option value="Seychelles">Seychelles</option>
                                                <option value="Sierra Leone">Sierra Leone</option>
                                                <option value="Singapore">Singapore</option>
                                                <option value="Slovakia">Slovakia</option>
                                                <option value="Slovenia">Slovenia</option>
                                                <option value="Solomon Islands">Solomon Islands</option>
                                                <option value="Somalia">Somalia</option>
                                                <option value="South Africa">South Africa</option>
                                                <option value="South Korea">South Korea</option>
                                                <option value="South Sudan">South Sudan</option>
                                                <option value="Spain">Spain</option>
                                                <option value="Sri Lanka">Sri Lanka</option>
                                                <option value="Sudan">Sudan</option>
                                                <option value="Suriname">Suriname</option>
                                                <option value="Swaziland">Swaziland</option>
                                                <option value="Sweden">Sweden</option>
                                                <option value="Switzerland">Switzerland</option>
                                                <option value="Syria">Syria</option>
                                                <option value="Taiwan">Taiwan</option>
                                                <option value="Tajikistan">Tajikistan</option>
                                                <option value="Tanzania">Tanzania</option>
                                                <option value="Thailand">Thailand</option>
                                                <option value="The Gambia">The Gambia</option>
                                                <option value="The Holy See">The Holy See</option>
                                                <option value="Togo">Togo</option>
                                                <option value="Tonga">Tonga</option>
                                                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                                <option value="Tunisia">Tunisia</option>
                                                <option value="Turkey">Turkey</option>
                                                <option value="Turkmenistan">Turkmenistan</option>
                                                <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                                <option value="Tuvalu">Tuvalu</option>
                                                <option value="Uganda">Uganda</option>
                                                <option value="Ukraine">Ukraine</option>
                                                <option value="United Arab Emirates">United Arab Emirates</option>
                                                <option value="United Kingdom">United Kingdom</option>
                                                <option value="United States">United States</option>
                                                <option value="United States Virgin Islands">United States Virgin Islands</option>
                                                <option value="Uruguay">Uruguay</option>
                                                <option value="Uzbekistan">Uzbekistan</option>
                                                <option value="Vanuatu">Vanuatu</option>
                                                <option value="Venezuela">Venezuela</option>
                                                <option value="Vietnam">Vietnam</option>
                                                <option value="West Bank and Gaza Strip">West Bank and Gaza Strip</option>
                                                <option value="Western Sahara">Western Sahara</option>
                                                <option value="Yemen">Yemen</option>
                                                <option value="Zambia">Zambia</option>
                                                <option value="Zimbabwe">Zimbabwe</option>
                                             </select>
                                             <p class="company-error-msg"></p>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-sm-6 select-wrap ">
                                          <div class="form-group">
                                             <label for="cboCity" class="visuallyhidden">Select District</label>
                                             <select class="form-control" id="cboCity" name="ac_cmp_district" required>
                                                <option value="-1">Select District</option>
                                                <option value="agerhat">Bagerhat</option>
                                                <!--selected="sted"--> 
                                                <option value="andarban">Bandarban</option>
                                                <!--selected="sted"--> 
                                                <option value="arguna">Barguna</option>
                                                <!--selected="sted"--> 
                                                <option value="arishal">Barishal</option>
                                                <!--selected="sted"--> 
                                                <option value="hola">Bhola</option>
                                                <!--selected="sted"--> 
                                                <option value="ogura">Bogura</option>
                                                <!--selected="sted"--> 
                                                <option value="rahmanbaria">Brahmanbaria</option>
                                                <!--selected="sted"--> 
                                                <option value="handpur">Chandpur</option>
                                                <!--selected="sted"--> 
                                                <option value="hapainawabganj">Chapainawabganj</option>
                                                <!--selected="sted"--> 
                                                <option value="Chattogram">Chattogram</option>
                                                <!--selected="sted"--> 
                                                <option value="Chuadanga">Chuadanga</option>
                                                <!--selected="sted"--> 
                                                <option value="Cox's Bazar">Cox's Bazar</option>
                                                <!--selected="sted"--> 
                                                <option value="Cumilla">Cumilla</option>
                                                <!--selected="sted"--> 
                                                <option value="Dhaka">Dhaka</option>
                                                <!--selected="sted"--> 
                                                <option value="Dinajpur">Dinajpur</option>
                                                <!--selected="sted"--> 
                                                <option value="Faridpur">Faridpur</option>
                                                <!--selected="sted"--> 
                                                <option value="Feni">Feni</option>
                                                <!--selected="sted"--> 
                                                <option value="Gaibandha">Gaibandha</option>
                                                <!--selected="sted"--> 
                                                <option value="Gazipur">Gazipur</option>
                                                <!--selected="sted"--> 
                                                <option value="Gopalganj">Gopalganj</option>
                                                <!--selected="selected"--> 
                                                <option value="Habiganj">Habiganj</option>
                                                <!--selected="sted"--> 
                                                <option value="Jamalpur">Jamalpur</option>
                                                <!--selected="sted"--> 
                                                <option value="Jashore">Jashore</option>
                                                <!--selected="sted"--> 
                                                <option value="Jhalakathi">Jhalakathi</option>
                                                <!--selected="sted"--> 
                                                <option value="Jhenaidah">Jhenaidah</option>
                                                <!--selected="sted"--> 
                                                <option value="Joypurhat">Joypurhat</option>
                                                <!--selected="sted"--> 
                                                <option value="Khagrachhari">Khagrachhari</option>
                                                <!--selected="sted"--> 
                                                <option value="Khulna">Khulna</option>
                                                <!--selected="sted"--> 
                                                <option value="Kishoreganj">Kishoreganj</option>
                                                <!--selected="sted"--> 
                                                <option value="Kurigram">Kurigram</option>
                                                <!--selected="sted"--> 
                                                <option value="Kushtia">Kushtia</option>
                                                <!--selected="sted"--> 
                                                <option value="Laksmipur">Laksmipur</option>
                                                <!--selected="sted"--> 
                                                <option value="Lalmonirhat">Lalmonirhat</option>
                                                <!--selected="sted"--> 
                                                <option value="Madaripur">Madaripur</option>
                                                <!--selected="sted"--> 
                                                <option value="Magura">Magura</option>
                                                <!--selected="sted"--> 
                                                <option value="Manikganj">Manikganj</option>
                                                <!--selected="sted"--> 
                                                <option value="Meherpur">Meherpur</option>
                                                <!--selected="sted"--> 
                                                <option value="Moulvibazar">Moulvibazar</option>
                                                <!--selected="sted"--> 
                                                <option value="Munshiganj">Munshiganj</option>
                                                <!--selected="sted"--> 
                                                <option value="Mymensingh">Mymensingh</option>
                                                <!--selected="selected"--> 
                                                <option value="Naogaon">Naogaon</option>
                                                <!--selected="sted"--> 
                                                <option value="Narail">Narail</option>
                                                <!--selected="sted"--> 
                                                <option value="Narayanganj">Narayanganj</option>
                                                <!--selected="sted"--> 
                                                <option value="Narsingdi">Narsingdi</option>
                                                <!--selected="sted"--> 
                                                <option value="Natore">Natore</option>
                                                <!--selected="sted"--> 
                                                <option value="Netrokona">Netrokona</option>
                                                <!--selected="sted"--> 
                                                <option value="Nilphamari">Nilphamari</option>
                                                <!--selected="sted"--> 
                                                <option value="Noakhali">Noakhali</option>
                                                <!--selected="sted"--> 
                                                <option value="Pabna">Pabna</option>
                                                <!--selected="sted"--> 
                                                <option value="Panchagarh">Panchagarh</option>
                                                <!--selected="sted"--> 
                                                <option value="Patuakhali">Patuakhali</option>
                                                <!--selected="sted"--> 
                                                <option value="Pirojpur">Pirojpur</option>
                                                <!--selected="sted"--> 
                                                <option value="Rajbari">Rajbari</option>
                                                <!--selected="sted"--> 
                                                <option value="Rajshahi">Rajshahi</option>
                                                <!--selected="sted"--> 
                                                <option value="Rangamati">Rangamati</option>
                                                <!--selected="sted"--> 
                                                <option value="Rangpur">Rangpur</option>
                                                <!--selected="sted"--> 
                                                <option value="Satkhira">Satkhira</option>
                                                <!--selected="sted"--> 
                                                <option value="Shariatpur">Shariatpur</option>
                                                <!--selected="sted"--> 
                                                <option value="Sherpur">Sherpur</option>
                                                <!--selected="sted"--> 
                                                <option value="Sirajganj">Sirajganj</option>
                                                <!--selected="selected"--> 
                                                <option value="Sunamganj">Sunamganj</option>
                                                <!--selected="selected"--> 
                                                <option value="Sylhet">Sylhet</option>
                                                <!--selected="selected"--> 
                                                <option value="Tangail">Tangail</option>
                                                <!--selected="selected"--> 
                                                <option value="Thakurgaon">Thakurgaon</option>
                                                <!--selected="selected"--> 
                                             </select>
                                             <p class="company-error-msg"></p>
                                          </div>
                                       </div>
                                       <div class="col-sm-6 select-wrap ">
                                          <div class="form-group">
                                             <label for="txtOrganizationName" class="visuallyhidden">Select Thana</label>
                                             <input type="text" class="form-control" placeholder="Enter Thana name" name="ac_cmp_thana">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-sm-6 select-wrap ">
                                          <div class="form-group">
                                             <label for="txtCompanyAddress" class="visuallyhidden">Write company address in english</label>
                                             <textarea class="form-control" rows="3" maxlength="300" placeholder="Write Company Address" name="ac_cmp_address" required></textarea>
                                             <p class="company-error-msg"></p>
                                          </div>
                                       </div>
                                       <div class="col-sm-6 select-wrap ">
                                          <div class="form-group">
                                             <label for="txtCompanyAddressBng" class="visuallyhidden">Write company address in bangla</label>
                                             <textarea class="form-control" rows="3" id="txtCompanyAddressBng" maxlength="300" placeholder="কোম্পানীর ঠিকানা বাংলায় লিখুন " name="ac_cmp_address_bangla"></textarea>
                                             <p class="company-error-msg"></p>
                                          </div>
                                       </div>
                                    </div>
                                    <!--this is testing html end-->
                                 </div>
                                 <h4 class="industry-type">Industry Type*</h4>
                                 <div class="row">
                                    <div class="col-sm-6">
                                       <div class="form-group">
                                          <label for="optIndustryType" class="visuallyhidden">Select Industry Category</label>
                                          <select class="form-control" id="optIndustryType" name="ac_cmp_category" required>
                                             <option value="-1">Select Category</option>
                                             <option value="Agro based Industry">Agro based Industry</option>
                                             <option value="Airline/ Travel/ Tourism">Airline/ Travel/ Tourism </option>
                                             <option value="Architecture/ Engineering/ Construction">Architecture/ Engineering/ Construction</option>
                                             <option value="Automobile/Industrial Machine">Automobile/Industrial Machine</option>
                                             <option value="Bank/ Non-Bank Fin. Institution">Bank/ Non-Bank Fin. Institution</option>
                                             <option value="Education">Education</option>
                                             <option value="Electronics/ Consumer Durables">Electronics/ Consumer Durables</option>
                                             <option value="Energy/ Power/ Fuel">Energy/ Power/ Fuel</option>
                                             <option value="Entertainment/ Recreation">Entertainment/ Recreation</option>
                                             <option value="Fire, Safety Protection">Fire, Safety &amp; Protection</option>
                                             <option value="Food Beverage Industry">Food &amp; Beverage Industry</option>
                                             <option value="Garments/ Textile">Garments/ Textile</option>
                                             <option value="Govt./ Semi-Govt./ Autonomous">Govt./ Semi-Govt./ Autonomous</option>
                                             <option value="Hospital/ Diagnostic Center">Hospital/ Diagnostic Center </option>
                                             <option value="Hotel/Restaurant">Hotel/Restaurant</option>
                                             <option value="Information Technology (IT)">Information Technology (IT)</option>
                                             <option value="Logistics/ Transportation">Logistics/ Transportation</option>
                                             <option value="Manufacturing (Heavy Industry)">Manufacturing (Heavy Industry)</option>
                                             <option value="Manufacturing (Light Industry)">Manufacturing (Light Industry) </option>
                                             <option value="Media (Satellite/ Print/ Online)/ Advertising/ Event Mgt.">Media (Satellite/ Print/ Online)/ Advertising/ Event Mgt.</option>
                                             <option value="NGO/Development">NGO/Development</option>
                                             <option value="Pharmaceuticals">Pharmaceuticals</option>
                                             <option value="Real Estate/ Development">Real Estate/ Development</option>
                                             <option value="Security Service">Security Service</option>
                                             <option value="Telecommunication">Telecommunication</option>
                                             <option value="Wholesale/ Retail/ Export-Import">Wholesale/ Retail/ Export-Import</option>
                                             <option value="Others">Others</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-sm-6">
                                       <div class="form-group">
                                          <label for="txtOrganizationName" class="visuallyhidden">Write Industry Type</label>
                                          <input type="text" class="form-control" placeholder="Search IndustryType" name="ac_cmp_type" required>
                                       </div>
                                    </div>
                                 </div>
                        </div>
                        <div class="business">
                        <div class="form-group">
                        <label for="txtDescription">Business Description</label>
                        <textarea class="form-control" rows="4" placeholder="Write Business Description" name="ac_cmp_discription" required></textarea>
                        </div>
                        <div class="row">
                        <div class="col-sm-6">
                        <div class="form-group">
                        <label for="business_license_no">Business/ Trade License No</label>
                        <input type="text" class="form-control" maxlength="30" placeholder="Business/ Trade License No" name="ac_cmp_trade_license" required>
                        </div>
                        </div>
                        <div class="col-sm-6">
                        <div class="form-group">
                        <label for="business_license_no">RL No (Only for Recruiting Agency)</label>
                        <input type="text" class="form-control" maxlength="30" name="ac_cmp_rl_agency" placeholder="RL/NO Recruiting Agency" value="">
                        </div>
                        </div>
                        <div class="col-sm-12">
                        <div class="form-group">
                        <label for="website_url">Website URL</label>
                        <input type="text" class="form-control" maxlength="50" name="ac_cmp_website_url" id="website_url" placeholder="Type Website URL" value="" >
                        </div>
                        </div>
                        </div>
                        </div>
                        </section>
                        <hr>
                        <section>
                        <h4 class="primary-contact">Primary Contact</h4>
                        <div class="row">
                        <div class="col-sm-6">
                        <div class="form-group">
                        <label for="txtContactPerson">Contact Person's Name*</label>
                        <input type="text" class="form-control" maxlength="100" name="ac_cmp_person_name" id="txtContactPerson" placeholder="Type contact person's name" style="" value="" required >
                        <p class="company-error-msg"></p>
                        </div>
                        </div>
                        <div class="col-sm-6">
                        <div class="form-group">
                        <label for="txtDesignation">Contact Person's Designation*</label>
                        <input type="text" class="form-control" maxlength="100" name="ac_cmp_person_desig" id="txtDesignation" placeholder="Type contact person's designation" style="" value="">
                        <p class="company-error-msg"></p>
                        </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-sm-6">
                        <div class="form-group">
                        <label for="txtContactEmail">Contact Person's Email*</label>
                        <input type="text" class="form-control" maxlength="45" name="ac_cmp_person_email" id="txtContactEmail" placeholder="Type contact person's email" value="">
                        <p class="company-error-msg"></p>
                        </div>
                        </div>
                        <div class="col-sm-6">
                        <div class="form-group">
                        <label for="txtContactMobile">Contact Person's Mobile</label>
                        <input type="tel" class="form-control" placeholder="Mobile number" id="ac_cmp_phone" name="ac_cmp_phone" value="" maxlength="13" required>
                        </div>
                        </div>
                        </div>
                        </section>
                        <hr>
                        <!--person with disability-start-->
                        <section>
                        <div class="form-group">
                        <label class="text-dark h6" ><h6>Add Your Company Logo</h6></label>
                        <br>
                        <!-- When select image than show this image Code start -->
                        <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
                        <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
                        <style>
                        article, aside, figure, footer, header, hgroup, 
                        menu, nav, section { display: block; }
                        </style>
                        <img id="blah" class="img-sm mt-2 mb-4" style="height:140px !important; width: 140px; border:1px solid #ddd;padding:2px; border-radius:2px !important;" src="http://demo.activeitzone.com/shop/uploads/product_image/default.jpg" alt="your image" /><br>
                        <input class="form-control" type='file' onchange="readURL(this); " name="ac_cmp_logo" required />
                        <?php
                           if(isset($_SESSION['image_extention_missing'])){
                           ?>
                        <span class="text-danger mt-2">
                        <?php
                           echo $_SESSION['image_extention_missing'];
                           unset($_SESSION['image_extention_missing']);
                           ?>
                        </span>
                        <?php
                           }
                           ?>
                        <?php
                           if(isset($_SESSION['file_size_not_accepting'])){
                           ?>
                        <span class="text-danger mt-2">
                        <?php
                           echo $_SESSION['file_size_not_accepting'];
                           unset($_SESSION['file_size_not_accepting']);
                           ?>
                        </span>
                        <?php
                           }
                           ?>
                        <?php
                           if(isset($_SESSION['picture_update_status'])){
                           ?>
                        <div class="alert alert-success">
                        <?php
                           echo $_SESSION['picture_update_status'];
                           unset($_SESSION['picture_update_status']);
                           ?>
                        </div>
                        <?php
                           }
                           ?>
                        <script>
                           function readURL(input) {
                             if (input.files && input.files[0]) {
                                 var reader = new FileReader();
                           
                                 reader.onload = function (e) {
                                     $('#blah')
                                       .attr('src', e.target.result)
                                       .width(140)
                                       .height(140);
                                 };
                           
                                 reader.readAsDataURL(input.files[0]);
                             }
                           }
                        </script>
                        <!-- When select image than show this image Code End -->
                        </div>
                        </section>
                        <hr>
                        <section>
                        <div class="text-center">
                        <button type="submit" name="submit" class="btn btn-info p-3 mt-4"> Save New Company <i class="icon-angle-right"></i></button>
                        </div>
                        </section>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
            </div>
         </div>
      </div>
   </div>
   <?php include ('footer.php');?>