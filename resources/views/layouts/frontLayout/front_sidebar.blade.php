<?php 
use App\User; 
use App\Country;
use App\Response;
$datingCount = User::datingProfileExists(Auth::User()['id']);
if($datingCount==1){
    $datingCountText = "My Dating Profile";
} else {
    $datingCountText = "Add Dating Profile";
}
?>
<div id="left_container">
    @if(empty(Auth::check()))
        <div class="partner_search">
            <h2>Member Login</h2>
            <div class="form_container">
                @if(Session::has('flash_message_error'))
                    <div class="alert alert-error alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button> 
                        <strong>{!! session('flash_message_error') !!}</strong>
                    </div>
                @endif
                <form action="{{ url('login' )}}" method="post">{{ csrf_field() }}
                    <fieldset>
                        <div class="search_row">
                            <div class="search_column_1">
                                <label>Username</label>
                            </div>
                            <div class="search_column_2">
                                <input id="username" name="username" type="text" placeholder="Username" required="">
                            </div>
                        </div>
                        <div class="search_row">
                            <div class="search_column_1">
                                <label>Password</label>
                            </div>
                            <div class="search_column_2">
                                <input id="password" name="password" type="password" placeholder="Password" required="">  
                            </div>
                        </div>
                        <div class="search_row last">
                            <div class="search_column_1">&nbsp;</div>
                            <div class="search_column_2">
                                <input type="submit" value="Login" class="search_btn" style="background-color: #532D1A; color: #ffffff; width:60px;">
                            </div>
                        </div>
                        <div class="search_row last">
                            <div class="search_column_1">&nbsp;</div>
                            <div class="search_column_2"><br>
                                <h3><a href="{{ url('register') }}">New User Register!</a></h3>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    @else
        <div class="partner_search">          
            <div class="form_container">
                <h2>Welcome <?php echo Auth::User()['name']; ?></h2>
                <div class="link_detail">
                    <p class="link"><a href="{{ url('/step/2') }}">{{ $datingCountText }}</a></p>
                    @if($datingCount==1)
                        <p class="link"><a href="{{ url('/step/3') }}">My Photos</a></p>
                    @endif
                    <p class="link"><a href="{{ url('/responses') }}">Responses (<span class="newResponsesCount">{{ Response::newResponsesCount() }}</span>)</a></p>
                    <p class="link"><a href="{{ url('/sent-messages') }}">Sent Messages</a></p>
                    <p class="link"><a href="{{ url('/logout') }}">Logout</a></p>
                </div>
            </div>
        </div>
    @endif
    <div class="partner_search">
        <h2>partner search</h2>
        <div class="form_container">
            <form action="{{ url('profile/search') }}" method="post">{{ csrf_field() }}
                <fieldset>
                    <div class="search_row">
                        <div class="search_column_1">
                            <label>Looking for</label>
                        </div>
                        <div class="search_column_2">
                            <select class="gender" name="gender">
                                <option value="Female">Female</option>
                                <option value="Male">Male</option>
                            </select>
                        </div>
                    </div>
                    <div class="search_row">
                        <div class="search_column_1">
                            <label>of Age</label>
                        </div>
                        <div class="search_column_2">
                            <select class="date" name="minAge">
                                <?php
                                $minCount = 16;
                                while($minCount <= 99){
                                ?>
                                    <option value="{{ $minCount }}">from {{ $minCount }} yrs</option>
                                <?php $minCount = $minCount + 1; } ?>
                            </select>
                            <select class="date" name="maxAge">
                                <?php
                                $maxCount = 16;
                                while($maxCount <= 99){
                                ?>
                                <option value="{{ $maxCount }}" @if($maxCount=="32") selected="" @endif>to {{ $maxCount }} yrs</option>
                                <?php $maxCount = $maxCount + 1; } ?>
                            </select>
                        </div>
                    </div>
                    <div class="search_row">
                        <div class="search_column_1">
                            <label>Location</label>
                        </div>
                        <div class="search_column_2">
                            <?php $getCountries = Country::get(); ?>
                            <select class="gender" name="country">
                                <option value="">Anywhere</option>
                                @foreach($getCountries as $country)
                                    <option value="{{ $country->name }}" @if($country->name=="India") selected @endif>{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="search_row last">
                        <div class="search_column_1">&nbsp;</div>
                        <div class="search_column_2">
                            <input type="image" src="{{ asset('images/frontend_images/search_btn.gif') }}" class="search_btn"/>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
    <div class="dating_news">
        <h2>dating news </h2>
        <div class="news_detail">
            <p class="date">18th January, ‘09</p>
            <p class="detail">Nunc viverra. Aliquam suscipit egestas turpis. Aenean mollis est. Sed feugiat, nulla sit amet dictum aliquam, massa leo elementum risus, sed gravida felis erat ut libero. Integer sem nisi, adipiscing non, sagittis eget, hendrerit non, nisi. Aliquam ante.</p>
            <p class="know_more"><a href="#">know more...</a></p>
        </div>
        <div class="news_detail">
            <p class="date">20th January, ‘09</p>
            <p class="detail">Fusce tristique, nisl vel gravida venenatis, risus magna eleifend pede, id bibendum mauris metus et erat. Morbi in leo. Quisque sollicitudin sagittis est. Aliquam non nulla. Suspendisse et nulla nec augue mattis venenatis. Lorem ipsum dolor sit amet.</p>
            <p class="know_more"><a href="#">know more...</a></p>
        </div>
        <div class="news_detail">
            <p class="date">25th January, ‘09</p>
            <p class="detail">Fusce tristique, nisl vel gravida venenatis, risus magna eleifend pede, id bibendum mauris metus et erat. Morbi in leo. Quisque sollicitudin sagittis est. Aliquam non nulla. Suspendisse et nulla nec augue mattis venenatis. Lorem ipsum dolor sit amet.</p>
            <p class="know_more"><a href="#">know more...</a></p>
        </div>
    </div>
    <div class="dont_stay"> <img src="{{ asset('images/frontend_images/dont_stay_alone.gif') }}" alt="" /></div>
</div>