<?php 
use App\User; 
$datingCount = User::datingProfileExists(Auth::User()['id']);
if($datingCount==1){
    $datingCountText = "My Dating Profile";
    $datingCountText2 = "Update Dating profile below:- ";
} else {
    $datingCountText = "Add Dating Profile";
    $datingCountText2 = "Add Dating profile by filling out the form below:- ";
}
$datingProfile = User::datingProfileDetails(Auth::User()['id']);
/*$datingProfile = json_decode(json_encode($datingProfile));
echo "<pre>"; print_r($datingProfile); die;*/
?>
@extends('layouts.frontLayout.front_design')
@section('content')
<div id="right_container">
    <div style="padding:20px 15px 30px 15px;">
        <h1>{{ $datingCountText }}</h1>
        <div> <strong> <br />
            {{ $datingCountText2 }}</strong><br />
        </div>
        <div>
            <br />
            <h6 class="inner">Personal Information</h6>
            <br />
            <form id="datingForm" name="datingForm" action="{{ url('/step/2') }}" method="post">
                {{ csrf_field() }}
                @if(!empty($datingProfile->user_id))
                    <input type="hidden" name="user_id" value="{{ $datingProfile->user_id }}">
                @endif
                <table width="80%" cellpadding="10" cellspacing="10">
                    <tr>
                        <td align="left" valign="top" class="body"><strong> Date of Birth: * </strong></td>
                        <td align="left" valign="top"><input autocomplete="off" id="dob" name="dob" @if(!empty($datingProfile['dob'])) value="{{ $datingProfile['dob'] }}" @endif type="text" style="width:200px; font-size: 14px" /></td>
                    </tr>
                    <tr>
                        <td align="left" valign="top" class="body"><strong> Gender: * </strong></td>
                        <td align="left" valign="top">
                            <select name="gender" style="width:208px; font-size: 14px; height: 25px;">
                                <option>Select</option>
                                <option value="Male" @if(!empty($datingProfile['gender']) && $datingProfile['gender']=="Male") selected="" @endif>Male</option>
                                <option value="Female" @if(!empty($datingProfile['gender']) && $datingProfile['gender']=="Female") selected="" @endif>Female</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" valign="top" class="body"><strong> Height: * </strong></td>
                        <td align="left" valign="top">
                            <select name="height" style="width:208px; font-size: 14px; height: 25px;">
                                <option value="">Feet/Inches</option>
                                <option value="4' 0'" @if(!empty($datingProfile['height']) && $datingProfile['height']=="4' 0'") selected="" @endif>4' 0"</option>
                                <option value="4' 1'" @if(!empty($datingProfile['height']) && $datingProfile['height']=="4' 1'") selected="" @endif>4' 1"</option>
                                <option value="4' 2'" @if(!empty($datingProfile['height']) && $datingProfile['height']=="4' 2'") selected="" @endif>4' 2"</option>
                                <option value="4' 3'" @if(!empty($datingProfile['height']) && $datingProfile['height']=="4' 3'") selected="" @endif>4' 3"</option>
                                <option value="4' 4'" @if(!empty($datingProfile['height']) && $datingProfile['height']=="4' 4'") selected="" @endif>4' 4"</option>
                                <option value="4' 5'" @if(!empty($datingProfile['height']) && $datingProfile['height']=="4' 5'") selected="" @endif>4' 5"</option>
                                <option value="4' 6'" @if(!empty($datingProfile['height']) && $datingProfile['height']=="4' 6'") selected="" @endif>4' 6"</option>
                                <option value="4' 7'" @if(!empty($datingProfile['height']) && $datingProfile['height']=="4' 7'") selected="" @endif>4' 7"</option>
                                <option value="4' 8'" @if(!empty($datingProfile['height']) && $datingProfile['height']=="4' 8'") selected="" @endif>4' 8"</option>
                                <option value="4' 9'" @if(!empty($datingProfile['height']) && $datingProfile['height']=="4' 9'") selected="" @endif>4' 9"</option>
                                <option value="4' 10'" @if(!empty($datingProfile['height']) && $datingProfile['height']=="4' 10'") selected="" @endif>4' 10"</option>
                                <option value="4' 11'" @if(!empty($datingProfile['height']) && $datingProfile['height']=="4' 11'") selected="" @endif>4' 11"</option>
                                <option value="5' 0'" @if(!empty($datingProfile['height']) && $datingProfile['height']=="5' 0'") selected="" @endif>5' 0"</option>
                                <option value="5' 1'" @if(!empty($datingProfile['height']) && $datingProfile['height']=="5' 1'") selected="" @endif>5' 1"</option>
                                <option value="5' 2'" @if(!empty($datingProfile['height']) && $datingProfile['height']=="5' 2'") selected="" @endif>5' 2"</option>
                                <option value="5' 3'" @if(!empty($datingProfile['height']) && $datingProfile['height']=="5' 3'") selected="" @endif>5' 3"</option>
                                <option value="5' 4'" @if(!empty($datingProfile['height']) && $datingProfile['height']=="5' 4'") selected="" @endif>5' 4"</option>
                                <option value="5' 5'" @if(!empty($datingProfile['height']) && $datingProfile['height']=="5' 5'") selected="" @endif>5' 5"</option>
                                <option value="5' 6'" @if(!empty($datingProfile['height']) && $datingProfile['height']=="5' 6'") selected="" @endif>5' 6"</option>
                                <option value="5' 7'" @if(!empty($datingProfile['height']) && $datingProfile['height']=="5' 7'") selected="" @endif>5' 7"</option>
                                <option value="5' 8'" @if(!empty($datingProfile['height']) && $datingProfile['height']=="5' 8'") selected="" @endif>5' 8"</option>
                                <option value="5' 9'" @if(!empty($datingProfile['height']) && $datingProfile['height']=="5' 9'") selected="" @endif>5' 9"</option>
                                <option value="5' 10'" @if(!empty($datingProfile['height']) && $datingProfile['height']=="5' 10'") selected="" @endif>5' 10"</option>
                                <option value="5' 11'" @if(!empty($datingProfile['height']) && $datingProfile['height']=="5' 11'") selected="" @endif>5' 11"</option>
                                <option value="6' 0'" @if(!empty($datingProfile['height']) && $datingProfile['height']=="6' 0'") selected="" @endif>6' 0"</option>
                                <option value="6' 1'" @if(!empty($datingProfile['height']) && $datingProfile['height']=="6' 1'") selected="" @endif>6' 1"</option>
                                <option value="6' 2'" @if(!empty($datingProfile['height']) && $datingProfile['height']=="6' 2'") selected="" @endif>6' 2"</option>
                                <option value="6' 3'" @if(!empty($datingProfile['height']) && $datingProfile['height']=="6' 3'") selected="" @endif>6' 3"</option>
                                <option value="6' 4'" @if(!empty($datingProfile['height']) && $datingProfile['height']=="6' 4'") selected="" @endif>6' 4"</option>
                                <option value="6' 5'" @if(!empty($datingProfile['height']) && $datingProfile['height']=="6' 5'") selected="" @endif>6' 5"</option>
                                <option value="6' 6'" @if(!empty($datingProfile['height']) && $datingProfile['height']=="6' 6'") selected="" @endif>6' 6"</option>
                                <option value="6' 7'" @if(!empty($datingProfile['height']) && $datingProfile['height']=="6' 7'") selected="" @endif>6' 7"</option>
                                <option value="6' 8'" @if(!empty($datingProfile['height']) && $datingProfile['height']=="6' 8'") selected="" @endif>6' 8"</option>
                                <option value="6' 9'" @if(!empty($datingProfile['height']) && $datingProfile['height']=="6' 9'") selected="" @endif>6' 9"</option>
                                <option value="6' 10'" @if(!empty($datingProfile['height']) && $datingProfile['height']=="6' 10'") selected="" @endif>6' 10"</option>
                                <option value="6' 11'" @if(!empty($datingProfile['height']) && $datingProfile['height']=="6' 11'") selected="" @endif>6' 11"</option>
                                <option value="7' 0'" @if(!empty($datingProfile['height']) && $datingProfile['height']=="7' 0'") selected="" @endif>7' 0"</option>
                                <option value="7' 1'" @if(!empty($datingProfile['height']) && $datingProfile['height']=="7' 1'") selected="" @endif>7' 1"</option>
                                <option value="7' 2'" @if(!empty($datingProfile['height']) && $datingProfile['height']=="7' 2'") selected="" @endif>7' 2"</option>
                                <option value="7' 3'" @if(!empty($datingProfile['height']) && $datingProfile['height']=="7' 3'") selected="" @endif>7' 3"</option>
                                <option value="7' 4'" @if(!empty($datingProfile['height']) && $datingProfile['height']=="7' 4'") selected="" @endif>7' 4"</option>
                                <option value="7' 5'" @if(!empty($datingProfile['height']) && $datingProfile['height']=="7' 5'") selected="" @endif>7' 5"</option>
                                <option value="7' 6'" @if(!empty($datingProfile['height']) && $datingProfile['height']=="7' 6'") selected="" @endif>7' 6"</option>
                                <option value="7' 7'" @if(!empty($datingProfile['height']) && $datingProfile['height']=="7' 7'") selected="" @endif>7' 7"</option>
                                <option value="7' 8'" @if(!empty($datingProfile['height']) && $datingProfile['height']=="7' 8'") selected="" @endif>7' 8"</option>
                                <option value="7' 9'" @if(!empty($datingProfile['height']) && $datingProfile['height']=="7' 9'") selected="" @endif>7' 9"</option>
                                <option value="7' 10'" @if(!empty($datingProfile['height']) && $datingProfile['height']=="7' 10'") selected="" @endif>7' 10"</option>
                                <option value="7' 11'" @if(!empty($datingProfile['height']) && $datingProfile['height']=="7' 11'") selected="" @endif>7' 11"</option>
                                <option value="8' 0'" @if(!empty($datingProfile['height']) && $datingProfile['height']=="8' 0'") selected="" @endif>8' 0"</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" valign="top" class="body"><strong> Marital Status: * </strong></td>
                        <td align="left" valign="top">
                            <select name="marital_status" style="width:208px; font-size: 14px; height: 25px;">
                                <option value="">Select</option>
                                <option value="Unmarried" @if(!empty($datingProfile['marital_status']) && $datingProfile['marital_status']=="Unmarried") selected="" @endif>Unmarried</option>
                                <option value="Married"  @if(!empty($datingProfile['marital_status']) && $datingProfile['marital_status']=="Married") selected="" @endif>Married</option>
                                <option value="Divorced"  @if(!empty($datingProfile['marital_status']) && $datingProfile['marital_status']=="Divorced") selected="" @endif>Divorced</option>
                                <option value="Widowed"  @if(!empty($datingProfile['marital_status']) && $datingProfile['marital_status']=="Widowed") selected="" @endif>Widowed</option>
                                <option value="Seperated"  @if(!empty($datingProfile['marital_status']) && $datingProfile['marital_status']=="Seperated") selected="" @endif>Seperated</option>
                                <option value="Annulled"  @if(!empty($datingProfile['marital_status']) && $datingProfile['marital_status']=="Annulled") selected="" @endif>Annulled</option>
                                <option value="Other"  @if(!empty($datingProfile['marital_status']) && $datingProfile['marital_status']=="Other") selected="" @endif>Other</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" valign="top" class="body"><strong> Body Type: </strong></td>
                        <td align="left" valign="top">
                            <select name="body_type" style="width:208px; font-size: 14px; height: 25px;">
                                <option value="">Select</option>
                                <option value="Slim" @if(!empty($datingProfile['body_type']) && $datingProfile['body_type']=="Slim") selected="" @endif>Slim</option>
                                <option value="Average" @if(!empty($datingProfile['body_type']) && $datingProfile['body_type']=="Average") selected="" @endif>Average</option>
                                <option value="Athletic" @if(!empty($datingProfile['body_type']) && $datingProfile['body_type']=="Athletic") selected="" @endif>Athletic</option>
                                <option value="Heavy" @if(!empty($datingProfile['body_type']) && $datingProfile['body_type']=="Heavy") selected="" @endif>Heavy</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" valign="top" class="body"><strong> Complexion: </strong></td>
                        <td align="left" valign="top">
                            <select name="complexion" style="width:208px; font-size: 14px; height: 25px;">
                                <option value="">Select</option>
                                <option value="Very Fair" @if(!empty($datingProfile['complexion']) && $datingProfile['complexion']=="Very Fair") selected="" @endif>Very Fair</option>
                                <option value="Fair" @if(!empty($datingProfile['complexion']) && $datingProfile['complexion']=="Fair") selected="" @endif>Fair</option>
                                <option value="Wheatish" @if(!empty($datingProfile['complexion']) && $datingProfile['complexion']=="Wheatish") selected="" @endif>Wheatish</option>
                                <option value="Dark" @if(!empty($datingProfile['complexion']) && $datingProfile['complexion']=="Dark") selected="" @endif>Dark</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" valign="top" class="body"><strong> City: </strong></td>
                        <td align="left" valign="top"><input autocomplete="off" id="city" name="city" @if(!empty($datingProfile['city'])) value="{{ $datingProfile['city'] }}" @endif type="text" style="width:200px; font-size: 14px" /></td>
                    </tr>
                    <tr>
                        <td align="left" valign="top" class="body"><strong> State: </strong></td>
                        <td align="left" valign="top"><input autocomplete="off" id="state" name="state" @if(!empty($datingProfile['state'])) value="{{ $datingProfile['state'] }}" @endif type="text" style="width:200px; font-size: 14px" /></td>
                    </tr>
                    <tr>
                        <td align="left" valign="top" class="body"><strong> Country: </strong></td>
                        <td align="left" valign="top">
                            <select name="country" style="width:208px; font-size: 14px; height: 25px;">
                                <option value="">Select</option>
                                @foreach($countries as $country)
                                <option value="{{ $country->name }}" @if(!empty($datingProfile['country']) && $datingProfile['country']==$country->name) selected="" @endif>{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" valign="top" class="body"><strong> Languages: </strong></td>
                        <td align="left" valign="top">
                            <select name="languages[]" multiple style="width:208px; font-size: 14px; height: 100px;">
                                <option value="">Select</option>
                                @foreach($languages as $language)

                                <option value="{{ $language->name }}" <?php if(!empty($datingProfile->languages) && preg_match('/'.$language->name.'/i', $datingProfile->languages)){ echo "selected"; } ?>>{{ $language->name }}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" valign="top" class="body"><strong> Hobbies: </strong></td>
                        <td align="left" valign="top">
                            <select name="hobbies[]" multiple style="width:208px; font-size: 14px; height: 100px;">
                                <option value="">Select</option>
                                @foreach($hobbies as $hobby)
                                <option value="{{ $hobby->title }}" <?php if(!empty($datingProfile->hobbies) && preg_match('/'.$hobby->title.'/i', $datingProfile->hobbies)){ echo "selected"; } ?>>{{ $hobby->title }}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><h6 class="inner">Education & Career</h6></td>
                    </tr>
                    <tr>
                        <td align="left" valign="top" class="body"><strong> Highest Education: </strong></td>
                        <td align="left" valign="top"><input autocomplete="off" id="education" name="education" @if(!empty($datingProfile['education'])) value="{{ $datingProfile['education'] }}" @endif type="text" style="width:200px; font-size: 14px" /></td>
                    </tr>
                    <tr>
                        <td align="left" valign="top" class="body"><strong> Occupation: </strong></td>
                        <td align="left" valign="top">
                            <select name="occupation" style="width:208px; font-size: 14px; height: 25px;">
                                <option value="">Select</option>
                                <option value="Student" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Student") selected="" @endif>Student</option>
                                <option value="Not working" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Not working") selected="" @endif>Not working</option>
                                <option value="Non-mainstream" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Student") selected="" @endif>Non-mainstream</option>
                                <option value="Accountant" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Accountant") selected="" @endif>Accountant</option>
                                <option value="Acting" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Acting") selected="" @endif>Acting</option>
                                <option value="Actor" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Actor") selected="" @endif>Actor</option>
                                <option value="Administration" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Administration") selected="" @endif>Administration</option>
                                <option value="Advertising" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Advertising") selected="" @endif>Advertising</option>
                                <option value="Advocate" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Advocate") selected="" @endif>Advocate</option>
                                <option value="Air Hostess" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Air Hostess") selected="" @endif>Air Hostess</option>
                                <option value="Airlines" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Airlines") selected="" @endif>Airlines</option>
                                <option value="Architect" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Architect") selected="" @endif>Architect</option>
                                <option value="Artisan" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Artisan") selected="" @endif>Artisan</option>
                                <option value="Audiologist" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Audiologist") selected="" @endif>Audiologist</option>
                                <option value="Banker" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Banker") selected="" @endif>Banker</option>
                                <option value="Beautician" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Beautician") selected="" @endif>Beautician</option>
                                <option value="Biologist/Botanist" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Biologist/Botanist") selected="" @endif>Biologist/Botanist</option>
                                <option value="Business Person" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Business Person") selected="" @endif>Business Person</option>
                                <option value="Chartered Accountant" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Chartered Accountant") selected="" @endif>Chartered Accountant</option>
                                <option value="Chemist" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Chemist") selected="" @endif>Chemist</option>
                                <option value="Civil Engineer" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Civil Engineer") selected="" @endif>Civil Engineer</option>
                                <option value="Clerical Official" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Clerical Official") selected="" @endif>Clerical Official</option>
                                <option value="Commercial Pilot" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Commercial Pilot") selected="" @endif>Commercial Pilot</option>
                                <option value="Company Secretary" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Company Secretary") selected="" @endif>Company Secretary</option>
                                <option value="Computer Professional" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Computer Professional") selected="" @endif>Computer Professional</option>
                                <option value="Consultant" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Consultant") selected="" @endif>Consultant</option>
                                <option value="Contractor" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Contractor") selected="" @endif>Contractor</option>
                                <option value="Cost Accountant" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Cost Accountant") selected="" @endif>Cost Accountant</option>
                                <option value="Creative Person" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Creative Person") selected="" @endif>Creative Person</option>
                                <option value="Customer Support" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Customer Support") selected="" @endif>Customer Support</option>
                                <option value="Defence Employee" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Defence Employee") selected="" @endif>Defence Employee</option>
                                <option value="Dentist" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Dentist") selected="" @endif>Dentist</option>
                                <option value="Designer" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Designer") selected="" @endif>Designer</option>
                                <option value="Doctor" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Doctor") selected="" @endif>Doctor</option>
                                <option value="Economist" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Economist") selected="" @endif>Economist</option>
                                <option value="Engineer" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Engineer") selected="" @endif>Engineer</option>
                                <option value="Engineer (Mechanical)" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Engineer (Mechanical)") selected="" @endif>Engineer (Mechanical)</option>
                                <option value="Engineer (Project)" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Engineer (Project)") selected="" @endif>Engineer (Project)</option>
                                <option value="Entertainment" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Entertainment") selected="" @endif>Entertainment</option>
                                <option value="Event Manager" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Event Manager") selected="" @endif>Event Manager</option>
                                <option value="Executive" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Executive") selected="" @endif>Executive</option>
                                <option value="Factory worker" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Factory worker") selected="" @endif>Factory worker</option>
                                <option value="Farmer" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Farmer") selected="" @endif>Farmer</option>
                                <option value="Fashion Designer" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Fashion Designer") selected="" @endif>Fashion Designer</option>
                                <option value="Finance" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Finance") selected="" @endif>Finance</option>
                                <option value="Flight Attendant" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Flight Attendant") selected="" @endif>Flight Attendant</option>
                                <option value="Freelancer" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Freelancer") selected="" @endif>Freelancer</option>
                                <option value="Government Employee" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Government Employee") selected="" @endif>Government Employee</option>
                                <option value="Health Care" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Health Care") selected="" @endif>Health Care</option>
                                <option value="Home Maker" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Home Maker") selected="" @endif>Home Maker</option>
                                <option value="Hotel &amp; Restaurant" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Hotel &amp; Restaurant") selected="" @endif>Hotel &amp; Restaurant</option>
                                <option value="Human Resources" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Human Resources") selected="" @endif>Human Resources</option>
                                <option value="Interior Designer" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Interior Designer") selected="" @endif>Interior Designer</option>
                                <option value="Investment" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Investment") selected="" @endif>Investment</option>
                                <option value="IT/Telecom" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="IT/Telecom") selected="" @endif>IT/Telecom</option>
                                <option value="Journalist" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Journalist") selected="" @endif>Journalist</option>
                                <option value="Lawyer" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Lawyer") selected="" @endif>Lawyer</option>
                                <option value="Lecturer" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Lecturer") selected="" @endif>Lecturer</option>
                                <option value="Legal" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Legal") selected="" @endif>Legal</option>
                                <option value="Manager" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Manager") selected="" @endif>Manager</option>
                                <option value="Marketing" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Marketing") selected="" @endif>Marketing</option>
                                <option value="Media" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Media") selected="" @endif>Media</option>
                                <option value="Medical" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Medical") selected="" @endif>Medical</option>
                                <option value="Medical Transcriptionist" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Medical Transcriptionist") selected="" @endif>Medical Transcriptionist</option>
                                <option value="Merchant Naval Officer" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Merchant Naval Officer") selected="" @endif>Merchant Naval Officer</option>
                                <option value="Model" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Model") selected="" @endif>Model</option>
                                <option value="Nurse" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Nurse") selected="" @endif>Nurse</option>
                                <option value="Occupational Therapist" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Occupational Therapist") selected="" @endif>Occupational Therapist</option>
                                <option value="Optician" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Optician") selected="" @endif>Optician</option>
                                <option value="Pharmacist" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Pharmacist") selected="" @endif>Pharmacist</option>
                                <option value="Physician Assistant" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Physician Assistant") selected="" @endif>Physician Assistant</option>
                                <option value="Physicist" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Physicist") selected="" @endif>Physicist</option>
                                <option value="Physiotherapist" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Physiotherapist") selected="" @endif>Physiotherapist</option>
                                <option value="Pilot" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Pilot") selected="" @endif>Pilot</option>
                                <option value="Politician" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Politician") selected="" @endif>Politician</option>
                                <option value="Production" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Production") selected="" @endif>Production</option>
                                <option value="Professor" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Professor") selected="" @endif>Professor</option>
                                <option value="Psychologist" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Psychologist") selected="" @endif>Psychologist</option>
                                <option value="Public Relations" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Public Relations") selected="" @endif>Public Relations</option>
                                <option value="Real Estate" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Real Estate") selected="" @endif>Real Estate</option>
                                <option value="Research Scholar" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Research Scholar") selected="" @endif>Research Scholar</option>
                                <option value="Retired Person" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Retired Person") selected="" @endif>Retired Person</option>
                                <option value="Retail" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Retail") selected="" @endif>Retail</option>
                                <option value="Sales" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Sales") selected="" @endif>Sales</option>
                                <option value="Scientist" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Scientist") selected="" @endif>Scientist</option>
                                <option value="Self-employed Person" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Self-employed Person") selected="" @endif>Self-employed Person</option>
                                <option value="Social Worker" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Social Worker") selected="" @endif>Social Worker</option>
                                <option value="Software Consultant" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Software Consultant") selected="" @endif>Software Consultant</option>
                                <option value="Software Engineer" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Software Engineer") selected="" @endif>Software Engineer</option>
                                <option value="Sportsman" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Sportsman") selected="" @endif>Sportsman</option>
                                <option value="Student" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Student") selected="" @endif>Student</option>
                                <option value="Teacher" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Teacher") selected="" @endif>Teacher</option>
                                <option value="Technician" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Technician") selected="" @endif>Technician</option>
                                <option value="Training" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Training") selected="" @endif>Training</option>
                                <option value="Transportation" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Transportation") selected="" @endif>Transportation</option>
                                <option value="Veterinary Doctor" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Veterinary Doctor") selected="" @endif>Veterinary Doctor</option>
                                <option value="Volunteer" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Volunteer") selected="" @endif>Volunteer</option>
                                <option value="Web Designer" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Web Designer") selected="" @endif>Web Designer</option>
                                <option value="Writer" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Writer") selected="" @endif>Writer</option>
                                <option value="Zoologist" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Zoologist") selected="" @endif>Zoologist</option>
                                <option value="Other" @if(!empty($datingProfile['occupation']) && $datingProfile['occupation']=="Other") selected="" @endif>Other</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" valign="top" class="body"><strong> Income: </strong></td>
                        <td align="left" valign="top">
                            <select name="income" style="width:208px; font-size: 14px; height: 25px;">
                                <option value="">Select</option>
                                <option value="Under $25,000" @if(!empty($datingProfile['income']) && $datingProfile['income']=="Under $25,000") selected="" @endif>Under $25,000</option>
                                <option value="$25,001-50,000" @if(!empty($datingProfile['income']) && $datingProfile['income']=="$25,001-50,000") selected="" @endif>$25,001-50,000</option>
                                <option value="$50,001-75,000" @if(!empty($datingProfile['income']) && $datingProfile['income']=="$50,001-75,000") selected="" @endif>$50,001-75,000</option>
                                <option value="$75,001-100,000" @if(!empty($datingProfile['income']) && $datingProfile['income']=="$75,001-100,000") selected="" @endif>$75,001-100,000</option>
                                <option value="$100,001-150,000" @if(!empty($datingProfile['income']) && $datingProfile['income']=="$100,001-150,000") selected="" @endif>$100,001-150,000</option>
                                <option value="$150,001-200,000" @if(!empty($datingProfile['income']) && $datingProfile['income']=="$150,001-200,000") selected="" @endif>$150,001-200,000</option>
                                <option value="$200,001 and above" @if(!empty($datingProfile['income']) && $datingProfile['income']=="$200,001 and above") selected="" @endif>$200,001 and above</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><h6 class="inner">About Myself</h6></td>
                    </tr>
                    <tr>
                        <td align="left" valign="top" class="body"><strong> About Myself: * </strong></td>
                        <td align="left" valign="top">
                            <textarea name="about_myself" style="width:208px; font-size: 14px; height: 60px;">@if(!empty($datingProfile['about_myself'])) {{ $datingProfile['about_myself'] }} @endif</textarea>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><h6 class="inner">About My Preferred Partner</h6></td>
                    </tr>
                    <tr>
                        <td align="left" valign="top" class="body"><strong> Partner Details: * </strong></td>
                        <td align="left" valign="top">
                            <textarea name="about_partner" style="width:208px; font-size: 14px; height: 60px;">@if(!empty($datingProfile['about_partner'])) {{ $datingProfile['about_partner'] }} @endif</textarea>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" name="submit" class="button" value="Submit" /></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    <div class="clear"></div>
</div>
@endsection