@extends('layouts.app')

@section('content')
<div class="profile-page">

    <div class="row profile-cover">
        <div class="row">
            <div class="col-md-3 profile-image">
                <div class="profile-image-container">
                    <img src="{{ asset('assets/images/users/image-user.jpg') }}" alt="image"/>
                </div>
            </div>
            <div class="col-md-12 profile-info">
                <div class=" profile-info-value">
                    <h3>800</h3>
                    <p>Followers</p>
                </div>
                <div class=" profile-info-value">
                    <h3>1520</h3>
                    <p>Friends</p>
                </div>
                <div class=" profile-info-value">
                    <h3>340</h3>
                    <p>Photos</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 profile-under-cover-style">
            &nbsp;
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row margin-top-70">
        <!--Left Sidebar-->
        <div class="col-md-3 margin-bottom-40" style="background:rgba(255, 255, 255, 0.5); border-right: 10px solid #F1F2F2;">



            <div class="panel-heading-2 overflow-hidden">
                <h2 class="heading-xs pull-left"><i class="fa fa-bar-chart-o"></i> Projects Status</h2>
                <a href="#"><i class="icon-settings pull-right"></i></a>
            </div>
            <h3 class="heading-xs">Wordpress Theme <span class="pull-right">40%</span></h3>
            <div class="progress progress-xs">
                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                </div>
            </div>
            <h3 class="heading-xs">Admin Template <span class="pull-right">85%</span></h3>
            <div class="progress progress-xs">
                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%">
                </div>
            </div>
            <h3 class="heading-xs">Laravel Project <span class="pull-right">64%</span></h3>
            <div class="progress progress-xs">
                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="64" aria-valuemin="0" aria-valuemax="100" style="width: 64%">
                </div>
            </div>

            <hr>


            <!--End Datepicker-->
        </div><!--/col-md-3-->
        <!--End Left Sidebar-->

        <div class="col-md-9" style="background:rgba(255, 255, 255, 0.5);">

            <!--Start Profile Contacts-->
            <div class="row margin-top-16 margin-bottom-16">
                <div class="col-md-12">

                    <div class="panel panel-profile">
                        <div class="panel-heading overflow-hidden">
                            <h2 class="panel-title heading-sm pull-left"><i class="icon-settings"></i>WALI KELAS</h2>
                        </div>
                        <div class="panel-body">

                            <div class="row settings">

                                <div class="col-md-12">

                                        <form class="form-horizontal tabular-form margin-top-10">
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Name</label>
                                                <div class="col-sm-10 tabular-border">
                                                    <input type="text" class="form-control"  value="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="form-website" class="col-sm-2 control-label">Website</label>
                                                <div class="col-sm-10 tabular-border">
                                                    <input type="text" class="form-control" id="form-website" placeholder="http://">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Gender</label>
                                                <div class="col-sm-10 tabular-border">
                                                    <div class="radio block"><label><input type="radio" name="gender" class="icheck-aero" checked> Male</label></div>
                                                    <div class="radio block"><label><input type="radio" name="gender" class="icheck-aero"> Female</label></div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="form-password" class="col-sm-2 control-label">Password</label>
                                                <div class="col-sm-10 tabular-border">
                                                    <input type="password" class="form-control" id="form-password" value="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="form-confirmpass" class="col-sm-2 control-label">Confrim Password</label>
                                                <div class="col-sm-10 tabular-border">
                                                    <input type="password" class="form-control" id="form-confirmpass" placeholder="Password">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="selector1" class="col-sm-2 control-label">Country</label>
                                                <div class="col-sm-10 tabular-border"><select name="selector1" id="selector1" class="select2">
                                                    <option value="Afghanistan">Afghanistan</option>
                                                    <option value="Åland_Islands">Åland Islands</option>
                                                    <option value="Albania">Albania</option>
                                                    <option value="Algeria">Algeria</option>
                                                    <option value="American_Samoa">American Samoa</option>
                                                    <option value="Andorra">Andorra</option>
                                                    <option value="Angola">Angola</option>
                                                    <option value="Anguilla">Anguilla</option>
                                                    <option value="Antarctica">Antarctica</option>
                                                    <option value="Antigua_And_Barbuda">Antigua and Barbuda</option>
                                                    <option value="Argentina">Argentina</option>
                                                    <option value="Armenia">Armenia</option>

                                                </select></div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Bio</label>
                                                <div class="col-sm-10">
                                                    <textarea class="form-control textarea-expandable"></textarea>
                                                </div>
                                            </div>


                                        </form>



                                    <!--TAB END-->

                                </div><!--/col-md-12-->

                            </div><!--/row-->


                        </div><!--/panel-body-->
                    </div>

                </div>

            </div><!--/row-->
            <!--End Profile Contacts-->


        </div>
    </div>

</div>

@endsection
