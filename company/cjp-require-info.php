<?php
include ('header.php');

$cmp_author_id = $_SESSION['snm_ejob_cmp_id'];
$cmp_jp_token = $_GET['token'];

    $select_query = "SELECT * FROM company_jp WHERE cjp_token = '$cmp_jp_token'";
    $cjp_info = mysqli_fetch_assoc(mysqli_query($np2con, $select_query));

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
    <div class="col-md-12 col-sm-12 grid-margin stretch-card">
    <!--Inner Content start-->
        <div class="container" id="main">
            
            <?php
                if(isset($_POST['submit'])){
                    $ci_degree = htmlspecialchars($_POST['ci_degree']);
                    $ci_trade_course = htmlspecialchars($_POST['ci_trade_course']);
                    $ci_profess_certificate = htmlspecialchars($_POST['ci_profess_certificate']);
                    $ci_experience = htmlspecialchars($_POST['ci_experience']);
                    $ci_min_experience = htmlspecialchars($_POST['ci_min_experience']);
                    $ci_max_experience = htmlspecialchars($_POST['ci_max_experience']);
                    $ci_fresher_allow = htmlspecialchars($_POST['ci_fresher_allow']);
                    $ci_area_exp_one = htmlspecialchars($_POST['ci_area_exp_one']);
                    $ci_area_exp_two = htmlspecialchars($_POST['ci_area_exp_two']);
                    $ci_area_busines_one = htmlspecialchars($_POST['ci_area_busines_one']);
                    $ci_area_busines_two = htmlspecialchars($_POST['ci_area_busines_two']);
                    $ci_skill_one = htmlspecialchars($_POST['ci_skill_one']);
                    $ci_skill_two = htmlspecialchars($_POST['ci_skill_two']);
                    $ci_skill_three = htmlspecialchars($_POST['ci_skill_three']);
                    $ci_additional_require = htmlspecialchars($_POST['ci_additional_require']);
                    $ci_gender = htmlspecialchars($_POST['ci_gender']);
                    $ci_min_age = htmlspecialchars($_POST['ci_min_age']);
                    $ci_max_age = htmlspecialchars($_POST['ci_max_age']);
                    $ci_disability_apply = htmlspecialchars($_POST['ci_disability_apply']);
                    $ci_Retired_apply = htmlspecialchars($_POST['ci_Retired_apply']);
            
                    $update_cjp = "UPDATE `company_jp` SET `ci_degree`='$ci_degree',`ci_trade_course`='$ci_trade_course',`ci_profess_certificate`= '$ci_profess_certificate',`ci_experience`='$ci_experience',`ci_min_experience`='$ci_min_experience',`ci_max_experience`='$ci_max_experience', `ci_fresher_allow`='$ci_fresher_allow',`ci_area_exp_one`='$ci_area_exp_one',`ci_area_exp_two`= '$ci_area_exp_two',`ci_area_busines_one`='$ci_area_busines_one', ci_area_busines_two = '$ci_area_busines_two', ci_skill_one = '$ci_skill_one', ci_skill_two = '$ci_skill_two', ci_skill_three = '$ci_skill_three', ci_additional_require = '$ci_additional_require', ci_gender = '$ci_gender', ci_min_age = '$ci_min_age', ci_max_age = '$ci_max_age', ci_disability_apply = '$ci_disability_apply', ci_Retired_apply = '$ci_Retired_apply' WHERE cjp_token = '$cmp_jp_token'";
                    if(mysqli_query($np2con, $update_cjp)){
                        echo gen_notification('Successfully Save This information Please fillup next form', 'success');
                        echo reloader('company/cjp-company-info.php?token='.$cmp_jp_token.'',2500);
                        
                    }
                    else {
                        echo gen_notification('This information save failed, Send currect information tray again','danger');
                    }
                }
            ?>
            
            <div style="text-align: left;" class="language-selection">
                Candidate Information
            </div>
            <div class="main-wrapper style-1" style="border-radius: 0px 0px 4px 4px; border-top: none;" role="main">
                <div class="alert-warning bg-transparent text-right pt-10 mb-10" role="alert" style="" id="HideDivForBang">
                </div>
                <!-- Progress bar Steps -->
                <?php
                    include ('cjp-progress-bar.php');
                ?>

                <h3 class="text-blue mb-40" id="pHead">Candidates requirements</h3>
                <form action="" method="POST" enctype="">

                    <div class="card-content">
                        <h4 class="form-subhead">Educational Qualification</h4>
                        <div class="form-group row mb-20">
                            <label class="col-md-3 col-form-label">Degree</label>
                            <div class="col-md-9">
                                <div id="removeable_div">
                                    <div class="form-group row">
                                    <div class="col-md-5">
                                        <select aria-label="Degree Level" class="form-control form-control-s-1 mb-10" name="ci_degree">
                                            <option <?php echo ($cjp_info['ci_degree'] == "Select Degree Level" ? "selected='selected'" : "")?> value="Select Degree Level">Select Degree Level</option>
                                            <option <?php echo ($cjp_info['ci_degree'] == "PSC/5 pass" ? "selected='selected'" : "")?> value="PSC/5 pass">PSC/5 pass</option>
                                            <option <?php echo ($cjp_info['ci_degree'] == "JSC/JDC/8 pass" ? "selected='selected'" : "")?> value="JSC/JDC/8 pass">JSC/JDC/8 pass</option>
                                            <option <?php echo ($cjp_info['ci_degree'] == "Secondary" ? "selected='selected'" : "")?> value="Secondary">Secondary </option>
                                            <option <?php echo ($cjp_info['ci_degree'] == "Higher Secondary" ? "selected='selected'" : "")?> value="Higher Secondary">Higher Secondary</option>
                                            <option <?php echo ($cjp_info['ci_degree'] == "Diploma" ? "selected='selected'" : "")?> value="Diploma">Diploma</option>
                                            <option <?php echo ($cjp_info['ci_degree'] == "Bachelor/Honors" ? "selected='selected'" : "")?> value="Bachelor/Honors">Bachelor/Honors</option>
                                            <option <?php echo ($cjp_info['ci_degree'] == "Masters" ? "selected='selected'" : "")?> value="Masters">Masters</option>
                                            <option <?php echo ($cjp_info['ci_degree'] == "PhD (Doctor of Philosophy)" ? "selected='selected'" : "")?> value="PhD (Doctor of Philosophy)">PhD (Doctor of Philosophy)</option>
                                        </select> 
                                    </div>
                                    <input type="hidden" name="DegreeId" id="hidDegreeId0" sl="0" value="">
                                    </div>
                                    <div id="create_div">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-20">
                            <label class="col-md-3 col-form-label">Training/ Trade Course</label>
                            <div class="col-md-7">
                                <div class="row">
                                    <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="as-container training" id="txtCourseErrorMsg">
                                            <div class="as-items training-items">
                                            </div>
                                            <label for="txtCourse" class="visuallyhidden">Training/ Trade Course</label>
                                            <span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span>
                                            <input maxlength="100" class="form-control form-control-s-1 no-border popTips alphanumerictext ui-autocomplete-input" placeholder="Write Training/ Trade Course" type="text" name="ci_trade_course" value="<?=$cjp_info['ci_trade_course']?>" id="txtCourse" data-toggle="popover" data-trigger="focus">
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="txtSelectedCourseList" id="hidSelectedCourse" value="">
                        <input type="hidden" name="txtSelectedCourseName" id="hidSelectedCourseName" value="">
                        <div class="form-group row mb-20">
                            <label class="col-md-3 col-form-label">Professional Certification</label>
                            <div class="col-md-7">
                                <div class="row">
                                    <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="as-container certification" id="txtCertificateErrorMsg">
                                            <div class="as-items certification-items">
                                            </div>
                                            <label for="txtCertificate" class="visuallyhidden">Professional Certification</label>
                                            <span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span><input maxlength="100" class="form-control form-control-s-1 no-border popTips alphanumerictext ui-autocomplete-input" data-trigger="focus" data-content="Write  precise and specific certificate name <br><br>Good example: CCNA, Cisco Certified Network Associate, etc.<br>Bad example: Cisco Certification" placeholder="Write Professional Certification" type="text" name="ci_profess_certificate" value="<?=$cjp_info['ci_profess_certificate']?>">
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--------------------- End Qualification ---->
                        <h4 class="form-subhead">Experience and Business Area</h4>
                        <div class="form-group row mb-20">
                            <label class="col-md-3 col-form-label">Experience</label>
                            <div class="col-md-7" id="required_exp">
                                <div class="row">
                                    <div class="col-md-12">
                                    <div class="btn-group btn-toggle-s-1 mb-20 exp-tab" data-toggle="buttons">
                                        <fieldset>
                                            <legend class="sr-only">Experience</legend>
                                            <div class="md-checkbox">
                                                <input name="ci_experience" id="chkVacancies" type="checkbox">
                                                <label for="chkVacancies" class=""><span id="HNA">&nbsp;NA</span></label>
                                            </div>
                                        </fieldset>
                                    </div>
                                    </div>
                                </div>
                                <div id="year_of_exp" class="row experience-filter">
                                    <div class="col-md-6">
                                    <label for="cmbMinExp" class="label-sm">Minimum year of experience</label>
                                    <select name="ci_min_experience" id="cmbMinExp" class="form-control form-control-s-1 on-click-disabled">
                                        <option value="-1">Any</option>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                        <option value="14">14</option>
                                        <option value="15">15</option>
                                        <option value="16">16</option>
                                        <option value="17">17</option>
                                        <option value="18">18</option>
                                        <option value="19">19</option>
                                        <option value="20">20</option>
                                    </select>
                                    </div>
                                    <div class="col-md-6">
                                    <label for="cmbMaxExp" class="label-sm">Maximum year of experience</label>
                                    <select name="ci_max_experience" id="cmbMaxExp" class="form-control form-control-s-1 on-click-disabled">
                                        <option value="-1">Any</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                        <option value="14">14</option>
                                        <option value="15">15</option>
                                        <option value="16">16</option>
                                        <option value="17">17</option>
                                        <option value="18">18</option>
                                        <option value="19">19</option>
                                        <option value="20">20</option>
                                    </select>
                                    </div>
                                    <div class="col-md-12">
                                    </div>
                                    <div class="col-md-12">
                                    <div class="md-checkbox mb-20">
                                        <input type="checkbox" name="ci_fresher_allow" id="optExperienceFreshers" value="1">
                                        <label for="optExperienceFreshers" class="">Freshers are also encouraged to apply</label>
                                    </div>
                                    </div>
                                    <label class="col-md-12 label-sm" id="area_of_exp">Area of experience</label>
                                    <div class="col-md-12 mb-10">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="txtExperiance" class="visuallyhidden">Area of Experience</label>
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <label for="JobRequirements" class="visuallyhidden">Additional Requirements</label>
                                                        <textarea name="ci_area_exp_one" id="JobRequirements" cols="30" rows="4" class="form-control form-control-s-1 popTips " placeholder="Experience one" data-toggle="popover" data-trigger="focus" data-content="This will help to get your desired candidates.<br>*List your requirements (e.g. skills) precisely that you need from a candidate.<br>*Mention any other relevant skills that are preferred but not required." data-original-title=""><?=$cjp_info['ci_area_exp_one']?></textarea>
                                                    </div><div class="col-md-5">
                                                        <label for="JobRequirements" class="visuallyhidden">Additional Requirements</label>
                                                        <textarea name="ci_area_exp_two" id="JobRequirements" cols="30" rows="4" class="form-control form-control-s-1 popTips " placeholder="Experience two" data-toggle="popover" data-trigger="focus" data-content="This will help to get your desired candidates.<br>*List your requirements (e.g. skills) precisely that you need from a candidate.<br>*Mention any other relevant skills that are preferred but not required." data-original-title=""><?=$cjp_info['ci_area_exp_two']?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <label class="col-md-12 col-form-label label-sm" id="area_of_business">Area of business</label>
                                    <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <label for="JobRequirements" class="visuallyhidden">Additional Requirements</label>
                                                        <textarea name="ci_area_busines_one" id="JobRequirements" cols="30" rows="4" class="form-control form-control-s-1 popTips " placeholder="addintional requirement" data-toggle="popover" data-trigger="focus" data-content="This will help to get your desired candidates.<br>*List your requirements (e.g. skills) precisely that you need from a candidate.<br>*Mention any other relevant skills that are preferred but not required." data-original-title=""><?=$cjp_info['ci_area_busines_one']?></textarea>
                                                    </div><div class="col-md-5">
                                                        <label for="JobRequirements" class="visuallyhidden">Additional Requirements</label>
                                                        <textarea name="ci_area_busines_two" id="JobRequirements" cols="30" rows="4" class="form-control form-control-s-1 popTips " placeholder="additional requirement" data-toggle="popover" data-trigger="focus" data-content="This will help to get your desired candidates.<br>*List your requirements (e.g. skills) precisely that you need from a candidate.<br>*Mention any other relevant skills that are preferred but not required." data-original-title=""><?=$cjp_info['ci_area_busines_two']?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="form-group row mb-20" id="job_skill">
                                <label class="col-md-3 col-form-label">Skills</label>
                                <div class="col-md-7">
                                    <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="JobRequirements" class="visuallyhidden">Additional Requirements</label>
                                                    <textarea name="ci_skill_one" id="JobRequirements" cols="30" rows="4" class="form-control form-control-s-1 popTips " placeholder="Write Skill" ><?=$cjp_info['ci_skill_one']?></textarea>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="JobRequirements" class="visuallyhidden">Additional Requirements</label>
                                                    <textarea name="ci_skill_two" id="JobRequirements" cols="30" rows="4" class="form-control form-control-s-1 popTips " placeholder="Write Skill"><?=$cjp_info['ci_skill_two']?></textarea>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="JobRequirements" class="visuallyhidden">Additional Requirements</label>
                                                    <textarea name="ci_skill_three" id="JobRequirements" cols="30" rows="4" class="form-control form-control-s-1 popTips " placeholder="Write Skill"><?=$cjp_info['ci_skill_three']?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="txtSelectedSkillList" id="hidSelectedSkill" value="">
                            <input type="hidden" name="txtSelectedSkillName" id="hidSelectedSkillName" value="">
                            <input type="hidden" name="txtNewSelectedSkillName" id="hidNewSelectedSkillName" value="">
                            <div class="form-group row mb-20">
                                <label class="col-md-3 col-form-label">Additional Requirements</label>
                                <div class="col-md-7">
                                    <label for="JobRequirements" class="visuallyhidden">Additional Requirements</label>
                                    <textarea name="ci_additional_require" id="JobRequirements" cols="30" rows="4" class="form-control form-control-s-1 popTips " placeholder="Write Additional Requirements" data-toggle="popover" data-trigger="focus" data-content="This will help to get your desired candidates.<br>*List your requirements (e.g. skills) precisely that you need from a candidate.<br>*Mention any other relevant skills that are preferred but not required." data-original-title=""><?=$cjp_info['ci_additional_require']?></textarea>
                                </div>
                            </div>
                            <h4 class="form-subhead">Personal Information</h4>
                            <div class="form-group row mb-20" id="job_gender">
                                <label class="col-md-3 col-form-label">Gender</label>
                                <div class="col-md-7">
                                    <fieldset>
                                        <legend class="sr-only">Gender</legend>
                                    	<div class="wplace">
                                            <div class="md-checkbox wp">
                                                <input id="male" name="ci_gender" value="Male" type="checkbox">
                                                <label for="male" class="">Male</label>
                                            </div>
                                            <div class="md-checkbox wp">
                                                <input id="female" name="ci_gender" value="Female" type="checkbox">
                                                <label for="female" class="">Female</label>
                                            </div>
                                            <div class="md-checkbox wp">
                                                <input id="maleorfemale" name="ci_gender" value="Male or Female Both" type="checkbox">
                                                <label for="maleorfemale" class="">Male or Female Both</label>
                                            </div>
                                            <div class="md-checkbox wp">
                                                <input id="others" name="ci_gender" value="Others" type="checkbox">
                                                <label for="others" class="">Others</label>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <input type="hidden" name="optPreGender" id="optPreGender" value="">
                            <div class="form-group row mb-20" id="job_age">
                                <label class="col-md-3 col-form-label">Age</label>
                                <div class="col-md-7">
                                    <div class="row">
                                    <div class="col-md-6">
                                        <label for="cmbMinAge" class="label-sm">Min</label>
                                        <select aria-label="Age range min age" name="ci_min_age" id="cmbMinAge" class="form-control form-control-s-1 on-click-disabled">
                                            <option value="-1">Any</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                            <option value="21">21</option>
                                            <option value="22">22</option>
                                            <option value="23">23</option>
                                            <option value="24">24</option>
                                            <option value="25">25</option>
                                            <option value="26">26</option>
                                            <option value="27">27</option>
                                            <option value="28">28</option>
                                            <option value="29">29</option>
                                            <option value="30">30</option>
                                            <option value="31">31</option>
                                            <option value="32">32</option>
                                            <option value="33">33</option>
                                            <option value="34">34</option>
                                            <option value="35">35</option>
                                            <option value="36">36</option>
                                            <option value="37">37</option>
                                            <option value="38">38</option>
                                            <option value="39">39</option>
                                            <option value="40">40</option>
                                            <option value="41">41</option>
                                            <option value="42">42</option>
                                            <option value="43">43</option>
                                            <option value="44">44</option>
                                            <option value="45">45</option>
                                            <option value="46">46</option>
                                            <option value="47">47</option>
                                            <option value="48">48</option>
                                            <option value="49">49</option>
                                            <option value="50">50</option>
                                            <option value="51">51</option>
                                            <option value="52">52</option>
                                            <option value="53">53</option>
                                            <option value="54">54</option>
                                            <option value="55">55</option>
                                            <option value="56">56</option>
                                            <option value="57">57</option>
                                            <option value="58">58</option>
                                            <option value="59">59</option>
                                            <option value="60">60</option>
                                            <option value="61">61</option>
                                            <option value="62">62</option>
                                            <option value="63">63</option>
                                            <option value="64">64</option>
                                            <option value="65">65</option>
                                            <option value="66">66</option>
                                            <option value="67">67</option>
                                            <option value="68">68</option>
                                            <option value="69">69</option>
                                            <option value="70">70</option>
                                            <option value="71">71</option>
                                            <option value="72">72</option>
                                            <option value="73">73</option>
                                            <option value="74">74</option>
                                            <option value="75">75</option>
                                            <option value="76">76</option>
                                            <option value="77">77</option>
                                            <option value="78">78</option>
                                            <option value="79">79</option>
                                            <option value="80">80</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="cmbMaxAge" class="label-sm">Max</label>
                                        <select aria-label="Age range max age" name="ci_max_age" id="cmbMaxAge" class="form-control form-control-s-1 on-click-disabled">
                                            <option value="-1">Any</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                            <option value="21">21</option>
                                            <option value="22">22</option>
                                            <option value="23">23</option>
                                            <option value="24">24</option>
                                            <option value="25">25</option>
                                            <option value="26">26</option>
                                            <option value="27">27</option>
                                            <option value="28">28</option>
                                            <option value="29">29</option>
                                            <option value="30">30</option>
                                            <option value="31">31</option>
                                            <option value="32">32</option>
                                            <option value="33">33</option>
                                            <option value="34">34</option>
                                            <option value="35">35</option>
                                            <option value="36">36</option>
                                            <option value="37">37</option>
                                            <option value="38">38</option>
                                            <option value="39">39</option>
                                            <option value="40">40</option>
                                            <option value="41">41</option>
                                            <option value="42">42</option>
                                            <option value="43">43</option>
                                            <option value="44">44</option>
                                            <option value="45">45</option>
                                            <option value="46">46</option>
                                            <option value="47">47</option>
                                            <option value="48">48</option>
                                            <option value="49">49</option>
                                            <option value="50">50</option>
                                            <option value="51">51</option>
                                            <option value="52">52</option>
                                            <option value="53">53</option>
                                            <option value="54">54</option>
                                            <option value="55">55</option>
                                            <option value="56">56</option>
                                            <option value="57">57</option>
                                            <option value="58">58</option>
                                            <option value="59">59</option>
                                            <option value="60">60</option>
                                            <option value="61">61</option>
                                            <option value="62">62</option>
                                            <option value="63">63</option>
                                            <option value="64">64</option>
                                            <option value="65">65</option>
                                            <option value="66">66</option>
                                            <option value="67">67</option>
                                            <option value="68">68</option>
                                            <option value="69">69</option>
                                            <option value="70">70</option>
                                            <option value="71">71</option>
                                            <option value="72">72</option>
                                            <option value="73">73</option>
                                            <option value="74">74</option>
                                            <option value="75">75</option>
                                            <option value="76">76</option>
                                            <option value="77">77</option>
                                            <option value="78">78</option>
                                            <option value="79">79</option>
                                            <option value="80">80</option>
                                        </select>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <!-- pwd start here  -->
                            <div class="form-group row mb-20">
                                <label class="col-md-3 col-form-label">Person with disability can apply<i class="icon-question text-grey" data-container="body" data-toggle="popover" data-placement="top" data-content="Do you think this job is suitable for &quot;Disable person&quot;?" data-trigger="hover" data-original-title="" title=""></i></label>
                                <div class="col-md-7">
                                    <label class="switch" for="pwdswit">                      
                                        <input name="ci_disability_apply" id="pwdswit" type="checkbox" class="switch-input pwdswit " value="1">
                                        <span class="switch-label" data-on="Yes" data-off="No"></span>
                                        <span class="switch-handle"></span>
                                    </label>
                                </div>
                            </div>
                            <!-------------Ends here--------->
                            <div class="form-group row mb-20">
                                <label class="col-md-3 col-form-label">Preferred Retired Army Officer&nbsp;<i class="icon-question text-grey" data-container="body" data-toggle="popover" data-placement="top" data-content="Do you prefer &quot;Retired Army Officer&quot; for this position?" data-trigger="hover" data-original-title="" title=""></i></label>
                                <div class="col-md-7">
                                    <label class="switch" id="RetiredArmyLB"> 
                                    <span class="sr-only">Do you prefer "Retired Army Officer" for this position? switch button</span>                     
                                    <input name="ci_Retired_apply" id="chkRetiredArmy" type="checkbox" class="switch-input" value="1">
                                    <span class="switch-label" data-on="Yes" data-off="No"></span>
                                    <span class="switch-handle"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                    
                                    <div class="col-md-12">
                                        <div class="divider s-2 mb-30 mt-20"></div>
                                    </div>

                                    <div class="col-md-4 col-md-pull-8">
                                        <div class="btn-left">
                                            <a href="cjp-more-info.php" class="btn btn-danger btn-lg"> Back </a>
                                        </div>
                                    </div>
                        
                                    <div class="col-md-8 col-md-push-4">
                                        <div class="btn-group-right">
                                            <button type="submit" name="submit" class="btn btn-info btn-lg step2draft" actionval="1"> Save & Continue </button>
                                            <!-- <button type="submit" name="submit" style="background: #b1318e; color: white;" class="btn btn-lg step2" actionval="0">&nbsp;Continue<i class="icon-angle-right icon-small"><span style="display:none;">Continue</span></i></button> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <!--Inner Content End--> 
    </div>
    <div class="row">
    </div>
</div>
</div>
</div>
<?php include ('footer.php'); ?>