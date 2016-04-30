<div class="row" style="margin-top:10px;padding:0px;">
            <div class="col-md-12">
                <ol class="breadcrumb">
                  <li><a href="<?php echo BASEURL;?>admin/dash">Dash</a></li>
                  <li class="active">Google Analytics</li>
                </ol>
            </div>
        </div>
<div class="panel panel-default admin-body">
  <div class="panel-body">
  <div class="admin-body-page-name">Google Analytics</div>
    <section id="auth-button"></section>
  <section id="view-selector" style="display:none"></section>
  <div style="padding:10px;border:1px solid #aaa">
    <section id="timeline"></section>
  </div>
  </div>
</div>
<!-- Step 1: Create the containing elements. -->



<!-- Step 2: Load the library. -->

<script>
(function(w,d,s,g,js,fjs){
  g=w.gapi||(w.gapi={});g.analytics={q:[],ready:function(cb){this.q.push(cb)}};
  js=d.createElement(s);fjs=d.getElementsByTagName(s)[0];
  js.src='https://apis.google.com/js/platform.js';
  fjs.parentNode.insertBefore(js,fjs);js.onload=function(){g.load('analytics')};
}(window,document,'script'));
</script>

<script>
gapi.analytics.ready(function() {

  // Step 3: Authorize the user.

  var CLIENT_ID = '458006268485-3h7aj6bed7b73miffcft2vq2hpv5pjqj.apps.googleusercontent.com';

  gapi.analytics.auth.authorize({
    container: 'auth-button',
    clientid: CLIENT_ID,
  });

  // Step 4: Create the view selector.

  var viewSelector = new gapi.analytics.ViewSelector({
    container: 'view-selector'
  });

  // Step 5: Create the timeline chart.

  var timeline = new gapi.analytics.googleCharts.DataChart({
    reportType: 'ga',
    query: {
      'dimensions': 'ga:date',
      'metrics': 'ga:sessions',
      'start-date': '30daysAgo',
      'end-date': 'yesterday',
    },
    chart: {
      type: 'LINE',
      container: 'timeline'
    }
  });

  // Step 6: Hook up the components to work together.

  gapi.analytics.auth.on('success', function(response) {
    viewSelector.execute();
  });

  viewSelector.on('change', function(ids) {
    var newIds = {
      query: {
        ids: ids
      }
    }
    timeline.set(newIds).execute();
  });
});
</script>
