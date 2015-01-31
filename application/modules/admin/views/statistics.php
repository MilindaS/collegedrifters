<?php
  //$query_page_views = "SELECT COUNT('visitor_id'),visitor_page FROM tb_tracks";
$query_page_views = "SELECT visitor_ip, visitor_page, count(visitor_ip) as total
                    FROM tb_tracks
                    WHERE visitor_page NOT LIKE '%admin%'
                    GROUP BY visitor_page ORDER BY total DESC LIMIT 5";
$array_page_views = modules::run('tracking/_custom_query',$query_page_views)->result();


$query_facebook_refers = "SELECT *
                    FROM tb_tracks
                    WHERE visitor_refferer LIKE '%facebook.com%'
                    GROUP BY visitor_ip";
$array_facebook_views = count(modules::run('tracking/_custom_query',$query_facebook_refers)->result());

$query_twitter_refers = "SELECT *
                    FROM tb_tracks
                    WHERE visitor_refferer LIKE '%twitter.com%'
                    GROUP BY visitor_ip";
$array_twitter_views = count(modules::run('tracking/_custom_query',$query_twitter_refers)->result());


// $query_logger_auth = "SELECT * FROM tb_auth_logger
//                       WHERE auth_logout_ts = ''
//                       GROUP BY auth_login_user_id
//                       LIMIT 5";

$query_logger_auth = "SELECT auth_login_user_id, auth_login_ts, auth_logout_ts
                      FROM tb_auth_logger
                      WHERE auth_login_ts =
                        (SELECT max(auth_login_ts)
                          FROM tb_auth_logger as f
                          WHERE f.auth_login_user_id = tb_auth_logger.auth_login_user_id)
                      ORDER BY auth_login_ts DESC
                      ";
//$query_twitter_refers = "SELECT auth_login_user_id, max(auth_login_ts) as login_ts,max(auth_logout_ts) as logout_ts";
//$query_logger_auth = "SELECT * FROM tb_auth_logger ORDER BY auth_ts LIMIT 5";

$array_logger_auth = modules::run('loginlogger/_custom_query',$query_logger_auth)->result();
?>
<div class="row" style="margin-top:10px;padding:0px;">
            <div class="col-md-12">
                <ol class="breadcrumb">
                  <li><a href="<?php echo BASEURL;?>admin/dash">Dash</a></li>
                  <li class="active">Statistics</li>
                </ol>
            </div>
        </div>
<div class="row" >
<div class="col-md-12">
<div class="panel panel-default admin-body">
  <div class="panel-body">
  <div class="admin-body-page-name">Statistics</div>
    <?php

    ?>
    <div class="row">
      <!-- <div class="col-md-3">
      <div class="panel panel-default admin-dash-snippet">
        <div class="panel-body">
        <div id="total-visitor-snippet-title">Unique Users</div>
         <div id="total-visitor-to-date"><?php echo date('Y-m-d H:i');?> </div>
         <div id="total-visitor-count"  class="odometer"><center></center></div><div id="total-visitor-count" ><center><?php echo count(modules::run('tracking/uniqueTracking'));?></center></div>

        </div>
      </div>
    </div> -->
    <div class="col-md-6 col-sm-12 col-xs-12">
      <div class="panel panel-default admin-dash-snippet">
        <div class="panel-body table-responsive">
        <div id="total-visitor-snippet-title">Top Page Views</div>
         <table class="table table-striped" >
           <thead>
             <tr>
               <th>Page URL</th>
               <th>Hit counts</th>
             </tr>
           </thead>
           <tbody>
             <?php foreach ($array_page_views as $page_count) { ?>
             <tr>
               <td><a target="_blank" href="<?php echo $page_count->visitor_page?>"><?php echo $page_count->visitor_page;?></a></td>
               <td><?php echo $page_count->total;?></td>
             </tr>
             <?php } ?>
           </tbody>
         </table>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-sm-12 col-xs-12">
      <div class="panel panel-default admin-dash-snippet">
        <div class="panel-body table-responsive">
        <div id="total-visitor-snippet-title">Top Social Traffic</div>
         <table class="table table-striped" >
           <thead>
             <tr>
               <th>Source</th>
               <th>Hit counts</th>
             </tr>
           </thead>
           <tbody>
             <tr>
               <td>Facebook</td>
               <td><?php echo $array_facebook_views;?></td>
             </tr>
             <tr>
               <td>Twitter</td>
               <td><?php echo $array_twitter_views;?></td>
             </tr>
           </tbody>
         </table>
        </div>
      </div>
    </div>
    </div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default admin-dash-snippet">
          <div class="panel-body table-responsive" style="height:200px;overflow-y:scroll;">
          <div id="total-visitor-snippet-title">Marketplace Users</div>
           <table class="table table-striped" >
             <thead>
               <tr>
                 <th>Username</th>
                 <th>Logged in time</th>
                 <th>Logged out time</th>
                 <th>Status</th>
               </tr>
             </thead>
             <tbody>
             <?php foreach ($array_logger_auth as $logger) { ?>
             <tr>
               <td>
                <?php
                  $logger->auth_login_user_id;
                  $user_arr = modules::run('user/get_where',$logger->auth_login_user_id)->result()[0];
                  ?>
                  <a href="<?php echo BASEURL.'admin/user/'.$logger->auth_login_user_id ;?>"><?php echo ($user_arr->user_firstName);?></a>
               </td>
               <td><?php echo ($logger->auth_login_ts)? $logger->auth_login_ts:'-';?></td>
               <td><?php echo ($logger->auth_logout_ts)? $logger->auth_logout_ts:'-';?></td>
               <td><?php if(($logger->auth_login_ts!="") && ($logger->auth_logout_ts)==""){echo '<img src="'.BASEURL.'public/images/online.png" alt="" style="max-width:20px;"> Online';}else{echo '<img src="'.BASEURL.'public/images/blocked_offline.png" alt="" style="max-width:20px;"> Offline';}?></td>
             </tr>
             <?php } ?>
           </tbody>
           </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>